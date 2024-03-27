<?php 
use PHPMailer\PHPMailer\PHPMailer;
$act = "UserAdmin";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

$errorMsg = "";

switch ($act) {
    case 'UserAdmin':
        include_once './View/addtaikhoannhanvien.php';
        break;
    case 'CreateUserAdmin':
            if (isset($_POST['submitAddNhanvien'])) {
                $db = new Connect();
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $role = $_POST['role'];
                $saltF = "G4335#";
                $salfL = "F5567!";
                $passInput = md5($password . $saltF . $salfL);

                $insert_query = "INSERT INTO `tbl_admin`(`username`, `password`, `email`, `role`) VALUES ('$username','$passInput','$email','$role')";
                $rs = $db->exec($insert_query);
                
                if ($rs) {
                    echo "<script>";
                    echo "alert('Thêm nhân viên thành công.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=listAdmin';";
                    echo "</script>";
                } else {
                    echo "<script>";
                    echo "alert('Đã xảy lỗi trong quá trình thêm nhân viên.');";
                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=listAdmin';";
                    echo "</script>";
                }
            }
        break;
    case 'listAdmin':
        include_once './View/danhsachnhanvien.php';
        break;
    case 'ThongBaoChoNhanVien':
        include_once './View/ThongbaoChoNhanVien.php';
        break;
   // Xử lý logic khi nhận dữ liệu từ form thông báo cho nhân viên
case 'ThongBaoAction':
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if (isset($_POST["submitThongBaoNhanVien"])) {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $email_admin = $_POST['email'];
            $id_admin = $_POST['id_admin'];
            $noidungthongbao = $_POST['noidungthongbao'];
            $db = new UserAdmin();
            // Gọi hàm để lưu thông báo vào cơ sở dữ liệu
            $result = $db->saveThongBaoNhanVien($id_admin,$username, $email, $noidungthongbao);
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
                        $email =  $email_admin;
                        // Địa chỉ email của người nhận
                        $mail->AddAddress($email, 'reciever_name');
            
                    
    // Subject và nội dung email
    $mail->Subject = 'Thông báo từ Quản lí nhà hàng';
    $mail->IsHTML(true);
    $mail->Body = $noidungthongbao;

    // Gửi email
    if ($mail->Send()) {
        echo "<script>";
        echo "alert('Thông báo đã được gửi thành công.');";
        echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=listAdmin';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Không thể gửi thông báo. Vui lòng thử lại sau.');";
        echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=listAdmin';";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "alert('Lỗi khi lưu thông báo vào cơ sở dữ liệu. Vui lòng thử lại sau.');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin';";
    echo "</script>";
}
break;  

    case 'ThongBaoCuaNhanVien':
        include_once './View/ThongBaoCuaNhanVien.php';
        break;
        case 'listUser':
            include_once './View/danhsachtaikhoankhach.php';
            break;
    }
   

    

?>