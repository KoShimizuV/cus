<?php

    require_once('./action/pc/abstract_action.php');
    require('./biz/imple/qa_manage_facade_imple.class.php');
    
    class uncorrectdown_do_action extends abstract_action{
    
        private $qa_manage_facade;
        
        public function execute($request){

            $qa_info = $this->qa_manage_facade->get_qa($request);
            
            // カウントダウンの実行
            $qa_info['uncorrect_cnt'] = $qa_info['uncorrect_cnt'] - 1 ;
            
            $rs = $this->qa_manage_facade->update($qa_info);

            if(!$rs){
                // デバッグ
                d($rs);
                $smarty_obj = new kms_smarty();
                $smarty_obj->execute('pc/qa/update_init.tpl', array('qa' => $request)) ;
                exit;
            }

            Http::redirect('index.php?c=pc&p=qa&a=list');
            exit;
        }
        
        /**
         * コンストラクタ
         */
        public function __construct(){
            $this->qa_manage_facade = new qa_manage_facade_imple();
        }
    }


?>