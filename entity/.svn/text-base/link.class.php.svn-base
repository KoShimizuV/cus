<?php
class link{
    private $entity = array();

    public function get_entity(){
        return $this->entity;
    }

    public function set_entity(array $request){
        $link = array() ;
        if( array_key_exists("id", $request)){ 
            $link["id"] = $request["id"] ;
        }
        if( array_key_exists("link_id", $request)){ 
            $link["link_id"] = $request["link_id"] ;
        }
        $this->entity = $link;
    }

    static function create(array $request){
        $list = array();
        foreach ($request as $key => $val) {
            if (strpos($key,"link") === 0) {
              $link = new link(array("link_id" => $val));  
              $list[] = $link->get_entity();  
            } 
        }
        return $list; 
    }

    function __construct(array $request){
        $this->set_entity($request);
    }
}
?>
