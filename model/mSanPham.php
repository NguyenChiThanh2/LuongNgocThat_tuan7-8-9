<?php
    include_once('ketnoi.php');
    class MSanPham{
        public function selectAllSP(){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            if($con){
                $str = "select * from sanpham  ";
                $tblSP = $con->query($str);
                $p->dongKetNoi($con);
                return $tblSP;
            }else{
                return false; 
                //khong the ket noi den csdl
            }    
        }

        public function selectAllSPByComp($hangxe){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            if($con){
                $str = "select * from sanpham where brand_id = $hangxe";
                $tblSP = $con->query($str);
                $p->dongKetNoi($con);
                return $tblSP;
            }else{
                return false; 
                //khong the ket noi den csdl
            }
            
        }

        public function selectAllSPByName($name){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            if($con){
                $str = "select * from sanpham where ten like  N'%$name%'";
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