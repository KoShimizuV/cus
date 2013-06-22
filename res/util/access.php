<?php
    /**
     * 携帯からの接続に関するクラスです。<br/>
     *  
     */
  class access{
  //----------------------------------------------------------------------------
  //  フィールド変数定義
  //----------------------------------------------------------------------------
  
  //----------------------------------------------------------------------------
  //  関数定義
  //----------------------------------------------------------------------------
    /**
     * 接続元からキャリアを判断します。
     * 
     * @param なし
     * @return $env 携帯キャリアの種類
     */
    public function detect_career(){
      if(strstr($_SERVER['HTTP_USER_AGENT'],"DoCoMo")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"Vodafone")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"SoftBank")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"MOT-")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"J-PHONE")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"KDDI")){
              $env = 'ez';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"UP.Browser")){
              $env = 'i';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"WILLCOM")){
              $env = 'ez';
            }elseif(strstr($_SERVER['HTTP_USER_AGENT'],"iPhone")){
              $env = 'iPhone';
            }else{
              $env = 'pc';
            }
            
            return $env;
    }
  }

?>