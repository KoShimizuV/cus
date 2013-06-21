<?php
require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');
class regist_init_action extends abstract_action{
    private $qa_manage_facade;
    public function execute($request){
        $category_list = $this->qa_manage_facade->get_category_list();
        $src_list = $this->qa_manage_facade->get_src_list();
        $src = $this->qa_manage_facade->get_latest_src();
        $chkbox =  $this->qa_manage_facade->get_tag_list_as_id_val();
        $chkbox_selected = 1;
        $smarty = new kms_smarty();
        $smarty->execute('pc/qa/regist_init.tpl', array('category_list' => $category_list, 
                                                        'src_list' => $src_list, 
                                                        'qa'=> array("category"=>"英和", "src"=>$src),
                                                        'tag_checkboxes' => $chkbox,
                                                        'tag_selected'  => $chkbox_selected,
            ));
    }

    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple() ;
    }
}
?>
