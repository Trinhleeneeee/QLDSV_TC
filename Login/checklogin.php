<?php
// Khai báo biến
$host = "localhost"; // Tên Host
$username = "root"; // Tên tài khoản gốc của MySQL
$password = ""; // Mật khẩu tài khoản gốc MySQL - thường mặc định là rống nếu dùng XAMPP
$db_name = "quanlisinhvien"; // Tên CSDL
$tbl_name = "user"; // Tên bảng cần truy vấn Table

// Kết nối đến server và lựa chọn cơ sợ dữ liệu
$conn = new mysqli($host, $username, $password, $db_name);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// username và password gởi đến từ form đăng nhập
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// Để bảo vệ khỏi MySQL injection
$myusername = $conn->real_escape_string($myusername);
$mypassword = $conn->real_escape_string($mypassword);

// Thực hiện truy vấn
$sql = "SELECT * FROM $tbl_name WHERE username = '$myusername' AND password = '$mypassword'";
$result = $conn->query($sql);

// Đếm số user tìm thấy từ database
if ($result) {
    $count = $result->num_rows;

    if ($count == 1) {
        // Đăng ký $myusername, $mypassword và chuyển xong file "login_success.php"
        session_start();
        $_SESSION['userid'] = $myusername;
        $_SESSION['level'] = $mypassword;

        header("Location: login_success.php");
        exit();
    } else {
        echo "Sai Username hoặc Password";
    }
} else {
    echo "Lỗi truy vấn: " . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
