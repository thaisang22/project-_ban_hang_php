<?php

use PHPMailer\PHPMailer\PHPMailer;

$act = "forget";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) { 
    case 'forget':
        include_once"./View/forgetpassword.php";
        break;

    case 'forget_action':
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email']; 
            $_SESSION['email'] = array();

            $kh = new user();

            $checkmail = $kh->checkEmail($email)->rowCount();
            if ($checkmail > 0) {
                // Tạo mã code mới 
                $code = random_int(10000, 100000);

                // Lưu mã code và email vào session
                $_SESSION['email'][] = array(
                    'id' => $code,
                    'email' => $email,
                );
               
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPDebug = 0; // Set debugging to 2 for detailed output
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
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "thodezaza111@gmail.com"; // Your Gmail username
                $mail->Password = "unfv prbe hhod aova"; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  

                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                echo (extension_loaded('openssl')?"SSL LOADED":"SSL NOT LOADED");
                $mail->From = 'thodezaza111@gmail.com';
                $mail->FromName = 'SHOPNEWSH';
             
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'reciever_name');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code . '';
               
                if ($mail->Send()) {
                    echo '<script> alert("Check Your Email and Click on the
                            link sent to your email");</script>';
                    include "./View/resetpw.php";
                } else {
                    echo "Mail Error - >" . $mail->ErrorInfo;
                    include "./View/forgetpassword.php";
                }
                // include "./View/resetpw.php";
            } else {
                echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                include "./View/forgetpassword.php";
            }

            }
            break; 
            case 'restorepassword':
                if(isset($_POST['submit_password'])) {
                    // Lấy giá trị từ các trường trong form
                    $code_from_user = $_POST['code'];
                    $new_password = $_POST['password'];
                    $confirm_password = $_POST['password_confirmation'];
            
                    $saltF = "G4335#";
                    $salfL = "F5567!";
                    $passInput = md5($new_password . $saltF . $salfL);
            
                    // Kiểm tra xem các trường đã được điền đầy đủ chưa
                    if (!empty($code_from_user) && !empty($new_password) && !empty($confirm_password)) {
                        // Kiểm tra xác nhận mật khẩu mới
                        if ($new_password == $confirm_password) {
                            // Mã code và mật khẩu mới đã được nhập, tiến hành xử lý
                            $code_saved = $_SESSION['email'][0]['id'];
                    
                            if ($code_from_user == $code_saved) {
                                // Mã code đúng, tiến hành đổi mật khẩu
                                $email = $_SESSION['email'][0]['email'];
                                $db = new user();
                                $resetPassword = $db->resetPassword($email, $passInput);
                                    echo "<script>";
                                    echo "alert('Thay đổi mật khẩu thành công ');";
                                    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php?action=login';";
                                    echo "</script>";
                                    exit;
                                
                            } 
                }
            }
                break;
            
            
        }
    }

?>