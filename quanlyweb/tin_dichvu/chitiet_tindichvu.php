<!--link css-->
<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">


<?php
include_once("phan_trang.php");
require('db.php');

$id = isset($_GET["url"]) ? $_GET["url"] : "";

// Lấy bài viết
$sql = "SELECT * FROM tin_dichvu 
        WHERE linkurl LIKE '%$id%' 
        ORDER BY id DESC LIMIT 1";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_object($result);

    $ngay = $row->ngay;
    $tieude = doikyty($row->tieude_en);
    $noidung = doikyty($row->noidung);
    $mota = doikyty($row->mota);
    $tukhoa = $row->tukhoa;
    $hinhanh = "HinhCTSP/Hinhdichvu/" . $row->hinhanh;

    $url = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>


<section class="article-header">
    <header class="article-header-inner">

        <nav class="article-breadcrumb">
            <a href="/">Trang chủ</a> ›
            <a href="/tin-tuc-vnemico">Chính sách</a> ›
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



            <article class="article-content">
           <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
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
                            //include_once("phan_trang.php");
                            require('db.php');
                            $tv = "SELECT m.*, l.thuocloai AS ten_loai, l.thuocloai_en, l.trangchu, l.hinhanh AS loai_hinhanh, l.logo, l.noidung, l.noidung_en, l.name_url
                            FROM (  SELECT * FROM tin_dichvuu ORDER BY id DESC LIMIT 100 ) AS m LEFT JOIN loai_tin_dichvuu l ON m.thuocloai = l.id ORDER BY id DESC LIMIT 8 ";
                            $tv_1 = mysqli_query($link, $tv);
                            $a_tv_1 = mysqli_query($link, $tv);
                            ?>
                            <?php
                            while ($row = mysqli_fetch_array($tv_1)) {
                                $link_hinh = "HinhCTSP/Hinhdichvu/$row[hinhanh]";
                                $id = "$row[id]";
                                $ten_loai = $row['ten_loai'];
                                $tieude = "$row[tieude_en]";
                                $mota = "$row[mota]";
                                $url = $row['linkurl'];
                               $link = str_replace("?", "", strtolower("dich-vu/$url"));
                                ?>
                                
        <article class="tintuc-bds-news-item">
            <figure class="tintuc-bds-news-img">
                <a class="tintuc-bds-news-title" href="<?php echo "$link"; ?>">
                    <img src="<?php echo "$link_hinh"; ?>" loading="lazy" alt="<?php echo "$tieude"; ?>">
                </a>
            </figure>
            <article class="tintuc-bds-news-content">
                <a class="tintuc-bds-news-title" href="<?php echo "$link"; ?>"> <?php echo "$tieude"; ?> </a>
                <p class="tintuc-bds-text"> <?php echo "$mota"; ?> </p>
            </article>
        </article>

        <?php } ?>

    </section>

    <!-- CỘT PHẢI: TIỆN ÍCH -->
    <aside class="tintuc-bds-right">

      

            <?php include('menu_trai/leftsanpham.php'); ?>


    </aside>

</section>

    