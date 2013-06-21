<?php

    require('./biz/cmd/csv_cmd.interface.php');
        
    class csv_cmd_imple implements csv_cmd{
  
        /**
         * 指定された位置にあるCSVファイルをダウンロードします。
         * 
         * @param $fileInfo['filePath'] ファイルの相対パス
         * @param $fileInfo['fileName'] ファイルの名前
         */
        public function donwload($fileInfo){
            
            $fileName = $fileInfo['fileName'];
            
            // for ie http://support.microsoft.com/default.aspx?scid=kb;ja;436605
            header("Cache-Control: public");

            // for ie http://support.microsoft.com/default.aspx?scid=kb;ja;436605
            header("Pragma: public");
            
            header ("Content-Disposition: attachment; filename=$fileName");
            header ("Content-type: application/x-csv");
            readfile ($fileInfo['filePath']);
        
        }

        /**
         * 指定されたファイルから中身を読み込んで、配列で返します。
         * 
         * @param  $file_info['file_path'] CSVの絶対パス
         * @return array $csv_arr         CSVデータ
         *         boolean false          ファイルの読込に失敗
         */
        public function read($file_info){
            
            // 
            require_once('./res/util/encoding.class.php');
            $encoder = new encoding();
            
            // オープン 対象ファイル
            $csv_arr = array();
            
			$handle = @fopen($file_info['file_path'], "r") or die ("Can't open !");;
			while (($data = fgetcsv($handle, null, ",")) !== FALSE) {
			    // エンコードの変換
			    $data = $encoder->convert_encoding($data,"EUC-JP","Shift-JIS");
                array_push($csv_arr,$data);
			}
			fclose($handle);
            
            return $csv_arr;
        }
        
        /**
         * 指定されたファイル名・内容からCSVファイルを作成します。
         * 
         * @param  $fileInfo['filePath'] CSVの相対パス
         * @param  $fileInfo['body']     CSVの内容
         * @return ファイルの作成に成功:true ファイルの作成に失敗:false
         */
        public function make($fileInfo){
            
            // 空のファイルを作成
            $res = touch($fileInfo['filePath']);
            
            // パーミッション変更
            // chmod($file_name,600);

            // オープン 対象ファイル
            $fp = @fopen($fileInfo['filePath'],"a") or die ("Can't open !");

            // 書込 ファイル内容
            $result = fputs($fp,$fileInfo['body']);

            // クローズ 対象ファイル
            fclose($fp);
            
            return true;
        }
        
        /**
         * 指定されたファイルを削除します。
         * 
         * @param  filePath 削除対象のファイル（）
         * @return 削除に成功した場合 true, 削除に失敗した場合 false
         */
        public function delete($filePath){
            
            // 確認 対象ファイルの存在
            if (!file_exists($filePath)) {
                return true;
            }
            
            // 削除 対象ファイル
            $rs = unlink($filePath);
            
            return $rs;
        
        }
        
        private function validate($file_info){}

    }

?>