<?php

/**
 * array_key_existsの拡張版です。
 * $keysに含まれている配列の値が、
 * $searchの中に1つでも存在すれば、trueを返します。
 *
 * @param array $keys 調べる値を含む配列。 
 * @param array $search  キーが存在するかどうかを調べたい配列。 
 * @return TRUE 調べる値をひとつ以上含む場合 
 * 		   FALSE 調べる値を全く含まない場合
 *
 */
function array_key_exists_ext(array $keys, array $search){

    foreach($kyes as $val){
        if(array_key_exists($val, $search)){
            return true;
        }
    }
    return false;
}

?>