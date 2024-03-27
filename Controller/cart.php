<?php

// Check if the cart exists in the session, if not, create it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$act = "cart";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'cart':
        include_once "./View/cart.php";
        break;
    case 'cart_action':
        // Check if form data is set
        if (isset($_POST['id_product'], $_POST['name_product'], $_POST['regular_price'], $_POST['thumbnail'], $_POST['soluong'])) {
            $id_product = $_POST['id_product'];
            $name_product = $_POST['name_product'];
            $regular_price = $_POST['regular_price'];
            $thumbnail = $_POST['thumbnail'];
            $soluong = $_POST['soluong'];
            // Output for debugging
            echo '<meta http-equiv="refresh" content="0;../testteamplate/index.php?action=cart"/>';
            $cart = new Cart();
            $cart->addCart($id_product, $name_product, $regular_price, $soluong, $thumbnail);
            
        } else {
            // Handle the case where form data is not set
            echo "console.log('Form data not set');";
        }
        break;
        case 'update_cart':
            if (isset($_POST['original_index'], $_POST['updates'])) {
                $original_indexes = $_POST['original_index'];
                $updates = $_POST['updates'];
                $cart = new Cart();
                $cart->updateCart($original_indexes, $updates);
                // Redirect back to the cart page
                header('Location:index.php?action=cart');
                exit();
            }
            break;
    case 'remove_item':
        if (isset($_GET['id_product'])) {
            $id = $_GET['id_product'];
            $cart = new Cart();
            $cart->removeItem($id);
        }
        echo '<meta http-equiv="refresh" content="0;../testteamplate/index.php?action=cart"/>';
        break;
}
?>