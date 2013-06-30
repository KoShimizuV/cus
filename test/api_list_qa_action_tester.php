<?php
require_once "./action/api/qa/list_qa_action.php";
class api_list_qa_action_tester extends PHPUnit_Framework_TestCase{
    var $action;
    var $url = "http://localhost/cus/index.php?c=api&p=qa&a=list_qa";

    public function setUp(){
        $_SERVER['HTTP_HOST'] = 'localhost';
        $this->action = new list_qa_action();
    }
     
    function test_execute_not_null(){
        $req = array();
        $ret = $this->action->execute($req);
        $this->assertTrue(!is_null($ret));
    } 

    function test_execute_key_list(){
        $req = array();
        $list = $this->action->execute($req);
        $this->assertTrue(1 <= count($list));
    } 

    // via http request
    function test_via_http(){
      $request = array('out_method' => 'json',);
      $options = array('http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($request),
            ));
      $contents = file_get_contents($this->url, false, stream_context_create($options));
      $list = json_decode($contents);
      $this->assertTrue(is_array($list));
    } 
}
