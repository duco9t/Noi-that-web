<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";    

$conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
// }

// Lấy thông tin đăng nhập từ biểu mẫu
$username = $_POST['username'];
$role = $_POST['role'];

// Kiểm tra thông tin đăng nhập trong cơ sở dữ liệu
$query = "SELECT * FROM users WHERE username='$username' AND role='$role'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Đăng nhập thành công, chuyển hướng đến trang admin
    header("Location: index.php");
} else {
    // Đăng nhập thất bại, thông báo lỗi hoặc chuyển hướng lại trang đăng nhập
    echo "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.";
}

$conn->close();
?>