<?php
require_once './biz/imple/qa_manage_facade_imple.class.php';

class qa_manage_facade_tester extends PHPUnit_Framework_TestCase{
    var $manager;
    public function setUp(){
        $_SERVER['HTTP_HOST'] = 'localhost';
        $this->manager = new qa_manage_facade_imple();
    }
       
    function test_get_tag_list(){
        $list = $this->manager->get_tag_list();
        $this->assertTrue(count($list) >= 1);
    }
    
    function test_get_tag_list_as_id_val(){
        $list = $this->manager->get_tag_list_as_id_val();
        $this->assertTrue(count($list) >= 1);
    }
    
    
    
}
?>
