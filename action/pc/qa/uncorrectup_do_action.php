<?php
require_once('./action/pc/abstract_action.php');
require('./biz/imple/qa_manage_facade_imple.class.php');

class uncorrectup_do_action extends abstract_action{

    private $qa_manage_facade;
    
    public function execute($request){
        $qa_info = $this->qa_manage_facade->get_qa($request);
        $qa_info['uncorrect_cnt'] = $qa_info['uncorrect_cnt'] + 1 ;
        $rs = $this->qa_manage_facade->update($qa_info);
        if(!$rs){
            d($rs);
            $smarty_obj = new kms_smarty();
            $smarty_obj->execute('pc/qa/update_init.tpl', array('qa' => $request)) ;
            exit;
        }
        // create search condition
        foreach( $_SESSION['search_cond'] as $key=>$val ){
            $req_arr = $req_info . '&' . $key . '=' . urlencode($val);
        }
        Http::redirect('index.php?c=pc&p=qa&a=list&bfr_id=' . $request['id'] .$req_arr );
        exit;
    }
    
    public function __construct(){
        $this->qa_manage_facade = new qa_manage_facade_imple();
    }
}
?>
