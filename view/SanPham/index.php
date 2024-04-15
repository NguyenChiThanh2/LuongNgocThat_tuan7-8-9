<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .anhSP img {
            transition: transform 0.3s ease;
        }

        .anhSP img:hover {
            transform: scale(1.1); 
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        .anhSP img {
            transition: transform 0.3s ease;
        }

        .anhSP img:hover {
            transform: scale(1.1); 
        }
    </style>
</head>
<body>
<?php
include_once("controller/ctrSanPham.php");
$p = new CSanPham();

if(isset($_REQUEST["Comp"])){
    $tblSP = $p->getAllSPByComp($_REQUEST["Comp"]);
} elseif(isset($_POST["submit"])) {
    $tblSP = $p->getAllSPByName($_POST["search"]);
} else {
    $tblSP = $p->getAllSP();
}

if($tblSP == -1){
    echo 'error';
} elseif(!$tblSP){
    echo 'Sản phẩm không tồn tại !';
} else {
    echo "<table width='100%' align='center' style='text-align:center'>";
    echo "<tr>";
    $dem = 0;
    while($r = $tblSP->fetch_assoc()){
        echo "<td style='border: 1px solid black;padding: 10px;' class='anhSP'>";
        echo "<img src ='img/anhsp/".$r["image_url"]."' width ='190px' style='padding: 10px'" . "<br>";
        echo $r["ten"]."<br>";
        echo $r["price"]."$</td>";
        $dem++;
        if($dem%4==0){
            echo "</tr><tr>";
        }
    }
    echo "</tr>";
    echo "</table>";
}
?>

</body>
</html>


</body>
</html>