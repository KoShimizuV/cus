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

    $dao->update($_POST);
?>

<html>
<head>
<title>knowledgeDB - 更新</title>
</head>
<body>
<? require "../res/header.txt"; ?>
</body>
</html>
