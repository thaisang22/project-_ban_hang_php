<style>
    .pagination-custom .page-link.current-page {
        background-color: #00470f;
        /* Replace with your desired background color */
        color: #fff;
        /* Replace with your desired text color */
    }
</style>

<?php
$product = new hanghoa();
$thucdonac = 1; // Default value for thucdonac
// Check if 'action' is 'product' in the URL
if (isset ($_GET['action']) && $_GET['action'] == 'product') {
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
<div id="PageContainer" class="">
    <main class="main-content" role="main">
        <section id="collection-wrapper">
            <div class="wrapper">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--one-whole medium--one-whole small--one-whole float-right">
                            <div class="collection-content-wrapper">
                                <div class="collection-head">
                                    <div class="grid">
                                        <div
                                            class="grid__item large--one-whole medium--one-whole small--one-whole text-center">
                                            <div class="collection-title">
                                                <?php
                                                $menuTitles = [
                                                    1 => 'Tất cả các món của nhà hàng',
                                                    2 => 'Món Nhật của nhà hàng',
                                                    3 => 'Món Việt Nam của nhà hàng',
                                                    4 => 'Món Hàn của nhà hàng',
                                                    5 => 'Món Thái Lan của nhà hàng',
                                                    6 => 'Đồ Uống',
                                                ];
                                                echo '<h1 class="mbr-section-title pb-3 mbr-exbold mbr-fonts-style display-2" >' . $menuTitles[$thucdonac] . '</h1>';
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="collection_breadcrumb">
                                                <div class="grid">
                                            <div
                                                        class="grid__item large--one-whole medium--one-whole small--one-whole">
                                                        <div class="breadcrumb-content">
                                                            <div class="inner text-left">
                                                                <div class="breadcrumb-small">
                                                                    <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                                                                    <span aria-hidden="true">/</span>
                                                                    <span>Tất cả sản phẩm</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                    <div class="collection_menu_sort">
                                        <div class="grid">
                                            <div class="grid__item large--two-thirds medium--one-whole small--one-whole"
                                                style="margin-top: 10px;">
                                                <!--filter -->
                                                <ul id="collection_menu_top" class="menu">
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=product"
                                                            data-category="product">Tất cả các món</a></li>
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=thucdon1"
                                                            data-category="thucdon1">Món Nhật</a></li>
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=thucdon2"
                                                            data-category="thucdon2">Món Việt Nam</a></li>
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=thucdon3"
                                                            data-category="thucdon3">Món Hàn</a></li>
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=thucdon4"
                                                            data-category="thucdon4">Món Thái Lan</a></li>
                                                    <li class="menu-item"><a
                                                            href="index.php?action=productAdmin&amp;act=thucdon5"
                                                            data-category="thucdon5">Đồ uống</a></li>
                                                </ul>

                                            </div>



                                            <div class="grid__item large--one-third medium--one-whole small--one-whole">
                                                <div class="collection-sorting-wrapper">
                                                    <!-- -->
                                                    <div class="form-horizontal text-right">
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
                                                                window.location.href = "index.php?action=product&act=<?php echo $_GET['act']; ?>&sort=" + sortOption;
                                                            }

                                                        </script>
                                                    </div>
                                                    <script>
                                                        /*============================================================================
                                                            Inline JS because collection liquid object is only available
                                                            on collection pages and not external JS files
                                                        ==============================================================================*/
                                                        Haravan.queryParams = {};
                                                        if (location.search.length) {
                                                            for (var aKeyValue, i = 0, aCouples = location.search.substr(1).split('&'); i < aCouples.length; i++) {
                                                                aKeyValue = aCouples[i].split('=');
                                                                if (aKeyValue.length > 1) {
                                                                    Haravan.queryParams[decodeURIComponent(aKeyValue[0])] = decodeURIComponent(aKeyValue[1]);
                                                                }
                                                            }
                                                        }

                                                        $(function () {
                                                            $('#SortBy')
                                                                .val('created-descending')
                                                                .bind('change', function () {
                                                                    Haravan.queryParams.sort_by = jQuery(this).val();
                                                                    location.search = jQuery.param(Haravan.queryParams);
                                                                });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-body">
                                    <div class="grid-uniform md-mg-left-15 product-list">
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
                                            <div
                                                class="grid__item large--one-half medium--one-half small--one-whole md-pd-left15">
                                                <div class="product-item-list">
                                                    <div class="grid mg-left-10">
                                                        <div
                                                            class="grid__item large--one-third medium--one-whole small--one-whole pd-left10">
                                                            <div class="product-img">
                                                                <a
                                                                    href="index.php?action=product&act=productinfor&id_product=<?php echo $set['id_product'] ?>">
                                                                    <img id="1038518691"
                                                                        src="./public/img/<?php echo $set['thumbnail'] ?>" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="grid__item large--two-thirds medium--one-whole small--one-whole pd-left10">
                                                            <div class="product-item-info text-left">
                                                                <div class="product-title-price">
                                                                    <div class="product-title">
                                                                        <a href="/products/lau-vit-nau-chao-nho">
                                                                            <?php echo $set['name_product'] ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="product-price clearfix">
                                                                        <span class="current-price">
                                                                            <?php echo $set['regular_price'] ?> VND
                                                                        </span>

                                                                    </div>
                                                                </div>
                                                                <div class="product-desc">
                                                                    <?php echo $set['mota'] ?>
                                                                </div>

                                                                <div class="product_btn_price">
                                                                    <div class="product_btn btn" style="background: #00470f;
    border: 1px solid #00470f;
    color: #fff;
    width: auto;
    padding: 0px 30px;     
    display: inline-block;
    position: relative;
    outline: 0;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 100px;">
                                                                        <span><i
                                                                                class="fas fa-shopping-cart"></i></span><span>
                                                                            <a style=" color:white"
                                                                                href="index.php?action=product&act=productinfor&id_product=<?php echo $set['id_product'] ?>">Xem
                                                                                chi tiết<table></table></a>
                                                                        </span>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                </div>
                                <div class="pagination not-filter">
                                    <div id="pagination-" class="text-center clear-left">
                                        <div class="pagination-custom">
                                            <?php
                                            // Previous Page Button
                                            if ($current_page > 1) {
                                                echo '<span class="page"><a class="page-node" href="?action=product&act=' . $_GET['act'] . '&page=' . ($current_page - 1) . '" class="page-link"> <- </a></span>';
                                            }
                                            // Page Links
                                            for ($i = 1; $i <= $page; $i++) {
                                                $activeClass = ($i == $current_page) ? 'active current-page' : '';
                                                echo '<span class="page"><a class="page-node page-link ' . $activeClass . '" href="?action=product&act=' . $_GET['act'] . '&page=' . $i . '">' . $i . '</a></span>';
                                            }
                                            // Next Page Button
                                            if ($current_page < $page) {
                                                echo '<span class="page"><a class="page-node"  href="?action=product&act=' . $_GET['act'] . '&page=' . ($current_page + 1) . '" class="page-link">-> </a></span>';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
</div>
</section>

</main>
</div>
<?php


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Product Data")
                             ->setSubject("Product Data")
                             ->setDescription("Product data exported from website")
                             ->setKeywords("product data")
                             ->setCategory("Product Data");

// Add data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Product Name')
            ->setCellValue('B1', 'Regular Price')
            ->setCellValue('C1', 'Description');

// Fetch data from the database or wherever you're storing it
$row = 2; // Start from row 2

// Loop through your data and populate the Excel sheet
$resultgetDataHangHoaAll = $getDataHangHoaAll->getThucDonAllPage($start, $limit); // Assuming this retrieves your data
while ($set = $resultgetDataHangHoaAll->fetch()) {
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, $set['name_product'])
                ->setCellValue('B' . $row, $set['regular_price'])
                ->setCellValue('C' . $row, $set['mota']);
    $row++;
}

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Product Data');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('product_data.xlsx');

echo "Excel file generated successfully.";

?>
<script>
document.getElementById("exportButton").addEventListener("click", function() {
    // When the button is clicked, redirect to the export script
    window.location.href = "export_to_excel.php";
});
</script>