<?php

class Cart
{
        // phương thức thêm thông tin vào trong giỏ hàng
        function addCart($id_product, $name_product, $regular_price, $soluong, $thumbnail)
        {
            // Calculate total price for the current item
            $total = $soluong * $regular_price;
    
            // Check if the product with the same ID already exists in the cart
            $existingIndex = $this->findProductIndexById($id_product);
    
            if ($existingIndex !== false) {
                // Product with the same ID already exists, update the quantity
                $_SESSION['cart'][$existingIndex]['soluong'] += $soluong;
                $_SESSION['cart'][$existingIndex]['total'] += $total;
            } else {
                // Product with the same ID doesn't exist, add a new item
                $item = array(
                    'id_product' => $id_product,
                    'thumbnail' => $thumbnail,
                    'name_product' => $name_product,
                    'regular_price' => $regular_price,
                    'soluong' => $soluong,
                    'total' => $total,
                );
    
                // Add the new item to the cart
                $_SESSION['cart'][] = $item;
            }
        }


    
        // Phương thức tính tổng thành tiền của giỏ hàng
    function sub_total()
    {
        $sub_total = 0;

        foreach ($_SESSION['cart'] as $item) {
            $sub_total += $item['total'];
        }

        $sub_total = number_format($sub_total, 2);

        return $sub_total;
    }

    public function countItems()
    {
        $itemCount = 0;

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $itemCount += $item['soluong'];
            }
        }

        return $itemCount;
    }

    // Phương thức tính thành tiền cho từng sản phẩm trong giỏ hàng
    function item_sub_total($id_product)
    {
        $index = $this->findProductIndexById($id_product);

        if ($index !== false) {
            $item_total = $_SESSION['cart'][$index]['total'];
            $item_total = number_format($item_total, 2);

            return $item_total;
        }

        return 0; // Trả về 0 nếu sản phẩm không tồn tại trong giỏ hàng
    }

    // Helper function để lấy index của sản phẩm trong giỏ hàng
    private function findProductIndexById($id_product)
    {
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $index => $item) {
                if ($item['id_product'] == $id_product) {
                    return $index;
                }
            }
        }
        return false;
    }

    // Phương thức xóa một sản phẩm khỏi giỏ hàng
    function removeItem($id_product)
    {
        $index = $this->findProductIndexById($id_product);
        if (isset($_SESSION['cart'][$index])) {
            unset($_SESSION['cart'][$index]);
        }
    }

    function updateCart($original_indexes, $updates)
{
    foreach ($original_indexes as $index => $original_index) {
        $qty = (int)$updates[$index];
        if ($qty > 0) {
            if (isset($_SESSION['cart'][$original_index])) {
                $_SESSION['cart'][$original_index]['soluong'] = $qty;
                $_SESSION['cart'][$original_index]['total'] = $qty * $_SESSION['cart'][$original_index]['regular_price'];
            }
        } elseif ($qty === 0) {
            // Remove the item from the cart if the quantity is updated to zero
            unset($_SESSION['cart'][$original_index]);
        }
    }
}

    

    
}
    

