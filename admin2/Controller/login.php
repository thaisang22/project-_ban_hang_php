<?php

$act = "login";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

$errorMsg = "";

switch ($act) {
    case 'login':
        include_once './View/login.php';
        break;

    case 'login_act':
        $userNameInput = isset($_POST['user']) ? $_POST['user'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        $saltF = "G4335#";
        $salfL = "F5567!";
        $passInput = md5($password . $saltF . $salfL);

        // KIEM TRA TON TAI
        if (!empty($userNameInput) && !empty($passInput)) {
            
            // You need to create an instance of the User class before using it
            // Assuming that you have a User class with a method checkLoginUser
            $user = new UserAdmin();
            
            $existingUser = $user->checkLoginAdmin($userNameInput, $passInput);

            if ($existingUser) {
                $_SESSION['user_admin'] = $existingUser['username'];
                $_SESSION['email_admin'] = $existingUser['email'];
                $_SESSION['id_admin'] = $existingUser['id_admin'];
                $_SESSION['role_admin'] = $existingUser['role'];
                header('Location: http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product');
                exit(); // Make sure to exit after the header redirect
            } else {
                $errorMsg = "TÀI KHOẢN HOẶC MẬT KHẨU KHÔNG ĐÚNG";
                include_once './View/login.php';
            }
        }
        break;
    case 'logout':
        session_start(); // Start the session if not already started
        session_unset();
        session_destroy();
        session_write_close(); // Write session data and close the session
        header('Location: http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=login'); // Redirect to home page after logout
        exit(); // Make sure to exit after the header redirect
        break;

    default:
        header('Location: http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=login');
}
?>