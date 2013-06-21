<?php

    require_once('./action/pc/abstract_action.php');
    require('./biz/imple/qa_manage_facade_imple.class.php');
    require_once('./biz/cmd/imple/file_cmd_imple.class.php');
    require('./biz/cmd/imple/csv_cmd_imple.class.php');
    require('./entity/qa.class.php');
    
    class import_do_action extends abstract_action{

        private $file_cmd  ;
        var $csv_cmd = null ;
        var $qa_manage_facade = null ;
        
        public function execute($request){

            // ファイルアップロード
            $file_path = $this->file_cmd->upload($_FILES);
            $smarty = new kms_smarty();

            // 失敗時
            if(!$file_path){
                $smarty->execute('pc/qa/import_init.tpl') ;
            }
            
            // CSV読込 
            $csv_arr ="";
            $csv_arr = $this->csv_cmd->read(array('file_path'=> $file_path ));
            $csv_rec_num = count($csv_arr);

            // insert
            $num = 0 ;
            foreach($csv_arr as $key => $cols ){
                
                $valid_flag = false;
                // 検証
                if (strlen($cols[0]) && strlen($cols[1]) && strlen($cols[2]) && strlen($cols[3])) {
                    $valid_flag = true;    
                }
                
                if ($valid_flag) {
	                $qa_obj = new qa(array('title'=>$cols[0], 'qu'=>$cols[1], 'ans'=>$cols[2], 'category'=>$cols[3]));
	                $res = $this->qa_manage_facade->insert($qa_obj->get_entity());
	
	                // 失敗時
	                if(!$res){
	                    d('error has hapned');
	                    $smarty->execute('pc/qa/import_finish.tpl',array('imp_num'=>$num,'csv_rec_num'=>$csv_rec_num));
	                    return ;
	                }
	                ++ $num;
                }
            }

			$smarty->execute('pc/qa/import_finish.tpl',array('imp_num'=>$num,'csv_rec_num'=>$csv_rec_num));
			return ;
        }

        /**
         * コンストラクタ
         *  
         */
        public function __construct(){
            $this->file_cmd = new file_cmd_imple() ;
            $this->csv_cmd = new csv_cmd_imple() ;
            $this->qa_manage_facade = new qa_manage_facade_imple();
        }

    }
?>