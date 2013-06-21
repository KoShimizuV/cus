<?php

    /**
     * このクラスはmysql用です。
     * DBにconnectした後に使う必要があります。
     * 
     *
     */
    class Convert{

        private static $enc_disp = "EUC-JP";
        private static $enc_db   = "EUC-JP";

        /**
         * DBに登録する形式に変換します。
         *
         * @param  $request 
         * @return 
         */
        public static function convert2db(array $request){

            foreach($request as $key => $val){
                   $request[$key] = Convert::cnv_sqlstr(Convert::cnv_enc($val, Convert::$enc_disp, Convert::$enc_db));
            }
            return $request;
        }
        
        
        /**
         * Browserに表示する形式に変換します。
         *
         * @param  $request 
         * @return 
         */
        public static function convert2browser(array $request){

            foreach($request as $key => $val){

                   $request[$key] = Convert::cnv_sqlstr(Convert::cnv_enc($val, Convert::$enc_db, Convert::$enc_disp));

            }

            return $request;
        
        }

        
       /**
        * データの文字コードを変換する関数
        * @param $string   変換する文字列
        * @param $to     変換後のコード
        * @param $from   変換前のコード
        */
        private static function cnv_enc($string, $to, $from) {

            // 文字コードを変換する
            $det_enc = mb_detect_encoding($string, $from . ", " . $to);

            if ($det_enc and $det_enc != $to) {
              return mb_convert_encoding($string, $to, $det_enc);
            }else {
              return $string;
            }
        }

        /**
        * データをSQL用に変換
        */
        private static function cnv_sqlstr($string) {

            if (get_magic_quotes_gpc()) {
              $string = stripslashes($string);
            }

            $string = htmlspecialchars($string);
            
            $string = mysql_real_escape_string($string);

            return $string;
            
            }

    }

?>