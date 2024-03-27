<?php
$act = "Thanks";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'Thanks':
        include_once './View/Thanks.php';
$partnerCode = $_GET['partnerCode'];
$orderId = $_GET['orderId'];
$requestId = $_GET['requestId'];
$amount = $_GET['amount'];
$orderInfo = $_GET['orderInfo'];
$orderType = $_GET['orderType'];
$transId = $_GET['transId'];
$resultCode = $_GET['resultCode'];
$message = $_GET['message'];
$payType = $_GET['payType'];
$responseTime = $_GET['responseTime'];
$extraData = $_GET['extraData'];
$signature = $_GET['signature'];
$paymentOption = $_GET['paymentOption'];

// Gọi phương thức để chèn dữ liệu vào cơ sở dữ liệu
$db = new Checkout();
$insert_informomo = $db->insertinfor_momo($partnerCode, $orderId, $requestId, $amount, $orderInfo, $orderType, $transId, $resultCode, $message, $payType, $responseTime, $extraData, $signature, $paymentOption);
        break;
    }