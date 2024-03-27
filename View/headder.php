<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8KVRV7" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="NavDrawer" class="drawer drawer--right">
    <div class="drawer__header">
        <div class="drawer__close js-drawer-close">
            <button type="button" class="icon-fallback-text">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <!-- begin mobile-nav -->
    <ul class="mobile-nav">
        <li class="mobile-nav__item mobile-nav__search">
            <form action="/search" method="get" class="input-group search-bar" role="search">
                <input type="hidden" name="type" value="article">
                <input type="search" id="main-search-form-input" name="q" value="" placeholder="Tìm sản phẩm..." class="input-group-field" aria-label="Tìm sản phẩm...">
                <span class="input-group-btn">
                    <button type="submit" class="btn icon-fallback-text">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </span>
            </form>
        </li>
        <li class="mobile-nav__item mobile-nav__item--active">
            <a href="/" class="mobile-nav__link">Trang chủ</a>
        </li>
        <li class="mobile-nav__item">
            <a href="/collections/all" class="mobile-nav__link">Menu</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/pages/gioi-thieu" class="mobile-nav__link">Thông tin nhà hàng</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/pages/uu-dai-vip" class="mobile-nav__link">Chính sách hội viên</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/blogs/uu-dai?view=khuyenmai" class="mobile-nav__link">Khuyến mại</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/blogs/am-thuc-phuong-nam" class="mobile-nav__link">Tư vấn</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/pages/lien-he" class="mobile-nav__link">Liên hệ</a>
        </li>




        <li class="mobile-nav__item">
            <a href="/pages/tuyen-dung" class="mobile-nav__link">Tuyển dụng</a>
        </li>



        <li class="mobile-nav__item">
            <a href="/cart">Giỏ hàng</a>
        </li>


    </ul>
    <!-- //mobile-nav -->
</div>

<div class="cart-overlay"></div>






<div id="CartDrawer" class="drawer drawer--left">
    <div class="drawer__header">
        <div class="drawer__title h3">Giỏ hàng</div>
        <div class="drawer__close js-drawer-close">
            <button type="button" class="icon-fallback-text">
                <span class="icon icon-x" aria-hidden="true"></span>
                <span class="fallback-text">"Đóng"</span>
            </button>
        </div>
    </div>
    <div id="CartContainer"></div>
</div>







