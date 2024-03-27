    <div id="PageContainer" class="">
        <main class="main-content" role="main">
            <!-- HRV LAST VIEW PRODUCT -->
            <script>
                (function saveAlgorithm() {
                    lastViewProducts.add('lau-ca-keo-la-giang-10');
                }());
            </script>
            <!-- END: HRV LAST VIEW PRODUCT -->
            <section id="product-wrapper">
                <div class="wrapper">
                    <div class="wrapper">
                        <div class="inner">
                            <?php
                            if (isset($_GET['id_product'])) {
                                $id_product = $_GET['id_product'];
                                $connection = new hanghoa();
                                $product = $connection->getMonAnId($id_product);
                                $nameFood = $product['name_product'];
                                $mota = $product['mota'];
                                $trangthai= $product['trangthai'];
                                $priceFood = $product['regular_price'];
                                $imgFood = $product['thumbnail'];
                            }
                            ?>
                            <div itemscope itemtype="http://schema.org/Product">
                                <div class="grid__item large--six-twelfths medium--one-whole small--one-whole">
                                    <div class="customize-product-slider clearfix">
                                        <div id="surround" class="clearfix">
                                            <div class="product-images" id="ProductPhoto">
                                                <img name="thumbnail" class="product-image-feature" src="public\img\<?php echo $imgFood ?>">
                                                <div id="sliderproduct" style="display: none !important;">
                                                    <ul class="slides">
                                                        <li class="product-thumb">
                                                            <a href="javascript:" class="product__thumbnail--target-1" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_22699667c4ac499395a946c631a1254b_master.jpg" data-zoom-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_22699667c4ac499395a946c631a1254b_master.jpg">
                                                                <img alt="Lẩu vịt nấu chao (L)" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_22699667c4ac499395a946c631a1254b_master.jpg" src="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_22699667c4ac499395a946c631a1254b_small.jpg">
                                                            </a>
                                                        </li>
                                                        <li class="product-thumb">
                                                            <a href="javascript:" class="product__thumbnail--target-2" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_1_a0e8c1af4378441f80fe8ffa7b03994b_master.jpg" data-zoom-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_1_a0e8c1af4378441f80fe8ffa7b03994b_master.jpg">
                                                                <img alt="Lẩu vịt nấu chao (L)" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_1_a0e8c1af4378441f80fe8ffa7b03994b_master.jpg" src="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_1_a0e8c1af4378441f80fe8ffa7b03994b_small.jpg">
                                                            </a>
                                                        </li>
                                                        <li class="product-thumb">
                                                            <a href="javascript:" class="product__thumbnail--target-3" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_2_7b5584cae7244df5bda23ab4cdeb0b4e_master.jpg" data-zoom-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_2_7b5584cae7244df5bda23ab4cdeb0b4e_master.jpg">
                                                                <img alt="Lẩu vịt nấu chao (L)" data-image="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_2_7b5584cae7244df5bda23ab4cdeb0b4e_master.jpg" src="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_2_7b5584cae7244df5bda23ab4cdeb0b4e_small.jpg">
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="customize-variants-products-slider text-center" style="display: none !important;">
                                            <div id="owl-customize-variants-products-slider" class="owl-carousel owl-theme">
                                                <div class="item product_variant_item" data-variant-color="Default Title" data-alt="" data-image="//hstatic.net/0/0/global/noDefaultImage6_small.gif" data-feature-image="//hstatic.net/0/0/global/noDefaultImage6_master.gif">
                                                    <img src="//hstatic.net/0/0/global/noDefaultImage6_small.gif" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="index.php?action=cart&act=cart_action" method="post" enctype="multipart/form-data" id="AddToCartForm" class="form-vertical">
                                    <div class="grid__item large--six-twelfths medium--one-whole small--one-whole">
                                        <div class="product-content">
                                            <div class="product-variants-wrapper">
                                                <div class="pro-content-head clearfix">
                                                    <h1 name="name_product" itemprop="name">
                                                        <?php echo $nameFood ?>
                                                    </h1>
                                                </div>
                                                <div style="display: none;" class="pro-content-head clearfix">
                                                    <h1 name="id_product" itemprop="name">
                                                        <?php echo $id_product ?>
                                                    </h1>
                                                </div>

                                                <div class="pro-price clearfix">
                                                    <h2 name="regular_price" class="current-price ProductPrice">
                                                        <?php echo $priceFood ?>₫
                                                    </h2>
                                                </div>
                                                <div class="pro-price clearfix">
                                                    <h2 name="regular_price" class="current-price ProductPrice">
                                                    Trạng Thái: <?php echo $trangthai == 1 ? 'có hàng' : 'ko có hàng'; ?>
                                                    </h2>
                                                </div>

                                                <div class="pro-short-desc">
                                                    <h2 style="text-align: justify;"><span style="font-size:14px"></span></h2>
                                                </div>

                                                <div id="product-select-watch" class="select-swatch"></div>
                                            </div>
                                            <div class="grid mg-left-5">
                                                <div class="grid__item large--one-third medium--one-third small--one-half pd-left5">
                                                    <div class="product-quantity clearfix">
                                                        <div class="qty-addcart clearfix">
                                                            <input type="number" id="Quantity" name="soluong" value="1" min="1" class="quantity-selector">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="grid__item large--two-thirds medium--two-thirds small--one-half pd-left5">
                                                    
                                                    <div class="product-actions clearfix">
                                                        <input type="hidden" name="id_product" value="<?php echo $id_product ?>">
                                                        <input type="hidden" name="name_product" value="<?php echo $nameFood ?>">
                                                        <input type="hidden" name="regular_price" value="<?php echo $priceFood ?>">
                                                        <input type="hidden" name="thumbnail" value="<?php echo $imgFood ?>">
                                                        <button style="background: #00470f;
    border: 1px solid #00470f;
    color: #fff;
    width: auto;
    padding: 0px 30px;     
    display: inline-block;
    position: relative;
    outline: 0;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 100px;" type="submit" name="add" id="AddToCart" class="btnAddToCart">
                                                            <span><i class="fas fa-shopping-cart"></i></span>
                                                            <span><a style="color:white">Oder</a></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collection_product">
                                            <span>Danh mục:</span>
                                            <a href="/collections/menu-ship">Món ăn cùng nhóm</a>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- sản phẩm infor -->
                    <div class="grid">
                        <div class="grid__item large--one-whole medium--one-whole small--one-whole">
                            <div class="product-description-wrapper">
                                <div class="tab clearfix">
                                    <button class="pro-tablinks" onclick="openProTabs(event, 'protab1')" id="defaultOpenProTabs">Mô tả</button>
                                </div>
                                <div id="protab1" class="pro-tabcontent">

                                </div>
                            </div>
                            <div class="grid__item large--one-whole medium--one-whole small--one-whole">
                                <section id="related-products">
                                    <div class="home-section-head clearfix">
                                        <h2>Sản phẩm liên quan</h2>
                                    </div>
                                    <div class="home-section-body">
                                        <div class="grid">








                                            <div class="grid__item large--one-quarter medium--one-half small--one-whole">










                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="/collections/menu-ship/products/lau-ga-la-giang-lon">
                                                            <img id="1002384862" class="lazyload" src="//theme.hstatic.net/1000093072/1001049829/14/lazyload.jpg?v=162" data-src="//product.hstatic.net/1000093072/product/lau_ga_la_giang_a704ccce60ba40da80df0e6e376f4867_medium.jpg" alt="Lẩu gà lá giang (L)" />
                                                        </a>





                                                    </div>

                                                    <div class="product-item-info text-left">
                                                        <hr class="green" />
                                                        <div class="product-title">
                                                            <a href="/products/lau-ga-la-giang-lon">Lẩu gà lá giang (L)</a>
                                                        </div>
                                                        <div class="product-desc">
                                                            Gà ta ngấm gia vị đun cùng nước lẩu chua t...
                                                        </div>
                                                        <div class="arrow">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </div>
                                                        <div class="product_btn_price">
                                                            <div class="product_btn">
                                                                <button type="button" class="btnAddToCart add-to-cart" data-id="1007145735"><span><i class="fas fa-shopping-cart"></i></span><span>Order</span></button>

                                                            </div>
                                                            <div class="product-price clearfix">
                                                                <span class="current-price">478,000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>








                                            <div class="grid__item large--one-quarter medium--one-half small--one-whole">










                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="/collections/menu-ship/products/banh-trang-trang-bang-cuon-ca-loc-hap">
                                                            <img id="1002383627" class="lazyload" src="//theme.hstatic.net/1000093072/1001049829/14/lazyload.jpg?v=162" data-src="//product.hstatic.net/1000093072/product/beo06616__1__11852dee30db45fc9a13190cc59d131b_medium.jpg" alt="Bánh tráng Trảng Bàng cuốn cá lóc nướng" />
                                                        </a>





                                                    </div>

                                                    <div class="product-item-info text-left">
                                                        <hr class="green" />
                                                        <div class="product-title">
                                                            <a href="/products/banh-trang-trang-bang-cuon-ca-loc-hap">Bánh
                                                                tráng Trảng Bàng cuốn cá lóc nướng</a>
                                                        </div>
                                                        <div class="product-desc">
                                                            - Cá lóc 1000-1200gr&nbsp;- Bánh tráng: 10...
                                                        </div>
                                                        <div class="arrow">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </div>
                                                        <div class="product_btn_price">
                                                            <div class="product_btn">
                                                                <button type="button" class="btnAddToCart add-to-cart" data-id="1007140866"><span><i class="fas fa-shopping-cart"></i></span><span>Order</span></button>

                                                            </div>
                                                            <div class="product-price clearfix">
                                                                <span class="current-price">408,000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>








                                            <div class="grid__item large--one-quarter medium--one-half small--one-whole">










                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="/collections/menu-ship/products/lau-vit-nau-chao-nho">
                                                            <img id="1038518691" class="lazyload" src="//theme.hstatic.net/1000093072/1001049829/14/lazyload.jpg?v=162" data-src="//product.hstatic.net/1000093072/product/lau_vit_nau_chao_b1383c967c76496792edb7cd9891d13b_medium.jpg" alt="lẩu vịt nấu chao (N)" />
                                                        </a>





                                                    </div>

                                                    <div class="product-item-info text-left">
                                                        <hr class="green" />
                                                        <div class="product-title">
                                                            <a href="/products/lau-vit-nau-chao-nho">lẩu vịt nấu chao
                                                                (N)</a>
                                                        </div>
                                                        <div class="product-desc">

                                                        </div>
                                                        <div class="arrow">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </div>
                                                        <div class="product_btn_price">
                                                            <div class="product_btn">
                                                                <button type="button" class="btnAddToCart add-to-cart" data-id="1084390659"><span><i class="fas fa-shopping-cart"></i></span><span>Order</span></button>

                                                            </div>
                                                            <div class="product-price clearfix">
                                                                <span class="current-price">348,000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>








                                            <div class="grid__item large--one-quarter medium--one-half small--one-whole">










                                                <div class="product-item">
                                                    <div class="product-img">
                                                        <a href="/collections/menu-ship/products/chim-bo-cau-quay">
                                                            <img id="1003178311" class="lazyload" src="//theme.hstatic.net/1000093072/1001049829/14/lazyload.jpg?v=162" data-src="//product.hstatic.net/1000093072/product/bo_cau_quay_d341a155cc644963b098131104b5a1b2_medium.jpg" alt="Chim bồ câu quay" />
                                                        </a>





                                                    </div>

                                                    <div class="product-item-info text-left">
                                                        <hr class="green" />
                                                        <div class="product-title">
                                                            <a href="/products/chim-bo-cau-quay">Chim bồ câu quay</a>
                                                        </div>
                                                        <div class="product-desc">
                                                            Chim bồ câu: 1 con 300grQuế, hồi, thảo quả...
                                                        </div>
                                                        <div class="arrow">
                                                            <i class="fas fa-arrow-right"></i>
                                                        </div>
                                                        <div class="product_btn_price">
                                                            <div class="product_btn">
                                                                <button type="button" class="btnAddToCart add-to-cart" data-id="1008547925"><span><i class="fas fa-shopping-cart"></i></span><span>Order</span></button>

                                                            </div>
                                                            <div class="product-price clearfix">
                                                                <span class="current-price">168,000₫</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>










                                        </div>
                                    </div>
                                </section>



                            </div>
                        </div>

                    </div>
                </div>
    </div>
    </section>


    <script>
        function getImageByAlt(alt) {
            $('.thumbnail-item').each(function() {
                if ($(this).data('alt') != alt) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            })
        }
        $('.product_variant_item').click(function() {
            var vid = $(this).data('variant-color');
            var imgf = $(this).data('feature-image');
            $(".product-thumb img[data-image='" + imgf + "']").click().parents('li').addClass('active');
            $('#product-select-option-0').val(vid);
            if ($(window).width() > 480) {
                getImageByAlt($(this).data('alt'));
            };
            $('.product_variant_item').removeClass('active');
            $(this).addClass('active');
        })
        $('.product_variant_item').trigger('click');
    </script>

    <script>
        $(".product-thumb img").click(function() {
            $(".product-thumb").removeClass('active');
            $(this).parents('li').addClass('active');
            $(".product-image-feature").attr("src", $(this).attr("data-image"));
            $(".product-image-feature").attr("data-zoom-image", $(this).attr("data-zoom-image"));
        });

        $(".product-thumb").first().addClass('active');
    </script>


    <script>
        $(document).ready(function() {
            if ($(".slides .product-thumb").length > 4) {
                $('#sliderproduct').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: 95,
                    itemMargin: 10,
                });
            }
            if ($(window).width() > 960) {
                jQuery(".product-image-feature").elevateZoom({
                    gallery: 'sliderproduct',
                    scrollZoom: true
                });
            } else {

            }
            jQuery('.slide-next').click(function() {
                if ($(".product-thumb.active").prev().length > 0) {
                    $(".product-thumb.active").prev().find('img').click();
                } else {
                    $(".product-thumb:last img").click();
                }
            });
            jQuery('.slide-prev').click(function() {
                if ($(".product-thumb.active").next().length > 0) {
                    $(".product-thumb.active").next().find('img').click();
                } else {
                    $(".product-thumb:first img").click();
                }
            });
        });
    </script>


    <script>
        jQuery(window).on('load', function() {
            if ($('#ProductThumbs').length) {
                var productThumb = $('#ProductThumbs');
                var productThumbInner = $('#ProductThumbs .inner');
                var productFeatureImage = $('#ProductPhoto');
                var thumbControlUp = $('.product-thumb-control .up');
                var thumbControlDown = $('.product-thumb-control .down');
                var thumbImageHeight = 80;


                productThumbInner.addClass('owl-carousel');
                productThumbInner.owlCarousel({
                    margin: 10,
                    items: 5,
                    itemsDesktop: [1000, 5],
                    itemsDesktopSmall: [900, 4],
                    itemsTablet: [768, 3],
                    itemsMobile: [480, 3],
                    navigation: false,
                    pagination: false,
                    slideSpeed: 1000,
                    paginationSpeed: 1000,
                    navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>']
                });

            }
        });

        $('.product-single__thumbnail').click(function(e) {
            e.preventDefault();
            $('.product__thumbnail--target-' + $(this).data('trigger')).trigger('click');
            $('.product-single__thumbnail').removeClass('active');
            $(".product-image-feature").attr("src", $(this).attr("href"));
            $(".product-image-feature").attr("data-zoom-image", $(this).attr("href"));
            $(this).addClass('active');
        })
    </script>

    <script>
        $('.swatch-element.color').click(function(e) {
            var color_name = $(this).data("value");
            console.log(color_name);
            $(".item.product_variant_item[data-variant-color='" + color_name + "']").trigger('click');
        })
    </script>

    <!-------------------------------------------->

    <script src='//hstatic.net/0/0/global/option_selection.js' type='text/javascript'></script>
    <script>
        var selectCallback = function(variant, selector) {
            if (variant && variant.available) {
                if (variant.featured_image != null) {
                    $(".product-thumb").removeClass('active');
                    $(".product-thumb img[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'master') + "']").click().parents('li').addClass('active');
                    $(".product_variant_item[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'small') + "']").click();
                    $(".product_variant_item").removeClass('active');
                    $(".product_variant_item[data-image='" + Haravan.resizeImage(variant.featured_image.src, 'small') + "']").addClass('active');
                }
            }
            timber.productPage({
                money_format: "{{amount}}₫",
                variant: variant,
                selector: selector
            });
        };

        jQuery(function($) {
            new Haravan.OptionSelectors('productSelect', {
                product: {
                    "available": true,
                    "compare_at_price_max": 0.0,
                    "compare_at_price_min": 0.0,
                    "compare_at_price_varies": false,
                    "compare_at_price": 0.0,
                    "content": null,
                    "description": "<p><span style=\"font-size:14px\">(1) Cá kèo đang bơi: 10<br>(2) Nước dùng: 1.8 lít<br>(3) Rau nhúng: 300gr<br>(4) Bún tươi/Mỳ tôm: 1 khay (1 gói mỳ tôm)<br>(5) Mắm ớt nguyên chất/Mắm me (xin thêm)</span></p><p>####</p><p style=\"text-align: justify;\"><span style=\"font-size:14px\"><strong>Lẩu mắm cá kèo tưởng chừng là một món ăn dân dã của người miền Tây. Tuy nhiên, với cách chế biến tỉ mỉ, món ăn trở thành đặc sản được rất nhiều thực khách ưa chuộng. Vậy lẩu mắm cá kèo ngon Hà Nội&nbsp;chế biến như thế nào? Theo dõi bài viết chi tiết dưới đây.</strong></span><br><span style=\"font-size:14px\"><strong>Lẩu mắm cá kèo ngon Hà Nội</strong> là món ăn hấp dẫn, giàu dinh dưỡng, vậy bạn đã biết những lợi ích khi ăn lẩu cá kèo chưa, tìm câu trả lời ngay dưới đây nhé!</span></p><p style=\"text-align: center;\"><span style=\"font-size:14px\"><img alt=\"lau mam ca keo ngon ha noi\" src=\"//file.hstatic.net/1000093072/file/lau-ca-keo__1__bca0da5ad8654868a27ba3c22969124e_grande.jpg\"></span></p><h2 style=\"text-align: justify;\"><strong><span style=\"font-size:18px\">1. Lợi ích của lẩu mắm cá kèo ngon Hà Nội</span></strong></h2><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">- Chữa khí huyết hư: với những người bị suy nhược, mới ốm dậy hay trong người luôn cảm thấy mệt mỏi nên dùng lẩu cá kèo kết hợp rau đắng, xương gà, cà chua, đậu hũ, lá giang… Món này có tác dụng rất tốt chữa bổ khí dưỡng huyết, ích tỳ vị, giúp người bệnh nhanh chóng hồi phục sức khỏe.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">- Chữa ho, đờm nhiều: Nấu cá kèo kho với khế chua, cùng với một ít gia vị như đường, gừng, hành khô… Món này sẽ có thể hóa đàm, tiêu viêm, trị chứng tỳ phế hư ho đờm, viêm họng, đầy bụng và chậm tiêu.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">- Chữa tâm trạng hồi hộp, tâm tỳ hư: ăn cá kèo kho với rau răm là cách có thể dưỡng tâm, hóa trệ, giúp bạn giảm bớt được căng thẳng, lo lắng hoặc hồi hộp.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">- Chữa tỳ hư, bụng đầy chậm tiêu: cá kèo khi đem kho với củ cải có thể dùng để trị chứng chậm tiêu, chứng ho khan, ho có đờm.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">- Chữa triệu chứng đau tức ngực sườn: Bạn có thể dùng món cá kèo kho củ kiệu để cải thiện tình trạng bệnh. Bên cạnh đó, món ăn này còn trị được các chứng đi tiểu gắt, tiểu đục, tiểu khó.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">- Chữa bí tiểu, phù thũng: lẩu canh cá kèo nấu với lá giang dùng để ăn hàng ngày cũng có thể trị được chứng thấp nhiệt sỏi tiết niệu và phì đại tuyến tiền liệt…</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Bên cạnh đó, cá kèo còn có nhiều tác dụng khác như cải thiện chứng men gan tăng cao, táo bón hoặc mụn nhọt hay những chứng bệnh liên quan đến nhiệt.</span></p><h2 style=\"text-align: justify;\"><strong><span style=\"font-size:18px\">2. Cách nấu lẩu mắm cá kèo ngon</span></strong></h2><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Nguyên liệu nấu Lẩu mắm cá kèo Cho 4 người<br>&nbsp;Cá kèo: 600g<br>&nbsp;Thịt heo: 300 gr<br>&nbsp;Dừa nước: 1 trái<br>&nbsp;Bún tươi: 500gr<br>&nbsp;Sả băm: 150 gr<br>&nbsp;Tỏi :5 tép<br>&nbsp;Ớt: 5 trái<br>&nbsp;Cà tím 1 trái<br>&nbsp;Rau nhúng lẩu 1 ít (rau điên điển/ rau nhút/ đậu rồng/ rau súng)<br>&nbsp;Mắm cá linh 250g<br>&nbsp;Dầu ăn 4 muỗng canh<br>&nbsp;Giấm 100 ml<br>&nbsp;Nước mắm 1/2 muỗng cà phê<br>&nbsp;Gia vị: đường/ muối/ bột ngọt/ hạt nêm</span></p><p style=\"text-align: justify;\">&nbsp;</p><h3 style=\"text-align: justify;\"><strong><span style=\"font-size:16px\">Cách chọn mua nguyên liệu tươi ngon</span></strong></h3><div>&nbsp;</div><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Cá kèo: cá kèo ngon thường có kích thước cân đối, thân hình thon dài và tròn đều. Nên chọn con có phần sống lưng màu nâu, xám ánh bạc, phần mắt có màu trong suốt hơi lồi. Không nên chọn cá khi sờ chúng không cảm nhận được độ đàn hồi của thịt cá, hơi nhớt và có mùi tanh khó chịu.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Thịt ba chỉ: loại ngon là miếng có phần nạc màu đỏ hồng, còn phần mỡ heo thì màu trắng đục, bề mặt khô ráo, nên chọn miếng có tỷ lệ phần nạc và mỡ bằng nhau, cân đối. Không lựa những miếng khi sờ không cảm nhận được độ đàn hồi đặc trưng của thịt và ngửi thịt có mùi hôi khó chịu.</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: center;\"><span style=\"font-size:14px\"><img alt=\"lau mam ca keo ngon ha noi\" src=\"//file.hstatic.net/1000093072/file/lau-mam-can-tho-0_1627659306__1___1__f2270e10d3d140b29f5c01191981b57a_grande.jpg\"></span></p><h3 style=\"text-align: justify;\"><br><br><br><span style=\"font-size:16px\"><strong>Cách chế biến Lẩu mắm cá kèo ngon Hà Nội:</strong></span></h3><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 1 Sơ chế cá kèo và thịt ba chỉ</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Sơ chế cá kèo<br>Để loại bỏ nhớt cho cá kèo, bạn nên dùng một ít muối và giấm chà nhẹ xát lên bề mặt từng con cá. Sau đó rửa cá thật nhiều lần với nước lạnh.<br>Sau khi cá kèo được làm sạch nhớt thì bạn tiến hành cắt bỏ phần miệng cá, rửa với nước lần nữa rồi để ráo nước.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Sơ chế và ướp thịt ba chỉ ngon<br>Để khử mùi hôi của thịt heo, bạn nên ngâm thịt heo trong nước muối loãng khoảng 5 phút rồi vớt ra rửa lại thật sạch với nước. Đợi thịt ráo nước thì bạn cắt thành từng miếng nhỏ mỏng</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Để ướp thịt, bạn nêm 1/2 thìa cafe muối, 1/2 thìa cafe bột ngọt, 1/2 muỗng cà phê hạt nêm và 1/2 muỗng cafe nước mắm, trộn đều rồi ướp trong 20 phút.</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 2 : Sơ chế nguyên liệu khác</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Tỏi, hành tím: bạn lột bỏ vỏ, rửa sạch, dùng dao đập dập rồi băm nhuyễn chúng. Ớt thì lặt bỏ cuống, rửa sạch rồi thái mỏng.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Cà tím rửa sạch, cắt bỏ phần đầu đi, phần thân cà chẻ làm 4 rồi cắt khúc vừa ăn.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Các phần rau nhúng lẩu thì đem rửa sạch và để ráo nước.</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 3 : Xào xăn thịt ba chỉ</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Bắc chảo lên bếp, cho vào 1 muỗng canh dầu ăn, đợi dầu nóng lên thì cho 1/2 phần tỏi đã băm nhuyễn vào, phi thơm vàng lên thì cho thịt ba chỉ vào.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Đảo đều tay trong khoảng 5 phút, thịt đã hơi săn lại, chín đều thì bạn tắt bếp.</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 4 : Chế nước lẩu mắm</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Bắc nồi lên bếp nấu, cho vào nồi khoảng 1 lít nước, đợi nước nóng thì bạn hòa 250gr mắm cá linh vào và đun sôi trong 40 phút đến khi cá linh đã rục mềm. Bạn đổ phần nước dùng này qua rây để lọc bỏ phần xương cá, vụn cá</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 5 : Nấu lẩu mắm cá kèo&nbsp;</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Tiếp tục bắc nồi khác để nấu lẩu lên bếp, cho vào 3 muỗng canh dầu ăn, đợi dầu nóng thì cho phần tỏi, hành còn lại vào, phi vàng rồi cho 150gr sả băm vào, xào thêm 3 phút thì cho ớt vào nấu cùng</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Bật bếp khoảng 2 phút nữa thì đổ 500ml nước dừa tươi vào, đun đến khi nước sôi lần nữa thì bỏ nước cốt mắm cá linh đã chuẩn bị vào.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Tiếp tục đun sôi thì cho lần lượt phần thịt ba chỉ và cà tím đã cắt khúc vào, nêm thêm 2 thìa cà phê đường, 1 muỗng cà phê bột ngọt, 1 thìa cà phê hạt nêm. Nấu thêm khoảng 2 phút nữa, rồi bạn nêm nếm lần cuối cho vừa miệng.</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Khi ăn, bạn lần lượt cho thịt cá lóc, các loại rau sóng ăn kèm vào và thưởng thức nhé!</span></p><p style=\"text-align: justify;\">&nbsp;</p><p style=\"text-align: justify;\"><strong><span style=\"font-size:14px\">Bước 6: Trình bày và thưởng thức.</span></strong></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Thành phẩm lẩu mắm cá kèo<br>Lẩu mắm cá kèo sau khi hoàn thành sẽ mang hương vị đặc trưng của miền Tây sông nước với nước dùng đậm đà, thơm ngon vị cá linh kết hợp cùng các loại rau lạ như điên điển, rau nhút,... đầy dân dã mang đến một trải nghiệm độc lạ</span></p><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Thịt cá được nấu vừa miệng nhưng không bị lấn át vị ngọt tự nhiên, thịt ba chỉ lại dai giòn. Món lẩu này thích hợp ăn kèm với bún tươi, các loại rau sống có thể linh hoạt điều chỉnh theo sở thích bản thân và gia đình của bạn</span><br>&nbsp;</p><p style=\"text-align: center;\"><span style=\"font-size:14px\"><img alt=\"lau mam ca keo ngon ha noi\" src=\"//file.hstatic.net/1000093072/file/lau-mam-can-tho-8__1__0b740df59ee3449fa2cc3d8fa5639b51_grande.jpg\"></span></p><h2 style=\"text-align: justify;\"><strong><span style=\"font-size:18px\">3. Nhà hàng lẩu mắm cá kèo ngon Hà Nội</span></strong></h2><p style=\"text-align: justify;\"><span style=\"font-size:14px\">Nhắc đến các món ngon vùng Tây Nam Bộ,<a href=\"https://nhahangphuongnam.vn/\"> Nhà hàng miền Tây Hà Nội</a> - ẩm thực Phương Nam chắc hẳn không còn là cái tên xa lạ đối với &nbsp;thực khách tại Hà Nội. Phương Nam nổi tiếng với các món ngon như: Lẩu cá kèo lá giang, lẩu cá tầm lá giang, lẩu cá linh bông điên điển, lẩu cua Đồng Tháp Mười,...<br>Điều làm nên đặc trưng Tây Nam Bộ của Nhà hàng Phương Nam không chỉ từ những món ăn chuẩn vị, không gian giản dị, gần gũi mà còn đến từ sự thân tình, tinh thần nồng nhiệt đón khách quý tới nhà.&nbsp;<br>Hãy ghé Nhà hàng Phương Nam để được tận hưởng hương vị tươi ngon đặc sắc!<br>Hotline: 18002028/ Zalo: 0969916156<br>&nbsp;CS1: Số 2 ngõ 69 Chùa Láng, Q. Đống Đa<br>CS2: Số 13 Mai Hắc Đế, Q. Hai Bà Trưng<br>&nbsp;CS3: Số 35 Dịch Vọng Hậu, Q. Cầu Giấy<br>CS4: Tòa Golden Palm - 21 Lê Văn Lương, Q. Thanh Xuân<br>Website: https://nhahangphuongnam.vn/</span><br>&nbsp;</p><p style=\"text-align: center;\"><span style=\"font-size:14px\"><img alt=\"lau mam ca keo ngon ha noi\" src=\"//file.hstatic.net/1000093072/file/mon_an_nha_hang_phuong_nam_c212afb20c1346729d16e6da495720ab_grande.png\"></span></p><p style=\"text-align: justify;\"><br><span style=\"font-size:14px\">Cá kèo là món ăn bình dân nhưng lại rất giàu dinh dưỡng và chữa được nhiều bệnh tật. Do đó, bạn nên bổ sung thêm món cá kèo vào thực đơn hàng ngày để tăng cường sức khỏe cho mình và người thân nhé!</span></p>",
                    "featured_image": "https://product.hstatic.net/1000093072/product/lau_ca_keo__2__cf8deed9ec9d45249d9fc76051e37401.jpg",
                    "handle": "lau-ca-keo-la-giang-10",
                    "id": 1035900709,
                    "images": ["https://product.hstatic.net/1000093072/product/lau_ca_keo__2__cf8deed9ec9d45249d9fc76051e37401.jpg", "https://product.hstatic.net/1000093072/product/huy08719_cd55ca349f32446c95abfdfd4327a551.jpg"],
                    "options": ["Tiêu đề"],
                    "price": 39800000.0,
                    "price_max": 39800000.0,
                    "price_min": 39800000.0,
                    "price_varies": false,
                    "tags": [],
                    "template_suffix": null,
                    "title": "Lẩu cá kèo lá giang 10",
                    "type": "Các món Lẩu",
                    "url": "/products/lau-ca-keo-la-giang-10",
                    "pagetitle": "Lẩu cá kèo lá giang  - Lẩu cá kèo ngon Hà Nội",
                    "metadescription": "Lẩu mắm cá kèo tưởng chừng là một món ăn dân dã của người miền Tây. Tuy nhiên, với cách chế biến tỉ mỉ, món ăn trở thành đặc sản được rất nhiều thực khách ưa chuộng. Vậy lẩu mắm cá kèo ngon Hà Nội chế biến như thế nào? Theo dõi bài viết chi tiết dưới đây.",
                    "variants": [{
                        "id": 1078807380,
                        "barcode": null,
                        "available": true,
                        "price": 39800000.0,
                        "sku": null,
                        "option1": "Default Title",
                        "option2": "",
                        "option3": "",
                        "options": ["Default Title"],
                        "inventory_quantity": 1.0,
                        "old_inventory_quantity": 1.0,
                        "title": "Default Title",
                        "weight": 0.0,
                        "compare_at_price": 0.0,
                        "inventory_management": null,
                        "inventory_policy": "deny",
                        "selected": false,
                        "url": null,
                        "featured_image": null
                    }],
                    "vendor": "Nhà hàng Phương Nam",
                    "published_at": "2021-10-18T03:39:21.167Z",
                    "created_at": "2021-10-18T05:16:45.844Z",
                    "not_allow_promotion": false
                },
                onVariantSelected: selectCallback,
                enableHistoryState: false
            });

            // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

            $('.selector-wrapper:eq(0)').prepend('<label for="productSelect-option-0">Ti&#234;u đề</label>');


            // Hide selectors if we only have 1 variant and its title contains 'Default'.

            $('.selector-wrapper').hide();

        });
    </script>

    </main>
    </div>