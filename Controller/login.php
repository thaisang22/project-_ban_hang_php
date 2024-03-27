<?php

$act = "login";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

$errorMsg = "";

switch ($act) {
    case 'login':
        include_once './View/loginUser.php';
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
            $user = new User();
            
            $existingUser = $user->checkLoginUser($userNameInput, $passInput);

            if ($existingUser) {
                $_SESSION['user'] = $existingUser['username'];
                $_SESSION['email_user'] = $existingUser['email_user'];
                $_SESSION['id_user'] = $existingUser['id_user'];
                $_SESSION['fullname'] = $existingUser['fullname'];
                $_SESSION['diachi'] = $existingUser['diachi'];
                $_SESSION['sodienthoai'] = $existingUser['sodienthoai'];
                // Ensure there is no output before the header() function
                include_once "Controller/accoutpage.php";
                header('Location: http://localhost:8080/PHP2/testteamplate/?login_success=true');
                exit(); // Make sure to exit after the header redirect
            } else {
                $errorMsg = "TÀI KHOẢN HOẶC MẬT KHẨU KHÔNG ĐÚNG";
                include_once './View/loginUser.php';
            }
        }
        break;

    case 'logout':
        session_start(); // Start the session if not already started
        session_unset();
        session_destroy();
        session_write_close(); // Write session data and close the session
        header('Location: http://localhost:8080/PHP2/testteamplate/'); // Redirect to home page after logout
        exit(); // Make sure to exit after the header redirect
        break;

    default:
        header('Location: http://localhost:8080/PHP2/testteamplate/');
}
?>