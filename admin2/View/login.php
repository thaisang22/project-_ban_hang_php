<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .login-box {
            margin-top: 100px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .login-box .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 5px 5px 0 0;
            padding: 15px;
            text-align: center;
        }
        .login-box .card-body {
            padding: 30px;
        }
        .login-box .form-control {
            border-radius: 3px;
        }
        .login-box .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 3px;
            padding: 10px;
            width: 100%;
        }
        .login-box .btn-primary:hover {
            background-color: #0056b3;
        }
        .main-header{
            display: none;
        }
        .main-footer{
            display: none;
        }
        .main-sidebar{
            display: none;
        }
    </style>
</head>

<body>
    <?php
if (isset($_SESSION['user_admin'])) {
    echo "<script>";
    echo "alert('Bạn đang đăng nhập  ');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
    echo "</script>";
    exit();
} 
?>
    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <h3><b>Admin</b> PAGE</h3>
            </div>
            <div class="card-body">
                <p class="text-center">Vui lòng đăng nhập để vào trang quản trị viên</p>
                <form action="index.php?action=login&act=login_act" method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="user" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="note form-error" id="loginErrorMessage" style=" text-align: center; ;display:<?php echo !empty($errorMsg) ? 'block' : 'none'; ?>;">
        <?php echo $errorMsg; ?>
    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                </form>
                <div class="text-center">
                </div>
                <p class="mt-3 mb-1 text-center">
                    <a href="#">Quên mật khẩu</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
