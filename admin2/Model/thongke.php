<?php 
    class thongke {

        function TinhThongKe() {
            $db= new Connect();
            $select = "CALL Capnhat_thongke()";
            $rs = $db->exec($select);
            return $rs;

        }
        function updatethongke() {
            $db = new Connect();
            $select="CALL update_thongkesanpham;            ;
            ";
            $rs = $db->exec($select);
            return $rs;
        }
    }
       

?>