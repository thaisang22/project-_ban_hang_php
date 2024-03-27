<?php
$act = "oder";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

use PHPMailer\PHPMailer\PHPMailer;
switch ($act) {
    case 'listoder':
        include_once './View/danhsachhoadon.php';
        echo ' sadasdas';
        break;
        case 'statusOrder':
            $id_checkout = isset($_GET['id_checkout']) ? intval($_GET['id_checkout']) : 0;
            $status = isset($_GET['status']) ? intval($_GET['status']) : 0;
            $db = new oder(); // Đảm bảo rằng class này là class chứa phương thức SetStatusForCheckout
            $result = $db->SetStatusForCheckout($id_checkout, $status);

            $email_user_data = $db->GetEmailUserFromIdCheckout($id_checkout);
            $email_user = $email_user_data['email_user'];
            $username = $email_user_data['username'];

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
            $email =  $email_user;
            // Địa chỉ email của người nhận
            $mail->AddAddress($email, 'reciever_name');

            // Subject và nội dung email
            $mail->Subject = 'Xác nhận đơn hàng từ nhà hàng phương nam';
            $mail->IsHTML(true);
            $mail->Body = 'ĐƠN HÀNG:'.$id_checkout.'của bạn đã được xác nhận từ phía nhà hàng';
            if ($status == 0) {
                $mail->Body = 'ĐƠN HÀNG: ' . $id_checkout . ' của bạn đã bị hủy.';
                $mail->Send(); // Send the cancellation email
            }
 // Gửi email
// Gửi email
if ($mail->Send()) {
    echo "<script>";
    echo "alert('Thay đổi trạng thái thành công. khách hàng đã nhận được email xác nhận.');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=oder&act=listoder';";
    echo "</script>";
} else {
    echo "<script>";
    echo "alert('Thay đổi trạng thái không thành công. khách hàng không nhận được email xác nhận.');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=oder&act=listoder';";
    echo "</script>";
}

            break;
        
}
?>
