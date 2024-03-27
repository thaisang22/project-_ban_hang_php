<?php 
class infor_oder {
    function getOrderInfoByUserId($id_user) {
        $db = new Connect();
        $id_user = (int) $id_user;
        
        // Construct SQL query to fetch order information
        $query = "SELECT 
                    o.id_checkout AS order_id, 
                    o.id_user, 
                    o.total_product, 
                    o.tongthanhtien, 
                    o.ghichu, 
                    o.trangthai,
                    o.ngay AS purchase_date,
                    t.fullname,
                    t.sdt,
                    t.diachi,
                    t.payments_method_id,
                    t.id_product,
                    t.name_product,
                    t.tong_sanpham,
                    t.tong_tien
                  FROM 
                    ordertb AS o
                  JOIN 
                    tbl_order AS t ON o.id_checkout = t.id_checkout
                  WHERE 
                    o.id_user = $id_user";

        $orders = $db->getList($query); // Fetch order information
        
        return $orders;
    }
}
?>
