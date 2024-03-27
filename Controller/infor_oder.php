<?php
$act = "infor_oder";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'infor_oder':
        include_once './View/infor_oder.php';
        break;
    }