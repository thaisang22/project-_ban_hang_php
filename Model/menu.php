<?php
    class menu{
        function getCategory(){
            $db = new connect();
            $select="SELECT `cate_id`, `cate_name` FROM `category_product` WHERE 1";
            $resultGetDataCate=$db->getList($select);
            return $resultGetDataCate;
        }

    }

?>