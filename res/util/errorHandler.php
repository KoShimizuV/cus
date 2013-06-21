<?php
/*
require_once 'Log.php';

set_error_handler('errorHandler');

function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext)
{
    
    $level_names = array(
          E_ERROR           => 'E_ERROR'
        , E_WARNING         => 'E_WARNING'
        , E_PARSE           => 'E_PARSE'
        , E_NOTICE          => 'E_NOTICE'
        , E_CORE_ERROR      => 'E_CORE_ERROR'
        , E_CORE_WARNING    => 'E_CORE_WARNING'
        , E_COMPILE_ERROR   => 'E_COMPILE_ERROR'
        , E_COMPILE_WARNING => 'E_COMPILE_WARNIN'
        , E_USER_ERROR      => 'E_USER_ERROR'
        , E_USER_WARNING    => 'E_USER_WARNING'
        , E_USER_NOTICE     => 'E_USER_NOTICE'
        , E_STRICT          => 'E_STRICT'
    );
    
    
    if ( array_key_exists('errno', $level_names) ) {
        $error_name = $level_names[$errno];
    }
    
    // perl log make instance
    $fileName = date("Ymd");
    $file = &Log::factory('file', GLOBAL_LOG_DIR . $fileName.'.log'); 
    $script = basename($_SERVER['SCRIPT_NAME']);
    
    switch ($errno) {
    
        case E_ERROR:
            echo "<b>ERROR</b> :$script: $errstr<br />\n";
            $file->error("<ERROR> :$script: $errstr \n"); 
            break;
            
        case E_WARNING:
            echo "<b>WARNING</b> :$script: $errstr<br />\n";
            $file->warning("<WARNING> :$script: $errstr \n"); 
            break;
            
        case E_NOTICE:
//            echo "<b>NOTICE</b> :$script: $errstr<br />\n";
//            $file->notice("<NOTICE> :$script: $errstr \n"); 
            break;
        
        
        case E_USER_ERROR:
            echo "<b>My ERROR</b> [$error_name] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            $file->error("<My ERROR> :$script: $errstr \n"); 
            break;

        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$error_name] $errstr<br />\n";
            $file->warning("<My WARNING> :$script: $errstr \n"); 
            break;


        case E_USER_NOTICE:
//            echo "<b>My NOTICE</b> [$error_name] $errstr<br />\n";
            $file->notice("<My NOTICE> :$script: $errstr \n"); 
            break;

        default:
//            echo "Unknown error type: [$errno] $errstr<br />\n";
            $file->log("Unknown error type: [$errno] $errstr \n"); 
            break;
    }

    // Don't execute PHP internal error handler
    return true;

}
*/
?>