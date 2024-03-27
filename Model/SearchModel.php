<?php
// SearchModel.php

class SearchModel {
    public function searchProducts($searchTerm) {
        // Thực hiện câu truy vấn SQL để tìm kiếm trong cơ sở dữ liệu
        $db = new Connect();
        // Sử dụng OR để tìm kiếm dựa trên tên sản phẩm, mô tả hoặc số tiền
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
                   FROM `product` 
                   WHERE `name_product` LIKE '%$searchTerm%' 
                   OR `mota` LIKE '%$searchTerm%'
                   OR `regular_price` LIKE '%$searchTerm%'"; // Thêm điều kiện tìm kiếm dựa trên số tiền
    
        $results = $db->getList($select);
        
        return $results;
    }
    
}
?>
