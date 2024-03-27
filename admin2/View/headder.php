<div class="wrapper">

<!-- Preloader -->

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Liên hệ</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Brand Logo -->
<a href="#" class="brand-link">
    <span class="brand-text font-weight-light">Trang Admin</span>
    <?php
    // Check if user is logged in
    if (isset($_SESSION['user_admin'])) {
        // User is logged in, display navigation menu for logged-in users
        ?>
        <div class="admin-info">
            <p class="admin-welcome">Welcome, <?php echo $_SESSION['user_admin']; ?>!</p>
            <form id="logoutForm" action="index.php?action=login&act=logout" method="POST" style="display: inline;">
                <button type="submit" class="btn btn-link">Logout</button>
            </form>
        </div>
        <?php
    } else {
        // User is not logged in, redirect to login page
        header('Location: http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=login');
        exit();
    }
    ?>
</a>





<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<!-- Dashboard
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fas fa-tachometer-alt nav-icon"></i>
        <p>Dashboard</p>
    </a>
</li> -->
<!-- Bảng thông kê bán hàng -->
<li class="nav-item">
    <a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=thongke" class="nav-link">
        <i class="fa-solid fa-chart-line" style="color: #ffffff;"></i>
        <p class="text">Bảng thống kê bán hàng</p>
    </a>
</li>

<!-- Quản lý người dùng -->
<li class="nav-item">
    <a href="index.php?action=UserAdmin&act=listUser" class="nav-link">
        <i class="fas fa-users" style="color: #ffffff;"></i>
        <p class="text">Quản lý người dùng</p>
    </a>
</li>

<!-- Quản lý sản phẩm -->
<li class="nav-item">
    <a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product" class="nav-link">
        <i class="fa-solid fa-box-open" style="color: #ffffff;"></i>
        <p class="text">Kho thực phẩm</p>
    </a>
</li>
<li class="nav-item">
    <a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=listLoai" class="nav-link">
        <i class="fa-solid fa-box-open" style="color: #ffffff;"></i>
        <p class="text">Kho loại</p>
    </a>
</li>

<!-- Thêm sản phẩm -->
<li class="nav-item">
    <a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=add_Product" class="nav-link">
        <i class="fa-solid fa-plus" style="color: #ffffff;"></i>
        <p class="text">Thêm thực phẩm</p>
    </a>
</li>

<!-- Danh sách hóa đơn -->
<li class="nav-item">
    <a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=oder&act=listoder" class="nav-link">
        <i class="fa-solid fa-file-invoice" style="color: #ffffff;"></i>
        <p class="text">Danh sách hóa đơn</p>
    </a>
</li>

<?php

// Kiểm tra xem session đã được thiết lập và có giá trị là 1 không
if(isset($_SESSION['role_admin']) && $_SESSION['role_admin'] == 1) {
    // Nếu giá trị là 1, hiển thị danh sách nhân viên
    echo '<li class="nav-item">';
    echo '<a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=listAdmin" class="nav-link">';
    echo '<i class="fas fa-user" style="color: #ffffff;"></i>';
    echo '<p class="text">Danh sách nhân viên</p>';
    echo '</a>';
    echo '</li>';

}
 // Hiển thị tạo tài khoản cho nhân viên
 if(isset($_SESSION['role_admin']) && $_SESSION['role_admin'] == 1) {
    // Nếu giá trị là 1, hiển thị danh sách nhân viên
    echo '<li class="nav-item">';
    echo '<a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin" class="nav-link">';
    echo '<i class="fas fa-user-plus" style="color: #ffffff;"></i>';
    echo '<p class="text">Tạo tài khoản cho Nhân viên</p>';
    echo '</a>';
    echo '</li>';

}

// Kiểm tra xem session đã được thiết lập và có giá trị là 2 không
if(isset($_SESSION['role_admin']) && $_SESSION['role_admin'] == 2) {
    // Tạo kết nối và lấy dữ liệu thông báo
    $db = new UserAdmin();
    $id_admin = $_SESSION['id_admin'];
    $getThongBao = $db->NoiDungThongBao($id_admin);

    // Kiểm tra xem có dữ liệu hay không trước khi đếm
    if($getThongBao) {
        // Đếm số lượng thông báo
        $soLuongThongBao = $getThongBao->rowCount();

        // Hiển thị thông báo và số lượng thông báo
        echo '<li class="nav-item">';
        echo '<a href="http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=UserAdmin&act=ThongBaoCuaNhanVien" class="nav-link">';
        echo '<i class="fas fa-bell" style="color: #ffffff;"></i>';
        echo '<span class="badge badge-pill badge-danger">' . $soLuongThongBao . '</span>';
        echo '<p class="text">Thông Báo</p>';
        echo '</a>';
        echo '</li>';
    } else {
        // Hiển thị thông báo khi không có dữ liệu
        echo "Không có thông báo nào.";
    }
}

?>



</ul>
</nav>
<!-- /.sidebar-menu -->

</aside>
