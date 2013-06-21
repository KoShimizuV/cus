<?php

require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');
include_once('./res/util/paging.class.php');

class test_determine_action extends abstract_action{

    private $qa_manage_facade;
    
    public function execute($request){

        // リクエストをエンティティに設定
        $search_cond_obj = new search_cond($request);
        $search_cond = $search_cond_obj->get_entity();
        if ($request["result"] == "correct") {
            $qa = $this->qa_manage_facade->correct_change($search_cond["id"], 1);
        } else {
            $qa = $this->qa_manage_facade->uncorrect_change($search_cond["id"], 1);
        }
        
        // 遷移
        if (count($_SESSION['qa_list']) == 0) {
            Http::redirect('index.php?c=pc&p=qa&a=list');
        } else {
            Http::redirect('index.php?c=pc&p=qa&a=test_qu');
        }
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