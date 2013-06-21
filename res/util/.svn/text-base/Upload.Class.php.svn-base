<?php
// 4.1.0より前のPHPでは$FILESの代わりに$HTTP_POST_FILESを使用する必要
// があります。

    Class Upload{

        // include_once("magic_quotes_gpc.ini");

        /** ドキュメントルート */
        var $doc_root = "";

        /** デフォルトのアップロード先のパス スラッシュで終わること。*/
        var $uploaddir = '/homepage/kms/up_dir/';

        /** アップロードの最大容量 単位*/
        var $upMax = 50;
        
        /** エラーメッセージ */
        private $error_msg = "";

        public function upload(){
        
            $this->doc_root = $_SERVER['DOCUMENT_ROOT'];
        
        }


        /**
         * 対象のファイルをアップロードします
         * 
         * 
         * @return true アップロード成功 アップロード失敗
         */
        public function execute($_FILES){

            $upload_file = $this->uploaddir . $_FILES['userfile']['name'];

            // アップロードされたファイルを移動
            if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file)) {
                $this->set_error_msg('ファイルのアップロードに失敗しました。');
                return false;
            }
            
            return true;
        }

        /**
         * アップロードを実行する前に
         * 
         * @return true  検証OK
         * @return false 検証NG
         */
        public function validate_befor_update($_FILES){
        
            // ファイル名がない場合
            if(!$_FILES['userfile']['name']){
                return false;
            }

            return true;

        }
        
        
        /**
         *
         *
         */
        private function set_error_msg($msg){
        
            $error_msg = $msg;
            
            return true;
        
        }
        
        
        public function get_error_msg(){
        
            return $error_msg ;
        
        }
    }

?>
