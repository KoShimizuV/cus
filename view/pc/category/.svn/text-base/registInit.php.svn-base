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

// データが送信されたときはデータを追加する
if (strlen($_POST["category_code"]) and strlen($_POST["class_1"])) {  
  $dao->insert($_POST);
  header("location: search.php");
}
?>

<html>
<head>
<title>knowledgeDB -カテゴリー追加=</title>
<? include_once("../res/htmlHeader.txt"); ?>
</head>
<body>
<?  require('../res/header.txt'); ?>
<h3>カテゴリー追加</h3>
<form method="POST" action="<? echo $_SERVER["PHP_SELF"] ?>">
<table border="1">
    <tr>
      <td>コード</td>
      <td><input type="text" name="category_code" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>階層１</td>
      <td><input type="text" name="class_1" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>階層２</td>
      <td><input type="text" name="class_2" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>階層３</td>
      <td><input type="text" name="class_3" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>階層４</td>
      <td><input type="text" name="class_4" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>階層５</td>
      <td><input type="text" name="class_5" onkeyDown="changeLength(this)" /></td>
    </tr>
    <tr>
      <td>アクション</td>
      <td><input type="submit" value="追加"></td>
    </tr>
</table>
</form>
</body>
</html>
