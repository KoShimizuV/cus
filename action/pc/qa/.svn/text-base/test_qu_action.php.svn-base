<?php

require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');
include_once('./res/util/paging.class.php');

class test_qu_action extends abstract_action{

    private $qa_manage_facade;
    
    public function execute($request){

        // リクエストをエンティティに設定
        $search_cond_obj = new search_cond($request);
        $search_cond = $search_cond_obj->get_entity();

        $qa = null;
        
        if(!isset($search_cond["category"]) && isset($_SESSION['search_cond']['category'])){
            $search_cond["category"] = $_SESSION['search_cond']['category'];
        }
                
        $relist_flag = false;
        foreach($_SESSION['qa_list'] as $qa){
            if($qa["category"] != $search_cond["category"]){
                $relist_flag = true;
            }
        }
        
        if (!isset($_SESSION['qa_list']) || count($_SESSION['qa_list']) == 0 || $relist_flag) {
            // 検索の実行
            $rs_array = $this->qa_manage_facade->get_qa_list($search_cond);

            // 検索条件をsessionに保存
            $_SESSION['search_cond'] = $search_cond ;
            $_SESSION['qa_list'] = $rs_array['list'];
        }
        $qa = array_shift($_SESSION['qa_list']);
        
        // 遷移
        $smarty_obj = new kms_smarty();
        $smarty_obj->execute('pc/qa/test_qu.tpl', array('qa'=>$qa, 'qa_list' => $_SESSION['qa_list']));
    }
    
    /**
     * コンストラクタ
     *  
     */
    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple() ;
    }
}
?>