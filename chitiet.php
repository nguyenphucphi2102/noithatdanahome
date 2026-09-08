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
<base href="http://localhost/noithatdanahome/">

<head>
<?php
// URL hiện tại (không lấy tham số ?id=...)
$current_url = "https://.com.vn/" . strtok($_SERVER['REQUEST_URI'], '?');

// Hình ảnh đại diện
$og_image = !empty($img)
    ? $img
    : "";
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php echo htmlspecialchars($title_meta); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="keywords" content="<?php echo htmlspecialchars($key); ?>">

<meta name="description" content="<?php echo htmlspecialchars($dis); ?>">

<meta name="robots" content="index,follow,max-image-preview:large">

<link rel="canonical" href="<?php echo $current_url; ?>">

<link rel="icon" href="/hinhmenu/logodanahome.png" type="image/png">

<link href="hinhmenu/logodanahome.png" rel="shortcut icon"/>
    <link rel="icon" type="logodanahome.png" href="hinhmenu/logodanahome.png" sizes="96x96">
    <link rel="apple-touch-icon" href="hinhmenu/logodanahome.png">
<!-- Open Graph -->
<meta property="og:locale" content="vi_VN">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo htmlspecialchars($title_meta); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($dis); ?>">
<meta property="og:url" content="<?php echo $current_url; ?>">
<meta property="og:site_name" content="In ấn thẻ chip atv">
<meta property="og:image" content="hinhmenu/logodanahome.png">
<meta property="og:image:alt" content="<?php echo htmlspecialchars($title_meta); ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars($title_meta); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($dis); ?>">
<meta name="twitter:image" content="<?php echo $og_image; ?>">




	    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
<!-- Google Font: Be Vietnam Pro (hỗ trợ tiếng Việt tốt) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;600;700;800&display=swap" rel="stylesheet">

	

<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Service",
  "name":"<?php echo addslashes($title_meta); ?>",
  "description":"<?php echo addslashes(strip_tags($dis)); ?>",
  "url":"https://thechipdanang.com.vn<?php echo strtok($_SERVER['REQUEST_URI'],'?'); ?>",

  "image":"<?php echo $img; ?>",

  "provider":{
      "@type":"HVACBusiness",
      "name":"In ấn thẻ chip",
      "url":"https://thechipdanang.com.vn/",
      "telephone":"0979781323",
      "image":"https://thechipdanang.com.vn/hinhmenu/logodanahome.png"
  },

  "areaServed":{
      "@type":"Country",
      "name":"Việt Nam"
  },

  "serviceType":"Sửa chữa máy lạnh công nghiệp"
}
</script>
<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"BreadcrumbList",
 "itemListElement":[
   {
     "@type":"ListItem",
     "position":1,
     "name":"Trang chủ",
     "item":"https://thechipdanang.com.vn/"
   },
   {
     "@type":"ListItem",
     "position":2,
     "name":"Dịch vụ"
   },
   {
     "@type":"ListItem",
     "position":3,
     "name":"<?php echo addslashes($title_meta); ?>"
   }
 ]
}
</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106809384-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-106809384-1');
    </script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
    </script>

</head>

<body>
    <!-- Wrapper -->

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



<!-- Wrapper / End -->
</body>



</html>