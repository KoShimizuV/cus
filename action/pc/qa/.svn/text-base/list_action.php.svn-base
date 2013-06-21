<?php
require_once('./action/pc/abstract_action.php');
require_once('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');
include_once('./res/util/paging.class.php');

class list_action extends abstract_action{

    private $qa_manage_facade;

    public function execute($request){
        $rs_cate_list = $this->qa_manage_facade->get_category_list();

        $search_cond_obj = new search_cond($request);
        $search_cond = $search_cond_obj->get_entity();
        if(!$search_cond_obj->is_request() && array_key_exists('search_cond', $_SESSION)){
            $search_cond = $_SESSION['search_cond'];
        }
        // d($search_cond);
        // echo "sessoin";
        // d($_SESSION);
        $rs_array = $this->qa_manage_facade->get_qa_list($search_cond);
        $_SESSION['search_cond'] = $search_cond ;
        $smarty_obj = new kms_smarty();
        $smarty_obj->execute('pc/qa/list.tpl', array('qa_list' => $rs_array['list'], 
                                                     'category_list'=>$rs_cate_list,
                                                    // 'rate_list' => $rate_list
                                                     ));
    }
    
    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple() ;
    }
}
?>
