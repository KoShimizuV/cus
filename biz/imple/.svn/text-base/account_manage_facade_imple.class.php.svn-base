<?php

    require('./biz/account_manage_facade.interface.php');
    require('./dao/account_dao.class.php');
    
    /**
     *
     */
    class account_manage_facade_imple implements account_manage_facade{

        private $account_dao ;
        
        /**
         * ログイン処理を行います
         * 
         */
        public function login($login_id, $passwd){
            
            $res = $this->account_dao->get_account_info($login_id, $passwd);
            return $res;
        }

        public function __construct(){
            $this->account_dao = new account_dao() ;
        }
        
    }


?>