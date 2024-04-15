<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm mới</title>
    <style>
        .form-container {
    width: 70%;
    margin: 0 auto;
    background-color: #FFFACD;
    padding: 20px;
    border-radius: 5px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="text"],
select,
input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #0000CD;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
}

input[type="submit"]:hover {
    background-color: red;
}

    
    </style>
</head>
<body>

    <h2>Thêm sản phẩm  mà bạn muốn</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="form-container">
    <div class="form-group">
        <label for="tenao">Tên Sản Phẩm</label>
        <input type="text" id="tenao" name="tenao" required>
    </div>
    <div class="form-group">
        <label for="gia">Gía Sản Phẩm</label>
        <input type="text" id="gia" name="gia" required placeholder="Giá không được âm">
    </div>
    <div class="form-group">
        <label for="thuonghieu" class="custom-select">Thương Hiệu Sản Phẩm</label>
        <select name="thuonghieu" id="thuonghieu">
        <option value="" disabled selected hidden>Hãy chọn thương hiệu</option>
            <?php
            include_once("controller/ctrThuongHieu.php");
            $p = new CThuongHieu();
            $tblSP = $p->getAllSP();
            if ($tblSP == -1) {
                echo 'error';
            } elseif (!$tblSP) {
                echo '0 results';
            } else {
                while ($r = $tblSP->fetch_assoc()) {
                    echo '<option value="' . $r['id'] . '">' . $r['name'] . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình Ảnh Sản Phẩm</label>
        <input type="file" id="hinhanh" name="hinhanh" accept="image/*" required>
    </div>
    <div class="form-group">
        <input type="submit" value="Lưu Sản Phẩm" name="submit">
    </div>
</form>

    
</body>
</html>

<?php
    // Kết nối đến cơ sở dữ liệu
    $conn = mysqli_connect('localhost', 'LNT', '123', 'wifashion');
    
    // Kiểm tra xem có dữ liệu được gửi đi từ form không
    if (isset($_POST['submit'])) {
        
        // Lấy dữ liệu từ form
        $tenao = mysqli_real_escape_string($conn, $_POST['tenao']);
        $gia = mysqli_real_escape_string($conn, $_POST['gia']);
        $thuonghieu = mysqli_real_escape_string($conn, $_POST['thuonghieu']);

        // Xử lý tệp hình ảnh
        $file = $_FILES['hinhanh'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        
        // Kiểm tra phần mở rộng của tệp hình ảnh
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');

        if ($conn && $tenao && $gia && $file && $thuonghieu) {
            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if (is_numeric($gia) && $gia > 0) {
                        // Đường dẫn lưu trữ hình ảnh
                        $fileDestination = 'img/anhsp/' . $fileName;
                        
                        // Di chuyển tệp hình ảnh đến thư mục đích
                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            // Sử dụng prepared statements để tránh SQL Injection
                            $query = "INSERT INTO sanpham(ten, brand_id, price, image_url) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("ssds", $tenao, $thuonghieu, $gia, $fileName);
                            if ($stmt->execute()) {
                                echo "<script>alert('Bạn đã thêm thành công');</script>";
                            } else {
                                echo "<script>alert('Thêm không thành công');</script>";
                            }
                            $stmt->close();
                        } else {
                            echo "<script>alert('Có lỗi khi tải lên hình ảnh');</script>";
                        }
                        $conn->close();
                    } else {
                        echo "<p style='color: red; font-size: 30px; text-align: center;'>Giá Tiền Bạn Nhập Không Đúng</p>";
                    }
                } else {
                    echo "<script>alert('Có lỗi khi bạn tải file');</script>";
                }
            } else {
                echo "<script>alert('File này không phải là  hình ảnh');</script>";
            }
        } 
    }
?>
