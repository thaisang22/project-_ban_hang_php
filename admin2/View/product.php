

<?php
include_once ('Model/page.php');
if (!isset ($_SESSION['user_admin'])) {
    echo "<script>";
    echo "alert('Cần đăng nhập để vào trang quản trị ');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=login';";
    echo "</script>";
    exit();
}

$product = new hanghoa();
$thucdonac = 1; // Default value for thucdonac
// Check if 'action' is 'product' in the URL
if (isset ($_GET['action']) && $_GET['action'] == 'productAdmin') {
    // Check if 'act' is set in the URL
    if (isset ($_GET['act'])) {
        // Switch based on the value of 'act'
        switch ($_GET['act']) {
            case 'thucdon1':
                $thucdonac = 2;
                $count = $product->getThucDonNhat()->rowCount();
                break;
            case 'thucdon2':
                $thucdonac = 3;
                $count = $product->getThucDonVN()->rowCount();
                break;
            case 'thucdon3':
                $thucdonac = 4;
                $count = $product->getThucDonHan()->rowCount();
                break;
            case 'thucdon4':
                $thucdonac = 5;
                $count = $product->getThucDonThai()->rowCount();
                break;
            case 'thucdon5':
                $thucdonac = 6;
                $count = $product->getThucDonDoUong()->rowCount();
                break;
            case 'product': // If 'act' is 'product', set default values
                $thucdonac = 1;
                $count = $product->getHangHoaALL()->rowCount();
                break;
        }
    }
}

$limit = 8;
$trang = new page();
$page = $trang->findPage($count, $limit);
$start = $trang->findStart($limit);
$current_page = isset ($_GET["page"]) ? $_GET["page"] : 1;

?>

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
                <form action="index.php?action=productAdmin&act=query" method="POST" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Search products...">
                        <div class="input-group-append">
                            <button type="submit" name="query" class="btn btn-primary">Search</button>
                        </div>
                    </div>
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
                <div class="grid__item large--two-thirds medium--one-whole small--one-whole">
                    <!--filter -->
                    <ul id="collection_menu_top" class="menu">
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=product"
                                data-category="product">Tất cả các món</a></li>
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon1"
                                data-category="thucdon1">Món Nhật</a></li>
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon2"
                                data-category="thucdon2">Món Việt Nam</a></li>
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon3"
                                data-category="thucdon3">Món Hàn</a></li>
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon4"
                                data-category="thucdon4">Món Thái Lan</a></li>
                        <li class="menu-item"><a href="index.php?action=productAdmin&act=thucdon5"
                                data-category="thucdon5">Đồ uống</a></li>
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
                            <th style="width: 30%">
                                hình ảnh
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
                        $getDataHangHoaAll = new hanghoa();
                        // Kiểm tra xem có yêu cầu sắp xếp không
                        if (isset ($_GET['sort'])) {
                            $sortOption = $_GET['sort'];
                            switch ($sortOption) {
                                case 'name_asc':
                                    $orderBy = 'name_product ASC';
                                    break;
                                case 'name_desc':
                                    $orderBy = 'name_product DESC';
                                    break;
                                case 'price_asc':
                                    $orderBy = 'regular_price ASC';
                                    break;
                                case 'price_desc':
                                    $orderBy = 'regular_price DESC';
                                    break;
                                default:
                                    $orderBy = 'id_product DESC'; // Sắp xếp mặc định
                                    break;
                            }
                        } else {
                            $orderBy = 'id_product DESC'; // Sắp xếp mặc định
                        }

                        // Lấy sản phẩm dựa trên thucdonac và phân trang
                        switch ($thucdonac) {
                            case 1:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonAllPageWithSort($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonAllPage($start, $limit);
                                }
                                break;
                            case 2:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonNhatSortedBy($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonNhatPage($start, $limit);
                                }
                                break;
                            case 3:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonVNSortedBy($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonVNPage($start, $limit);
                                }
                                break;
                            case 4:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonHanSortedBy($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonHanPage($start, $limit);
                                }
                                break;
                            case 5:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonThaiSortedBy($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonThaiPage($start, $limit);
                                }
                                break;
                            case 6:
                                if (isset ($_GET['sort'])) {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonDOUongSortedBy($start, $limit, $orderBy);
                                } else {
                                    $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonDOUongPage($start, $limit);
                                }
                                break;
                            default:
                                // Mặc định cho trường hợp không khớp với bất kỳ thực đơn nào khác
                                $resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonAllPage($start, $limit);
                                break;
                        }


                        // Hiển thị sản phẩm
                        while ($set = $resultgetDataHangHoaAll->fetch()):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $set['id_product'] ?>
                                </td>
                                <td>
                                    <?php echo $set['code_product'] ?>
                                </td>
                                <td>
                                    <?php echo $set['name_product'] ?>
                                </td>
                                <td class="image-container">
    <img style="width:60px" src="../public/img/<?php echo $set['thumbnail'] ?>" alt="">
</td>

                                <td>
                                    <?php echo $set['regular_price'] ?>
                                </td>
                                <td>
                                    <?php echo strlen($set['mota']) > 50 ? substr($set['mota'], 0, 50) . '...' : $set['mota']; ?>
                                </td>
                                <td>
                                    <?php echo $set['cate_id'] ?>
                                </td>
                                <td>
                                    <a href="index.php?action=productAdmin&act=statusProduct&id=<?php echo $set['id_product']; ?>&status=<?php echo $set['trangthai'] == 1 ? 0 : 1; ?>"
                                        id="status_button_<?php echo $set['id_product']; ?>"
                                        class="status-toggle <?php echo $set['trangthai'] == 1 ? 'text-success' : 'text-danger'; ?>">
                                        <?php echo $set['trangthai'] == 1 ? 'On' : 'Off'; ?>
                                    </a>
                                </td>










                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm"
                                        href="index.php?action=productAdmin&act=edit_Product&id_product=<?php echo $set['id_product'] ?>">
                                        <i class="fas fa-pencil-alt"></i>
                                        Sửa
                                    </a>

                                    <?php
// Check if user is logged in and has admin role
if(isset($_SESSION['role_admin']) && $_SESSION['role_admin'] == 1) {
    // Display delete button only for users with admin role
    echo '<a class="btn btn-danger btn-sm" href="#" onclick="confirmDelete('.$set['id_product'].')"><i class="fas fa-trash"></i> Xóa</a>';
}
?>
                                </td>
                            </tr>
                            <?php
                        endwhile;
                        ?>
                    </tbody>
                </table>
                <div class="pagination ">
    <div class="pagination-custom d-flex">
        <?php
        // Previous Page Button
        if ($current_page > 1) {
            echo '<a class="page-node" href="?action=productAdmin&act=' . $_GET['act'] . '&page=' . ($current_page - 1) . '" class="page-link">&lt;</a>';
        }
        // Page Links
        for ($i = 1; $i <= $page; $i++) {
            $activeClass = ($i == $current_page) ? 'active' : '';
            echo '<a class="page-node page-link ' . $activeClass . '" href="?action=productAdmin&act=' . $_GET['act'] . '&page=' . $i . '">' . $i . '</a>';
        }
        // Next Page Button
        if ($current_page < $page) {
            echo '<a class="page-node" href="?action=productAdmin&act=' . $_GET['act'] . '&page=' . ($current_page + 1) . '" class="page-link">&gt;</a>';
        }
        ?>
    </div>
</div>

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


