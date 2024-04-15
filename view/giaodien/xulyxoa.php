<?php
// Kiểm tra xem có yêu cầu POST gửi đến không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có trường product_id được gửi đi không
    if(isset($_POST['product_id'])){
        // Lấy ID sản phẩm cần xóa từ trường ẩn product_id
        $product_id = $_POST['product_id'];
        
        // Thực hiện kết nối đến cơ sở dữ liệu (đảm bảo thay thế các thông số kết nối phù hợp với cấu hình của bạn)
        $conn = new mysqli("localhost", "LNT", "123", "wifashion");

        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        // Xây dựng truy vấn SQL để xóa sản phẩm từ cơ sở dữ liệu
        $sql = "DELETE FROM sanpham WHERE id_sp = ?";
        
        // Chuẩn bị truy vấn sử dụng prepared statement để tránh lỗ hổng SQL injection
        $stmt = $conn->prepare($sql);
        
        // Liên kết tham số với giá trị
        $stmt->bind_param("i", $product_id);
        
        // Thực thi truy vấn
        if ($stmt->execute()) {
            echo "Sản phẩm đã được xóa thành công.";
        } else {
            echo "Lỗi khi xóa sản phẩm: " . $conn->error;
        }
        
        // Đóng kết nối
        $conn->close();
    } else {
        echo "Không có ID sản phẩm được cung cấp.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
