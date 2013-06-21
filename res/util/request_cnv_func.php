<?php

function cnv_request2search_cond($request){

    $search_cond = array() ;

    if( !array_key_exists("public_flg", $search_cond)){
        $search_cond[public_flg] = 1 ;
    }

    if( !array_key_exists("del_flg", $search_cond)){
        $search_cond[del_flg] = 0 ;
    }

    if(!empty($request[title])){
        $search_cond[title] = $request[title] ;
    }
    if(!empty($request[body])){
        $search_cond[body] = $request[body] ;
    }
    if(!empty($request[search_word])){
        $search_cond[search_word] = $request[search_word] ;
    }
    if(!empty($request[category_code])){
        $search_cond[category_code] = $request[category_code] ;
    }
    if(!empty($request[req_page])){
        $search_cond[req_page] = (int)$request[req_page] * GLOBAL_PG_SPEC_UNIT ;
    }

    return $search_cond;
}

?>