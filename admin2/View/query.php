<style>
 .btn-toggle {
    position: relative;
    width: 50px; /* Điều chỉnh độ rộng của nút toggle */
    height: 25px; /* Điều chỉnh độ cao của nút toggle */
    padding: 0;
    overflow: hidden;
    border-radius: 25px; /* Đảm bảo góc cong để tạo hình dáng nút tròn */
    cursor: pointer;
    outline: none;
    background-color: #ccc; /* Màu nền của nút toggle */
}

.handle {
    position: absolute;
    top: 0;
    left: 0;
    width: 25px; /* Điều chỉnh độ rộng của thanh nút toggle */
    height: 25px; /* Điều chỉnh độ cao của thanh nút toggle */
    background-color: #fff; /* Màu của thanh nút toggle */
    border-radius: 50%; /* Đảm bảo thanh nút toggle có hình dáng tròn */
    transition: transform 0.3s ease, background-color 0.3s ease; /* Thêm transition cho background-color */
}

.btn-toggle[aria-pressed="true"] .handle {
    background-color:  black; /* Màu của thanh nút toggle khi nút được bật */
    transform: translateX(25px); /* Di chuyển thanh nút toggle khi nút được bật */
}

.btn-toggle:focus .handle {
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.5); /* Hiển thị viền khi nút được focus */
}
    .menu {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.menu-item {
    display: inline-block;
    margin-right: 15px; /* Adjust spacing between menu items */
}

.menu-item a {
    text-decoration: none;
    color: #333; /* Link color */
    padding: 8px 15px; /* Padding around menu items */
    border-radius: 5px;
    background-color: #f0f0f0; /* Background color of menu items */
    transition: background-color 0.3s ease;
}

.menu-item a:hover {
    background-color: #ddd; /* Background color on hover */
    color: #555; /* Text color on hover */
}

</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý sản phẩm </h1>
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
                <h3 class="card-title">KHO SẢN PHẨM</h3>
                <form action="index.php?action=productAdmin&act=query" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="query" class="form-control" placeholder="Search products...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

                <form action="index.php?action=productAdmin&act=exportdata" method="POST" role="form">
        <button type="submit" name="btnExport" class="btn btn-primary">Export</button>
    </form>
                <label for="sort">Sắp xếp:</label>
<select id="sort" name="sort">
    <option value="name_asc">Tên (A-Z)</option>
    <option value="name_desc">Tên (Z-A)</option>
    <option value="price_asc">Giá (tăng dần)</option>
    <option value="price_desc">Giá (giảm dần)</option>
</select>
<button onclick="sortProducts()">Sắp xếp</button>
<script>
    function sortProducts() {
    var sortOption = document.getElementById("sort").value;
    window.location.href = "index.php?action=productAdmin&act=<?php echo $_GET['act']; ?>&sort=" + sortOption;
}

</script>
<div
                                                class="grid__item large--two-thirds medium--one-whole small--one-whole">
                                                <!--filter -->
                                                <ul id="collection_menu_top" class="menu">
    <li class="menu-item"><a href="index.php?action=productAdmin&act=product" data-category="product">Tất cả các món</a></li>
    <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon1" data-category="thucdon1">Món Nhật</a></li>
    <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon2" data-category="thucdon2">Món Việt Nam</a></li>
    <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon3" data-category="thucdon3">Món Hàn</a></li>
    <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon4" data-category="thucdon4">Món Thái Lan</a></li>
    <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon5" data-category="thucdon5">Đồ uống</a></li>
</ul>

                                            </div>
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
                            <th style="width: 1%">
                                id
                            </th>
                            <th style="width: 10%">
                                code
                            </th>
                            <th style="width: 30%">
                                Tên sản phẩm
                            </th>
                            <th style="width: 10%">
                                Giá
                            </th>
                            <th>
                                Mô tả
                            </th>
                            <th>
                                code_category
                            </th>
                            <th>
                                Trạng thái
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $db = new hanghoa();
                        $result = $db->searchProduct($searchKeyword);
                        // Hiển thị sản phẩm
                        while ($set = $result->fetch()) :
                        ?>
                            <tr>
                            <td> <?php echo $set['id_product'] ?></td>
<td> <?php echo $set['code_product'] ?></td>
<td> <?php echo $set['name_product'] ?></td>
<td> <?php echo $set['regular_price'] ?></td>
<td> <?php echo strlen($set['mota']) > 50 ? substr($set['mota'], 0, 50) . '...' : $set['mota']; ?></td>
<td> <?php echo $set['cate_id'] ?></td>
<td>
                                    <a href="index.php?action=productAdmin&act=statusProduct&id=<?php echo $set['id_product']; ?>&status=<?php echo $set['trangthai'] == 1 ? 0 : 1; ?>"
                                        id="status_button_<?php echo $set['id_product']; ?>"
                                        class="status-toggle <?php echo $set['trangthai'] == 1 ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $set['trangthai'] == 1 ? 'On' : 'Off'; ?>
                                    </a>
                                </td>








                                <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="index.php?action=productAdmin&act=edit_Product&id_product=<?php echo $set['id_product'] ?>">
    <i class="fas fa-pencil-alt"></i>
    Sửa
</a>

                                    <a class="btn btn-danger btn-sm" href="">
                                        <i class="fas fa-trash"></i> Xóa
                                    </a>

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
function toggleStatus(productId) {
    var button = document.getElementById('status_button_' + productId);
    var statusText = document.getElementById('status_text_' + productId);

    // Toggle the button class
    button.classList.toggle('btn-success');
    button.classList.toggle('btn-danger');

    // Toggle aria-pressed attribute
    var ariaPressed = button.getAttribute('aria-pressed') === 'true' ? 'false' : 'true';
    button.setAttribute('aria-pressed', ariaPressed);

    // Update status text
    var newText = ariaPressed === 'true' ? 'On' : 'Off';
    statusText.textContent = newText;

    // Send AJAX request to update status in backend
    fetch('View/update_product_status.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'product_id=' + productId + '&new_status=' + (ariaPressed === 'true' ? 1 : 0)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(data => {
        // Handle success
        console.log('Status updated successfully:', data);
    })
    .catch(error => {
        // Handle error
        console.error('There was a problem with the fetch operation:', error);
    });
}



</script>