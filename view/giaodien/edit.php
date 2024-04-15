<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:#D8BFD8;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color:#DA70D6;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        h2{
            text-align:center;
        }
    </style>
</head>
<body>
    <h2>Sửa sản phẩm</h2>
    <form action="xulysua.php" method="post" enctype="multipart/form-data">
        <?php
        $conn = new mysqli('localhost', 'LNT', '123', 'wifashion');
        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST['product_id'])){
                $product_id = $_POST['product_id'];
                $sql = "SELECT * FROM sanpham WHERE id_sp = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $product_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
        ?>
                        <input type="hidden" name="product_id" value="<?php echo $row['id_sp']; ?>">
                        <label for="ten">Tên Sản Phẩm:</label>
                        <input type="text" name="ten" value="<?php echo $row['ten']; ?>"><br>
                        <label for="gia">Giá Sản Phẩm:</label>
                        <input type="text" name="gia" value="<?php echo $row['price']; ?>"><br>
                        <label for="thuonghieu">Thương Hiệu:</label>
                        <select name="thuonghieu">
                            <?php
                            $sql_brand = "SELECT * FROM thuonghieu";
                            $result_brand = $conn->query($sql_brand);
                            if ($result_brand->num_rows > 0) {
                                while ($row_brand = $result_brand->fetch_assoc()) {
                                    $selected = ($row_brand['id'] == $row['brand_id']) ? "selected" : "";
                                    echo "<option value='" . $row_brand['id'] . "' $selected>" . $row_brand['name'] . "</option>";
                                }
                            }
                            ?>
                        </select><br>
                        <label for="hinhanh">Hình Ảnh Sản Phẩm:</label>
                        <input type="file" name="hinhanh"><br>
                        <button type="submit" name="submit">Lưu</button>
        <?php
                    }
                } else {
                    echo "Không tìm thấy sản phẩm.";
                }
            } else {
                echo "Không có ID sản phẩm được cung cấp.";
            }
        } else {
            echo "Yêu cầu không hợp lệ.";
        }
        $conn->close();
        ?>
    </form>
</body>
</html>
