<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Information</title>
    <link rel="stylesheet" href="./public/style/infor_oder.css">
</head>
<body>
    <div class="container">
        <h1>Thông tin thanh toán</h1>
        <?php

        // Check if the user is logged in
        if (!isset($_SESSION['id_user'])) {
            // Redirect the user to the login page
            header("Location: login.php"); // Assuming your login page is named "login.php"
            exit; // Stop further execution
        }

        // Include and instantiate the infor_oder class
        include 'infor_oder.php';
        $infor_oder = new infor_oder();

        // Get the user ID from the session
        $id_user = $_SESSION['id_user'];

        // Get order information for the given user ID
        $order_info = $infor_oder->getOrderInfoByUserId($id_user);

        // Check if orders were retrieved successfully
        if (empty($order_info)) {
            echo "<p>No orders found for this user.</p>";
        } else {
            // Display order information in a table
            echo "<table>";
            echo "<tr>
                    <th>Mã Hóa Đơn</th>
                    <th>Họ Và Tên</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Phương thức thanh toán</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                  </tr>";
            foreach ($order_info as $order) {
                echo "<tr>";
                echo "<td>" . $order['order_id'] . "</td>";
                echo "<td>" . $order['fullname'] . "</td>";
                echo "<td>" . $order['sdt'] . "</td>";
                echo "<td>" . $order['diachi'] . "</td>";
                echo "<td>";
                // Check payment method and display accordingly
                if ($order['payments_method_id'] == 1) {
                    echo "MOMO";
                } elseif ($order['payments_method_id'] == 2) {
                    echo "COD";
                } else {
                    // Handle other cases if needed
                    echo $order['payments_method_id']; // Display original value
                }
                echo "</td>";
                
                echo "<td>" . $order['name_product'] . "</td>";
                echo "<td>" . $order['tong_sanpham'] . "</td>";
                echo "<td>" . $order['tong_tien'] . "</td>";
                echo "<td>" . ($order['trangthai'] === null ? "Đang chờ xử lí" : ($order['trangthai'] == 1 ? "Đã chấp nhận đơn hàng" : "")) . "</td>";
                echo "<td>" . $order['purchase_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
