<?php 
    
?>
<div id="hero-slider">
	

	
	<div class="hero-slide">
		<div class="image-slider">
			<a href="#">
			<img src="theme.hstatic.net/1000093072/1001049829/14/ms_banner_img170ea.jpg?v=162" alt="slider">
			</a>
		</div>
		<div class="hero-slide-content">
			<div class="wrapper">
				<div class="hero-content text-left">
					<div class="slide-message" data-animation="fadeInDown" data-delay="0.5s">
						<h4>
							
						</h4>
						<hr/>
						<p class="medium--hide small--hide">
							
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		
	
	
	
	
	
	
	
	
	<div class="hero-slide">
		<div class="image-slider">
			<a href="#">
			<img src="theme.hstatic.net/1000093072/1001049829/14/ms_banner_img270ea.jpg?v=162" alt="slider">
			</a>
		</div>
		<div class="hero-slide-content">
			<div class="wrapper">
				<div class="hero-content text-left">
					<div class="slide-message" data-animation="fadeInDown" data-delay="0.5s">
						<h4>
							
						</h4>
						<hr/>
						<p class="medium--hide small--hide">
							
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		
	
	
	
	
	
	
	
	
	<div class="hero-slide">
		<div class="image-slider">
			<a href="#">
			<img src="theme.hstatic.net/1000093072/1001049829/14/ms_banner_img370ea.jpg?v=162" alt="slider">
			</a>
		</div>
		<div class="hero-slide-content">
			<div class="wrapper">
				<div class="hero-content text-left">
					<div class="slide-message" data-animation="fadeInDown" data-delay="0.5s">
						<h4>
							
						</h4>
						<hr/>
						<p class="medium--hide small--hide">
							
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>
		
	
	
	
	
	
	
	
		
	
</div>

<script>
$(document).ready(function() {
	$('#hero-slider').on('init', function(e, slick) {
		var $firstAnimatingElements = $('div.hero-slide:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	$('#hero-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('div.hero-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	$('#hero-slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		dots: true,
		fade: true
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function() {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function() {
				$this.removeClass($animationType);
			});
		});
	}
});
</script>
		
