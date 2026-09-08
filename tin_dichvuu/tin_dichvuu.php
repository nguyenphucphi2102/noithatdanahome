
<!--link css-->
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


<section class="page-banner">

    <div class="container">

        <h1 class="page-title" style='color: #0171bb;'>THU MUA MÁY LẠNH CŨ </h1>

        <nav class="breadcrumb">

            <a href="trang-chu" class="breadcrumb-home">
                <i class="themifyicon ti-home"></i> Trang chủ
            </a>

            <span class="sep">/</span>

            <span class="current">Dịch vụ </span>

        </nav>

    </div>

</section>

<!--site-slide start-->

<!-- START SECTION TIN TỨC -->
          <section class="tintuc-vnemico">
          <section class="container">
    <ul class="tintuc-grid">

        <?php
        require('db.php');
        $tv = "SELECT * FROM tin_dichvuu ORDER BY id DESC";
        $tv_1 = mysqli_query($link, $tv);

        while ($row = mysqli_fetch_array($tv_1)) {

            $link_hinh = "HinhCTSP/Hinhdichvu/$row[hinhanh]";
            $tieude = $row['tieude_en'];
            $mota = $row['mota'];
            $url = $row['linkurl'];

            $link = str_replace("?", "", strtolower("dich-vu/$url"));
        ?>

        <li class="tintuc-item">

            <article class="tintuc-card">

                <figure class="tintuc-image">
                    <a href="<?php echo $link; ?>">
                        <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                    </a>
                </figure>

                <section class="tintuc-content">

                    <h3 class="tintuc-name">
                        <a href="<?php echo $link; ?>">
                            <?php echo $tieude; ?>
                        </a>
                    </h3>


                </section>

            </article>

        </li>

        <?php } ?>

    </ul>

</section>

</section>
<!-- END SECTION TIN TỨC -->
