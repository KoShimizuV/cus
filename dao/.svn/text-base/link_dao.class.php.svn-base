<?php
require_once('./dao/abstract_dao.class.php');
class link_dao extends abstract_dao{

    var $con;
    var $table = "cus_link";

    public function insert(array $link){
        if ($this->get_link($link)) {
            return true; 
        }
        return $this->auto_execute($this->table, $link,'insert');
    }

    /**
     * レコードを取得する
     *
     * @param $link_dao_id
     * @return
     */
    public function get_link($link){
        $rs = $this->get("SELECT t.id, t.link_id FROM cus_link as t WHERE id = ? and link_id = ?", array("id"=>$link["id"], "link_id"=>$link["link_id"]));
        return $rs[0];
    }

    /**
     * @param array $search_cond 検索条件
     */
    public function get_list($id){
        $sql = "SELECT t1.link_id as id FROM cus_link AS t1 where id = ?";
        return $this->get($sql, array("id"=>$id));
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
     * @param array $link_dao レコードテーブルのエンティティ
     */
    private function make_search_word(array $link_dao){
        $SEARCH_WORD = "";
        foreach($link_dao as $val ){
            $SEARCH_WORD .= $val;
        }
        return $SEARCH_WORD;
    }

    /**
     * 締切日の一覧を表示する
     * @param array $search_cond 検索条件
     */
    public function get_dead_line_list($search_cond = array()){
        $sql = "SELECT dead_line ,count(*) as cnt FROM cus_qa
				WHERE del_flg = 0 GROUP BY dead_line ORDER BY dead_line ";
        return $this->get($sql);
    }

    public function get_frequency_list(){
        $sql = "SELECT T1.FREQUENCY FROM ".link_dao_dao::TABLE_NAME." AS T1
                WHERE T1.DEL_FLG = 0 GROUP BY T1.FREQUENCY";
        return $this->get($sql);
    }

    public function delete($link_dao){
        return $this->auto_execute($this->table, $link_dao,'update');
    }

    public function __coustruct(){
      echo('construct');
    }

    public function get_category_list(){
        $sql = "SELECT qa.category FROM cus_qa AS qa WHERE qa.del_flg = 0 GROUP BY qa.category";
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
