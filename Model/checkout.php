<?php 
class Checkout {
    function insertodertb($id_checkout, $id_user, $itemCount, $total_product,$content) {
        $db= new Connect();
        $date= new DateTime('now');
        $ngay=$date->format('Y-m-d');
        $id_user = (int) $id_user;
        $total_product = doubleval($total_product);
        $query = "INSERT INTO `ordertb`(`id_checkout`, `id_user`, `total_product`, `tongthanhtien`, `ghichu`, `ngay`)
        VALUES ($id_checkout, $id_user, $itemCount, $total_product, '$content', '$ngay')";
        $db->exec($query);
        $seleact = "SELECT `id_checkout` FROM ordertb ORDER BY `id_checkout` DESC LIMIT 1";
        $sohd=$db->getInstance($seleact);
        return $sohd[0]; // array 
    }
    function inserttbl_oder($id_checkout, $full_name, $phone, $address, $pey_method, $id_product,$name_product, $soluong, $total) {
        $db = new Connect();
    
        // Complete the SQL query
        $query = "INSERT INTO `tbl_order`(`id_checkout`, `fullname`, `sdt`, `diachi`, `payments_method_id`, `id_product`,`name_product` ,`tong_sanpham`, `tong_tien`) 
        VALUES ('$id_checkout', '$full_name', '$phone', '$address', '$pey_method', '$id_product', '$name_product','$soluong', '$total')";
    
        $db->exec($query);
    }

    function insertinfor_momo($partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $resultCode,$message,$payType,$responseTime,$extraData,$signature, $paymentOption) {
        $db = new Connect();
        $select = "INSERT INTO peyment_momo (partnerCode, orderId, requestId, amount, orderInfo, orderType, transId, resultCode, message, payType, responseTime, extraData, signature, paymentOption)
        VALUES ('$partnerCode', '$orderId', '$requestId', '$amount', '$orderInfo', '$orderType', '$transId', '$resultCode', '$message', '$payType', '$responseTime', '$extraData', '$signature', '$paymentOption')";
        $rs=$db->exec($select);
        return $rs;
        

    }
}
?>
