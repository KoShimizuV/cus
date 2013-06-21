<?php
require_once './entity/link.class.php';

class link_tester extends PHPUnit_Framework_TestCase{
    public function setUp(){
        $_SERVER['HTTP_HOST'] = 'localhost';
    }
       
    function test_link_list(){
        $request = array("link_18" => 18);
        $links = link::create($request);
        print_r($links);
    }  
}
?>