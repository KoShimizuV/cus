<?php

    require_once('./action/pc/abstract_action.php');
    require('./biz/imple/qa_manage_facade_imple.class.php');
    include_once('./entity/qa.class.php');
    
    class export_do_action extends abstract_action{
    
        private $qa_manage_facade ;

        public function execute($request){
        
            $rs = $this->qa_manage_facade->export_qa();


            $smarty_obj = new kms_smarty();
            
            if(!$rs){
                d($rs);
//                $smarty_obj->execute('pc/qa/regist_init.tpl', array('qa' => $request)) ;
//                return;
            }

//            Http::redirect('index.php?c=pc&p=qa&a=list');
        }
    
        public function __construct(){
            $this->qa_manage_facade = new qa_manage_facade_imple();
        }

    
    }


?>