<?php
require('./biz/imple/qa_manage_facade_imple.class.php');
include_once('./entity/search_cond.class.php');

class list_qa_action{

  private $qa_manage_facade ;

  public function execute($request){
    
    $search_cond_obj = new search_cond($request);
    $search_cond = $search_cond_obj->get_entity();
    $rs = $this->qa_manage_facade->get_qa_list($search_cond);
    if(!$rs){
      return $rs;
    }
    $list = $rs["list"]; 

    if(array_key_exists("out_method", $request) && $request["out_method"] == "json"){
      echo json_encode($list);
    } else {
      return json_encode($list);
    }
  }

  public function __construct(){
    $this->qa_manage_facade = new qa_manage_facade_imple();
  }
}
