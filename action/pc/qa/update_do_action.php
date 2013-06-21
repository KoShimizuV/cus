<?php
require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/qa.class.php');

class update_do_action extends abstract_action{
    private $qa_manage_facade;
    public function execute($request){
        $qa = new qa($request);
        $rs = $this->qa_manage_facade->update($qa->get_entity());
        if(!$rs){
            d($rs);
            $smarty_obj = new kms_smarty();
            $smarty_obj->execute('pc/qa/update_init.tpl', array('qa' => $request)) ;
            exit;
        }
        $_SESSION['search_cond'] = $search_cond ;
        Http::redirect('index.php?c=pc&p=qa&a=list');
        exit;
    }
    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple();
    }
}
?>
