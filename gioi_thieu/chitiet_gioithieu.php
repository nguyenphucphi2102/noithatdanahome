<style>
    /* ==========================================================================
   TỔNG QUAN CONTAINER
   ========================================================================== */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

/* ==========================================================================
   BANNER SLIDE
   ========================================================================== */
.swiper-slide {
  width: 100%;
  overflow: hidden;
}

.banner-item {
  margin: 0;
  width: 100%;
}

.banner-item img {
  width: 100%;
  height: auto;
  object-fit: cover;
  display: block;
}

/* ==========================================================================
   NỘI DUNG GIỚI THIỆU
   ========================================================================== */
.gioithieu {
  padding: 50px 0;
  background-color: #ffffff;
}

.gioithieu-box {
  background: #ffffff;
  padding: 35px;
  border-radius: 12px;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  border: 1px solid #e2e8f0;
}

.gioithieu-title {
  font-size: 2rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 25px;
  text-transform: uppercase;
  position: relative;
  padding-bottom: 12px;
}

.gioithieu-title::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 60px;
  height: 4px;
  background: #2563eb;
  border-radius: 2px;
}

.gioithieu-content {
  font-size: 1.05rem;
  line-height: 1.8;
  color: #334155;
}

.gioithieu-content p {
  margin-bottom: 15px;
}

.gioithieu-content img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 15px 0;
}

/* ==========================================================================
   ĐỐI TÁC TIÊU BIỂU
   ========================================================================== */
.partner-section {
  padding: 60px 0;
  background: #f8fafc;
  border-top: 1px solid #e2e8f0;
  border-bottom: 1px solid #e2e8f0;
}

.partner-header {
  text-align: center;
  margin-bottom: 40px;
}

.partner-title {
  font-size: 1.8rem;
  font-weight: 700;
  color: #0f172a;
  letter-spacing: 1px;
  display: block;
}

.partner-subtitle {
  font-size: 1rem;
  color: #64748b;
  margin-top: 8px;
}

.partner-brand {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 15px;
}

.partner-logos {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
  gap: 20px;
  list-style: none;
  padding: 0;
  margin: 0;
  align-items: center;
}

.partner-item {
  background: #ffffff;
  padding: 15px;
  height: 90px;
  border-radius: 10px;
  border: 1px solid #e2e8f0;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.3s ease;
}

.partner-item:hover {
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
  transform: translateY(-4px);
  border-color: #2563eb;
}

.partner-item img {
  max-width: 100%;
  max-height: 55px;
  object-fit: contain;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: all 0.3s ease;
}

.partner-item:hover img {
  filter: grayscale(0%);
  opacity: 1;
}

/* ==========================================================================
   TIN TỨC CÔNG TY (LAYOUT 2 CỘT)
   ========================================================================== */
.company-news-section {
  padding: 70px 0;
  max-width: 1200px;
  margin: 0 auto;
  padding-left: 15px;
  padding-right: 15px;
}

.company-news-header {
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  margin-bottom: 35px;
}

.company-news-subtitle {
  font-size: 0.85rem;
  font-weight: 700;
  color: #2563eb;
  letter-spacing: 1.5px;
  margin-bottom: 5px;
}

.company-news-title {
  font-size: 2rem;
  font-weight: 700;
  color: #0f172a;
  margin: 0 0 10px 0;
}

.company-news-line {
  display: block;
  width: 50px;
  height: 3px;
  background: #2563eb;
  border-radius: 2px;
}

.company-news-button {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: #2563eb;
  font-weight: 600;
  text-decoration: none;
  transition: gap 0.3s ease;
}

.company-news-button:hover {
  gap: 12px;
  color: #1d4ed8;
}

.company-news-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 30px;
}

/* TIN NỔI BẬT (BÊN TRÁI) */
.company-news-featured {
  background: #ffffff;
  border-radius: 12px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  display: flex;
  flex-direction: column;
}

.company-news-image-link {
  display: block;
  overflow: hidden;
}

.company-news-image {
  margin: 0;
  aspect-ratio: 16/9;
  overflow: hidden;
}

.company-news-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.company-news-featured:hover .company-news-image img {
  transform: scale(1.05);
}

