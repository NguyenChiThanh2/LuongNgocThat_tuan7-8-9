<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['product_id']) && isset($_POST['ten']) && isset($_POST['gia']) && isset($_POST['thuonghieu'])) {
        $product_id = $_POST['product_id'];
        $ten = $_POST['ten'];
        $gia = $_POST['gia'];
        $thuonghieu = $_POST['thuonghieu'];

        $conn = new mysqli('localhost', 'LNT', '123', 'wifashion');
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        $sql = "UPDATE sanpham SET ten=?, brand_id=?, price=? WHERE id_sp=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $ten, $thuonghieu, $gia, $product_id);

        if ($stmt->execute()) {
            if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['hinhanh']['tmp_name'];
                $fileName = $_FILES['hinhanh']['name'];
                $fileSize = $_FILES['hinhanh']['size'];
                $fileType = $_FILES['hinhanh']['type'];             
                $targetDir = "img/anhsp/";
                $targetFilePath = $targetDir . basename($fileName);

                if(move_uploaded_file($fileTmpPath, $targetFilePath)){
                    $updateImageQuery = "UPDATE sanpham SET image_url=? WHERE id_sp=?";
                    $stmt = $conn->prepare($updateImageQuery);
                    $stmt->bind_param("si", $fileName, $product_id);
                    if ($stmt->execute()) {
                        echo "Tệp hình ảnh đã được tải lên và cập nhật thành công.";
                    } else {
                        echo "Có lỗi khi cập nhật tên hình ảnh vào cơ sở dữ liệu.";
                    }
                } else {
                    echo "Lỗi khi tải lên tệp hình ảnh.";
                }
            } else {
                echo "Không có tệp hình ảnh được tải lên hoặc có lỗi xảy ra.";
            }
            echo "Sản phẩm đã được cập nhật thành công.";
        } else {
            echo "Lỗi khi cập nhật sản phẩm: " . $conn->error;
        }

        $conn->close();
    }  
}
?>
