<?php
session_start();
ini_set('display_errors', '0');
date_default_timezone_set('Asia/Saigon');
include("db.php");
include("ham/ham.php");
include("ham/catchuoi.php");
include("ngon_ngu/chon.php");
include("title_meta/title_meta.php");

?>
<!DOCTYPE html>
<html lang="en">
<base href="http://localhost/muabanmaylanhcu/">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_meta; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="hinhmenu/icon/Icon-Claudiaalves.webp" rel="shortcut icon" />
	<link rel="canonical" href="https://coinvang.site/" />
	<meta name="twitter:card" content="https://coinvang.site/<?php echo $_SERVER['REQUEST_URI']; ?>" />
	<meta name="keywords" content="<?php echo $key; ?>" />
	<meta name="description" content="<?php echo $dis; ?>" />
	<meta property="og:url" content="https://coinvang.site/<?php echo $_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image:alt" content="https://coinvang.site/<?php echo $product['tieude']; ?>" />
	<meta property="og:title" content="https://coinvang.site/<?php echo $product['tieude']; ?>" />
	<meta property="og:description" content="https://coinvang.site/<?php echo $product['mota']; ?>" />
	<meta property="og:image" content="<?php echo $img; ?>" />
	<meta property="og:updated_time" content="1578214368" />
	<meta property="og:image" content="https://coinvang.site/hinhmenu/logo/logo-borcelle.webp" />
	<meta property="og:description" content="<?php echo $dis; ?>" />
	
    
    	<!-- Plugins CSS File -->
    <link rel="stylesheet preload" href="sitetintuc/assets/css/plugins/fontawesome-5.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/vendor/bootstrap.min.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/vendor/swiper.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/vendor/metismenu.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/vendor/fonts.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/vendor/magnific-popup.css" as="style"/>
    <link rel="stylesheet preload" href="sitetintuc/assets/css/style.css" as="style"/>
	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "WebSite",
			"name": "coin vang",
			"url": "https://coinvang.site/"
		}
	</script>
</head>

<body>

	
		<?php
		include("xu_ly_post_get/xu_ly_post_get.php");
		?>
		<?php
		include('menutopdidong/menutopdidong.php');
		?>
		<?php
		include('bienluan_phanthan.php');
		?>
		<?php
		include('jqueryfooter/footertc.php');

		?>


	</body>
    <!--scroll top button-->
    <button class="scroll-top-btn">
        <i class="fa-regular fa-angles-up"></i>
    </button>
    <!--scroll top button end-->

    <div id="anywhere-home"></div>

    <script src="sitetintuc/assets/js/vendor/jquery.min.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/audio.js" defer></script>
    <script src="sitetintuc/assets/js/vendor/bootstrap.min.js" defer></script>
    <script src="sitetintuc/assets/js/vendor/swiper.js" defer></script>
    <script src="sitetintuc/assets/js/vendor/metisMenu.min.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/audio.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/magnific-popup.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/contact-form.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/resize-sensor.min.js" defer></script>
    <script src="sitetintuc/assets/js/plugins/theia-sticky-sidebar.min.js" defer></script>

    <!-- main js file -->
    <script src="sitetintuc/assets/js/main.js" defer></script>

</html>	