.company-news-featured-content {
  padding: 25px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.company-news-label {
  font-size: 0.8rem;
  font-weight: 700;
  color: #ef4444;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  gap: 5px;
}

.company-news-featured-content h3 {
  font-size: 1.35rem;
  margin-bottom: 12px;
  line-height: 1.4;
}

.company-news-featured-content h3 a {
  color: #0f172a;
  text-decoration: none;
  transition: color 0.3s ease;
}

.company-news-featured-content h3 a:hover {
  color: #2563eb;
}

.company-news-description {
  color: #64748b;
  font-size: 0.95rem;
  line-height: 1.6;
  margin-bottom: 20px;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.company-news-readmore {
  margin-top: auto;
  color: #2563eb;
  font-weight: 600;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: gap 0.3s ease;
}

.company-news-readmore:hover {
  gap: 10px;
}

/* CARD TIN TỨC (GRID 2x2 BÊN PHẢI) */
.company-news-list {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
}

.company-news-card {
  background: #ffffff;
  border-radius: 10px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  display: flex;
  flex-direction: column;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.company-news-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
  border-color: #2563eb;
}

.company-news-card-image {
  aspect-ratio: 16/10;
  overflow: hidden;
  display: block;
}

.company-news-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.company-news-card:hover .company-news-card-image img {
  transform: scale(1.06);
}

.company-news-card-body {
  padding: 15px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.company-news-card-body h3 {
  font-size: 0.95rem;
  line-height: 1.4;
  margin: 0 0 10px 0;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.company-news-card-body h3 a {
  color: #0f172a;
  text-decoration: none;
  transition: color 0.3s ease;
}

.company-news-card-body h3 a:hover {
  color: #2563eb;
}

.company-news-card-readmore {
  margin-top: auto;
  font-size: 0.85rem;
  color: #2563eb;
  font-weight: 600;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 4px;
}

.company-news-footer {
  text-align: center;
  margin-top: 35px;
  display: none;
}

.company-news-viewall {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: #2563eb;
  color: #ffffff;
  padding: 10px 24px;
  border-radius: 20px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s ease;
}

.company-news-viewall:hover {
  background: #1d4ed8;
}

/* ==========================================================================
   RESPONSIVE DESIGN
   ========================================================================== */
@media (max-width: 992px) {
  .company-news-layout {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 576px) {
  .company-news-list {
    grid-template-columns: 1fr;
  }
  
  .company-news-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 15px;
  }
  
  .company-news-footer {
    display: block;
  }
  
  .company-news-button {
    display: none;
  }
  
  .partner-logos {
    grid-template-columns: repeat(2, 1fr);
  }
}
</style>

<!-- BANNER -->
  <?php
            require 'db.php';

            $sql = "SELECT * FROM thuong_mai WHERE id = 7 LIMIT 1";
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
<section class="gioithieu">
<main class="container">

<?php
require('db.php');

// Theo rewrite rule: gioithieu-ve-(.*)-(.*)  →  url=$1&id=$2
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$sql = "SELECT * FROM gioi_thieu WHERE id = $id LIMIT 1";
$row = mysqli_fetch_assoc(mysqli_query($link, $sql));

if ($row):
?>

<article class="gioithieu-box">

    <header>
        <h1 class="gioithieu-title"><?= doikyty($row['tieude']) ?></h1>
    </header>

    <section class="gioithieu-content">
        <?= doikyty($row['noidung']) ?>
    </section>

</article>

<?php endif; ?>

</main>
</section>


<!-- ĐỐI TÁC -->
<!--START SECTION ĐỐI TÁC-->

<!--đối tác khách hàng-->

<!--đối tác khách hàng-->
<!-- LOGO -->
 <section class="partner-section">

    <main class="container">

        <header class="partner-header">
            <span class="partner-title">ĐỐI TÁC - TIÊU BIỂU</span>
            <p class="partner-subtitle">
                Tự hào đồng hành cùng hàng trăm doanh nghiệp, nhà xưởng và công trình trên toàn quốc
            </p>
        </header>

    </main>

  <!-- LOGO -->
<aside class="partner-brand">

    <ul class="partner-logos" id="partnerLogos">

        <?php
        require('db.php');

        $tv = "
        SELECT * 
        FROM (
            SELECT * 
            FROM doi_tac 
            ORDER BY id DESC 
            LIMIT 100
        ) as recent_news
        ORDER BY RAND()
        LIMIT 12
        ";

        $tv_1 = mysqli_query($link, $tv);

        while ($row = mysqli_fetch_array($tv_1)) {

            $link_hinh = "HinhCTSP/$row[hinhanh]";
            $tieude = $row['tieude'];
        ?>

        <li class="partner-item">
            <img 
                src="<?php echo $link_hinh; ?>"
                alt="<?php echo $tieude; ?>"
                loading="lazy"
            >
        </li>

        <?php } ?>

    </ul>

</aside>

</section>

<!--đối tác khách hàng-->

<!--tin tức-->

<!--tin tức-->
<section class="company-news-section">

    <header class="company-news-header">
        <div class="heading-text">
            <p class="company-news-subtitle">CẬP NHẬT MỚI NHẤT</p>

            <h2 class="company-news-title">
                Tin tức công ty
            </h2>

            <span class="company-news-line"></span>
        </div>

        <a href="tin-dienlanhcongnghiep" class="company-news-button">
            Xem tất cả tin tức
            <span>→</span>
        </a>
    </header>


    <div class="company-news-layout">

        <?php
        require('db.php');

        $tv = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 5";

        $tv_1 = mysqli_query($link, $tv);

        $i = 0;

        while ($row = mysqli_fetch_array($tv_1)) {

            $i++;

            $id = $row['id'];

            $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];

            $tieude  = $row['tieude'];
            $linkurl = $row['linkurl'];
            $mota    = $row['mota'];

            $link_bai_viet = "thong-tin-$linkurl-$id";
        ?>


            <?php if ($i == 1) { ?>

                <!-- TIN NỔI BẬT (bên trái) -->

                <article class="company-news-featured">

                    <a href="<?php echo $link_bai_viet; ?>"
                       title="<?php echo htmlspecialchars($tieude); ?>"
                       class="company-news-image-link">

                        <figure class="company-news-image">

                            <img
                                src="<?php echo $link_hinh; ?>"
                                alt="<?php echo htmlspecialchars($tieude); ?>"
                                loading="lazy"
                            >

                        </figure>

                    </a>


                    <section class="company-news-featured-content">

                        <p class="company-news-label">
                            <span>🔥</span> TIN NỔI BẬT
                        </p>

                        <h3>

                            <a href="<?php echo $link_bai_viet; ?>"
                               title="<?php echo htmlspecialchars($tieude); ?>">

                                <?php echo $tieude; ?>

                            </a>

                        </h3>


                        <p class="company-news-description">

                            <?php echo $mota; ?>

                        </p>


                        <a href="<?php echo $link_bai_viet; ?>"
                           class="company-news-readmore">

                            Xem chi tiết
                            <span>→</span>

                        </a>

                    </section>

                </article>

                <div class="company-news-list">

            <?php } else { ?>


                    <!-- TIN DẠNG CARD (grid bên phải) -->

                    <article class="company-news-card">

                        <a href="<?php echo $link_bai_viet; ?>"
                           title="<?php echo htmlspecialchars($tieude); ?>"
                           class="company-news-card-image">

                            <img
                                src="<?php echo $link_hinh; ?>"
                                alt="<?php echo htmlspecialchars($tieude); ?>"
                                loading="lazy"
                            >

                        </a>

                        <div class="company-news-card-body">

                            <h3>
                                <a href="<?php echo $link_bai_viet; ?>"
                                   title="<?php echo htmlspecialchars($tieude); ?>">
                                    <?php echo $tieude; ?>
                                </a>
                            </h3>

                            <a href="<?php echo $link_bai_viet; ?>"
                               class="company-news-card-readmore">

                                Xem thêm
                                <span>→</span>

                            </a>

                        </div>

                    </article>


            <?php } ?>


        <?php } ?>

                </div><!-- .company-news-list -->

    </div><!-- .company-news-layout -->

    <div class="company-news-footer">
        <a href="suamaygiat-binhduong" class="company-news-viewall">
            Xem tất cả tin tức
            <span>→</span>
        </a>
    </div>

</section>



               <?php

include('lien_he/lien_hetc.php');

?>

<!--tin tức-->