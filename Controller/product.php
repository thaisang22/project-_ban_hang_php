<?php
$act = "product";
$thucdonac = 1; // default thucdonac value

if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'product':
    case 'thucdon1': // nhat
    case 'thucdon2': // viet
    case 'thucdon3': //..
    case 'thucdon4':
    case 'thucdon5':
        include_once './View/product.php';
        break;
    case 'productinfor':
        include_once './View/productinfor.php';
        break;
}



?>