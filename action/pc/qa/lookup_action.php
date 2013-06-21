<?php
require_once('./action/pc/abstract_action.php');
require_once('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');
// include_once('./res/util/paging.class.php');
class lookup_action extends abstract_action{
    private $qa_manage_facade;

    public function execute($request){
        $search_cond_obj = new search_cond($request);
        $search_cond = $search_cond_obj->get_entity();
        $rs_array = $this->qa_manage_facade->get_qa_list($search_cond);
        $smarty_obj = new kms_smarty();
        $smarty_obj->execute('pc/qa/lookup.tpl', array('qa_list' => $rs_array['list'], ));
    }

    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple() ;
    }
}
?>
