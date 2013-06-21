<?php

include('./lib/adodb/adodb.inc.php');

class base_dao{

    var $con ;

    /**
     * コンストラクタ
     * DBに接続します。
     */
    public function __construct(){

        //つまり 'mysql' とか 'postgres' とか
        $this->con = ADONewConnection('mysql');

        $this->debug = false;

        if( $_SERVER['HTTP_HOST'] != 'localhost'){
            $this->con->Connect();
        }else{
            $this->con->Connect('localhost','root','root','nsd99M5a');
        }

    }


    /**
     * データを取得する為のSQLを発行する
     * （adodbのExcecuteをハックしている。）
     *
     * @param string $sql
     * @param array $where_value
     * @return array result_set クエリの結果データを保持した配列
     */
    public function get( $sql, $where_value = array() ){

        $where_value = $this->conv2db($where_value);
//        $where_value = array_change_key_case($where_value, CASE_LOWER);

        my_trigger_error($sql, E_USER_NOTICE);
        my_trigger_error($where_value, E_USER_NOTICE);

        $rs = $this->con->Execute( $sql, $where_value );

        if($rs){

            $record_list = $rs->getrows();
            $record_list = $this->conv2disp($record_list);

//            foreach($record_list as $key => $val){
//                $record_list[$key] =  array_change_key_case($val, CASE_LOWER);
//            }

            return $record_list;
        }else{
            my_trigger_error('Error has happned when execute following sql ', E_USER_WARNING);
            my_trigger_error($sql , E_USER_WARNING);
            my_trigger_error($where_value , E_USER_WARNING);
            return $rs ;
        }
    }


    /**
     * 戻り値を求めないSQLを発行する。
     * （adodbのExcecuteをハックしている。）
     *
     *  @param String $sql
     *  @param array $where_value
     */
    public function execute( $sql, array $where_value = array() ){

        $where_value = array_change_key_case($where_value, CASE_LOWER);

        my_trigger_error($sql, E_USER_NOTICE);
        my_trigger_error($where_value, E_USER_NOTICE);

        $rs = $this->con->Execute( $sql, $where_value );

        if($rs){
            return $rs;
        }else{
            print('failuer');
            return $rs ;
        }
    }

    /**
     * 1つのエンティティに対しての insert update を実行します。
     * （adodbのAutoExcecuteをハックしている。）
     *
     * @param string $table エンティティ（テーブル名）
     * @param array  $arrFields フィールド名
     * @param string $mode 実行SQLの種類 INSERT or UPDATE
     * @param string $where UPDATEの際の条件句。必要に応じてvalue値をescapeしてから引数として与えてください。
     */
    public function auto_execute( $table, array $arrFields, $mode, $where=false, $forceUpdate=true, $magicq=false ){

        my_trigger_error('--> start auto execute ', E_USER_NOTICE);

        $arrFields = $this->conv2db($arrFields);
        $arrFields = array_change_key_case($arrFields, CASE_UPPER);

        my_trigger_error('table is -- ', E_USER_NOTICE);
        my_trigger_error($table, E_USER_NOTICE);
        my_trigger_error('fields are -- ', E_USER_NOTICE);
        my_trigger_error($arrFields, E_USER_NOTICE);
        my_trigger_error('mode is -- ', E_USER_NOTICE);
        my_trigger_error($mode, E_USER_NOTICE);
        my_trigger_error('where is -- ', E_USER_NOTICE);
        my_trigger_error($where, E_USER_NOTICE);
        
        $rs = $this->con->AutoExecute($table, $arrFields, strtoupper($mode), $where, $forceUpdate, $magicq);
        
        if(!$rs){
            my_trigger_error('ERROR HAS HAPPEND WHEN FOLLONWING SQL', E_USER_NOTICE);
            my_trigger_error($mode, E_USER_NOTICE);
            my_trigger_error($table, E_USER_NOTICE);
            my_trigger_error($arrFields, E_USER_NOTICE);
            my_trigger_error($where, E_USER_NOTICE);
        }
        
        
        my_trigger_error('<-- end auto execute ', E_USER_NOTICE);

        return  $rs ;
    }


    /**
     *
     *
     */
    private function conv2db(array $values){

        foreach($values as $key => $val){
            if(is_string($val)){
                $values[$key] = $this->cnv2sql($val);
            }
        }
        return $values;
    }


    private function conv2disp(array $value_list){

        foreach($value_list as $values ){
            foreach( $values as $key => $val ){
                //                    $values[$key] = $htmlspecialchars_decode($val);
            }
        }
        return $value_list;
    }

    /**
     * データをSQL用に変換
     *
     */
    private function cnv2sql($string) {

        $string = str_replace('\\"','"',$string);

        return $string;
    }
}
?>