<link rel="stylesheet" href="public/style/checkout.css">
<div>
    <div class="content">
        <?php
        if (!isset($_SESSION['id_user'])) {
            echo "<script>";
            echo "alert('Vui lòng đăng nhập để thanh toán cho đơn hàng này ');";
            echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php?action=login';";
            echo "</script>";
            exit;
        }
        ?>
        <?php

// Kiểm tra xem giỏ hàng có sản phẩm không
if (empty($_SESSION['cart'])) {
    // Nếu giỏ hàng trống, gửi mã JavaScript để hiển thị thông báo và chuyển hướng trang
    echo "<script>";
    echo "alert('Giỏ hàng của bạn đang trống. Hãy thêm sản phẩm vào giỏ hàng trước khi thanh toán.');";
    echo "window.location.href = 'http://localhost:8080/PHP2/testteamplate/index.php';";
    echo "</script>";
    exit;
}


// Tiếp tục hiển thị form thanh toán và các thông tin khác khi giỏ hàng không trống
?>

        <div class="wrap">
            <div class="sidebar" style="width: auto;">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div class="order-summary-section order-summary-section-product-list"
                                data-order-summary-section="line-items">
                                <table class="product-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                            <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                            <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                            <th scope="col"><span class="visually-hidden">Giá</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($_SESSION['cart'] as $index => $item) : ?>
                                            <tr class="product" data-product-id="1038482988" data-variant-id="1084312249">
    <td class="product-image">
        <div class="product-thumbnail">
            <div class="product-thumbnail-wrapper">
                <img class="product-thumbnail-image" alt="Lẩu vịt nấu chao (L)" src="public\img\<?= $item['thumbnail'] ?>">
            </div>
            <span class="product-thumbnail-quantity" aria-hidden="true"><?= $item['soluong']; ?></span>
        </div>
    </td>
    <td class="product-description">
        <span class="product-description-name order-summary-emphasis"><?= $item['name_product'] ?></span>
    </td>
    <td class="product-quantity visually-hidden">1</td>
    <td class="product-price">
        <span class="order-summary-emphasis"><?= $cart->item_sub_total($item['id_product']); ?>đ</span>
    </td>
</tr>




                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <td colspan="3" class="total-label">Tổng cộng:</td>
    <td colspan="2" class="total-amount order-summary-emphasis"><?= $cart->sub_total(); ?>đ</td>
                            </div>
                            <!-- Other order summary sections -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <!-- Header content -->
                </div>
                <div class="main-content">
                    <form action="index.php?action=checkout&act=order" method="post">
                        <!-- Thông tin thanh toán -->
                        <div class="step">
                            <div class="step-sections steps-onepage" step="1">
                                <div class="section">
                                    <div class="section-header">
                                        <h2 class="section-title">Thông tin thanh toán</h2>
                                    </div>
                                    
                                    <div class="invoice-info">
                                        <h3>Mã hóa đơn: <?php echo isset($_SESSION['id_checkout']) ? $_SESSION['id_checkout'] : ''; ?></h3>
                                    </div>
                                    <div class="section-content section-customer-information no-mb">
                                        <!-- Thông tin khách hàng -->
                                        <div class="fieldset">
                                            <span>Thông tin đặt hàng</span>
                                            <div class="field field-required field-show-floating-label">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_full_name">Họ và
                                                        tên</label>
                                                    <input placeholder="Họ và tên" autocapitalize="off"
                                                        spellcheck="false" class="field-input" size="30" type="text"
                                                        id="billing_address_full_name" name="checkout_fullname"
                                                        value="<?php echo isset ($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>"
                                                        autocomplete="false">
                                                </div>
                                            </div>
                                            <div class="field field-required">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="billing_address_phone">Điện
                                                        thoại</label>
                                                    <input autocomplete="false" placeholder="Điện thoại"
                                                        autocapitalize="off" spellcheck="false" class="field-input"
                                                        size="30" maxlength="15" type="tel" id="billing_address_phone"
                                                        name="checkout_phone"
                                                        value="<?php echo isset ($_SESSION['sodienthoai']) ? $_SESSION['sodienthoai'] : ''; ?>">
                                                </div>
                                            </div>
                                            <div class="field field-required field-show-floating-label">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="content_ghi_chu">Địa chỉ</label>
                                                    <input placeholder="Địa chỉ" autocapitalize="off" spellcheck="false"
                                                        class="field-input" size="30" type="text" id=""
                                                        name="checkout_diachi"
                                                        value="<?php echo isset ($_SESSION['diachi']) ? $_SESSION['diachi'] : ''; ?>"
                                                        autocomplete="false">
                                                </div>
                                            </div>
                                            <div class="field field-show-floating-label">
                                                <div class="field-input-wrapper">
                                                    <label class="field-label" for="content_ghi_chu">Ghi chú</label>
                                                    <input placeholder="Ghi chú" autocapitalize="off" spellcheck="false"
    class="field-input" size="30" type="text" id="content_ghi_chu"
    name="checkout_ghichu" value="" autocomplete="false">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Phương thức thanh toán -->
                                    <div id="change_pick_location_or_shipping" class="mt-5">
                                        <div id="section-payment-method" class="section">
                                            <div class="section-header">
                                                <h2 class="section-title">Phương thức thanh toán</h2>
                                            </div>
                                            <div class="section-content">
                                                <div class="content-box">
                                                    <div class="radio-wrapper content-box-row">
                                                        <label class="radio-label" for="payment_method_id_1003000498">
                                                            <div class="radio-input payment-method-checkbox">
                                                                <input type="radio" id="payment_method_id_1003000498"
                                                                    class="input-radio" name="payment_method_id"
                                                                    value="1" checked="">
                                                            </div>
                                                            <div class="radio-content-input">
                                                                <img class="main-img" src="public/img/MOMO.jpeg">
                                                                <div>
                                                                    <span class="radio-label-primary">Thanh toán qua
                                                                        MOMO</span>
                                                                    <span class="quick-tagline hidden"></span>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="radio-wrapper content-box-row">
                                                        <label class="radio-label" for="
                                                        payment_method_id_1003000500">
                                                            <div class="radio-input payment-method-checkbox">
                                                                <input type="radio" id="payment_method_id_1003000500"
                                                                    class="input-radio" name="payment_method_id"
                                                                    value="2">
                                                            </div>
                                                            <div class="radio-content-input">
                                                                <img class="main-img"
                                                                    src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6">
                                                                <div>
                                                                    <span class="radio-label-primary">Thanh toán khi
                                                                        giao hàng (COD)</span>
                                                                    <span class="quick-tagline hidden"></span>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <!-- Phần này có thể thêm các phương thức thanh toán khác -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Phần footer của form -->
                            <div class="step-footer" id="step-footer-checkout">
    <input name="utf8" type="hidden" value="✓">
    <button type="submit" name="order" class="step-footer-continue-btn btn">
        <span class="btn-content">Đặt hàng</span>
        <i class="btn-spinner icon icon-button-spinner"></i>
    </button>
    <a class="step-footer-previous-link" href="index.php?action=cart">Giỏ hàng</a>
</div>
