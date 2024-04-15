<?php
    class clsKetNoi{
        public function moKetNoi(){
            return mysqli_connect('localhost','LNT','123','wifashion');
        }

        public function dongKetNoi($con){
            $con->close();
        }

    }
        
?>