<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thêm sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content ">
        <div class="container">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm sản phẩm mới</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="index.php?action=productAdmin&act=add_Product" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" name="name_product" value="" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Hình ảnh</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="code">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="code_product" name="code_product" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Đơn giá</label>
                                <input type="text" class="form-control" id="regular_price" name="regular_price" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Mô tả</label>
                                <input type="text" class="form-control" id="mota" name="mota" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Loại</label>
                                <input type="text" class="form-control" id="cate_id" name="cate_id" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">trạng thái</label>
                                <input type="text" class="form-control" id="trangthai" name="trangthai" value="" required>
                            </div>
                            <button type="submit" name="submitadd" class="btn btn-success mt-3">Lưu thay đổi</button>
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
