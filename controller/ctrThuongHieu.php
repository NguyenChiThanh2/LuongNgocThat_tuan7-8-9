<?php
    include_once('model/mThuongHieu.php');
    class CThuongHieu{
        public function getAllSP(){
            $p= new MThuongHieu();
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
    }

?>
