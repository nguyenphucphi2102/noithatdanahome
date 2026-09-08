<?php



session_start();

ini_set('display_errors', 0);
error_reporting(E_ALL);


include("../db.php");

include("ham/ham.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Oct 2024 02:49:41 GMT -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Ekka - Admin Dashboard eCommerce HTML Template.">

	<title>ATV MEDIA</title>
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
	<!-- GOOGLE FONTS -->
	<link rel="preconnect" href="https://fonts.googleapis.com/">
	<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@400;500;700;900&amp;display=swap"
		rel="stylesheet">

	<link href="../../../../../cdn.jsdelivr.net/npm/%40mdi/font%404.4.95/css/materialdesignicons.min.css"
		rel="stylesheet" />

	<!-- PLUGINS CSS STYLE -->
	<link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet">
	<link href="assets/plugins/simplebar/simplebar.css" rel="stylesheet" />

	<!-- Ekka CSS -->
	<link id="ekka-css" href="assets/css/ekka.css" rel="stylesheet" />
	<style>
		.banner-container {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 20px;
			padding: 15px 0;
			flex-wrap: nowrap;
		}

		.banner-column {
			flex: 2;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.banner-column img {
			max-height: 70px;
			height: auto;
			width: auto;
			object-fit: contain;
			margin: 0 5px;
		}

		.banner-column.center {
			flex: 2;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.search-wrapper {
			position: relative;
			width: 100%;
			max-width: 600px;
		}

		.search-bar {
			display: flex;
			width: 100%;
			align-items: stretch;
		}

		#searchBox {
			flex: 1;
			padding: 12px 15px;
			font-size: 16px;
			color: #1f7f5c !important;
			border: 1px solid #ccc;
			border-right: none;
			border-radius: 6px 0 0 6px;
			outline: none;
			box-sizing: border-box;
		}

		.btn-search {
			padding: 0 20px;
			font-size: 16px;
			border: 1px solid #ccc;
			background-color: #1f7f5c;
			color: white;
			border-radius: 0 6px 6px 0;
			cursor: pointer;
			display: flex;
			align-items: center;
		}

		.btn-search:hover {
			background-color: #155f47;
		}

		#suggestionBox {
			position: absolute;
			top: calc(100% + 5px);
			left: 0;
			width: 100%;
			background: #fff;
			max-height: 300px;
			overflow-y: auto;
			z-index: 10001;
			border-radius: 0 0 6px 6px;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		}

		.banner-topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			gap: 20px;
			padding: 10px 0;
			flex-wrap: nowrap;
		}

		.slogan {
			font-style: italic;
			color: #333;
		}

		.hotline {
			font-weight: bold;
			color: #1f7f5c;
		}

		.divider-line {
			margin: 0 10px 10px;
			border: none;
			border-top: 1px solid #ccc;
		}
	</style>
	<!-- FAVICON -->
	<link href="hinh/logo.png" rel="shortcut icon" />

</head>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>

<?php

include("xacdinh_dangnhap.php");

include("xu_ly_post_get/xu_ly_post_get.php");

?>

<?php

