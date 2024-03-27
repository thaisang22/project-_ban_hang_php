<?php

session_start();
ob_start();
// lưu session
// include_once "Model/connect.php";
// include_once "Model/hanghoa.php";
// include_once "Model/page.php";
// include_once "Model/menu.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
require 'vendor/autoload.php';

?>
<!doctype html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="vi"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="vi"> <!--<![endif]-->

<head>
	<!-- Google Tag Manager -->
	<script>
		(function (w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-P8KVRV7');
	</script>
	<!-- End Google Tag Manager -->

	<meta name="facebook-domain-verification" content="gmfo7qsexqimswq6750lftpfrh28fn" />
	<meta name="google-site-verification" content="qsK7zCOAHNNTU-nSQC8rZmPaI0UKsm7O26ESBu43feY" />

	<!-- Basic page needs ================================================== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta property="og:locale" content="vi_VN">
	<link rel="alternate" hreflang="x-default" href="https://nhahangphuongnam.vn">
	<link rel="alternate" hreflang="vi" href="https://nhahangphuongnam.vn">
	<meta name="revisit" content="1 days">
	<meta name="robots" content="index,follow">

	<link rel="shortcut icon" href="//theme.hstatic.net/1000093072/1001049829/14/favicon.png?v=162" type="image/png" />

	<!-- Title and description ================================================== -->
	<title>
		Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội
	</title>

	<meta name="description"
		content="Phương Nam chuy&#234;n phục vụ c&#225;c m&#243;n ăn đậm chất v&#249;ng T&#226;y Nam Bộ như lẩu mắm c&#225; linh ở h&#224; nội, qu&#225;n lẩu vịt nấu chao ngon H&#224; Nội, qu&#225;n Lẩu g&#224; l&#225; giang ngon H&#224; Nội, Mắm c&#225; miền T&#226;y H&#224; Nội, nh&#224; h&#224;ng miền t&#226;y h&#224; nội, lẩu mắm c&#225; k&#232;o ngon H&#224; Nội, Li&#234;n hệ đặt b&#224;n ngay 18002028.">

	<!-- Helpers ================================================== -->
	<!-- /snippets/social-meta-tags.liquid -->


	<meta property="og:type" content="website">
	<meta property="og:title" content="Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội">
	<meta property="og:description"
		content="Phương Nam chuyên phục vụ các món ăn đậm chất vùng Tây Nam Bộ như lẩu mắm cá linh ở hà nội, quán lẩu vịt nấu chao ngon Hà Nội, quán Lẩu gà lá giang ngon Hà Nội, Mắm cá miền Tây Hà Nội, nhà hàng miền tây hà nội, lẩu mắm cá kèo ngon Hà Nội, Liên hệ đặt bàn ngay 18002028.">
	<meta property="og:image" content="http://theme.hstatic.net/1000093072/1001049829/14/share_fb_home.png?v=162" />
	<meta property="og:image:secure_url"
		content="https://theme.hstatic.net/1000093072/1001049829/14/share_fb_home.png?v=162" />

	<meta property="og:url" content="https://nhahangphuongnam.vn/">
	<meta property="og:site_name" content="Nhà hàng Phương Nam">



	<meta name="twitter:site" content="@https://">


	<meta name="twitter:card" content="summary">


	<meta name="twitter:title" content="Nhà hàng Phương Nam - Nhà hàng miền tây Hà Nội, lẩu mắm ngon Hà Nội">
	<meta name="twitter:description"
		content="Phương Nam chuy&#234;n phục vụ c&#225;c m&#243;n ăn đậm chất v&#249;ng T&#226;y Nam Bộ như lẩu mắm c&#225; linh ở h&#224; nội, qu&#225;n lẩu vịt nấu chao ngon H&#224; Nội, qu&#225;n Lẩu g&#224; l&#225; giang ngon H&#224; Nội, Mắm c&#225; miền T&#226;y H&#224; Nội, nh&#224; h&#224;ng miền t&#226;y h&#224; nội, lẩu mắm c&#225; k&#232;o ngon H&#224; Nội, Li&#234;n hệ đặt b&#224;n ngay 18002028.">


	<link rel="canonical" href="https://nhahangphuongnam.vn/">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
	<meta name="theme-color" content="#00470f">
	<!-- CSS ================================================== -->
	<link href='//theme.hstatic.net/1000093072/1001049829/14/timber.scss.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/suplo-style.scss.css?v=162' rel='stylesheet'
		type='text/css' media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/owl.carousel.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/owl.theme.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/owl.transitions.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/animate.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/slick.css?v=162' rel='stylesheet' type='text/css'
		media='all' />
	<link href='//theme.hstatic.net/1000093072/1001049829/14/slick-theme.css?v=162' rel='stylesheet' type='text/css'
		media='all' />


	<script defer src='https://stats.hstatic.net/beacon.min.js' hrv-beacon-t='1000093072'></script>
	<style>
		.grecaptcha-badge {
			visibility: hidden;
		}
	</style>
	<style>
		.alert {
			padding: 20px;
			background-color: #f44336;
			/* Đỏ */
			color: white;
			border-radius: 10px;
			text-align: center;
			font-size: 18px;
		}

		/* Màu nền xanh lá cây */
		.success {
			background-color: #4CAF50;
		}

		/* Màu nền vàng */
		.warning {
			background-color: #ff9800;
		}
	</style>
	<script type='text/javascript'>
		window.HaravanAnalytics = window.HaravanAnalytics || {};
		window.HaravanAnalytics.meta = window.HaravanAnalytics.meta || {};
		window.HaravanAnalytics.meta.currency = 'VND';
		var meta = {
			"page": {
				"pageType": "home"
			}
		};
		for (var attr in meta) {
			window.HaravanAnalytics.meta[attr] = meta[attr];
		}
	</script>


	<noscript><img height='1' width='1' style='display:none'
			src='https://www.facebook.com/tr?id=293675502779633&amp;ev=PageView&amp;noscript=1' /></noscript>
	<!-- /snippets/oldIE-js.liquid -->


	<!-- [if lt IE 9]>
<script src='/cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js' type='text/javascript'></script>
<script src='/theme.hstatic.net/1000093072/1001049829/14/respond.min.js?v=162' type='text/javascript'></script>
<link href="/theme.hstatic.net/1000093072/1001049829/14/respond-proxy.html" id="respond-proxy" rel="respond-proxy" />
<link href="/nhahangphuongnam.vn/search?q=f24fd1f68bf5b5c8ac238238eb414586" id="respond-redirect" rel="respond-redirect" />
<script src="/nhahangphuongnam.vn/search?q=f24fd1f68bf5b5c8ac238238eb414586" type="text/javascript"></script>
<![endif] -->


	<script src='//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js' type='text/javascript'></script>
	<script src='//theme.hstatic.net/1000093072/1001049829/14/modernizr.min.js?v=162' type='text/javascript'></script>
	<script src='//theme.hstatic.net/1000093072/1001049829/14/owl.carousel.min.js?v=162'
		type='text/javascript'></script>
	<script src='//theme.hstatic.net/1000093072/1001049829/14/slick.min.js?v=162' type='text/javascript'></script>

	<!-- Font Aweseome -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
		rel="stylesheet">




	<script
		src="https://cdn.rawgit.com/tuupola/jquery_lazyload/0a5e0785a90eb41a6411d67a2f2e56d55bbecbd3/lazyload.js"></script>
	<script type="text/javascript" charset="utf-8">
		window.addEventListener("load", function (event) {
			lazyload();
		});
	</script>




	<script>
		window.file_url = "//file.hstatic.net/1000093072/file/";
		window.asset_url = "//theme.hstatic.net/1000093072/1001049829/14/?v=162";
		var check_variant = true;
		var check_variant_quickview = true;
	</script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
	<!-- Facebook Pixel Code -->
	<script>
		! function (f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function () {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '620420796060440');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
			src="https://www.facebook.com/tr?id=620420796060440&ev=PageView&noscript=1" /></noscript>
	<!-- End Facebook Pixel Code -->

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-STWJZKXXV5"></script>;
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'G-STWJZKXXV5');
	</script>
	<link href='/theme.hstatic.net/1000093072/1001049829/14/cusnew.scss.css?v=162' rel='stylesheet' type='text/css'
		media='all' />

</head>

<body id="nha-hang-phuong-nam-nha-hang-mien-tay-ha-noi-lau-mam-ngon-ha-noi" class=" template-index">
	<!-- header -->
	<?php
	include_once "View/headder.php";
	?>
	<!-- hiên thi noi dung -->

	<!--hien thi noi dung ở đây-->
	<?php
	//muons trang chủ hiện thị view nào lên thì khởi tạo biến đó
	$ctrl = "home";
	$accout = 'accoutpage';
	// index điều phối các controller khác thông qua biến action 
	if (isset ($_GET['action'])) {
		$ctrl = $_GET['action'];
	}
	include_once "Controller/$ctrl.php";

	?>
	<?php
	include_once "View/footer.php";
	?>



	<!-- Custom script -->



















	<div class="icon_fixed">
		<ul class="no-bullets">



			<li class="backtop">
				<a id="back-to-top" href="javascript:void(0)">
					<i class="fas fa-angle-up"></i>
				</a>
			</li>
		</ul>
	</div>

	<script src='//hstatic.net/0/0/global/api.jquery.js' type='text/javascript'></script>

	<script src='//hstatic.net/0/0/global/option_selection.js' type='text/javascript'></script>

	<script src='//theme.hstatic.net/1000093072/1001049829/14/fastclick.min70ea.js?v=162'
		type='text/javascript'></script>
	<script src='//theme.hstatic.net/1000093072/1001049829/14/script70ea.js?v=162' type='text/javascript'></script>
	<script src='//theme.hstatic.net/1000093072/1001049829/14/timber70ea.js?v=162' type='text/javascript'></script>



</body>

</html>
<?php
ob_end_flush(); // Flush the buffer and send output to the browser 
?>