
<link rel="stylesheet" href="sitebds/css/csssanpham.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="application/ld+json">
{
 "@context":"https://schema.org",
 "@type":"Product",
 "name":"<?php echo addslashes($tieude); ?>",
 "image":"https://muabanmaylanhcu.com.vn/HinhCTSP/HinhSanPham/<?php echo $hinhanh; ?>",
 "description":"<?php echo strip_tags($mota); ?>",
 "sku":"<?php echo $ma; ?>",
 "offers":{
   "@type":"Offer",
   "price":"<?php echo $giagoc; ?>",
   "priceCurrency":"VND",
   "availability":"https://schema.org/InStock"
 }
}
</script>


<!--<< Breadcrumb Section Start >>-->

<?php

$id = $_GET['url'];

$sql = "SELECT * FROM ma_sanpham
        WHERE linkurl LIKE '%".$id."%'
        LIMIT 1";

$query = mysqli_query($link,$sql);

$tv_2 = mysqli_fetch_array($query);

$thuocloai = $tv_2['thuocloai'];

$phanloai = mysqli_fetch_array(
    mysqli_query(
        $link,
        "SELECT * FROM loai_ma_sanpham
         WHERE id=".$thuocloai."
         LIMIT 1"
    )
);

$tieude   = $tv_2['tieude'];
$mota     = $tv_2['mota'];
$giagoc   = $tv_2['giagoc'];
$ma       = $tv_2['ma'];
 $hinhanh = "$tv_2[hinhanh]";
         $hinhanh1 = "$tv_2[hinhanh1]";
                $hinhanh2 = "$tv_2[hinhanh2]";
                $hinhanh3 = "$tv_2[hinhanh3]";

?>


<section class="breadcrumb-modern" style=' background: #f9f9f9;'>

    <div class="container">

        <header class="breadcrumb-header">

            <span class="breadcrumb-brand">
                ĐIỆN MÁY QUỐC KHÁNH
            </span>

            <h1 class="breadcrumb-title">
                <?php echo $tieude; ?>
            </h1>

            <p class="breadcrumb-desc">
                Chuyên cung cấp tủ lạnh, máy giặt, máy lạnh,
                điện máy cũ chất lượng và nhiều thiết bị gia dụng
                giá tốt tại Đà Nẵng.
            </p>

            <nav aria-label="breadcrumb">

                <ul class="breadcrumb-list">

                    <li>
                        <a href="trangchu">
                            Trang Chủ
                        </a>
                    </li>

                    <li>
                        <i class="fas fa-angle-right"></i>
                    </li>

                    <li>
                        <a href="#">
                            <?php echo $phanloai['thuocloai']; ?>
                        </a>
                    </li>

                    <li>
                        <i class="fas fa-angle-right"></i>
                    </li>

                    <li class="active">
                        <?php echo $tieude; ?>
                    </li>

                </ul>

            </nav>

        </header>

    </div>

</section>

