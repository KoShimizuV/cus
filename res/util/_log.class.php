<?php
class MyLog{
//=============================================
//  Controll
//=============================================
//------------------------------------------
//ファイルの内容を表示します。
//@param  $_POST
//@return なし
//------------------------------------------
public function ctrl_file_view($_POST){
  if($_POST['fileName']){
    $this->view_csv_table_one($_POST);
  }else{
    print"please input fileName<br>";
  }
}

//------------------------------------------
//ファイルに内容を追記します。
//@param  $_POST
//@return なし
//------------------------------------------
public function ctrl_file_write($_POST){
  if($_POST){
    print"post is exist<br>";
    $this->recordLog($_POST);
  }
}


//=============================================
//  MODEL
//=============================================
//--------------------------------------------
//ログを作成します
//@param  $_POST
//@return なし
//--------------------------------------------
public function recordLog($_POST){
  print"---->".__METHOD__." method Run<br>";
  $file_name = 'log.txt';   //ファイル名を定義 
  touch($file_name);      // 空のファイルを作成
//  chmod($file_name,600);    // パーミッション変更

  if($_POST){
    $fp = @fopen($file_name,"a") or die ("Can't open !");   //open file
    flock($fp, LOCK_EX);                    //ファイルの読み書きをロック
    $inputData.= "実行時刻,".date("y/m/d (D)H:i:s",time()).",";
    $inputData.= $this->create_csv_line($_POST,1);        //create CSVText Data
    $inputData.= "ブラウザ＆OS情報,".$_SERVER['HTTP_USER_AGENT'].",";
    $inputData.= "リンク元,".$_SERVER['HTTP_REFERER'].",";
    $inputData.= "IP,".$_SERVER['REMOTE_ADDR']."\n";
//    print $inputData."<br>";
    $result = fputs($fp,$inputData);            //put into file
//    print $result."<br>";
    fclose($fp);                      //close file
  }
  print"<----".__METHOD__ ." method End<br>";
}


//--------------------------------------------
//POSTの値をカンマ区切りの文字列に変換します
//@param  $_POST:リクエストで送られてくる内容
//      $style：0keyを含めない  1keyを含める
//@return csvText
//--------------------------------------------
public function create_csv_line($_POST,$style){
  print"---->".__METHOD__." method Run<br>";
  foreach($_POST as $key=>$var){
    if($style=0){
      $var = str_replace(",","\csvcomma",$var); //「」を「\csvcomma」に変換
      $csvText.="$var,";
      $csvText = mb_convert_encoding($csvText,"EUC-JP");
    }else{
      $var = str_replace(",","\csvcomma",$var); //「」を「\csvcomma」に変換
      $csvText.="$key,$var,";
    }
    print $csvText."<br>";
  }
  print"<----".__METHOD__ ." method End<br>";
  return $csvText;
}


//---------------------------------------------------------------
//指定されたファイルを開き、データを単語ごとに出力します
//@param  $fileName   ファイルの名前
//@return $arrayword  単語ごとの配列
//---------------------------------------------------------------
public function print_csv_arrayword($fileName){
  print"---->".__METHOD__." method Run<br>\n";
  
  $fp = @fopen($fileName,"r") or die("File Open Error! \n");
  while(!feof($fp)){
    $line = fgets($fp);
    $arrayword[] = explode(",",$line);
  }
  fclose($fp);

  print"<----".__METHOD__ ." method End<br>\n"; //output browser
  return $arrayword;
}
  
  
//==========================================================
//  VIEW
//==========================================================  
//-------------------------------------------------------
//１データ/１テーブルで表示します。
//@param  $_POST
//@return なし
//-------------------------------------------------------
public function view_csv_table($_POST){
  print"---->".__METHOD__." method Run<br>\n";
  $fileName = $_POST['fileName'];
  
  $arrayword = $this->print_csv_arrayword($fileName);
  for($i=0;$i<count($arrayword);++$i){
    $j=0;
    print "<table border=1>";
    foreach($arrayword[$i] as $val){
      if($j%2==0){
        print "<tr><td>$val</td>";
      }else{
        print "<td>$val</td></tr>";
      }
      ++$j;
    }
    print "</table><br>";
    
  }
  print"<----".__METHOD__ ." method End<br>\n"; //output browser
}
//-------------------------------------------------------
//全データ/１テーブルで表示します。
//@param  $_POST
//@return なし
//-------------------------------------------------------
public function view_csv_table_one($_POST){
  print"---->".__METHOD__." method Run<br>\n";

  $fileName = $_POST['fileName'];
  $arrayword = $this->print_csv_arrayword($fileName);
  
  print "<table border=1>";
  for($i=0;$i<count($arrayword);++$i){
    $j=0;
    if($i==0){
      foreach($arrayword[$i] as $val){
        if($j%2==0){
          print "<th nowrap>$val</th>";
        }
        ++$j;
      }
      $j=0;
    }
    
    print "<tr>";
    foreach($arrayword[$i] as $val){
      if($j%2==1){
        $val = str_replace("\csvcomma",",",$val); //「」を「\csvcomma」に変換
        print "<td nowrap>$val</td>";
      }
      ++$j;
    }
    print "</tr>";
  }
  print "</table><br>";
  print"<----".__METHOD__ ." method End<br>\n"; //output browser
}
}//end class
?>