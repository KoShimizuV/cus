<?php
    
    class paging{
    
        private $loop_unit = GLOBAL_PG_SPEC_UNIT;
    
        public function execute($record_count, $req_page){

            // ページング情報 生成
            $max_page = floor($record_count/$this->loop_unit) + 1;
            
            if($req_page == null){ 
                $req_page = 1 ;
            }
            
            if( $req_page == 1 ){

                $pre_flg = 0;
                
                if($max_page == 1){
                    $next_flg = 0;
                }else{
                    $next_flg = 1;
                }

                $start_page = 1;

                if( $max_page > $this->loop_unit ){
                    $end_page = $this->loop_unit;
                }else{
                    $end_page = $max_page;
                    $loop_num = $max_page;
                }
            }elseif(  $req_page == $max_page ){
                $pre_flg = 1;
                $next_flg = 0;
                
                if( $max_page > $this->loop_unit ){
                    $start_page = $max_page - $this->loop_unit ;
                    $loop_num = $this->loop_unit;
                }else{
                    $start_page = 1;
                    $loop_num = $max_page;
                }
                
                $end_page = $max_page;
            }else{
                $pre_flg = 1;
                $next_flg = 1;
                
                if( $req_page > $this->loop_unit ){
                    $start_page = $req_page - $this->loop_unit;

                    if($max_page-$req_page > $this->loop_unit){
                        $end_page = $req_page + $this->loop_unit;
                        $loop_num = 20;
                    }else{
                        $end_page = $max_page;
                        $loop_num = $this->loop_unit + $max_page-$req_page;
                    }

                }else{
                    $start_page = 1;
                    
                    if( $max_page > $this->loop_unit ){
                        $loop_num = $this->loop_unit;
                        $end_page = $req_page + $this->loop_unit;
                    }else{
                        $loop_num = $max_page;
                        $end_page = $max_page;
                    }
                }
            }
            
            // ページング情報 設定
            return array( 'pre_flg' => $pre_flg, 'next_flg' => $next_flg, 'req_page' => $req_page, 'start_page' => $start_page, 'end_page' => $end_page, 'loop_num' => $loop_num );
        }
    }
?>