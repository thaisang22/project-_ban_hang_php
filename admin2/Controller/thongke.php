<?php

$act = "thongke";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'thongke':
        include_once './View/thongke.php';
        $db = new Connect();
        $getthongke ="SELECT `id`, `ngaydat`, `donhang`, `doanhthu`, `soluongban` FROM `thongke` WHERE 1";
        $rsthongke = $db->getList($getthongke);
        
        // Chuyển kết quả thành mảng
        $thongkeArray = array();
        while ($row = $rsthongke->fetch(PDO::FETCH_ASSOC)) {
            $thongkeArray[] = $row;
        }
        // Mã hóa mảng thành JSON
        $thongkeJSON = json_encode($thongkeArray);
        break;
        case 'updatethongke':
            $db = new thongke();
            $updatethongke = $db->TinhThongKe();
            $updatethongkesanpham= $db->updatethongke();
            
            // Kiểm tra xem cập nhật thành công hay không và hiển thị thông báo tương ứng
            if ($updatethongke) {
                // Hiển thị thông báo cập nhật thành công bằng JavaScript
                echo '<script>alert("Cập nhật thông kê thành công!");</script>';
            }
            include_once './View/thongke.php';
            break;
}