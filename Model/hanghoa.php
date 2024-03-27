<?php
class hanghoa
{
    // thuộc tính
    // hàm tạo
    //phương thức lấy về 8 sản phẩm mới nhất
    function getHangHoaNew()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product`where AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT 4;";
        $resultGetDataNew = $db->getList($select);
        return $resultGetDataNew;
    }

    function getHangHoaALL()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM `product` WHERE 1 AND `trangthai` = 1";
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }

    function getThucDonDoUong()
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `cate_id` = 5  AND `trangthai` = 1 ";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }
    
    function getThucDonVN()
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `cate_id` = 2 AND `trangthai` = 1";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }


    function getThucDonNhat()
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `cate_id` = 1 AND `trangthai` = 1";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }

    function getThucDonHan()
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product`  WHERE `cate_id` = 3 AND `trangthai` = 1 " ;
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }
    function getThucDonThai()
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `cate_id` = 4 AND `trangthai` = 1 ";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }


    function getThucDonAllPage($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` where  `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }

    function getThucDonVNPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `cate_id` = 2 AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonNhatPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 1  AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonHanPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 3 AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonThaiPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 4 AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getThucDonDOUongPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 5 AND `trangthai` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    //
    function getMonAnId($id_product)
    {
        $db  = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `trangthai`,`date_product`
        FROM `product`
        WHERE `id_product` = $id_product AND `trangthai` = 1" ;
        $resultGetDataThucAnID = $db->getInstance($select);
        return $resultGetDataThucAnID;
    }




    // method page product
    function getThucDonAllPageWithSort($start, $limit, $orderBy)
    {
        // Ket noi database
        $db = new Connect();
        // Truy van du lieu tu data
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
        FROM `product` WHERE `trangthai` = 1 ORDER BY $orderBy LIMIT $start, $limit";
        $result = $db->getList($select);
        return $result;
    }
    function getThucDonVNSortedBy($start, $limit, $orderBy)
{
    // Ket noi database
    $db = new Connect();

    // Đảm bảo chỉ sử dụng các trường hợp sắp xếp hợp lệ
    $allowedOrderBy = ["id_product", "name_product", "regular_price", "date_product"];
    if (!in_array($orderBy, $allowedOrderBy)) {
        // Nếu orderBy không hợp lệ, mặc định sắp xếp theo ID sản phẩm
        $orderBy = "id_product";
    }

    // Truy vấn dữ liệu từ cơ sở dữ liệu với sắp xếp và giới hạn
    $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
            FROM `product` WHERE `cate_id` = 2  AND `trangthai`=1 ORDER BY $orderBy LIMIT $start, $limit";

    $result = $db->getList($select);
    return $result;
}

function getThucDonHanSortedBy($start, $limit, $orderBy)
{
    // Ket noi database
    $db = new Connect();

    // Đảm bảo chỉ sử dụng các trường hợp sắp xếp hợp lệ
    $allowedOrderBy = ["id_product", "name_product", "regular_price", "date_product"];
    if (!in_array($orderBy, $allowedOrderBy)) {
        // Nếu orderBy không hợp lệ, mặc định sắp xếp theo ID sản phẩm
        $orderBy = "id_product";
    }
    $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `trangthai`, `date_product` 
    FROM `product` WHERE `cate_id` = 3 AND `trangthai` = 1 ORDER BY $orderBy LIMIT $start, $limit";
    $result = $db->getList($select);
    return $result;
}
function getThucDonNhatSortedBy($start, $limit, $orderBy)
{
    // Ket noi database
    $db = new Connect();

    // Đảm bảo chỉ sử dụng các trường hợp sắp xếp hợp lệ
    $allowedOrderBy = ["id_product", "name_product", "regular_price", "date_product"];
    if (!in_array($orderBy, $allowedOrderBy)) {
        // Nếu orderBy không hợp lệ, mặc định sắp xếp theo ID sản phẩm
        $orderBy = "id_product";
    }

    // Truy vấn dữ liệu từ cơ sở dữ liệu với sắp xếp và giới hạn
    $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
            FROM `product` WHERE `cate_id` = 1  AND `trangthai`=1 ORDER BY $orderBy LIMIT $start, $limit";
    $result = $db->getList($select);
    return $result;
}

function getThucDonThaiSortedBy($start, $limit, $orderBy)
{
    // Ket noi database
    $db = new Connect();

    // Đảm bảo chỉ sử dụng các trường hợp sắp xếp hợp lệ
    $allowedOrderBy = ["id_product", "name_product", "regular_price", "date_product"];
    if (!in_array($orderBy, $allowedOrderBy)) {
        // Nếu orderBy không hợp lệ, mặc định sắp xếp theo ID sản phẩm
        $orderBy = "id_product";
    }

    // Truy vấn dữ liệu từ cơ sở dữ liệu với sắp xếp và giới hạn
    $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 4  AND `trangthai`=1 ORDER BY $orderBy LIMIT $start, $limit";

    $result = $db->getList($select);
    return $result;
}

function getThucDonDOUongSortedBy($start, $limit, $orderBy)
{
    // Ket noi database
    $db = new Connect();

    // Đảm bảo chỉ sử dụng các trường hợp sắp xếp hợp lệ
    $allowedOrderBy = ["id_product", "name_product", "regular_price", "date_product"];
    if (!in_array($orderBy, $allowedOrderBy)) {
        // Nếu orderBy không hợp lệ, mặc định sắp xếp theo ID sản phẩm
        $orderBy = "id_product";
    }

    // Truy vấn dữ liệu từ cơ sở dữ liệu với sắp xếp và giới hạn
    $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product` 
               FROM `product` WHERE `cate_id` = 5  AND `trangthai`=1 ORDER BY $orderBy LIMIT $start, $limit";

    $result = $db->getList($select);
    return $result;
}

    
    //method sort 

    function getProductsSortedByNameAscending()
    {
        $db = new Connect();
        $select = "SELECT * FROM `product`where AND `trangthai` = 1 ORDER BY `name_product` ASC";
        $result = $db->getList($select);
        return $result;
    }

    // Method to get products sorted by name descending
    function getProductsSortedByNameDescending()
    {
        $db = new Connect();
        $select = "SELECT * FROM `product` where  `trangthai` = 1 ORDER BY `name_product` DESC";
        $result = $db->getList($select);
        return $result;
    }

    // Method to get products sorted by price ascending
    function getProductsSortedByPriceAscending()
    {
        $db = new Connect();
        $select = "SELECT * FROM `product` where  `trangthai` = 1 ORDER BY `regular_price` ASC";
        $result = $db->getList($select);
        return $result;
    }

    // Method to get products sorted by price descending
    function getProductsSortedByPriceDescending()
    {
        $db = new Connect();
        $select = "SELECT * FROM `product` where `trangthai` = 1 ORDER BY `regular_price` DESC";
        $result = $db->getList($select);
        return $result;
    }
}