if ($xacdinh_dangnhap != "co") {



	include("khung_dang_nhap.php");



} else {



	?>

	<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

		<!--  WRAPPER  -->
		<div class="wrapper">

			<!-- LEFT MAIN SIDEBAR -->
			<div class="ec-left-sidebar ec-bg-sidebar">
				<div id="sidebar" class="sidebar ec-sidebar-footer">

					<div class="ec-brand">
						<a href="" title="Ekka">
							<img class="ec-brand-icon" src="hinh/logo.png" alt="" />
							<span class="ec-brand-name text-truncate">ATV</span>
						</a>
					</div>

					<!-- menuleft -->
					<?php include('menuleft.php'); ?>
				</div>
			</div>

			<!--  PAGE WRAPPER -->
			<div class="ec-page-wrapper">

				<!-- Header -->
				<header class="ec-main-header" id="header">
					<nav class="navbar navbar-static-top navbar-expand-lg">
						<!-- Sidebar toggle button -->
						<button id="sidebar-toggler" class="sidebar-toggle"><span
								class="mdi mdi-microsoft-xbox-controller-menu"></span></button>
						<!-- search form -->

						<div class="search-form d-lg-inline-block">
							<div class="search-wrapper"
								style="position: relative; width: 100%; max-width: 600px; margin: auto;">
								<div class="search-bar" style="display: flex;">
									<input name="q" class="search-input" type="text" id="searchBox"
										placeholder="Tìm kiếm..." autocomplete="off" />
									<button class="btn-search">TÌM KIẾM</button>
								</div>
								<div id="suggestionBox" class="suggestion-box"></div>
							</div>
						</div>
						<script>
							document.getElementById('searchBox').addEventListener('input', function () {
								const keyword = this.value;

								if (keyword.length === 0) {
									document.getElementById('suggestionBox').innerHTML = '';
									return;
								}

								fetch('timkiem_quantri.php?q=' + encodeURIComponent(keyword))
									.then(response => response.text())
									.then(data => {
										document.getElementById('suggestionBox').innerHTML = data;
									});
							});
						</script>


						<!-- navbar right -->
						<div class="navbar-right">
							<ul class="nav navbar-nav">
								<!-- User Account -->
								<li class="dropdown user-menu">
									<button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown"
										aria-expanded="false">
										<img src="hinh/logo.png" class="user-image" alt="User Image" />
									</button>
									<ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
										<!-- User image -->
										<li class="dropdown-header">
											<img src="hinh/logo.png" class="img-circle" alt="User Image" />
											<div class="d-inline-block">
												ATV MEDIA
											</div>
										</li>
										<li class="dropdown-footer">
											<a href="?thamso=thoat"> <i class="mdi mdi-logout"></i> Thoát </a>
										</li>
									</ul>
								</li>

								<li class="right-sidebar-in right-sidebar-2-menu">
									<i class="mdi mdi-settings-outline mdi-spin"></i>
								</li>
							</ul>
						</div>
					</nav>
				</header>

				<!-- CONTENT WRAPPER -->
				<div class="ec-content-wrapper">
					<div class="content">
						<?php include('bienluan_phanthan.php'); ?>
					</div>
				</div> <!-- End Content Wrapper -->

				<!-- Footer -->
				<footer class="footer mt-auto">
					<div class="copyright bg-white">
						<p style="color:red; font-weight:bold">
							Nếu gặp vấn đề khó khăn về phần Admin. Quý khách vui lòng gửi mail cho chúng tôi theo địa chỉ:
							<br> <br>
							<strong style="color: blue">kythuatatv@gmail.com </strong> hoặc Điện thoại: <strong
								style="color: blue"> 0905 45 43 48</strong> Hotline:
							<strong style="color: blue">0914.454.348</strong> Để hỗ trợ tốt nhất.
						</p>
					</div>
				</footer>

			</div> <!-- End Page Wrapper -->
		</div> <!-- End Wrapper -->

		<!-- Common Javascript -->
		<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/plugins/simplebar/simplebar.min.js"></script>
		<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
		<script src="assets/plugins/slick/slick.min.js"></script>

		<!-- Chart -->
		<script src="assets/plugins/charts/Chart.min.js"></script>
		<script src="assets/js/chart.js"></script>

		<!-- Google map chart -->
		<script src="assets/plugins/charts/google-map-loader.js"></script>
		<script src="assets/plugins/charts/google-map.js"></script>

		<!-- Date Range Picker -->
		<script src="assets/plugins/daterangepicker/moment.min.js"></script>
		<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
		<script src="assets/js/date-range.js"></script>

		<!-- Option Switcher -->
		<script src="assets/plugins/options-sidebar/optionswitcher.js"></script>

		<!-- Ekka Custom -->
		<script src="assets/js/ekka.js"></script>
	</body>
<?php } ?>

<!-- Mirrored from maraviyainfotech.com/projects/ekka/ekka-v37/ekka-admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 17 Oct 2024 02:49:52 GMT -->

</html>