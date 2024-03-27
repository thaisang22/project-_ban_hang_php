<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa sản phẩm</h1>
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

    <?php
                            if (isset($_GET['id_product'])) {
                                $id_product = $_GET['id_product'];
                                $connection = new hanghoa();
                                $product = $connection->getMonAnId($id_product);
                                $nameFood = $product['name_product'];
                                $mota = $product['mota'];
                                $trangthai= $product['trangthai'];
                                $priceFood = $product['regular_price'];
                                $imgFood = $product['thumbnail'];
                                $cate_id = $product['cate_id'];
                                $status = $product['trangthai'];
                            }
                            ?>
    <!-- Main content -->
    <section class="content ">
        <div class="container">
            <div class="">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa thông tin cho mã sản phẩm:<?php echo $product['code_product']; ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="index.php?action=productAdmin&act=update_Product" method="post" enctype="multipart/form-data">
                                <input type="text" class="form-control d-none" id="" name="id_product" value="<?php echo $product['id_product']; ?>" required>
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="" name="name_product" value="<?php echo $product['name_product']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Hình ảnh</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="code">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="code_product" name="code_product" value="<?php echo $product['code_product']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Đơn giá</label>
                                <input type="text" class="form-control" id="regular_price" name="regular_price" value="<?php echo $product['regular_price']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Mô tả</label>
                                <input type="text" class="form-control" id="mota" name="mota" value="<?php echo $product['mota']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">Loại</label>
                                <input type="text" class="form-control" id="cate_id" name="cate_id" value="<?php echo $product['cate_id']; ?>" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="price">trạng thái</label>
                                <input type="text" class="form-control" id="trangthai" name="trangthai" value="<?php echo $product['trangthai']; ?>" required>
                            </div>
              
                            <button type="submit" name="submitedit" class="btn btn-success mt-3">Lưu thay đổi</button>
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
