<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1,h2,h3{
            text-align: center;
        }

        a{
            text-decoration: none;
        }

        h4 a{         
            text-decoration: none;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        h4 a:hover{
            color: red;
            padding: 25px;
        
        }
        .menu{
            display:contents;
            float: top;
            text-align: center;
            
        }
        input[type="search"], input[type="submit"] {
             height:40px;
            border-radius: 4px;
            border: 1px solid #ccc;
            /* margin-right: 10px; */
        }
        input[type="submit"] {
            background-color: blue;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* body{
            background-image: linear-gradient(#40E0D0,#40E0D0);
        } */
        table{
            background:#AFEEEE;
            
        }
        button[type="submit"] {
        background-color: #e02b5b; /* Màu hồng */
        color: white;
        border: none;
        border-radius: 20px; /* Bo tròn viền nút */
        padding: 10px 30px; /* Kích thước nút */
        font-size: 16px;
        cursor: pointer;
    }
    a.custom-link:hover {
    color:#228B22; /* Màu của liên kết khi di chuột vào */
    box-shadow: 1px 2px 5px #800000; /* Hiển thị màu xung quanh liên kết khi di chuột vào */

}
a.custom-link {
    display: inline-block; /* Đảm bảo liên kết được xử lý như một khối hộp */
    padding: 2px 5px; /* Tạo khoảng cách xung quanh liên kết */
    border-radius: 5px; /* Bo tròn góc của liên kết */
    transition: all 0.3s ease; /* Hiệu ứng chuyển đổi mượt mà */
}

   </style>
</head>
<body>
    <table border="1" width="90%" align="center">
        <tr>
            <td colspan="2" class="banner">
                <img src="img/banner/back1.png" alt="" width="100%" height="400px">
            </td>
        </tr>
        <tr>
           <td style="padding:20px;">
                <a href="index.php" style="color:#DC143C;font-size: 19px;"><strong>Trang chủ</strong></a>
                <a href="quanly.php" style="margin-left:20px;color:#008000;font-size: 19px;"><strong>Quản lý</strong></a>
                
           </td> 
           
           <td>
                <h1 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 1); color:#de21d4;">WI FASHION</h1>
                <form action="#" method="post">
    <input type="search" name="search" id="search" placeholder="Tìm kiếm theo tên, giá hoặc thương hiệu" style="display: flex; float: right; margin-right: 20px;">
    <button type="submit" name="submit" style="display: flex; float: right; margin-right: 10px;">Search</button>
</form>


                
           </td>
        </tr>
        <tr>
            <td width="25%" class='menu'>
            <?php
                include_once("controller/ctrThuongHieu.php");
                $p = new CThuongHieu();
                $tblSP = $p->getAllSP();
                if ($tblSP == -1) {
                    echo "error";
                } elseif (!$tblSP) {
                    echo "0 result";
                } else {
                    $dem = 0;
                    while ($r = $tblSP->fetch_assoc()) {
                        echo "<h4><a style='text-align:center;margin-left:10px;' href='index.php?Comp=".$r["id"]."' class='custom-link'>".$r["name"]."</a></h4><br>";
                    }
                    echo "<h4><a style='text-align:center;color:#FFA500; margin-left:10px;' href='index.php' class='custom-link'>Tất cả sản phẩm</a></h4><br>";

                }
            ?>
            
            </td>
            <td width="75%">
