
<link rel="stylesheet" href="sitebds/css/cssdichvu.css">
  <?php
            require 'db.php';

            $sql = "SELECT * FROM thuong_mai WHERE id = 6 LIMIT 1";
            $result = mysqli_query($link, $sql);

            while($row = mysqli_fetch_assoc($result)) :

                $image = "HinhCTSP/" . $row['hinhanh'];
                $title = $row['tieude'];
            ?>

            <article class="swiper-slide">

                <figure class="banner-item">

                    <img src="<?= $image; ?>"
                         alt="<?= $title; ?>"
                         loading="lazy" style='width: 100%;'>

                </figure>

            </article>

            <?php endwhile; ?>


<?php
include('phantrang/phantrang_dichvu.php');
?>

<section class="headings">

    <header class="text-heading text-center container">

        <?php
        require('db.php');

        $did = $_GET["url"];

        $tv = "SELECT * FROM loai_tin_dichvuu 
               WHERE name_url='" . $_GET['url'] . "' 
               ORDER BY id";

        $tv_1 = mysqli_query($link, $tv);

        $tv_2 = mysqli_fetch_array($tv_1);

        $id  = $tv_2['id'];

        $ten = $tv_2['thuocloai'];
        ?>

        <h1 class="tieudedichvu">
            <?php echo ucwords($ten); ?>
        </h1>

        <nav class="breadcrumb">
            <a href="trangchu">Trang chủ</a>
            <span>/</span>
            <h2 style='font-size: 14px; padding: 2px; padding-top: 11px;'>Dịch vụ máy lạnh HCM </h2>
        </nav>

    </header>

</section>


<section class="blog-section">

    <main class="container">

        <section class="news-wrap row">

            <?php

            require('db.php');

            $limit = 12;

            $p = new pager;

            $start = $p->findStart($limit);

            $stmt = $link->prepare("
                SELECT COUNT(*) 
                FROM tin_dichvuu 
                WHERE thuocloai = ?
            ");

            $stmt->bind_param('i', $id);

            $stmt->execute();

            $stmt->bind_result($count);

            $stmt->fetch();

            $stmt->close();

            $pages = $p->findPages($count, $limit);

            $stmt = $link->prepare("
                SELECT * 
                FROM tin_dichvuu 
                WHERE thuocloai = ?
                ORDER BY id ASC
                LIMIT ?, ?
            ");

            $stmt->bind_param('iii', $id, $start, $limit);

            $stmt->execute();

            $result = $stmt->get_result();

            while ($row = $result->fetch_object()) {

                $tieude     = htmlspecialchars($row->tieude, ENT_QUOTES, 'UTF-8');

                $tieude_en  = htmlspecialchars($row->tieude_en, ENT_QUOTES, 'UTF-8');

                $mota       = htmlspecialchars($row->mota, ENT_QUOTES, 'UTF-8');

                $link_hinh  = "HinhCTSP/Hinhdichvu/" . htmlspecialchars($row->hinhanh, ENT_QUOTES, 'UTF-8');

                $url        = htmlspecialchars($row->linkurl, ENT_QUOTES, 'UTF-8');

                $linkpost   = strtolower("dich-vu/$url");
            ?>

            <article class="news-item">

    <a href="<?php echo $linkpost; ?>" class="news-img-link">

        <figure class="img-box">

            <img
                src="<?php echo $link_hinh; ?>"
                alt="<?php echo $tieude_en; ?>"
                loading="lazy"
            >

        </figure>

    </a>

    <header class="news-item-text">

        <h3 class="title-tintuc">

            <a href="<?php echo $linkpost; ?>">
                <?php echo $tieude_en; ?>
            </a>

        </h3>

    </header>

</article>

            <?php } ?>

        </section>

    </main>

</section>
