<?php
require_once './dao/tag_dao.class.php';

class tag_dao_tester extends PHPUnit_Framework_TestCase{
    var $dao;
    public function setUp(){
        $_SERVER['HTTP_HOST'] = 'localhost';
        $this->dao = new tag_dao();
    }
       
    function test_get_tag_list(){
        $list = $this->dao->get_tag_list();
        $this->assertTrue(count($list) >= 1);
    } 
    
    function test_get_tag_by_qaid(){
        $list = $this->dao->get_tag_by_qaid(71);
        print_r($list);
    }
}
?>