<?php
    include_once('ketnoi.php');
    class MThuongHieu{
        public function selectAllSP(){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            if($con){
                $str = "select * from thuonghieu";
                $tblSP = $con->query($str);
                $p->dongKetNoi($con);
                return $tblSP;
            }else{
                return false; 
                //khong the ket noi den csdl
            }
            
        }
    }


?>