<!--link css-->
<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">


<?php
include_once("phan_trang.php");
require('db.php');

/* Lấy slug từ URL */
$URLinfoRaw = isset($_GET["url"]) ? trim($_GET["url"]) : "";

/* Nếu không có URL thì dừng */
if ($URLinfoRaw == "") {
    die("Không tìm thấy bài viết.");
}

/*
 * Nếu linkurl trong database lưu dạng:
 * bai-viet-abc
 *
 * thì dùng = để lấy chính xác 1 bài
 */
$sql = "SELECT * FROM tin_tintuc WHERE linkurl = ? LIMIT 1";


$stmt = mysqli_prepare($link, $sql);

if (!$stmt) {
    die("Lỗi truy vấn dữ liệu.");
}

mysqli_stmt_bind_param($stmt, "s", $URLinfoRaw);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_object($result);

    $ngay     = $row->ngay;
    $id       = $row->id;

    $tieude   = doikyty($row->tieude);
    $noidung  = doikyty($row->noidung);
    $mota     = doikyty($row->mota);

    $tukhoa   = $row->tukhoa;
    $linkurl  = $row->linkurl;

    $hinhanh  = "HinhCTSP/Hinhdichvu/" . $row->hinhanh;

    $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

?>




<section class="article-header">
    <header class="article-header-inner">

        <nav class="article-breadcrumb">
            <a href="/">Trang chủ</a> ›
            <a href="/tin-tuc-vnemico">Tin tức</a> ›
            <span><?php echo $tieude; ?></span>
        </nav>

        <h1 class="article-title"><?php echo $tieude; ?></h1>

        <article class="article-meta">
            🗓 <time datetime="<?php echo $ngay; ?>">
                <?php echo "$ngay"; ?>
            </time>
            | ✍ Admin
        </article>

        <p class="article-sapo"><?php echo $mota; ?></p>

    </header>
</section>

<!-- ================= CONTENT ================= -->
<section class="content-wrap">

    <!-- LEFT -->
    <main class="content-left">

        <article>

          <figure class="news-featured-image">
    <img src="<?php echo $hinhanh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
    
    <figcaption class="article-hinh">
        <?php echo $tieude; ?>
    </figcaption>
</figure>

            <article class="article-content">
                <?php echo $noidung; ?>
            </article>
            
            <!-- PHẦN THÔNG TIN LIÊN HỆ-->
                    <?php
                    include_once("phan_trang.php");
                    require('db.php');
                    $tv = "select * from gioi_thieu order by id=36 desc limit 0,1";
                    $tv_1 = mysqli_query($link, $tv);
                    $a_tv_1 = mysqli_query($link, $tv);
                    ?>
                    <?php
                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                        $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
                        $id = "$tv_2[id]";
                        $noidung = "$tv_2[noidung]";
                        ?>
            <article class="phan-noidung">
                <?php echo $noidung; ?>
            </article>
            <?php } ?>
                    
        </article>

    </main>

    <!-- RIGHT -->
    <aside class="tintuc-bds-right">

        <section class="sidebar-box">
            <h3>Bài viết liên quan</h3>
            <ul>
                    <?php
            require('db.php');

            $tv = "SELECT * FROM tin_tintuc ORDER BY id DESC limit 0,6 ";
            $tv_1 = mysqli_query($link, $tv);

            while ($row = mysqli_fetch_array($tv_1)) {

                $id = $row['id']; // PHẢI CÓ DÒNG NÀY

                $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];

                $tieude = $row['tieude'];
                $linkurl = $row['linkurl'];

                $mota = $row['mota'];

                $link = "thong-tin-$linkurl-$id";
            ?>
                <li>
                 <a href="<?php echo $link; ?>">
                            <?php echo $tieude; ?>
                        </a>
                </li>
                <?php } ?>
            </ul>
        </section>

    

    </aside>

</section>


<?php 
} else {
    echo "<h2>Không tìm thấy bài viết</h2>";
}
?>



<!-- mục 2 -->
<section class="tintuc-bds-wrapper">

   
    <!-- CỘT TRÁI: Tin tức -->
<section class="tintuc-bds-left">
    <h2 class="tintuc-bds-section-title tintuc-bds-titletv fonttieudetin">Tin tức nổi bật</h2>

    <?php
    require('db.php');

    $tv   = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 0,8";
    $tv_1 = mysqli_query($link, $tv);

    if (!$tv_1) {
        die("Lỗi SQL: " . mysqli_error($link));
    }

    while ($row = mysqli_fetch_array($tv_1)) {

        $id        = $row['id'];
        $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
        $tieude    = $row['tieude'];
        $mota      = $row['mota'];
        $url       = $row['linkurl'];

        $link_bai = "thong-tin-$url-$id";
    ?>

        <article class="tintuc-bds-news-item">
            <figure class="tintuc-bds-news-img">
                <a class="tintuc-bds-news-title" href="<?php echo $link_bai; ?>">
                    <img src="<?php echo $link_hinh; ?>" loading="lazy" alt="<?php echo $tieude; ?>">
                </a>
            </figure>
            <article class="tintuc-bds-news-content">
                <a class="tintuc-bds-news-title" href="<?php echo $link_bai; ?>"> <?php echo $tieude; ?> </a>
                <p class="tintuc-bds-text"> <?php echo $mota; ?> </p>
            </article>
        </article>

    <?php } ?>

</section>
<!-- cột phải -->
    <aside class="tintuc-bds-right">

      
            <?php include('menu_trai/leftsanpham.php'); ?>
           
           
    </aside>

</section>

    