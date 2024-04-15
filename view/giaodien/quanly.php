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
            height:30px;
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
        table, th, td{
            border:1px solid black;
        }
        table{
            border-collapse:collapse;
            background:  #43d3e0;
        }

        /* body{
            background-image: linear-gradient(#f0bfb4, #f0bfb4);
        } */
        button[type="submit"] {
        background-color: #e02b5b; /* Màu hồng */
        color: white;
        border: none;
        border-radius: 20px; /* Bo tròn viền nút */
        padding: 10px 30px; /* Kích thước nút */
        font-size: 16px;
        cursor: pointer;
    }
    .bang1{
        width: 50%;
            margin: auto;
            border-collapse: collapse;
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
            <td colspan="2">
                <img src="img/banner/back1.png" alt="" width="100%" height="400px">
            </td>
        </tr>
        <tr>
           <td style="padding:10px;">
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
                <h4><a href="quanly.php?page=quanlythuonghieu"class='custom-link'>Quản lý thương hiệu</a></h4>
                <h4><a href="quanly.php?page=quanlyao"class='custom-link'>Quản lý Thời Trang</a></h4>
            </td>
            <td width="75%">
            <?php
          
            
session_start(); 
if($_GET["page"]=='addsp'){
    
    include_once('view/themSanPham/index.php');
} else {
    
}
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true){
    echo "<p>Đã đăng nhập thành công!</p>";
    echo "<p>Xin chào, " . $_SESSION['email'] . "!</p>";
    echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
    echo "<input type='submit' name='logout' value='Đăng xuất'>";
    echo "</form>";
    include_once("controller/ctrSanPham.php");
    $p = new CSanPham();
    if(isset($_REQUEST["submit"])){
        $tblSP = $p->getAllSPByName($_REQUEST["search"]);
    }else{
        $tblSP = $p->getAllSP();
    }
    if($tblSP == -1){
        echo 'error';
    }elseif(!$tblSP){
        echo 'Sản phẩm không tồn tại !';
    }else{
        echo '<a  href="quanly.php?page=addsp" style="margin-left:30px; color:red;">Thêm sản phẩm mà bạn muốn!</a>';
        echo '<h2>Danh sách thời trang</h2>';
        echo '<table width="80%" align="center" style="text-align:center; margin-bottom:20px;">
        <tr>
            <td>ID</td>
            <td>Tên Sản Phẩm </td>
            <td>Thương Hiệu</td>
            <td>Gía Sản Phẩm</td>
            <td>Hình ảnh</td>
            <td>Ghi Chú</td>
        </tr>';
        $dem = 0;
        while($r = $tblSP -> fetch_assoc()){    
            echo "<tr>";
            echo  "<td>".$r["id_sp"]."</td>";
            echo  "<td>".$r["ten"]."</td>";
            echo  "<td>".$r["brand_id"] ." </td>";
            echo "<td>" . $r["price"] . " $" . "</td>";
            echo "<td> <img  src ='img/anhsp/".$r["image_url"]."' width ='150px' style='padding: 10px'>";
            echo "<td align='center'>
            <form action='view/giaodien/xulyxoa.php' method='post' onsubmit=\"return confirm('Bạn chắc muốn xóa sản phẩm này không?')\" style='margin-bottom: 10px;'>
                <input type='hidden' name='product_id' value='" . $r['id_sp'] . "'>
                <button type='submit' name='delete'>Xóa</button>
            </form>
            <form action='view/giaodien/edit.php' method='post' onsubmit=\"return confirm('Bạn chắc muốn sửa sản phẩm này không?')\" style='display: inline;'>
                <input type='hidden' name='product_id' value='".$r["id_sp"]."'>
                <button type='submit' name='edit'>Sửa</button>
            </form>
          </td>";
    

            $dem++;     
            echo "</tr>";   
        }
        echo "</table>";
    }
}
else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đăng nhập</title>
    </head>
    <body>
        <h2>Đăng nhập</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Mật khẩu:</label><br>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Đăng nhập">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new mysqli("localhost", "LNT", "123", "wifashion");

            if ($conn->connect_error) {
                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
            }
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql_check_login = "SELECT * FROM taikhoan WHERE email = '$email' AND matkhau = '$password'";
            $result_check_login = $conn->query($sql_check_login);
            if ($result_check_login->num_rows > 0) {
                $_SESSION['email'] = $email;
                $_SESSION['logged_in'] = true;
                echo "Đăng nhập thành công!";
                header("Location: index.php");
            } else {
                echo "Email hoặc mật khẩu không đúng. Vui lòng thử lại.";
            }

            $conn->close();
        }
        ?>
         <h2>Đăng ký</h2>
    <?php
    session_start();
    $conn = new mysqli("localhost", "LNT", "123", "wifashion");
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $username = $_POST['reg_username'];
        $email = $_POST['reg_email'];
        $password = $_POST['reg_password'];

        $sql_check_email = "SELECT * FROM taikhoan WHERE email = '$email'";
        $result_check_email = $conn->query($sql_check_email);
        if ($result_check_email->num_rows > 0) {
            echo "Email đã tồn tại trong hệ thống. Vui lòng chọn email khác.";
        } else {
            $sql_insert_user = "INSERT INTO taikhoan (ten, email, matkhau) VALUES ('$username', '$email', '$password')";
            if ($conn->query($sql_insert_user) === TRUE) {
                echo "Đăng ký thành công!";
            } else {
                echo "Đã xảy ra lỗi: " . $conn->error;
            }
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="reg_username">Tên người dùng:</label><br>
        <input type="text" id="reg_username" name="reg_username" required><br>
        <label for="reg_email">Email:</label><br>
        <input type="email" id="reg_email" name="reg_email" required><br>
        <label for="reg_password">Mật khẩu:</label><br>
        <input type="password" id="reg_password" name="reg_password" required><br><br>
        <input type="submit" value="Đăng ký">
    </form>

    <?php
    $conn->close();
    ?>
        
    </body>
    </html>
    <?php
}
if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
    exit;
}
?>
            </td>
        </tr>
     

        


<!-- </table>
</body> -->

