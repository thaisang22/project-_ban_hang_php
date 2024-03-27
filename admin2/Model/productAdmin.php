<?php
class hanghoa
{

    function getHangHoaALL()
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * FROM `product` WHERE 1"; // Loại bỏ điều kiện `trangthai = 1`
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }

    function getThucDonDoUong()
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 5";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }

    function getThucDonVN()
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 2";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }

    function getThucDonNhat()
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 1";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }

    function getThucDonHan()
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product`  WHERE `cate_id` = 3";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }
    function getThucDonThai()
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 4";
        $resultGetDataThucDonVN = $db->getList($select);
        return $resultGetDataThucDonVN;
    }

    function getThucDonAllPage($start, $limit)
    {
        // ket noi data base
        $db = new Connect();
        // truy van du lieu tu data
        $select = "SELECT * 
               FROM `product` ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit; // Loại bỏ điều kiện `trangthai = 1`
        $resultGetDataProductAll = $db->getList($select);
        return $resultGetDataProductAll;
    }

    function getThucDonVNPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 2 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonNhatPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 1 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonHanPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 3 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getThucDonThaiPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 4 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getThucDonDOUongPage($start, $limit)
    {
        $db = new Connect();
        $select = "SELECT * 
        FROM `product` WHERE `cate_id` = 5 ORDER BY `id_product` DESC LIMIT " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }


    //
    function getMonAnId($id_product)
    {
        $db = new Connect();
        $select = "SELECT `id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `trangthai`,`date_product`
               FROM `product`
               WHERE `id_product` = $id_product";
        $resultGetDataThucAnID = $db->getInstance($select);
        return $resultGetDataThucAnID;
    }

    // method page product
    function getThucDonAllPageWithSort($start, $limit, $orderBy)
    {
        // Ket noi database
        $db = new Connect();
        // Truy van du lieu tu data
        $select = "SELECT * 
               FROM `product` ORDER BY $orderBy LIMIT $start, $limit"; // Bỏ điều kiện `trangthai = 1`
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
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 2 ORDER BY $orderBy LIMIT $start, $limit";
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
    FROM `product` WHERE `cate_id` = 3 ORDER BY $orderBy LIMIT $start, $limit";
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
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 1 ORDER BY $orderBy LIMIT $start, $limit";
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
        $select = "SELECT * 
               FROM `product` WHERE `cate_id` = 4 ORDER BY $orderBy LIMIT $start, $limit";

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
        }    // Truy vấn dữ liệu từ cơ sở dữ liệu với sắp xếp và giới hạn
        $select = "SELECT * 
            FROM `product` WHERE `cate_id` = 5 ORDER BY $orderBy LIMIT $start, $limit";

        $result = $db->getList($select);
        return $result;
    }

    function SetStatusForProduct($id_product, $status)
    {
        $db = new Connect();
        $select = "UPDATE product SET trangthai = $status WHERE id_product = $id_product ";
        $db->exec($select);
    }

    
    function getProductId( $id_product )
    {
        $db = new Connect();
        $select = "SELECT * 
               FROM `product` WHERE `id_product` = $id_product ";
        $resultGetDataThucDonVN = $db->getInstance($select);
        return $resultGetDataThucDonVN;
    }
  function updateProductId($id_product, $name_product, $code_product, $regular_price, $mota, $cate_id, $thumbnail, $trangthai) {
    $db = new Connect();
    
    $select = "UPDATE `product` SET `name_product`='$name_product', `code_product`='$code_product',
            `regular_price`='$regular_price', `mota`='$mota', `cate_id`='$cate_id', `thumbnail`='$thumbnail',
            `trangthai`='$trangthai' 
            WHERE `id_product`='$id_product'";
    $db->exec($select);
}

function addProductId($name_product, $code_product, $regular_price, $mota, $cate_id, $thumbnail, $trangthai) {
    $db = new Connect();
    
    $select = "INSERT INTO `product` (`name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `trangthai`)
    VALUES ('$name_product', '$code_product', '$regular_price', '$mota', '$cate_id', '$thumbnail', '$trangthai')";
    $db->exec($select);
}
function searchProduct($keyword) {
    // Ket noi database
    $db = new Connect();
    // Truy van du lieu tu data
    $select = "SELECT * FROM `product` WHERE `name_product` LIKE '%$keyword%'"; // Tìm kiếm theo tên sản phẩm
    $result = $db->getList($select);
    return $result;
}
function deleteProduct($id_product) {
    try {
        // Connect to the database
        $db = new Connect();
        // Prepare the delete query
        $query = "DELETE FROM `product` WHERE `id_product` = $id_product";
        // Execute the query
        $result = $db->exec($query);
        // Return the result
        return $result;
    } catch (PDOException $e) {
        echo "Error executing query: " . $e->getMessage();
        return false; // Return false to indicate failure
    }
}
 function getListLoai(){
    $db= new Connect();
    $sql="SELECT `cate_id`, `cate_name` FROM `category_product` WHERE 1";
    $rs=$db->getList($sql);
    return $rs;
 }

}
