<?php

/**
 *
 *
 */
class asset_spec_dao extends base_dao{

    private $table = 'ASSET_SPEC';
    const TABLE_NAME = 'ASSET_SPEC';

    private $fileds = array( 
                            'ASSET_SPEC_ID',
                            'TITLE',
                            'INPUT',
                            'OUTPUT',
                            'FREQUENCY',
                            'PURPOSE_NAME',
                            'MANAGE_NAME',
                            'MEMO',
                            'SEARCH_WORD',
                            'REAL_DATE',
                            'UPDATE_DATE',
                            'REGIST_DATE',
                            'DEL_FLG'
                            );


    /**
     * insert
     *
     */
    public function insert(array $asset_spec){

        $asset_spec['SEARCH_WORD'] = $this->make_search_word($asset_spec);
        $asset_spec['REGIST_DATE'] = $this->con->UserTimeStamp(time(), 'Y-m-d H:i:s');

        return $this->auto_execute($this->table, $asset_spec,'insert');
    }


    /**
     * レコードを取得する
     *
     * @param $asset_spec_id id
     * @return
     */
    public function get_spec($asset_spec_id){

        $asset_spec_id = (int)$asset_spec_id;

        $rs = $this->get("
            SELECT 
                    T1.ASSET_SPEC_ID,
                    T1.TITLE,
                    T1.INPUT,
                    T1.OUTPUT,
                    T1.FREQUENCY,
                    T1.PURPOSE_NAME,
                    T1.MANAGE_NAME,
                    T1.MEMO,
                    T1.REAL_DATE,
                    T1.UPDATE_DATE,
                    T1.REGIST_DATE
            FROM 
                ".asset_spec_dao::TABLE_NAME." AS T1
            WHERE 
                ASSET_SPEC_ID = ? 
            ", array($asset_spec_id));

        return $rs[0];
    }


    /**
     * レコードの一覧を取得する
     *
     * @param array $search_cond 検索条件
     */
    public function get_spec_list_week($search_cond){

        $sql = "
                SELECT 
                    *
                FROM
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = ?
                AND T1.REAL_DATE <= DATE_ADD(CURRENT_DATE, INTERVAL 7 DAY)    
                AND T1.REAL_DATE >= DATE_SUB(CURRENT_DATE, INTERVAL 7 DAY)    
                ";

        unset($search_cond[req_page]);
        
        $tmp_arr = $this->make_search_cond_where($sql, $search_cond);
        $sql = $tmp_arr['sql'];
        $search_cond = $tmp_arr['search_cond'];
        
        $sql .= "ORDER BY 
                    T1.REAL_DATE DESC, 
                    T1.UPDATE_DATE DESC
                " ;

        
        return $this->get($sql, $search_cond);
    }

    /**
     * レコードの一覧を取得する
     * 指定した数から10件返します。
     *
     * @param array $search_cond 検索条件
     */
    public function get_spec_list($search_cond){

        $sql = "
                SELECT 
                    T1.ASSET_SPEC_ID,
                    T1.TITLE,
                    T1.INPUT,
                    T1.OUTPUT,
                    T1.FREQUENCY,
                    T1.PURPOSE_NAME,
                    T1.MANAGE_NAME,
                    T1.MEMO,
                    T1.REAL_DATE,
                    T1.UPDATE_DATE,
                    T1.REGIST_DATE
                FROM 
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = ?
                ";
        
        $tmp_arr = $this->make_search_cond_where($sql, $search_cond);

        $sql = $tmp_arr['sql'];
        $search_cond = $tmp_arr['search_cond'];

        $sql .= "ORDER BY 
                    T1.REAL_DATE DESC, 
                    T1.UPDATE_DATE DESC
                 Limit ?, " . GLOBAL_PG_SPEC_UNIT ;

        return $this->get($sql, $search_cond);
    }


    /**
     * レコード一覧の件数を取得する
     *
     * @param array $search_cond 検索条件
     */
    public function get_spec_list_count($search_cond){

        $sql = "
                SELECT 
                    COUNT(*) AS RECORD_COUNT
                FROM 
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = ? ";
        
        unset($search_cond[req_page]);

        $tmp_arr = $this->make_search_cond_where($sql, $search_cond);
        $sql = $tmp_arr['sql'];
        $search_cond = $tmp_arr['search_cond'];

        return $this->get($sql, $search_cond);
    }


    /**
     * 更新します
     *
     *
     */
    public function update($asset_spec){

        $asset_spec['SEARCH_WORD'] = $this->make_search_word($asset_spec);
//        $asset_spec['REGIST_DATE'] = $this->con->UserTimeStamp(time(), 'Y-m-d H:i:s');

        $where = "ASSET_SPEC_ID = $asset_spec[asset_spec_id]";
    
        return $this->auto_execute($this->table, $asset_spec, 'UPDATE', $where);
    }


    /**
     * 検索語を作成して返します。
     *
     * @param array $asset_spec レコードテーブルのエンティティ
     */
    private function make_search_word(array $asset_spec){

        $SEARCH_WORD = "";

        foreach($asset_spec as $val ){
            $SEARCH_WORD .= $val;
        }

        return $SEARCH_WORD;
    }

    /**
     * 目的区分の一覧を取得する
     *
     * @param array $search_cond 検索条件
     */
    public function get_purpose_name_list(){

        $sql = "
                SELECT 
                    T1.PURPOSE_NAME
                FROM 
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = 0
                GROUP BY
                    T1.PURPOSE_NAME
                ";

        return $this->get($sql);
    }


    /**
     * 
     *
     */
    public function get_manage_name_list(){

        $sql = "
                SELECT 
                    T1.MANAGE_NAME
                FROM 
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = 0
                GROUP BY
                    T1.MANAGE_NAME
                ";

        return $this->get($sql);
    }


    public function get_frequency_list(){

        $sql = "
                SELECT 
                    T1.FREQUENCY
                FROM 
                    ".asset_spec_dao::TABLE_NAME." AS T1
                WHERE
                    T1.DEL_FLG = 0
                GROUP BY
                    T1.FREQUENCY
                ";

        return $this->get($sql);
    }



    /**
     * 検索条件から、SQL・検索条件を生成して返します。
     *
     * @param $sql 
     * @param $search_cond
     * @history ver 1.0 real_date_from, toを追加
     *
     */
    private function make_search_cond_where($sql, $search_cond){
    
        if( array_key_exists("search_word", $search_cond)){
            $search_cond[search_word] = '%'.$search_cond[search_word].'%';
            $sql .= " AND T1.SEARCH_WORD LIKE ? ";
        }

        if( array_key_exists("purpose_name", $search_cond)){
            $search_cond[purpose_name] = '%'.$search_cond[purpose_name];
            $sql .= " AND T1.PURPOSE_NAME LIKE ? ";
        }

        if( array_key_exists("manage_name", $search_cond)){
            $search_cond[manage_name] = '%'.$search_cond[manage_name];
            $sql .= " AND T1.MANAGE_NAME LIKE ? ";
        }

        if( array_key_exists("real_date_from", $search_cond)){
            $sql .= " AND T1.REAL_DATE >= ? ";
        }

        if( array_key_exists("real_date_to", $search_cond)){
            $sql .= " AND T1.REAL_DATE <= ? ";
        }

/*        if( !array_key_exists("req_page", $search_cond)){
            $search_cond[req_page] = 0 ;
        }
*/
        return array('sql'=>$sql, 'search_cond'=>$search_cond);
    
    }


    public function delete($asset_spec){
        return $this->auto_execute($this->table, $asset_spec,'update');
    }


}

?>