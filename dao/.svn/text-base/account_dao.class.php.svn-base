<?php

    require('./dao/abstract_dao.class.php');

	/**
     * 
     */
    class account_dao extends abstract_dao{

	/**
	* 
	*/
    public function get_account_info( $login_id, $passwd ){
        $rs = $this->get('SELECT login_id, name, passwd FROM tk_account WHERE login_id = ? and passwd = ? ', array($login_id, $passwd));
        return $rs;
    }
        
    public function __coustruct(){
      echo('construct');
    }
}


?>