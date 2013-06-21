<?php
require_once('./dao/abstract_dao.class.php');
class tag_dao extends abstract_dao{

    var $con;
    var $table = "cus_tags";

    public function insert(array $tag){
        if ($this->get_tag($tag)) {
            return true; 
        }
        return $this->auto_execute($this->table, $tag,'insert');
    }

    /**
     * レコードを取得する
     *
     * @param $tag_dao_id
     * @return
     */
    public function get_tag($tag){
        $rs = $this->get("SELECT id, title FROM cus_tags as t WHERE id = ? and tag_id = ?", array("id"=>$tag["id"], "tag_id"=>$tag["tag_id"]));
        return $rs[0];
    }
    
    public function get_tag_by_qaid($qaid){
        $rs = $this->get("SELECT qt.qa_id,  t.id, t.title FROM cus_tags t, cus_qas_tags qt 
                          WHERE t.id = qt.tag_id AND qt.qa_id = ?"
                         , array("qa_id" => $qaid) );
        return $rs;
    }

    /**
     * @param array $search_cond 検索条件
     */
    public function get_list($id){
        $sql = "SELECT t1.tag_id as id FROM cus_tags AS t1 where id = ?";
        return $this->get($sql, array("id"=>$id));
    }

    /**
     * @param array $search_cond 検索条件
     */
    public function get_list_all(){
        $sql = "SELECT tag_id as id FROM cus_tags";
        return $this->get($sql);
    }

    /**
     * @param $qa 
     */
    public function update($qa){
        $where = "id = $qa[id]";
        return $this->auto_execute($this->table, $qa, 'UPDATE', $where);
    }

    /**
     * 検索語を作成して返します。
     * @param array $tag_dao レコードテーブルのエンティティ
     */
    private function make_search_word(array $tag_dao){
        $SEARCH_WORD = "";
        foreach($tag_dao as $val ){
            $SEARCH_WORD .= $val;
        }
        return $SEARCH_WORD;
    }

    public function delete($tag_dao){
        return $this->auto_execute($this->table, $tag_dao,'update');
    }

    public function __coustruct(){
      echo('construct');
    }
    public function get_tag_list(){
        $sql = "SELECT id, title FROM cus_tags ";
        return $this->get($sql);
    }
    public function get_rates_by_category(){
            return $this->get("select category, avg(correct_cnt / (correct_cnt + uncorrect_cnt)) * 100 as rate, count(*) as count from cus_qa where del_flg = 0 group by category order by rate"); 
    }
    public function get_noans_by_category(){
            return $this->get("select category, count(*) as count from cus_qa where del_flg = 0 and (correct_cnt + uncorrect_cnt) = 0 group by category"); 
    }
/*    public function get_rates_by_category(){
            return $this->get("select a.category as category, a.rate as rate, a.count as count, b.count as count_no_ans
                               from (select category, avg(correct_cnt / (correct_cnt + uncorrect_cnt)) * 100 as rate, count(*) as count from cus_qa where del_flg = 0 group by category) as a,
                                    (select category, count(*) as count from cus_qa where del_flg = 0 and (correct_cnt + uncorrect_cnt) = 0 group by category) as b
                               where a.category = b.category order by a.rate"); 
    }
*/
}
?>
