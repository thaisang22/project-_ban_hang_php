
<?php
include_once ('Model/page.php');
if (!isset ($_SESSION['user_admin'])) {
    echo "<script>";
    echo "alert('Cần đăng nhập để vào trang quản trị ');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=login';";
    echo "</script>";
    exit();
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách khách hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách tài khoản khách hàng</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th >
                                id_user
                            </th>
                            <th >
                                user Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th >
                                Full Name
                            </th>
                            <th>
                            Address
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getdataDanhsach = new UserAdmin();
                        // Kiểm tra xem có yêu cầu sắp xếp không
                        $rs= $getdataDanhsach->GetListTaiKhoan();

                        // Hiển thị sản phẩm
                        while ($set = $rs->fetch()):
                            ?>
                            <tr>
                                <td>
                                <?php echo $set['id_user']; ?>
                                </td>
                                <td>
                                <?php echo $set['username']; ?>
                                </td>

                                <td>
                                <?php echo $set['email_user']; ?>
                                </td>
                                <td>
                                <?php echo $set['fullname']; ?>
                                </td>
                                <td>
                                <?php echo $set['diachi']; ?>
                                </td>
                            </tr>
                            <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <div class="d-flex">

            </div>
        </div>
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>


