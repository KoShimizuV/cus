<?php
    header("Content-Type: text/html;charset=UTF-8");

    // 設定 incluede_path
    if( $_SERVER['HTTP_HOST'] != 'localhost'){
        set_include_path( ".:/homepage/kms:/usr/local/lib/php/" );
    }

    // インポートする
    require('../dao/CategoryDao.php');

    // インスタンスを作成
    $dao = new CategoryDao();

// データが送信されたときはデータを抽出する
if (strlen($_POST["category_id"]) and !strlen($_POST["class_1"]) ) {  
  $res = $dao->select_one($_POST["category_id"]);
}elseif(strlen($_POST["category_id"]) and strlen($_POST["class_1"]) ){
  $dao->update($_POST); 
  header("location:search.php");
}

?>
<html>
<head>
<title>knowledgeDB - 更新</title>
<? include_once("../res/htmlHeader.txt"); ?>
</head>
<body>
<? require "../res/header.txt"; ?>
<h3>knowledgeDB - 更新</h3>
<form method="POST" action="<? echo($_SERVER["PHP_SELF"]) ?>">
<table border="1">
  <?  while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) { ?>
    <tr>
      <td>ID</td>
      <td>CODE</td>
      <td>CLASS1</td>
      <td>CLASS2</td>
      <td>CLASS3</td>
      <td>CLASS4</td>
      <td>CLASS5</td>
      <td>DELFLG</td>
      <td>UpdateDate</td>
      <td>RegistDate</td>
      <td nowrap>ACTION</td>
    </tr>
    <tr>
      <td><input type="hidden" name="category_id" value="<? echo( $row["CATEGORY_ID"] )?>"><? echo( $row["CATEGORY_ID"]) ?></td>
      <td><input type="text" name="category_code" value="<? echo( $dao->cnv_enc($row["CATEGORY_CODE"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="class_1" value="<? echo( $dao->cnv_enc($row["CLASS_1"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="class_2" value="<? echo( $dao->cnv_enc($row["CLASS_2"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="class_3" value="<? echo( $dao->cnv_enc($row["CLASS_3"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="class_4" value="<? echo( $dao->cnv_enc($row["CLASS_4"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="class_5" value="<? echo( $dao->cnv_enc($row["CLASS_5"], $dao->enc_disp, $dao->enc_db) )?>"></td>
      <td><input type="text" name="category_del_flg" value="<? echo ( $row["CATEGORY_DEL_FLG"] ) ?>"></td>
      <td nowrap><? echo ( $row["CATEGORY_UPDATE_DATE"] ) ?></td>
      <td nowrap><? echo ( $row["CATEGORY_REGIST_DATE"] ) ?></td>
      <td><input type="submit" value="更新"></td>
    </tr>
  <?  } ?>
</table>
</form>
</body>
</html>
