<?php
    include_once("controller/ctrThuongHieu.php");
    $p = new CThuongHieu();
    $tblSP = $p->getAllSP();
    if($tblSP == -1){
        echo 'error';
    }elseif(!$tblSP){
        echo '0 results';
    }else{
        // Lặp qua kết quả để lấy dữ liệu
        echo '<h2>Danh sách thương hiệu</h2>';
        echo '<table width="80%" align="center" style="text-align:center; margin-bottom:500px;">';
        echo '<tr>
                <td>ID</td>
                <td>Tên </td>
                <td>Ghi chú</td>
            </tr>';
        while($r = $tblSP->fetch_assoc()){    
            echo "<tr>";
            echo  "<td>".$r["id"]."</td>";
            echo  "<td>".$r["name"]."</td>";
            echo  "<td>".$r["GhiChu"]."</td>";
            echo "</tr>";    
        }
        echo "</table>";
    }
?>
