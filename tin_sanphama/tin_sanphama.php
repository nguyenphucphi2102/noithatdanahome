<!--link css-->
<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">
<link rel="stylesheet" href="sitebds/css/trangchu.css">



<!-- ================= SECTION TIÊU CHÍ AN TOÀN & BỀN VỮNG ================= -->
<section class="home-criteria section-padding">
    <div class="criteria-container">
        <div class="criteria-wrapper">
            <!-- Ảnh công trình bên trái -->
            <div class="criteria-left reveal">
                <div class="criteria-img-wrapper">
                    <img src="hinhmenu/about-2.png" alt="Quy trình thiết kế và thi công Danahome">
                </div>
            </div>

            <!-- Nội dung giới thiệu bên phải -->
            <div class="criteria-right reveal">
                <span class="badge-tag">QUY TRÌNH LÀM VIỆC CỦA DANAHOME</span>
                <h2 class="criteria-title">Tiêu chí an toàn và bền vững</h2>
                <p class="criteria-desc">
                    DaNaHome cung cấp giải pháp thiết kế và thi công nội thất trọn gói cho căn hộ, nhà phố, biệt thự và văn phòng. Chúng tôi mang đến không gian sống hiện đại, tối ưu công năng, sử dụng vật liệu an toàn, thân thiện với môi trường và nâng tầm phong cách sống cho gia đình bạn.
                </p>

                <!-- Khối Video + Checklist -->
                <div class="criteria-box-wrapper">
                    <div class="video-thumb-box">
                        <img src="HinhCTSP/Hinhdichvu/banner-side-1.avif" alt="Video quy trình thi công">
                        <a href="https://www.youtube.com/watch?v=YOUR_VIDEO_ID" class="play-btn-overlay" target="_blank">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                    <ul class="criteria-list">
                        <li><i class="fa fa-check"></i> Đảm bảo tiêu chuẩn chất lượng & thẩm mỹ</li>
                        <li><i class="fa fa-check"></i> Sử dụng vật liệu gỗ cao cấp, an toàn</li>
                        <li><i class="fa fa-check"></i> Tối ưu hóa không gian & công năng sử dụng</li>
                        <li><i class="fa fa-check"></i> Thi công chuẩn tiến độ, bảo hành tận tâm</li>
                    </ul>
                </div>

                <!-- Nút Liên hệ & Hotline -->
                <div class="criteria-cta-group">
                    <a href="lien-he" class="btn-cta-red">Liên hệ ngay</a>
                    <div class="phone-contact-item">
                        <div class="icon-circle">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="phone-text">
                            <span>Tư vấn nội thất?</span>
                            <a href="tel:0914454348" class="phone-number">(+84) 0914-454-348</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- START SECTION SẢN PHẨM NỘI THẤT -->
<section class="tintuc-vnemico">
  <h2 style="text-align: center; padding: 20px 0px" >DỰ ÁN CỦA CHÚNG TÔI
Khám phá danh mục dự án ấn tượng</h2>
    <ul class="tintuc-grid">
     <?php
      require('db.php');
      $tv = "SELECT * FROM tin_sanphama ORDER BY id DESC limit 9 ";
      $tv_1 = mysqli_query($link, $tv);

      while ($row = mysqli_fetch_array($tv_1)) {
          $id = $row['id'];
          $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
          $tieude = $row['tieude'];
          $linkurl = $row['linkurl'];
          $mota = $row['mota'];
          $link = "tin-san-pham-$linkurl-$id";
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
                    <p class="tintuc-desc">
                        <?php echo $mota; ?>
                    </p>
                </section>
            </article>
        </li>
      <?php } ?>
    </ul>
</section>

<script>
(function () {
  "use strict";
  const revealEls = document.querySelectorAll(".reveal");
  if (revealEls.length) {
    let revealCounter = 0;
    revealEls.forEach((el) => {
      const uniqueId = "rv-" + revealCounter++;
      el.setAttribute("data-reveal-id", uniqueId);
    });

    const revealIO = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          const uniqueId = entry.target.getAttribute("data-reveal-id");
          if (entry.intersectionRatio > 0.15) {
            entry.target.classList.add("revealed-" + uniqueId);
          } else if (entry.intersectionRatio === 0) {
            entry.target.classList.remove("revealed-" + uniqueId);
          }
        });
      },
      { threshold: [0, 0.15] }
    );
    revealEls.forEach((el) => revealIO.observe(el));
  }
})();
</script>