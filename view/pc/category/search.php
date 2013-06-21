<?php
    header("Content-Type: text/html;charset=UTF-8");

    // 設定 incluede_path
    if( $_SERVER['HTTP_HOST'] != 'localhost'){
        set_include_path( ".:/homepage/kms:/usr/local/lib/php/" );
    }
    
//    include_once('util/errorHandler.php');
    require('dao/CategoryDao.php');

    // インスタンスを作成
    $dao = new CategoryDao();

    if ( strlen($_POST['searchWord']) ){
      // DBからデータを取得 条件検索
      $res = $dao->selectLike($_POST['searchWord']);  
    }else{
      // DBからデータを取得 全件検索
      $res = $dao->select_all(2);
    }

$items['id']      = "ID";
$items['code']      = "CODE";
$items['class_1']     = "CLASS_1";
$items['class_2']     = "CLASS_2";
$items['class_3']     = "CLASS_3";
$items['class_4']     = "CLASS_4";
$items['class_5']     = "CLASS_5";
$items['update_date'] = "UPDATE_DATE";
$items['regist_date'] = "REGIST_DATE";
$items['del_flg']     = "DEL_FLG";

include_once("../res/htmlHeader.txt");
?>

<html>
<head>
<title>knowledge-DB カテゴリーリスト</title>
</head>
<body>
<?php  include_once('../res/header.txt');  ?>
<h3>knowledge-DB カテゴリーリスト</h3>  
<table border="1">
  <tr>
    <td>ID</td>
    <td>CODE</td>
    <td>CLASS1</td>
    <td>CLASS2</td>
    <td>CLASS3</td>
    <td>CLASS4</td>
    <td>CLASS5</td>
    <td>DELFLG</td>
    <td>UpdateDate</td>
    <td>RegistDate</td>
    <td nowrap>ACTION</td>
  </tr>
<?  while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) { ?>
  <tr>
    <td><?  echo ( $row[CATEGORY_ID] ) ; ?></td>
    <td><?  echo ( $row[CATEGORY_CODE] ) ; ?></td>
    <td><?  echo ( $dao->cnv_enc( $row[CLASS_1], $dao->enc_disp, $dao->enc_db ) ) ; ?></td>
    <td><?  echo ( $dao->cnv_enc( $row[CLASS_2], $dao->enc_disp, $dao->enc_db ) ) ; ?></td>
    <td><?  echo ( $dao->cnv_enc( $row[CLASS_3], $dao->enc_disp, $dao->enc_db ) ) ; ?></td>
    <td><?  echo ( $dao->cnv_enc( $row[CLASS_4], $dao->enc_disp, $dao->enc_db ) ) ; ?></td>
    <td><?  echo ( $dao->cnv_enc( $row[CLASS_5], $dao->enc_disp, $dao->enc_db ) ) ; ?></td>
    <td><?  echo ( $row[CATEGORY_DEL_FLG] ) ; ?></td>
    <td><?  echo ( $row[CATEGORY_UPDATE_DATE] ) ; ?></td>
    <td><?  echo ( $row[CATEGORY_REGIST_DATE] ) ; ?></td>
    <td>
      <form action="updateInit.php" method="POST" style="float:left">
        <input type="submit" value="更新">
        <input type="hidden" name="category_id" value="<? echo ( $row[CATEGORY_ID] ) ; ?>" >
      </form>
    </td>
  </tr>
<?  } ?>  
</table>
</body>
</html>
