<?php

include_once('./res/util/debug_func.php');
require('./conf/global.properties');
require('./res/util/array_ext_func.php');
require('./res/util/request_cnv_func.php');
require('./res/util/Http.Class.php');
require('./res/util/magic_quotes_esc.inc.php');
require_once('./res/util/errorHandler.php');
require('./lib/adodb/adodb.inc.php');
require('./dao/base_dao.class.php');
require('./lib/Smarty/Smarty.class.php');
require('./lib/Smarty/kms_smarty.class.php');

define('DS', DIRECTORY_SEPARATOR);
define('ACTION_DIR_NAME', 'action');
require('./res/util/access.php');
$uri = $_SERVER['REQUEST_URI'];

session_start();

// 実行するデフォルトのメソッド名
$method = 'execute';
$elements = explode('/index.php', $uri);
$path  = count($elements) > 1 ? explode('/',$elements[1]) : "" ;

// キャリアの確認
// 2010-03-10  ない場合はパソコンサイトを表示
if(empty($_REQUEST['c'])){
    $_REQUEST['c'] = 'pc';
};

$ac = new access();
if( $ac->detect_career() == 'iphone'){ $_REQUEST['c'] = 'mb'; }

// 設定 メソッド名
if(!empty($_REQUEST['m'])){
    $GLOBALS['__Framework']['current_method'] = $_REQUEST['m'];
    $method = $_REQUEST['m'];
}

$client = isset($_REQUEST['c']) ? $_REQUEST['c'] : "";
$mode = isset($_REQUEST['c']) ? $_REQUEST['c'] : "";
$package = isset($_REQUEST['p']) ? $_REQUEST['p'] : "";
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "";

// actionの指定がない場合は、login画面へ
if(empty($action)){
    $smarty = new kms_smarty();
    $smarty->execute("$client/login.tpl");
    exit;
}else{
    $action .= "_action" ;
}

// session check    
if($action != 'login_action' && $action != 'lookup'){
    require('./action/pc/account/login_action.php');
    $obj =	new login_action();
    $obj->session_check($_SESSION);
}
$_GET['url'] = $path;

// 対象のアクションを読込み
$action_file_full_path = '.' . DS . ACTION_DIR_NAME . DS . $client . DS .  $package . DS . $action . ".php";
if(!file_exists($action_file_full_path)){
    print('no such file<br/>');
    print($action_file_full_path);
    exit;
}

// actionファイルの読込み
require $action_file_full_path;
$class_name = $action ;
$obj = new $class_name();
$obj->$method($_REQUEST);
?>
