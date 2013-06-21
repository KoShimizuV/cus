<?php

require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');
include_once('./res/util/paging.class.php');

class test_ans_action extends abstract_action{

    private $qa_manage_facade;
    
    public function execute($request){

        // リクエストをエンティティに設定
        $search_cond_obj = new search_cond($request);
        $search_cond = $search_cond_obj->get_entity();
        $qa = $this->qa_manage_facade->get_qa($search_cond);

        // 遷移
        $smarty_obj = new kms_smarty();
        $smarty_obj->execute('pc/qa/test_ans.tpl', array('qa' => $qa));
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