<?php
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once './View/dangky.php';
        break;
    case 'dangky_act':
        $userName = '';
        $email = '';
        $password = '';
        if (isset($_POST['submit'])) {
            $userName = $_POST['txtName'];
            $email = $_POST['txtEmail'];
            $password = $_POST['txtPass'];
            $fullname = $_POST['fullname']; // This should be $_POST['fullName']
            $diachi = $_POST['diachi'];
            $sodienthoai = $_POST['sodienthoai'];
            // You should add proper validation for user input before processing
            $saltF = "G4335#";
            $salfL = "F5567!";
            $passnew = md5($password . $saltF . $salfL);
            $user = new user();
            // Check if username or email already exists
            $existingUser = $user->checkUser($userName, $email);
            if ($existingUser) {               
                $errorMsg = "Tên đăng nhập hoặc email này đã được sử dụng!";
                include_once './View/dangky.php';
            } else {
                $result = $user->insertUser($userName, $email, $passnew,$fullname,$diachi,$sodienthoai);
                if ($result !== false) {
                    $registrationStatus = 'success'; // Registration success
                    echo '<script>alert("ĐÂNG KÍ THÀNH CÔNG");</script>';
                    include_once './View/home.php';
                    exit(); // Stop further execution to prevent accidental output
                } else {
                    $registrationStatus = 'failed'; // Registration failed
                    include_once './View/dangky.php';
                }
                
            }
        }
        break;
}
?>
