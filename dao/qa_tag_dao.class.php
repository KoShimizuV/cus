<?php
require_once('./dao/abstract_dao.class.php');
class qa_tag_dao extends abstract_dao{

    var $con;
    var $table = "cus_qas_tags";

    public function insert(array $tag){
        if ($this->get_tag($tag)) {
            return true; 
        }
        return $this->auto_execute($this->table, $tag, 'insert');
    }

    public function get_tag($tag){
        $rs = $this->get("SELECT qa_id, tag_id FROM cus_qas_tags WHERE qa_id = ? and tag_id = ?"
                          , array("qa_id" => (int)$tag["qa_id"], "tag_id" => $tag["tag_id"])
                        );
        return count($rs) === 0 ? false : $rs[0];
    }
}
?>