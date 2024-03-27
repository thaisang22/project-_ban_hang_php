<?php
$ctrl = "productAdmin";

if (isset($_GET['action'])) {
    $ctrl = $_GET['action'];
}

$controller_path = "../Admin2/Controller/$ctrl.php";
// Debugging statement

if (file_exists($controller_path)) {
    include_once $controller_path;
} else {
    echo "Controller file not found: $controller_path"; // Debugging statement
}

$act = "product";
$thucdonac = 1;

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'product':
    case 'thucdon1':
    case 'thucdon2':
    case 'thucdon3':
    case 'thucdon4':
    case 'thucdon5':
        $view_path = './View/product.php';
        echo "Including view: $view_path"; // Debugging statement
        include_once $view_path;
        break;
    case 'exportdata':
        if (isset($_POST['btnExport'])) {
            // khởi tạo 1 đối tượng excel
            $objExcel = new PHPExcel();

            $objExcel->setActiveSheetIndex(0);
            $objExcel->getActiveSheet()->setTitle('danh sách sản phẩm');


            $objExcel->getActiveSheet()->setCellValue('A', 'ID');
            $objExcel->getActiveSheet()->setCellValue('B', 'CODE');
            $objExcel->getActiveSheet()->setCellValue('C', 'NAME_PRODUCT');
            $objExcel->getActiveSheet()->setCellValue('D', 'REGULAR_PRICE');
            $objExcel->getActiveSheet()->setCellValue('E', 'CATE_ID');
            // Găn data cho các cột và dòng trong sheet D14_TH02
            $numRow = 2;
            // Assuming `hanghoa` is your database class
            $db = new hanghoa(); // Assuming `hanghoa` is your database class
            $result = $db->getHangHoaALL();

            foreach ($result as $row) {
                $numRow++;
                $objExcel->getActiveSheet()->setCellValue('A' . $numRow, $row['id_product']);
                $objExcel->getActiveSheet()->setCellValue('B' . $numRow, $row['code_product']);
                $objExcel->getActiveSheet()->setCellValue('C' . $numRow, $row['name_product']);
                $objExcel->getActiveSheet()->setCellValue('D' . $numRow, $row['regular_price']);
                $objExcel->getActiveSheet()->setCellValue('E' . $numRow, $row['cate_id']);
            }

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="sanpham.xlsx"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0

            $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
            $objWriter->save('php://output');
            exit;
        }

        // Handle add product action
        break;
    case 'edit_Product':
        // Validate and sanitize the id_product
        $id_product = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $db = new hanghoa();
        $getProductId = $db->getProductId($id_product);
        include_once './View/edithanghoa.php';
        break;
    case 'update_Product':
        if (isset($_POST['submitedit']) && isset($_POST['name_product'])) {
            // Get form data
            $id_product = $_POST['id_product'];
            $name_product = $_POST['name_product'];
            $code_product = $_POST['code_product'];
            $regular_price = $_POST['regular_price'];
            $mota = $_POST['mota'];
            $cate_id = $_POST['cate_id'];
            $trangthai = $_POST['trangthai'];
            // Handle file upload
            $thumbnail = $_FILES['thumbnail']['name']; // Get the name of the uploaded file
            $thumbnail_temp = $_FILES['thumbnail']['tmp_name']; // Get the temporary file path on the server
            
            // Specify the destination directory on the server
            $destination_directory = 'C:/xampp/htdocs/PHP2/testteamplate/public/img/';
            
            // Trim the file name to remove any leading or trailing spaces
            $thumbnail = trim($thumbnail);
            
            // Move the uploaded file to its destination
            if (move_uploaded_file($thumbnail_temp, $destination_directory . $thumbnail)) {
                echo "File moved successfully.";
            } else {
                echo "Error moving file.";
            }
            
            // Update the product with file nam
            $db = new hanghoa();
            $Update_Product = $db->updateProductId($id_product, $name_product, $code_product, $regular_price, $mota, $cate_id, $thumbnail, $trangthai);

            echo "<script>";
            echo "alert('Sửa thành công');";
            echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
            echo "</script>";

            exit; // Stop further execution
        }
        break;
    case 'add_Product':
        include_once './View/addhanghoa.php';
        if (isset($_POST['submitadd'])) {
            // Get form data
            $name_product = $_POST['name_product'];
            $code_product = $_POST['code_product'];
            $regular_price = $_POST['regular_price'];
            $mota = $_POST['mota'];
            $cate_id = $_POST['cate_id'];
            $trangthai = $_POST['trangthai'];
            // Handle file upload
            $thumbnail = $_FILES['thumbnail']['name']; // Get the name of the uploaded file
            $thumbnail_temp = $_FILES['thumbnail']['tmp_name']; // Get the temporary file path on the server
            
            // Specify the destination directory on the server
            $destination_directory = 'C:/xampp/htdocs/PHP2/testteamplate/public/img/';
            
            // Trim the file name to remove any leading or trailing spaces
            $thumbnail = trim($thumbnail);
            
            // Move the uploaded file to its destination
            if (move_uploaded_file($thumbnail_temp, $destination_directory . $thumbnail)) {
                echo "File moved successfully.";
            } else {
                echo "Error moving file.";
            }
            // Update the product with file name
            $db = new hanghoa();
            $Add_Product = $db->addProductId($name_product, $code_product, $regular_price, $mota, $cate_id, $thumbnail, $trangthai);
            echo "<script>alert('Product added successfully.');</script>";
            exit; // Stop further execution
        }
        break;
    case 'addloai':
        include_once './View/addloaisanpham.php';
        break;
    case 'loai_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //b1: lấy về, từ Server $_FILE
            $file = $_FILES['file']['tmp_name'];
            // b2: thay thế những ký tự đặc biệt xEF,xBB,xBF
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
            //b3: mở file ra
            $file_open = fopen($file, "r");
            //b4: đọc nội dung của file
            while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
                $maloai = $csv[0];//null
                $tenloai = $csv[1];//Mắt kính trẻ em
                $db = new connect();
                $query = "INSERT INTO `category_product`(`cate_id`, `cate_name`) VALUES ('$maloai','$tenloai')";
                $db->exec($query);
            }
            echo "<script>";
            echo "alert('Nhập loại thành công');";
            echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=listLoai';";
            echo "</script>";

        }
        break;
    case 'listLoai':
        include_once './View/listLoai.php';
        break;
    case 'query':
        if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
            // Lấy từ khóa tìm kiếm từ input
            $searchKeyword = $_POST['keyword'];

            // Xử lý tìm kiếm sản phẩm dựa trên từ khóa
            $db = new hanghoa();
            $result = $db->searchProduct($searchKeyword);

            // Kiểm tra kết quả
            if ($result) {
                // Nếu có kết quả, hiển thị kết quả tìm kiếm
                include_once './View/query.php';
            } else {
                // Nếu không có kết quả, thông báo và chuyển hướng về trang sản phẩm
                echo "<script>";
                echo "alert('Không tìm thấy từ khóa: {$searchKeyword}');";
                echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
                echo "</script>";
            }
        } else {
            // Nếu không có từ khóa được nhập, thông báo và chuyển hướng về trang sản phẩm
            echo "<script>";
            echo "alert('Vui lòng nhập từ để tìm kiếm');";
            echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
            echo "</script>";
        }
        break;
    case 'deleteProduct':
        $id_product = isset($_GET['id']) ? intval($_GET['id']) : 0; // Correct parameter name
        $db = new hanghoa();
        $DeleteProductId = $db->deleteProduct($id_product);
        echo "<script>";
        echo "alert('Xóa thành công sản phẩm: $id_product');"; // Corrected concatenation
        echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
        echo "</script>";
        break;
    case 'statusProduct':
        $id_product = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $status = isset($_GET['status']) ? intval($_GET['status']) : 0;
        $db = new hanghoa();
        $result = $db->SetStatusForProduct($id_product, $status);
        echo "<script>";
        echo "alert('Cập nhật trạng thái sản phẩm thành công');";
        echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/admin2/index.php?action=productAdmin&act=product';";
        echo "</script>";
        break;
    default:
        echo "Invalid action: $act"; // Debugging statement
        break;
}
?>