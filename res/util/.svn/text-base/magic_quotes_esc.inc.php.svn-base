<?php

// get_magic_quotes_gpcがonの場合、スラッシュを取り除く
if (get_magic_quotes_gpc()) {
    
    function stripslashes_deep($value){
        $value = is_array($value) ?
                    array_map('stripslashes_deep', $value) :
                    stripslashes($value);

        return $value;
    }

    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    $_REQUEST = array_map('stripslashes_deep', $_REQUEST);
}

/**
 * array_map 指定した配列の要素にコールバック関数を適用する
 * http://jp.php.net/array_map
 *
 * stripslashes -- addslashes() でクォートされた文字列のクォート部分を取り除く
 * http://jp2.php.net/manual/ja/function.stripslashes.php
 *
 */
?>
