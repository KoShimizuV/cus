<?php
// 4.1.0より前のPHPでは$FILESの代わりに$HTTP_POST_FILESを使用する必要
// があります。

require('./biz/cmd/file_cmd.interface.php');

class file_cmd_imple implements file_cmd{

    /** ドキュメントルート */
    var $doc_root = "";

    /** デフォルトのアップロード先のパス スラッシュで終わること。*/
    var $uploaddir = GLOBAL_UPLOAD_DIR ;

    /** アップロードの最大容量 単位*/
    var $upMax = 50;

    /** エラーメッセージ */
    private $error_msg = "";

    public function __construct(){
        $this->doc_root = $_SERVER['DOCUMENT_ROOT'];
    }


    /**
     * 対象のファイルをアップロードします
     *
     *
     * @return false  アップロード失敗
     * @return file_name  アップロード成功時
     */
    public function upload($file_info){


        $upload_file = $this->uploaddir . date("YmdHis", time() );

        // アップロードされたファイルを移動
        if (!move_uploaded_file($file_info['file_name']['tmp_name'], $upload_file)) {
            $this->set_error_msg('ファイルのアップロードに失敗しました。');
            return false;
        }

        return $upload_file;
    }
    //
    //        /**
    //         * アップロードを実行する前に
    //         *
    //         * @return true  検証OK
    //         * @return false 検証NG
    //         */
    //        public function validate_befor_update($_FILES){
    //
    //            // ファイル名がない場合
    //            if(!$_FILES['userfile']['name']){
    //                return false;
    //            }
    //
    //            return true;
    //
    //        }
    //
    //
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
