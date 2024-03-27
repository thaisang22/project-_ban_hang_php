
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
                    <h1>Danh sách hóa đơn </h1>
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
                <h3 class="card-title">Danh sách hóa đơn</h3>
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
                                id_checkout
                            </th>
                            <th >
                                Tên người dùng
                            </th>
                            <th>
                                Tổng sản phẩm đã đặt
                            </th>
                            <th >
                                Tổng tiền 
                            </th>
                            <th>
                              Ghi chú
                            </th>
                            <th>Ngày đặt</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getdataDanhsach = new oder();
                        // Kiểm tra xem có yêu cầu sắp xếp không
                        $rs= $getdataDanhsach->getOder();

                        // Hiển thị sản phẩm
                        while ($set = $rs->fetch()):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $set['id_checkout'] ?>
                                </td>
                                <td>
                                    <?php
                                    $user = new UserAdmin();
                                    $userId = $set['id_user']; // Lấy ID người dùng từ dữ liệu
                                    $username = $user->getUsernameById($userId); // Lấy tên người dùng bằng ID
                                    echo $username; // Hiển thị tên người dùng
                                    ?>
                                </td>

                                <td>
                                    <?php echo $set['total_product'] ?>
                                </td>
                                <td>
                                    <?php echo $set['tongthanhtien'] ?>
                                </td>
                                <td>
                                    <?php echo $set['ghichu'] ?>
                                </td>
            
                                <td><?php echo $set['ngay']; ?></td>
                                <td>
                                <td>
    <a href="index.php?action=oder&act=statusOrder&id_checkout=<?php echo $set['id_checkout']; ?>&status=<?php echo $set['trangthai'] == 1 ? 0 : 1; ?>"
        id="status_button_<?php echo $set['id_checkout']; ?>"
        class="status-toggle <?php echo $set['trangthai'] == 1 ? 'text-success' : 'text-danger'; ?>">
        <?php echo $set['trangthai'] == 1 ? 'Hoàn thành' : 'Chưa hoàn thành'; ?>
    </a>
</td>



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

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có muốn xóa sản phẩm này?")) {
            window.location.href = 'index.php?action=productAdmin&act=deleteProduct&id=' + id;
        }
    }
</script>