<section class="product-detail-section">

    <div class="container">

        <section class="row">

            <!-- HÌNH ẢNH SẢN PHẨM -->

            <article class="col-lg-6 col-md-6">

                <section class="product-gallery">

                    <figure class="product-main-image">

                        <img
                            id="mainImage"
                            src="HinhCTSP/HinhSanPham/<?php echo $hinhanh; ?>"
                            alt="<?php echo $tieude; ?>"
                            title="<?php echo $tieude; ?>"
                        >

                    </figure>

                    <section class="product-thumbs">

                        <?php
                        $hinh_phu = [$hinhanh,$hinhanh1,$hinhanh2,$hinhanh3];

                        foreach($hinh_phu as $hinh){

                            if(!empty($hinh)){
                        ?>

                        <figure class="thumb-item">

                            <img
                                src="HinhCTSP/HinhSanPham/<?php echo $hinh; ?>"
                                alt="<?php echo $tieude; ?>"
                            >

                        </figure>

                        <?php } } ?>

                    </section>

                </section>

            </article>

            <!-- THÔNG TIN SẢN PHẨM -->

            <article class="col-lg-6 col-md-6">

                <header class="product-header">

                    <h1 class="product-title">
                        <?php echo $tieude; ?>
                    </h1>

                </header>

                <section class="product-meta">

                   

                    <p>
                        <strong>Danh mục:</strong>
                        <?php echo $phanloai['thuocloai']; ?>
                    </p>

                </section>

                <section class="product-price-box">

                    <span class="price-label">
                        LIÊN HỆ TẤN TÀI:
                    </span>

                    <strong class="product-price">

                       0914 454 348 

                    </strong>

                </section>

                <section class="product-short-description">

                    <?php echo $mota; ?>

                </section>

                <aside class="promotion-box">

                    <h2>
                        🎁 Ưu Đãi Tại Điện Máy Quốc Khánh
                    </h2>

                    <ul>

                        <li>
                            Miễn phí giao hàng nội thành.
                        </li>

                        <li>
                            Kiểm tra kỹ sản phẩm trước khi bàn giao.
                        </li>

                        <li>
                            Bảo hành từ 03 đến 06 tháng.
                        </li>

                        <li>
                            Hỗ trợ kỹ thuật tận nơi khi cần thiết.
                        </li>

                    </ul>

                </aside>

                <section class="product-action">

                    <a
                        href="https://zalo.me/0932876323"
                        target="_blank"
                        class="btn-zalo"
                    >
                        💬 Tư Vấn Qua Zalo
                    </a>

                    <a
                        href="tel:0932876323"
                        class="btn-phone"
                    >
                        📞 0914 454 348 
                    </a>

                </section>

            </article>

        </section>
<!-- Star Reviews -->

             
    </div>
	
	

</section>

<?php

include_once("phan_trang.php");
require("db.php");

$id = $_REQUEST['url'];

$result = mysqli_query(
    $link,
    "SELECT * FROM ma_sanpham
     WHERE linkurl LIKE '%".$id."%'
     ORDER BY id DESC
     LIMIT 1"
);

if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_object($result)){

        $thuocloai = $row->thuocloai;

        $phanloai = mysqli_fetch_array(
            mysqli_query(
                $link,
                "SELECT * FROM loai_ma_sanpham
                 WHERE id=".$thuocloai."
                 LIMIT 1"
            )
        );

        $tieude  = doikyty($row->tieude);
        $mota    = doikyty($row->mota);
        $noidung = doikyty($row->noidung);

?>

 <section class="container">
 
 <section class="product-layout">

    <article class="product-main">

<header class="product-content-header">

        <h2 class="product-content-title">
            Chi Tiết Sản Phẩm
        </h2>

    </header>

    <section
        class="product-content-body"
        id="productContent"
    >

        <?php echo $noidung; ?>

    </section>

    <footer class="product-content-footer">

        <button
            type="button"
            class="product-content-button"
            id="toggleContent"
        >
            Xem thêm
        </button>

    </footer>
	
	<!-- TÁC GIẢ / DOANH NGHIỆP -->

<section class="author-box">

<?php

$tv = mysqli_query(
    $link,
    "SELECT * FROM gioi_thieu WHERE id=8 LIMIT 1"
);

if($row = mysqli_fetch_array($tv)){

?>

<section class="author-box">

    <figure class="author-avatar">

        <img
            src="hinhmenu/banner-thu-mua.png"
            alt=""
            loading="lazy"
        >

    </figure>

    <article class="author-content">

        <h2 class="author-title">
            <?php echo $row['tieude']; ?>
        </h2>

        <section class="author-desc">
            <?php echo $row['noidung']; ?>
        </section>

    </article>

</section>

<?php } ?>

</section>


	
	 <section class="banchay-box">

    <h2 class="banchay-title">Sản phẩm bán chạy</h2>

    <ul class="banchay-list">
        <?php
        $sql = "SELECT * FROM ma_sanpham ORDER BY RAND() LIMIT 4";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $title = htmlspecialchars($row['tieude']);
            $img = "HinhCTSP/HinhSanPham/" . $row['hinhanh'];
            $url = str_replace("?", "", strtolower("san-pham/" . $row['linkurl'] . "-" . $id));
        ?>
        
        <li class="banchay-item">
            <a href="<?= $url ?>">
                <img src="<?= $img ?>" alt="<?= $title ?>">
                <span><?= $title ?></span>
            </a>
        </li>

        <?php } ?>
    </ul>

