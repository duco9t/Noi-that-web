
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping_online";

$conn = new mysqli($servername, $username, $password, $dbname);

$thu_muc = "../images/";

// Kiểm tra xem tệp hình ảnh đã được tải lên hay chưa
if (isset($_FILES["image"])) {
    $ten_file = $thu_muc . $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);
}
else{
    echo "up ảnh không thành công";
} // bị lôi up ảnh

if (isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock_quantity"])) {
    $product_name = $_POST["product_name"];
    $product_description = $_POST["description"];
    $product_image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
    $product_price = intval($_POST["price"]);
    $product_numberOfProducts = intval($_POST["stock_quantity"]);

    // Lưu ý sửa 'decription' thành 'description' trong truy vấn SQL
    $themsp_qr = "INSERT INTO products (product_name, description, image, price, stock_quantity) 
    VALUES ('$product_name', '$product_description', '$product_image', '$product_price', '$product_numberOfProducts')";

    if ($conn->query($themsp_qr)) {
        header("Location: ../ADMIN.php?pid=2");
    } else {
        // echo "<script>alert('Thêm không thành công, xin kiểm tra lại!'); history.back();</script>";
    echo "them không thành công ";
    
    }
}

$conn->close();
?>





<?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "shopping_online";

// $conn = new mysqli($servername, $username, $password, $dbname);

// $thu_muc = "../images/";
// $ten_file = $thu_muc . $_FILES["image"]["name"];

// if (isset($_FILES["image"])) {
//     move_uploaded_file($_FILES["image"]["tmp_name"], $ten_file);
// }

// if (isset($_POST["product_name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock_quantity"])) {
//     $product_name = $_POST["product_name"];
//     $product_description = $_POST["description"];
//     $product_image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
//     $product_price = intval($_POST["price"]);
//     $product_numberOfProducts = intval($_POST["stock_quantity"]);

//     // Lưu ý sửa 'decription' thành 'description' trong truy vấn SQL
//     $themsp_qr = "INSERT INTO products (product_name, description, image, price, stock_quantity) 
//     VALUES ('$product_name', '$product_description', '$product_image', '$product_price', '$product_numberOfProducts')";

//     if ($conn->query($themsp_qr)) {
//         header("Location: ../ADMIN.php?pid=2");
//     } else {
//         echo "<script>alert('Thêm không thành công, xin kiểm tra lại!'); history.back();</script>";
//     }
// }

// $conn->close();
?>