<header class="header" id="header">
    <div class="desktop-header medium--hide small--hide">
        <div class="desktop-header-center">
            <div class="">
                <div class="inner">
                    <div class="grid">
                        <div class="grid__item large--two-twelfths">
                            <div class="hd-logo wow fadeInUp">
                                <h1>
                                    <a href="index.php?action=home">
                                        Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội<img src="//theme.hstatic.net/1000093072/1001049829/14/logo.png?v=162" alt="Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội" />
                                    </a>
                                </h1>

                            </div>
                        </div>
                        <div class="grid__item large--ten-twelfths">
                            <div class="desktop-header-navbar">
                                <div class="">
                                    <div class="inner">
                                        <ul class="no-bullets">


                                            <li class="active ">
                                                <a href="index.php?action=home">Trang chủ </a>

                                            </li>
                                            <li class="dropdown " data-wow-duration="0.75s" data-wow-delay="1.4s">
                                                <a href="index.php?action=product&act=product">Thực Đơn </a>
                                                <ul class="no-bullets">
                                                    <?php
                                                    $connection = new menu();
                                                    $result = $connection->getCategory();
                                                    while ($set = $result->fetch()) {
                                                    ?>
                                                        <li>
                                                            <a href="index.php?action=product&act=thucdon<?php echo $set['cate_id'] ?>" class="text-white dropdown-item display-4">
                                                                <?php echo $set['cate_name']; ?>
                                                            </a>

                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li class=" ">
                                                <a href="/pages/gioi-thieu">Thông tin nhà hàng </a>

                                            </li>

                                            <li class=" ">
                                                <a href="/pages/uu-dai-vip">Chính sách hội viên </a>

                                            </li>

                                            <li class=" ">
                                                <a href="/blogs/uu-dai?view=khuyenmai">Khuyến mại </a>

                                            </li>

                                            <li class=" ">
                                                <a href="/blogs/am-thuc-phuong-nam">Tư vấn </a>

                                            </li>

                                            <li class=" ">
                                                <a href="/pages/lien-he">Liên hệ </a>

                                            </li>

                                            <li class=" ">
                                                <a href="/pages/tuyen-dung">Tuyển dụng </a>

                                            </li>

                                            <li class="dropdown dropdown-icon dropdown-icon-search" data-wow-duration="0.75s" data-wow-delay="1.8s">
                                                <a href="javascript:void(0)"><img class="icon_menu" src="//theme.hstatic.net/1000093072/1001049829/14/search.png?v=162" alt="Search icon"></a>
                                                <ul class="no-bullets">
                                                    <li>
                                                       <!-- Trong file HTML của bạn -->
<form action="index.php?action=SearchController&act=search_act" method="post" class="search-bar" role="search">
    <input type="search" name="search" value="" placeholder="Tìm kiếm..." class="input-group-field" aria-label="Tìm kiếm...">
    <button type="submit" class="btn icon-fallback-text">
        <i class="fas fa-search"></i>
    </button>
</form>

                                                    </li>
                                                </ul>
                                            </li>
                                                    
                                            <li class="dropdown dropdown-icon" data-wow-duration="0.75s" data-wow-delay="1.4s">
                                                <a href="javascript:void(0)"><img class="icon_menu" src="//theme.hstatic.net/1000093072/1001049829/14/user.png?v=162" alt="User icon"></a>
                                                <ul class="no-bullets">
                                                    <?php
                                                    if (isset($_SESSION['user'])) {
                                                        // User is logged in
                                                    ?>
                                                      <li>
                                                            <a href="#" class="nav-link link text-white display-4">
                                                                Xin chào,
                                                                <span   ><?php echo isset($_SESSION['user']) ? $_SESSION['user'] : ''; ?></span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="index.php?action=cart" class="nav-link link text-white display-4">Giỏ hàng</a>
                                                        </li>
                                                        <li>
                                                        <a href="index.php?action=infor_oder">Thông tin order</a>
                                                    </li>
                                                        <li>
                                                            <a href="index.php?action=login&act=logout" class="nav-link link text-white display-4">Đăng xuất</a>
                                                        </li>
                                                    <?php
                                                    } else {
                                                        // User is not logged in
                                                    ?>
                                                        <li>
                                                            <a href="index.php?action=login" class="nav-link link text-white display-4">Đăng nhập</a>
                                                        </li>
                                                    <?php
                                                    }
                                                    ?>
                                                    
                                                    <li>
                                                        <a href="index.php?action=dangky">Đăng ký</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="desktop-cart-wrapper dropdown dropdown-icon" data-wow-duration="0.75s" data-wow-delay="1.6s">
                                                <a href="index.php?action=cart">
                                                    <img class="icon_menu" src="//theme.hstatic.net/1000093072/1001049829/14/shopping-bag.png?v=162" alt="shopping bag">
                                                    <span class="cart-count hd-cart-count">
                                                        <?php
                                                        // Assuming you have an instance of the Cart class
                                                        $cart = new Cart();

                                                        // Get the total number of items in the cart
                                                        $itemCount = $cart->countItems();

                                                        // Output the total number of items wherever needed (e.g., in your HTML)
                                                        echo $itemCount;
                                                        ?>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mobile-header large--hide">
        <div class="wrapper">
            <div class="inner">
                <div class="grid">
                    <div class="grid__item medium--one-third small--one-half">
                        <div class="hd-logo text-left">

                            <a href="/">
                                <img src="//theme.hstatic.net/1000093072/1001049829/14/logo.png?v=162" alt="Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội" />
                            </a>

                        </div>
                    </div>
                    <div class="grid__item large--two-twelfths push--large--eight-twelfths medium--two-thirds small--one-half clearfix text-right">
                        <div class="hd-btnMenu">
                            <a href="javascript:void(0)" class="icon-fallback-text site-nav__link js-drawer-open-right" aria-controls="NavDrawer" aria-expanded="false">
                                <span>Menu</span>
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // Function to update the cart count
    function updateCartCount(newCount) {
        var cartCountElement = document.querySelector('.hd-cart-count');
        if (cartCountElement) {
            cartCountElement.textContent = newCount;
        }
    }
</script>