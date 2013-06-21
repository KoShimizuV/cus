<?php
include_once('./entity/link.class.php');
include_once('./entity/tag.class.php');
class qa{

    private $entity = array();

    public function get_entity(){
        return $this->entity;
    }

    public function set_entity(array $request){
        $qa = array() ;
        if( array_key_exists("id", $request)){ 
            $qa["id"] = $request["id"] ;
        }
        if( array_key_exists("title", $request)){ 
            $qa["title"] = $request["title"] ;
        }
        if( array_key_exists("qu", $request)){ 
            $qa["qu"] = $request["qu"] ;
        }
        if( array_key_exists("ans", $request)){ 
            $qa["ans"] = $request["ans"] ;
        }
        if( array_key_exists("correct_cnt", $request)){ 
            $qa["correct_cnt"] = $request["correct_cnt"] ;
        }
        if( array_key_exists("uncorrect_cnt", $request)){ 
            $qa["uncorrect_cnt"] = $request["uncorrect_cnt"] ;
        }
        if( array_key_exists("category", $request)){ 
            $qa["category"] = $request["category"] ;
        }
        if( array_key_exists("src", $request)){ 
            $qa["src"] = $request["src"] ;
        }
        if( array_key_exists("correct_rate", $request)){ 
            $qa["correct_rate"] = $request["correct_rate"] ;
        }
        if( array_key_exists("del_flg", $request)){ 
            $qa["del_flg"] = $request["del_flg"] ;
        }
        $links = link::create($request); 
        if (count($links) > 0){
            $qa["link_list"] = $links; 
        }
        $tag_list = tag::create($request);
        if (count($tag_list) > 0){
            $qa["tag_list"] = $tag_list; 
        }
        $this->entity = $qa;
    }

    function __construct(array $request){
        $this->set_entity($request);
    }
}
?>
