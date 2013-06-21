<?php
require_once './entity/tag.class.php';

class tag_tester extends PHPUnit_Framework_TestCase{
    public function setUp(){
        $_SERVER['HTTP_HOST'] = 'localhost';
    }
       
    function test_get_tag_list(){
        $request = array("tag_chkbox" => array(1,2));
        $tags = tag::create($request);
        print_r($tags);
    }  
}
?>