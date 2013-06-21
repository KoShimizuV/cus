<?php

/**
 *
 *
 */
class record_dao extends base_dao{

    private $table = 'knowledge_main_master';

    private $fileds = array( 'TITLE' , 'BODY', 'MAIN_REGIST_DATE', 'REFERENCE_1', 'REFERENCE_2', 'REFERENCE_3', 'REFERENCE_4', 'REFERENCE_5', 'SEARCH_WORD', 'PUBLIC_FLG', 'DEL_FLG', 'CATEGORY_CODE');


    /**
     * insert
     *
     */
    public function insert(array $kms_record){

        $kms_record['SEARCH_WORD'] = $this->make_search_word($kms_record);
        $kms_record['MAIN_REGIST_DATE'] = $this->con->UserTimeStamp(time(), 'Y-m-d H:i:s');

        return $this->auto_execute($this->table, $kms_record,'insert');
    }


    /**
     * レコードを取得する
     *
     * @param array $know_record レコードエンティティ
     * @return
     */
    public function get_record($know_record){

        $rs = $this->get("SELECT *
        FROM $this->table AS kmm
        INNER JOIN knowledge_category_master AS kcm
        ON kmm.CATEGORY_CODE = kcm.CATEGORY_CODE
        WHERE MAIN_ID = ? ", array($know_record[main_id]));

        return $rs[0];
    }

    /**
     * レコードの一覧を取得する
     * 指定した数から10件返します。
     *
     * @param array $search_cond 検索条件
     */
    public function get_record_list($search_cond){

        $sql = "SELECT *
                            FROM knowledge_main_master AS kmm
	                            INNER JOIN knowledge_category_master AS kcm
	                            	ON kmm.CATEGORY_CODE = kcm.CATEGORY_CODE 
	                            WHERE kmm.PUBLIC_FLG = ? AND kmm.DEL_FLG = ? ";
        
        if( array_key_exists("search_word", $search_cond)){
            $search_cond[search_word] = '%'.$search_cond[search_word].'%';
            $sql .= " AND kmm.SEARCH_WORD LIKE ? ";
        }

        if( array_key_exists("category_code", $search_cond)){
            $sql .= " AND kmm.CATEGORY_CODE = ? ";
        }

        if( !array_key_exists("req_page", $search_cond)){
            $search_cond[req_page] = 0 ;
        }
        
        $sql .= "ORDER BY kmm.MAIN_UPDATE_DATE DESC
                 Limit ?, 10 " ;
        
        return $this->get($sql, $search_cond);
    }


    /**
     * レコード一覧の件数を取得する
     *
     * @param array $search_cond 検索条件
     */
    public function get_record_list_count($search_cond){

        $sql = "SELECT COUNT(*) AS RECORD_COUNT
                            FROM knowledge_main_master AS kmm
                                INNER JOIN knowledge_category_master AS kcm
                                	ON kmm.CATEGORY_CODE = kcm.CATEGORY_CODE 
                                WHERE kmm.PUBLIC_FLG = ? AND kmm.DEL_FLG = ? ";
        
        if( array_key_exists("search_word", $search_cond)){
            $search_cond[search_word] = '%'.$search_cond[search_word].'%';
            $sql .= " AND kmm.SEARCH_WORD LIKE ? ";
        }

        if( array_key_exists("category_code", $search_cond)){
            $sql .= " AND kmm.CATEGORY_CODE = ? ";
        }

        unset($search_cond[req_page]);

        return $this->get($sql, $search_cond);
    }


    /**
     * 更新します
     *
     *
     */
    public function update($kms_record){

        $kms_record[search_word] = $this->make_search_word($kms_record);

        $where = "MAIN_ID = $kms_record[main_id]";

        return $this->auto_execute($this->table, $kms_record, 'UPDATE', $where);
    }


    /**
     * 検索語を作成して返します。
     *
     * @param array $ksm_record レコードテーブルのエンティティ
     */
    private function make_search_word(array $kms_record){

        $search_word = "";

        foreach($kms_record as $val ){
            $search_word .= $val;
        }

        return $search_word;
    }
}

?>