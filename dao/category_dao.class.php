<?php

/**
 *
 *
 */
class category_dao extends base_dao{

    /**
     * レコードの一覧を取得する
     * 指定した数から10件返します。
     *
     * @param array $know_record レコードエンティティ
     */
    public function get_list(){

        $rs = $this->get("SELECT * FROM knowledge_category_master
                            WHERE CATEGORY_DEL_FLG = 0
        					ORDER BY
        						CLASS_1 ASC 
        					    ,CLASS_2 ASC 
        						,CLASS_3 ASC 
								,CLASS_4 ASC 
								,CLASS_5 ASC 
        						");

        return $rs;
    }
    
    /**
     * @param 二次元配列
     */
    private function format_category_list4smarty_html(array $rs){
        
        foreach( $rs as $key => $val ){

            $category_list[$val[category_code]] = $val[class_1] ;

            if($val[class_2]){
                $category_list[$val[category_code]] .= '>'.$val[class_2];
            }
            if($val[class_3]){
                $category_list[$val[category_code]] .= '>'.$val[class_3];
            }
            if($val[class_4]){
                $category_list[$val[category_code]] .= '>'.$val[class_4];
            }
            if($val[class_5]){
                $category_list[$val[category_code]] .= '>'.$val[class_5];
            }
        }
        
        return $category_list;
    }
}
?>