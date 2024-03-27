<?php 
    class oder {
        function getOder() {
            $db = new Connect();
            $select = "SELECT `id_checkout`, `id_user`, `total_product`, `tongthanhtien`, `ghichu`, `trangthai`, `ngay` FROM `ordertb` WHERE 1";
            $rs = $db->getList($select);
            return $rs;
        }
        function getUserHaveOdernhieunhat() {
            $db = new Connect();
            $select = "SELECT `id_user`
                    FROM `ordertb` 
                    GROUP BY `id_user` 
                    ORDER BY COUNT(`id_checkout`) DESC 
                    LIMIT 1";
            $rs = $db->getList($select);
            return $rs;
        }
        function SetStatusForCheckout($id_checkout, $status) {
            $db = new Connect(); // Đảm bảo rằng Connect là class kết nối đến CSDL
            $select = "UPDATE ordertb SET trangthai = $status WHERE id_checkout = $id_checkout ";
            return $db->exec($select);
        }
    
        function GetEmailUserFromIdCheckout($id_checkout)
        {
            $db = new Connect(); // Đảm bảo rằng Connect là class kết nối đến CSDL
            $select = "SELECT tbl_user.email_user ,tbl_user.username
            FROM ordertb
            INNER JOIN tbl_user ON ordertb.id_user = tbl_user.id_user
            WHERE ordertb.id_checkout = '$id_checkout';";
            return $db->getInstance($select);
        }
    }

?>