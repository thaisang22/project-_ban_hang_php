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
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách loại sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Danh sách loại</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="index.php?action=productAdmin&act=loai_action" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="file">Import danh sách từ file Excel:</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Import</button>
                </form>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getdataDanhsach = new hanghoa();
                        $rs = $getdataDanhsach->getListLoai();
                        while ($set = $rs->fetch()):
                            ?>
                            <tr>
                                <td><?php echo $set['cate_id'] ?></td>
                                <td><?php echo $set['cate_name'] ?></td>
                            </tr>
                            <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