<div id="PageContainer" class="">
    <main class="main-content" role="main">
        <section id="home-projects">
            <div class="wrapper">
                <div class="inner">
                    <div class="section-title wow fadeInDown text-center">
                        <h2>
                            Bạn muốn ăn gì?
                        </h2>
                        <span class="section-title-border text-center">
                            <img src="//theme.hstatic.net/1000093072/1001049829/14/title_border.png?v=162" alt="title border">
                        </span>
                        <p>
                            Với thực đơn gần 100 món ăn, đậm chất miền Nam Bộ, nhà hàng Phương Nam chắc chắn sẽ
                            chinh phục được vị giác của bạn chỉ sau 1 lần thử!
                        </p>
                    </div>

                    <div class="hc-tabs-wrapper">
                        <div>
                            <div class="grid-uniform">
                            <?php
                    $getHangHoa = new hanghoa();
                    $result = $getHangHoa->getThucDonVN();
                    while ($set = $result->fetch()) { //
                    ?>
                                <div class="grid__item large--one-third medium--one-third small--one-whole">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a name="id_product" href="index.php?action=product&act=productinfor&id_product=<?php echo $set['id_product'] ?>">
                                                <img name="thumbnail" id="1002384862" class="lazyload" src="./public/img/<?php echo $set['thumbnail'] ?>" alt="Lẩu gà lá giang (L)" />
                                            </a>
                                        </div>
                                        <div class="product-item-info text-left">
                                            <hr class="green" />
                                            <div class="product-title">
                                                <a href=" " name="name_product"> <?php echo $set['name_product'] ?></a>
                                            </div>
                                            <div class="product-desc">
                                                Gà ta ngấm gia vị đun cùng nước lẩu chua t...
                                            </div>
                                            <div class="arrow">
                                                <i class="fas fa-arrow-right"></i>
                                            </div>
                                            <div class="product_btn_price">
                                                <div class="product_btn btn  btn-circle ">
                                                        <span><i class="fas fa-shopping-cart"></i></span><span>
                                                            <a style=" color:white" href="index.php?action=product&act=productinfor&id_product=<?php echo $set['id_product'] ?>">Xem chi tiết<table></table></a>
                                                        </span>
                                                </div>
                                                <div class="product-price clearfix">
                                                    <span name="regular_price" class="current-price"><?php echo $set['regular_price'] ?></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                        }
                                ?>
                            </div>
                            <div class="grid-uniform">
                                <div class="grid__item large--one-whole medium--one-whole small--one-whole text-center">
                                    <div class="viewall_hbanner">
                                        <a href="index.php?action=product&act=product">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        <section id="">
                <div class="wrapper">
                    <div class="inner">
                        <div class="grid mg-left-0">
                            <div
                                class="home_member_days_left grid__item large--three-fifths medium--one-half small--one-whole pd-left0">
                                <a href="">
                                    <img src="//theme.hstatic.net/1000093072/1001049829/14/home_member_days.jpg?v=162">
                                    <div class="desc_member_days">
                                        Đến với nhà hàng, khách hàng sẽ thấy được không gian thoáng đãng, có những phòng
                                        riêng biệt dành cho hội họp hay sinh nhật với màu trầm và xanh lá chủ đạo. Sẽ
                                        gợi nhớ cho những người con xa quê cảm nhận được như mình không trở về nhà.
                                    </div>
                                </a>
                            </div>
                            <div
                                class="home_member_days_right grid__item large--two-fifths medium--one-half small--one-whole pd-left0">
                                <div class="bgimg">

                                    <div class="middle">
                                        <div class="middle_title">Member days</div>
                                        <div class="middle_desc">Thứ 4: 11h30 - 14h00<br />
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;17h30
                                            - 21h00</div>

                                        <div class="home-collection-countdown ">
                                            <span id="label-countdown"></span>
                                            <div class="countdown-days">
                                                <div id="days">
                                                    11
                                                </div>
                                                <div>
                                                    Ngày
                                                </div>
                                            </div>
                                            <div class="countdown-hrs">
                                                <div id="hrs">
                                                    11
                                                </div>
                                                <div>
                                                    Giờ
                                                </div>
                                            </div>
                                            <div class="countdown-mins">
                                                <div id="mins">
                                                    11
                                                </div>
                                                <div>
                                                    Phút
                                                </div>
                                            </div>
                                            <div class="countdown-secs">
                                                <div id="secs">
                                                    11
                                                </div>
                                                <div>
                                                    Giây
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <script>
                if ($(window).width() > 768) {
                    $(document).ready(function () {
                        $(".home_member_days_right").height($(".home_member_days_left").height());
                    })
                }

                function nextWednesday() {
                    var today = new Date();
                    var todayN = today.getDay();
                    var offset = (todayN < 3 ? 3 : 10) - todayN; // <--- the most important part
                    today.setDate(today.getDate() + offset);
                    return today;
                }
                console.log(nextWednesday());
                var countDownDate = 0;
                var d = '';
                var _countDownDate = '';
                var str = new Date().toString();

                if (str.indexOf("Wed") != -1) {
                    console.log(str);
                    d = new Date();
                    d.setHours(23, 59, 59, 59);
                    _countDownDate = new Date(d);
                    countDownDate = _countDownDate.getTime();
                } else {
                    d = nextWednesday();
                    d.setHours(00,00,00,00);
                    _countDownDate = new Date(d);
                    countDownDate = _countDownDate.getTime();
                    console.log(countDownDate);

                }

                var x = setInterval(function () {



                    // Get todays date and time
                    var now = new Date().getTime();

                    // Find the distance between now an the count down date
                    var distance = countDownDate - now;

                    // Time calculations for days, hours, minutes and seconds
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    if (str.indexOf("Wed") >= 0) {
                        document.getElementById("label-countdown").innerHTML = "Kết thúc trong:";
                        document.getElementById("days").innerHTML = days;

                        document.getElementById("hrs").innerHTML = hours;

                        document.getElementById("mins").innerHTML = minutes;

                        document.getElementById("secs").innerHTML = seconds;

                    } else {
                        document.getElementById("label-countdown").innerHTML = "Sắp diễn ra:";
                        document.getElementById("days").innerHTML = days;

                        document.getElementById("hrs").innerHTML = hours;

                        document.getElementById("mins").innerHTML = minutes;

                        document.getElementById("secs").innerHTML = seconds;

                    }

                    // If the count down is finished, write some text
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById("demo").innerHTML = "EXPIRED";
                    }
                }, 1000);

            </script>
            
            <section id="">
                <div class="wrapper">
                    <div class="inner">
                        <div class="grid">
                            <div
                                class="home_register_left grid__item large--two-fifths medium--one-half small--one-whole">
                                <div class="title_btn_contact">
                                    <a href="">
                                        Liên hệ
                                    </a>
                                </div>
                                <div class="hotline_btn_contact">
                                    <a href="tel:1800 - 2028">
                                        1800 - 2028
                                    </a>
                                </div>
                                <div class="open_times">
                                    <span class="icon_open"><img
                                            src="//theme.hstatic.net/1000093072/1001049829/14/open_times.png?v=162"
                                            alt="open times icon"></span>
                                    <span class="content_open">Trưa: 11h30 - 14h00
                                        <br /><br />
                                        Tối: 17h30 - 21h00</span>
                                </div>
                                <hr />
                                <div class="list_restaurant_place">
                                    <span class="icon_place"><img
                                            src="//theme.hstatic.net/1000093072/1001049829/14/place.png?v=162"
                                            alt="place icon"></span>
                                    <span class="content_place">CS1: Số 2, ngõ 69 Chùa Láng.
                                        <br /> CS2: Số 13 Mai Hắc Đế.
                                        <br />CS3: Số 35 Dịch Vọng Hậu.
                                        <br />CS4: Tòa Golden Palm 21 Lê Văn Lương.
                                        <br />CS5: T167 TTTM AEON MALL Hà Đông</span>
                                </div>
                                <div class="ft-social">

                                    <a href="https://www.facebook.com/NhaHangPhuongNamMonNgonMienNam"><i
                                            class="fab fa-facebook-f"></i></a>




                                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>

                                </div>
                            </div>
                            <div
                                class="home_register_right grid__item large--three-fifths medium--one-half small--one-whole">
                                <div class="bg_right">
                                    <img src="//theme.hstatic.net/1000093072/1001049829/14/bg_register.png?v=162">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>





            <section id="home-maps">
                <div class="wrapper">
                    <div class="inner">
                        <iframe src="https://www.google.com/maps/d/embed?mid=1dn7AFqMjcRrIh5nXoiTzm-XOazaurWrX"
                            width="100%" height="450"></iframe>
                    </div>
                </div>
            </section>












        </main>
    </div>
    <div id="back-to-top"><i class="fas fa-angle-up"></i></div>
            