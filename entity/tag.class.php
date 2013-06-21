<?php
class tag{    
    private $entity = array();

    public function get_entity(){
        return $this->entity;
    }

    public function set_entity(array $request){
        $tag = array() ;
        if( array_key_exists("id", $request)){ 
            $tag["id"] = $request["id"] ;
        }
        if( array_key_exists("tag_id", $request)){ 
            $tag["tag_id"] = $request["tag_id"] ;
        }
        $this->entity = $tag;
    }

    static function create(array $request){
        $list = array();
        foreach ($request as $key => $val) {
            if ($key == "tag_chkbox") {
                foreach($val as $v){
                    $tag = new tag(array("tag_id" => $v));  
                    $list[] = $tag->get_entity();  
                }
            } 
        }
        return $list; 
    }

    function __construct(array $request){
        $this->set_entity($request);
    }
}
?>
