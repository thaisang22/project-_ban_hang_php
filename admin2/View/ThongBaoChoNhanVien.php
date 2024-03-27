<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm tài khoản nhân viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông báo cho nhân viên</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                            if (isset($_GET['id_admin'])) {
                                $id_admin = $_GET['id_admin'];
                                $connection = new UserAdmin();
                                $admin = $connection->getUserAdminID($id_admin);
                                $nameAdmin = $admin['username'];
                            }
                            ?>
                    <div class="card-body">
                        <form action="index.php?action=UserAdmin&act=ThongBaoAction" method="post">
                            <div class="form-group">
                                <label for="username">Nhân viên thông báo</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $admin['username']; ?>" required>
                                <input type="text" class="form-control d-none" id="email" name="email" value="<?php echo $admin['email']; ?>" required>
                                <input type="text" class="form-control d-none" id="id_admin" name="id_admin" value="<?php echo $admin['id_admin']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Nội dung thông báo</label>
                                <input type="text" class="form-control" id="noidungthongbao" name="noidungthongbao" required>
                            </div>
                            <button type="submit" name="submitThongBaoNhanVien" class="btn btn-success mt-3">Thêm tài khoản</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
