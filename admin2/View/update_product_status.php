<?php
include_once('./Model/productAdmin.php');
// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['new_status'])) {
    // Lấy dữ liệu từ form
    $product_id = $_POST['product_id'];
    $new_status = $_POST['new_status'];

    // Log received data to console for debugging
    echo "<script>";
    echo "console.log('Received Product ID:', " . json_encode($product_id) . ");";
    echo "console.log('Received New Status:', " . json_encode($new_status) . ");";
    echo "</script>";

    $db = new hanghoa();
    // Gọi hàm để cập nhật trạng thái cho sản phẩm
    $result = $db->SetStatusForProduct($product_id, $new_status);

    // Kiểm tra kết quả của việc cập nhật trạng thái
    if ($result) {
        echo "Cập nhật trạng thái thành công!";
    } else {
        echo "Cập nhật trạng thái thất bại!";
    }
}
?>
