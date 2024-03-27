<?php
$act = "checkout";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
use PHPMailer\PHPMailer\PHPMailer;

// hàm momo
function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
}
switch ($act) {
    case 'checkout':
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!isset ($_SESSION['id_user'])) {
            // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
            header('Location: http://localhost:8080/PHP2/testteamplate/index.php?action=login');
            exit;
        }
        // Lấy id của người dùng từ session
        $id_user = $_SESSION['id_user'];
        // Kiểm tra nếu đã tồn tại mã hóa đơn trong session
        if (isset ($_SESSION['id_checkout'])) {
            // Nếu đã tồn tại, lấy mã hóa đơn từ session
            $id_checkout = $_SESSION['id_checkout'];
        } else {
            // Nếu chưa tồn tại, tạo một mã hóa đơn mới và lưu vào session
            $id_checkout = mt_rand(100000, 999999); // Số ngẫu nhiên gồm 6 chữ số
            $_SESSION['id_checkout'] = $id_checkout;
        }
        // Assuming you have an instance of the Cart class
        $cart = new Cart();
        // Lấy tổng số mục trong giỏ hàng
        $itemCount = $cart->countItems();
        include_once './View/checkout.php';
        break;
    case 'order':
        // Kiểm tra xem người dùng đã đăng nhập và có tồn tại mã hóa đơn trong session không
        if (isset ($_POST['order']) && isset ($_SESSION['id_user']) && isset ($_SESSION['id_checkout'])) {
            // Lấy thông tin từ form
            $cart = new Cart();
            // Lấy tổng số mục trong giỏ hàng
            $itemCount = $cart->countItems();
            $total_product = $cart->sub_total();
            // thông tin khách hàng oder
            $full_name = $_POST['checkout_fullname'];
            $phone = $_POST['checkout_phone'];
            $content = $_POST['checkout_ghichu'];
            $address = $_POST['checkout_diachi'];
            $payment_method = $_POST['payment_method_id'];
            // Lấy id_checkout từ session
            $id_checkout = $_SESSION['id_checkout'];
            // Lấy id_user từ session
            $id_user = $_SESSION['id_user'];
            // kiểm tra xem phương thức thanh toán 
            if ($payment_method == 2) {
                // Tạo một đối tượng CheckoutModel để thực hiện thêm dữ liệu vào CSDL
                $checkoutModel = new Checkout();
                // Thêm thông tin đơn hàng vào bảng 'ordertb'
                $insert_order = $checkoutModel->insertodertb($id_checkout, $id_user, $itemCount, $total_product, $content);
                // Thêm thông tin chi tiết đơn hàng vào bảng 'tbl_order'
                foreach ($_SESSION['cart'] as $key => $item) {
                    $insert_order_detail = $checkoutModel->inserttbl_oder($id_checkout, $full_name,$phone, $address, $payment_method, $item['id_product'], $item['name_product'], $item['soluong'], $item['total']);
                }
                // Gửi email xác nhận đơn hàng
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPDebug = 0; // Set debugging to 0 to disable detailed output
                $mail->Mailer = "smtp";
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                $mail->Username = "thodezaza111@gmail.com"; // Your Gmail username
                $mail->Password = "unfv prbe hhod aova"; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->From = 'thodezaza111@gmail.com';
                $mail->FromName = 'Nhà hàng phương name';
                $email = $_SESSION['email_user'];
                // Địa chỉ email của người nhận
                $mail->AddAddress($email, 'reciever_name');

                // Subject và nội dung email
                $mail->Subject = 'Xác nhận đơn hàng từ nhà hàng phương nam';
                $mail->IsHTML(true);
                $mail->Body = 'Cảm ơn bạn đã đặt hàng tại Nhà hàng phương nam. Dưới đây là thông tin chi tiết đơn hàng của bạn:<br><br>';
                $mail->Body .= '<strong>Họ và tên:</strong> ' . $full_name . '<br>';
                $mail->Body .= '<strong>Số điện thoại:</strong> ' . $phone . '<br>';
                $mail->Body .= '<strong>Địa chỉ:</strong> ' . $address . '<br>';
                $mail->Body .= '<strong>Phương thức thanh toán:</strong> ' . $payment_method . '<br>';
                $mail->Body .= '<strong>Sản phẩm:</strong><br>';

                // Thêm thông tin chi tiết sản phẩm vào nội dung email
                foreach ($_SESSION['cart'] as $key => $item) {
                    $mail->Body .= ' - ' . $item['name_product'] . ' (Số lượng: ' . $item['soluong'] . ', Giá: ' . $item['total'] . 'đ)<br>';
                }

                // Gửi email
                if ($mail->Send()) {
                    echo "<script>";
                    echo "alert('Đặt hàng thành công. Vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php';";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('Có lỗi xảy ra khi gửi email xác nhận đơn hàng. Vui lòng thử lại sau.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php';";
                    echo "</script>";
                }

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
                unset($_SESSION['id_checkout']);

                exit;
            } 
            else if ($payment_method == 1) {
                // Tạo một đối tượng CheckoutModel để thực hiện thêm dữ liệu vào CSDL
                $checkoutModel = new Checkout();
                // Thêm thông tin đơn hàng vào bảng 'ordertb'
                $insert_order = $checkoutModel->insertodertb($id_checkout, $id_user, $itemCount, $total_product, $content);

                // Thêm thông tin chi tiết đơn hàng vào bảng 'tbl_order'
                foreach ($_SESSION['cart'] as $key => $item) {
                    $insert_order_detail = $checkoutModel->inserttbl_oder($id_checkout, $full_name, $phone, $address, $payment_method, $item['id_product'], $item['name_product'], $item['soluong'], $item['total']);
                }

                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = "10000";
                $orderId = time() . "";
                $redirectUrl = "http://localhost:8080/PHP2/testteamplate/index.php?action=Thanks";
                // Khai báo URL và trích xuất dữ liệu từ URL
                $ipnUrl = "http://localhost:8080/PHP2/testteamplate/index.php?action=Thanks";

                $extraData = "";

                $tongtien = 10000;

                $partnerCode = $partnerCode;
                $accessKey = $accessKey;
                $serectkey = $secretKey;
                $orderId = $id_checkout; // Mã đơn hàng
                $orderInfo = 'Thanh toán đơn hàng: ' . $id_checkout . ' với tổng tiền là ' . $total_product . ' đồng.';
                // tiền thanh tiến
                $amount = $tongtien;
                $ipnUrl = $ipnUrl;
                $redirectUrl = $redirectUrl;
                $extraData = $extraData;
                $requestId = time() . "";
                $requestType = "payWithATM";
                $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
                //before sign HMAC SHA256 signature
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature
                );
                $result = execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);  // decode json

                //Just a example, please check more in there

                header('Location: ' . $jsonResult['payUrl']);

                // Gửi email xác nhận đơn hàng
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPDebug = 0; // Set debugging to 0 to disable detailed output
                $mail->Mailer = "smtp";

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // enable SMTP authentication
                $mail->SMTPAuth = true;
                $mail->Username = "thodezaza111@gmail.com"; // Your Gmail username
                $mail->Password = "unfv prbe hhod aova"; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->From = 'thodezaza111@gmail.com';
                $mail->FromName = 'Nhà hàng phương name';
                $email = $_SESSION['email_user'];
                // Địa chỉ email của người nhận
                $mail->AddAddress($email, 'reciever_name');

                // Subject và nội dung email
                $mail->Subject = 'Xác nhận đơn hàng từ nhà hàng phương nam';
                $mail->IsHTML(true);
                $mail->Body = 'Cảm ơn bạn đã đặt hàng tại Nhà hàng phương nam. Dưới đây là thông tin chi tiết đơn hàng của bạn:<br><br>';
                $mail->Body .= '<strong>Họ và tên:</strong> ' . $full_name . '<br>';
                $mail->Body .= '<strong>Số điện thoại:</strong> ' . $phone . '<br>';
                $mail->Body .= '<strong>Địa chỉ:</strong> ' . $address . '<br>';
                $mail->Body .= '<strong>Phương thức thanh toán:</strong> ' . $payment_method . '<br>';
                $mail->Body .= '<strong>Sản phẩm:</strong><br>';

                // Thêm thông tin chi tiết sản phẩm vào nội dung email
                foreach ($_SESSION['cart'] as $key => $item) {
                    $mail->Body .= ' - ' . $item['name_product'] . ' (Số lượng: ' . $item['soluong'] . ', Giá: ' . $item['total'] . 'đ)<br>';
                }

                // Gửi email
                if ($mail->Send()) {
                    echo "<script>";
                    echo "alert('Đặt hàng thành công. Vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php';";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('Có lỗi xảy ra khi gửi email xác nhận đơn hàng. Vui lòng thử lại sau.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php';";
                    echo "</script>";
                }

                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
                unset($_SESSION['id_checkout']);

                exit;
            }

        }
        break;

    default:
        // Default case
        break;
}
?>