</section>
	
	
<!-- SẢN PHẨM NỔI BẬT -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

<section class="spnoibat">

    <h2 class="spnoibat-title">
        <i class="fa fa-bars"></i> SẢN PHẨM LIÊN QUAN
    </h2>

    <div class="swiper spnoibat-swiper">
        <div class="swiper-wrapper">

            <?php
            $sql = "SELECT * FROM ma_sanpham ORDER BY RAND() LIMIT 10";
            $result = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = htmlspecialchars($row['tieude']);
                $img = "HinhCTSP/HinhSanPham/" . $row['hinhanh'];
                $url = str_replace("?", "", strtolower("san-pham/" . $row['linkurl'] . "-" . $id));
            ?>

            <div class="swiper-slide spnoibat-item">
                <a href="<?= $url ?>">
                    <div class="spnoibat-img">
                        <img src="<?= $img ?>" alt="<?= $title ?>">
                    </div>
                    <h3><?= $title ?></h3>
                </a>
            </div>

            <?php } ?>

        </div>

        <!-- dots -->
        <div class="swiper-pagination"></div>

    </div>
</section>	
	
	

    </article>
	
	

    <aside class="product-sidebar">

      <?php
                    include('menu_trai/leftsanpham.php');
                    ?>

    </aside>

</section>
 
 
 <section class="tinlienquan">
    <main class="tinlienquan-container">

        <h2 class="tinlienquan-title">
            <i class="fa fa-bars"></i> TIN TỨC LIÊN QUAN
        </h2>

        <ul class="tinlienquan-grid">
           <?php
require('db.php');

$sql = "SELECT * FROM (
            SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 100
        ) AS recent_news
        ORDER BY RAND() LIMIT 8";

$posts = mysqli_query($link, $sql);

if ($posts && mysqli_num_rows($posts) > 0):
    while ($row = mysqli_fetch_assoc($posts)):

        $img = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
        $title = htmlspecialchars($row['tieude_en']);

        // Tạo URL SEO
        $id = $row['id'];
        $linkurl = strtolower(trim($row['linkurl']));
        $url = "thong-tin-$linkurl-$id";
?>

<li class="tinlienquan-item">
    <a href="<?= $url ?>">
        <figure class="tinlienquan-img">
            <img src="<?= $img ?>" alt="<?= $title ?>" loading="lazy">
        </figure>
        <h3><?= $title ?></h3>
    </a>
</li>

<?php
    endwhile;
endif;
?>
        </ul>

    </main>
</section>

 </section>

<?php
    }
}
?>




<script>

document.addEventListener(
'DOMContentLoaded',
function(){

    const content =
    document.getElementById(
    'productContent'
    );

    const btn =
    document.getElementById(
    'toggleContent'
    );

    if(content && btn){

        btn.addEventListener(
        'click',
        function(){

            content.classList.toggle(
            'active'
            );

            if(
                content.classList.contains(
                'active'
                )
            ){

                btn.innerHTML =
                'Thu gọn ▲';

            }else{

                btn.innerHTML =
                'Xem thêm ▼';

            }

        });

    }

});

</script>


<!-- END SECTION PARTNERS -->

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<script>
var swiper = new Swiper(".spnoibat-swiper", {
    loop: true,

    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    spaceBetween: 15,

    breakpoints: {
        0: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        1024: {
            slidesPerView: 3
        }
    }
});
</script>


<script>

document.addEventListener("DOMContentLoaded", function(){

    const mainImage =
    document.getElementById("mainImage");

    const thumbs =
    document.querySelectorAll(".thumb-item img");

    thumbs.forEach(function(img){

        img.addEventListener("click", function(){

            mainImage.src = this.src;

            mainImage.alt = this.alt;

            thumbs.forEach(function(item){

                item.parentElement.classList.remove("active");

            });

            this.parentElement.classList.add("active");

        });

    });

});

</script>

<script>

document.getElementById("mainImage")
.addEventListener("click", function(){

    window.open(this.src);

});

</script>



