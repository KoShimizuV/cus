<?php
require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
class update_init_action extends abstract_action{
    private $qa_manage_facade;
    public function execute($request){
        $qa_info = $this->qa_manage_facade->get_qa($request);
        $category_list = $this->qa_manage_facade->get_category_list();
        $src_list = $this->qa_manage_facade->get_src_list();
        $smarty = new kms_smarty();
        $smarty->execute('pc/qa/update_init.tpl',array('qa'=>$qa_info, 'category_list' => $category_list, 'src_list'=>$src_list));
    }
    
    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple();
    }
}
?>
