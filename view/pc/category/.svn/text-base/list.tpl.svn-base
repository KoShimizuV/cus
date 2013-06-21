<?php
    header("Content-Type: text/html;charset=UTF-8");

    // 設定 incluede_path
    if( $_SERVER['HTTP_HOST'] != 'localhost'){
        set_include_path( ".:/homepage/kms:/usr/local/lib/php/" );
    }

    // Daoをインポート
    include_once ( "../dao/CategoryDao.php" );

    // インスタンスを作成
    $categoryDao  = new CategoryDao();

    // カテゴリーリストを抽出
    $categoryList = $categoryDao->select_all(0);
?>

<html>
<head>
<title>knowledgeDB - カテゴリー検索</title>
<?php include_once ( "../res/htmlHeader.txt" ); ?>
</head>
<body onLoad="document.searchForm.searchWord.focus()">
<!-- HEADER START -->
<?php require("../res/header.txt");?>
<!-- HEADER END -->
<!-- MAIN_AREA START -->
<?php
  while($row2 = mysql_fetch_array($categoryList, MYSQL_ASSOC)) {
    print("<form action=\"search.php\" method=\"POST\" style=\"clear:both; float:left\">\r\n");
    print("<a href=\"#\" onClick=\"submit()\">$row2[CLASS_1]>$row2[CLASS_2]>$row2[CLASS_3]>$row2[CLASS_4]>$row2[CLASS_5]\r\n</a>");
    print("<input type=\"hidden\" name=\"category_code\"value=\"$row2[CATEGORY_CODE]\">\r\n");
    print("</form>\r\n");
  }?>
</body>
</html>
