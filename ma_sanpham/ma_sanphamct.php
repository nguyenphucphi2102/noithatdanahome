
<link rel="stylesheet" href="sitebds/css/csssanpham.css">
<?php
include('phantrang/phantrang_dichvu.php');
?>



<?php
require('db.php');

$url = $_GET['url'];

$stmt = $link->prepare("
    SELECT * 
    FROM loai_ma_sanpham 
    WHERE name_url = ?
");

$stmt->bind_param("s", $url);
$stmt->execute();

$category = $stmt->get_result()->fetch_assoc();

$category_id = $category['id'];

$ten       = $category['thuocloai'];
$tukhoa1   = $category['tukhoa1'];
$tukhoa2   = $category['tukhoa2'];
$noidung   = $category['noidung'];

$hinhanh = "HinhCTSP/" . $category['hinhanh'];
?>

<!-- =========================
     BANNER
========================= -->
<!-- <section class="category-banner">

    <img 
        src="<?php echo $hinhanh; ?>" 
        alt="<?php echo $ten; ?>"
    >

</section>  -->

<!-- =========================
     HEADING
========================= -->
<section class="headings">

    <header class="heading-content">

        <h1><?php echo ucwords($ten); ?></h1>

        <nav class="breadcrumb">

            <a href="trang-chu">Trang chủ</a>

            /

            <?php echo ucwords($ten); ?>

        </nav>

        <article class="category-description">

            <?php echo $noidung; ?>

        </article>

    </header>

</section>

<!-- SEO -->
<h2 style="font-size:0;color:transparent;">
    <?php echo ucwords($tukhoa1); ?>
</h2>

<h3 style="font-size:0;color:transparent;">
    <?php echo ucwords($tukhoa2); ?>
</h3>

<!-- =========================
     CONTENT
========================= -->
<main class="page-layout">

    <!-- PRODUCTS -->
    <section class="main-content">

        <section class="product-grid">

        <?php

        $limit = 24;

        $p = new pager;

        $start = $p->findStart($limit);

        // COUNT
        $count_query = $link->prepare("
            SELECT COUNT(*) 
            FROM ma_sanpham 
            WHERE thuocloai = ?
        ");

        $count_query->bind_param("i", $category_id);
        $count_query->execute();
        $count_query->bind_result($count);
        $count_query->fetch();
        $count_query->close();

        // PRODUCTS
        $product_query = $link->prepare("
            SELECT * 
            FROM ma_sanpham
            WHERE thuocloai = ?
            ORDER BY id DESC
            LIMIT ?, ?
        ");

        $product_query->bind_param(
            "iii",
            $category_id,
            $start,
            $limit
        );

        $product_query->execute();

        $products = $product_query->get_result();

        if($count > 0):

            while($row = $products->fetch_object()):

                $product_id = $row->id;

                $tieude = htmlspecialchars(
                    $row->tieude,
                    ENT_QUOTES,
                    'UTF-8'
                );

                $ma = htmlspecialchars(
                    $row->ma,
                    ENT_QUOTES,
                    'UTF-8'
                );

                $giagoc = $row->giagoc;

                $linkurl = htmlspecialchars(
                    $row->linkurl,
                    ENT_QUOTES,
                    'UTF-8'
                );

                $hinh = "HinhCTSP/HinhSanPham/" . $row->hinhanh;

                $product_link = str_replace(
                    ",",
                    "",
                    strtolower("san-pham/$linkurl-$product_id")
                );

        ?>

             <article class="titlespatv-card">

    <a href="<?php echo $product_link; ?>" class="titlespatv-image">
        <img
            src="<?php echo $hinh; ?>"
            alt="<?php echo $tieude; ?>"
        >
    </a>

    <section class="titlespatv-content">

        <h2 class="titlespatv-title">
            <a href="<?php echo $product_link; ?>">
                <?php echo $tieude; ?>
            </a>
        </h2>

        <!--<p class="titlespatv-price">
            Giá:
            <?php echo number_format($giagoc,0,',','.'); ?> ₫
        </p>-->

      <section class="titlespatv-contact-box">


    <p class="titlespatv-hotline">
        <a href="tel:0932876323">0932 876 323</a>
    </p>

</section>

        <a href="<?php echo $product_link; ?>" class="titlespatv-button">
            Mua hàng
        </a>

    </section>

</article>


        <?php

            endwhile;

        else:

        ?>

            <section class="empty-product">

                <h2>Chưa có sản phẩm</h2>

                <p>
                    Danh mục này hiện chưa có sản phẩm nào.
                </p>

                <img 
                    src="hinhmenu/chu-ky-so-danang.gif"
                    alt="No products"
                >

            </section>

        <?php endif; ?>

        </section>

    </section>

    <!-- SIDEBAR -->
    <aside class="sidebar-shop">

        <section class="sidebar-box">

            <?php include('menu_trai/leftsanpham.php'); ?>

        </section>

    </aside>

</main>

