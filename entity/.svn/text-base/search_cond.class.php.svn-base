<?php
/**
 * 
 * 作成ルール
 * 	1.検索条件が増えた場合は、ここのEntityも追加する必要有。
 * 	2.del_flg は必ず1番前にすること	
 * 	3.各エンティティの名前は、DBのカラム名と一致する必要がある。
 *
 * @history ver 1.0 不明
 *          ver 2.0 real_date_from, to を追加
 */
class search_cond{

    private $entity = array();

    public function set_entity(array $request){

        $search_cond = array() ;
        if(!array_key_exists("del_flg", $request)){
            $search_cond['del_flg'] = 0 ;
        }else{
            $search_cond['del_flg'] = $request['del_flg'] ;
        }
        if(!empty($_flgrequest['id'])){
            $search_cond['id'] = $request['id'] ;
        }
        if(!empty($request['title'])){
            $search_cond['title'] = $request['title'] ;
        }
        if(!empty($request['input'])){
            $search_cond['input'] = $request['input'] ;
        }
        if(!empty($request['category'])){
            $search_cond['category'] = $request['category'] ;
        }
        if(!empty($request['memo'])){
            $search_cond['memo'] = $request['memo'] ;
        }
        if(!empty($request['search_word'])){
            $search_cond['search_word'] = $request['search_word'] ;
        }
        if(!empty($request['real_date'])){
            $search_cond['real_date'] = $request['real_date'] ;
        }
        if(!empty($request['update_date'])){
            $search_cond['update_date'] = $request['update_date'] ;
        }
        if(!empty($request['regist_date'])){
            $search_cond['regist_date'] = $request['regist_date'] ;
        }
        if(!empty($request['real_date_from'])){
            $search_cond['real_date_from'] = $request['real_date_from'] ;
        }
        if(!empty($request['real_date_to'])){
            $search_cond['real_date_to'] = $request['real_date_to'] ;
        }
        $this->entity = $search_cond;
    }

    public function is_request(){
        $ent = $this->get_entity();
        unset($ent["del_flg"]);
        return count($ent) > 0;
    }

    public function get_entity(){
        return $this->entity;
    }

    function __construct(array $request){
        $this->set_entity($request);
    }
}
?>
