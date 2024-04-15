<?php
    include_once('model/mSanPham.php');
    class CSanPham{
        public function getAllSP(){
            $p= new MSanPham();
            $tblSP = $p->selectAllSP();
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows >0)
                    return $tblSP;
                else
                    return 0; //la 0 co dong du lieu
            }
        }

        public function getAllSPByComp($hangxe){
            $p= new MSanPham();
            $tblSP = $p->selectAllSPByComp($hangxe);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows >0)
                    return $tblSP;
                else
                    return 0; //la 0 co dong du lieu
            }
        }

        public function getAllSPByName($name){
            $p= new MSanPham();
            $tblSP = $p->selectAllSPByName($name);
            if(!$tblSP){
                return -1;
            }else{
                if($tblSP->num_rows >0)
                    return $tblSP;
                else
                    return 0; //la 0 co dong du lieu
            }
        }
    }

?>