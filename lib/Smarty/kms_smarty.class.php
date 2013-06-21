<?php

/**
 * @package Smarty
 * 
 */
class kms_smarty extends Smarty
{

    private $config_file_name = "page_info.conf";
    
    /**
     *
     *
     */
    public function kms_smarty()
    {
        $this->assign('SCRIPT_NAME', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : @$GLOBALS['HTTP_SERVER_VARS']['SCRIPT_NAME']);

        $this->template_dir = './view/';
        $this->compile_dir = './var/smarty/templates_c';
        $this->cache_dir = './var/smarty/cache';
        $this->config_dir = './var/smarty/configs';
        
        if( $_SERVER['HTTP_HOST'] == 'localhost'){
            $this->debugging = 'true';
        }
    }


    /**
     * 
     * 
     * @param string $tpl_name テンプレート名
     * @param array $elements
     */
    public function execute( $tpl_name, array $elements  = array()){

        foreach( $elements as $key => $val ){
            $this->assign( $key, $val );
        }

        $section_name = str_replace("/","_",$tpl_name);
        $section_name = str_replace(".tpl","",$section_name );
        
        $this->config_load($this->config_file_name,$section_name);
        $this->display($tpl_name);
        
        return true;
    }
}
?>
