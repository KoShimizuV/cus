<?php

    function d($rs){
    
        print('<pre>');
        var_dump($rs);
        print('</pre>');
    
    }


    /**
     *
     *
     * http://d.hatena.ne.jp/msakamoto-sf/20071130/1196441306
     */
    function dlog( $mode = E_USER_NOTICE )
    {
        $args = func_get_args();
        $backtrace = debug_backtrace();
        $laststack = array_shift($backtrace);
        $file = $laststack['file'];
        $line = $laststack['line'];

        $_els = array();
        foreach ($args as $a) {
            if (is_scalar($a)) {
                $_els[] = (string)$a;
            } else {
                $_els[] = var_export($a, true);
            }
        }
        $log = "[[ " . implode("\r\n", $_els) . " ]]($file : $line)";

        trigger_error($log, $mode);
    }
    
    
    function my_trigger_error($log_msg, $mode = E_USER_NOTICE ){
        $log_msg_show = null;
        
        if ( is_array($log_msg) ) {
            foreach( $log_msg as $key => $val ){
                $log_msg_show = $log_msg . ' ' .$key . ':' . $val ;
            }
        }else{
            $log_msg_show = $log_msg;
        }
    
        trigger_error($log_msg_show, $mode);
    }


?>