
<!--link css-->

<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">
<link rel="stylesheet" href="sitebds/css/css_dichvu_page.css">


<!--site-slide start-->

<section class="service-intro">
    <div class="service-intro__pattern"></div>
    <div class="service-container service-intro__inner">
        <div>
            <p class="service-eyebrow">DANAHOME / GIẢI PHÁP TRỌN GÓI</p>
            <h1>Thiết kế để sống.<br><em>Thi công để bền lâu.</em></h1>
            <p class="service-intro__text">Từ ý tưởng ban đầu đến ngày bàn giao, DanaHome đồng hành cùng bạn bằng một quy trình rõ ràng và giải pháp vừa đẹp vừa phù hợp với đời sống.</p>
            <a class="service-primary-btn" href="lien-he">Nhận tư vấn miễn phí <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="service-intro__number"><strong>01</strong><span>Ý tưởng<br>thành không gian</span></div>
    </div>
</section>

<section class="service-highlights">
    <div class="service-container service-highlights__grid">
        <div><i class="fa-solid fa-compass-drafting"></i><span><b>Đúng nhu cầu</b><small>Giải pháp theo nếp sống và ngân sách</small></span></div>
        <div><i class="fa-solid fa-ruler-combined"></i><span><b>Đúng tiến độ</b><small>Quy trình minh bạch từng giai đoạn</small></span></div>
        <div><i class="fa-solid fa-shield-heart"></i><span><b>Đúng cam kết</b><small>Đồng hành đến sau khi bàn giao</small></span></div>
    </div>
</section>

<!-- START SECTION TIN TỨC -->
<section class="tintuc-vnemico">

    <ul class="tintuc-grid">

        <?php
        require('db.php');
        $tv = "SELECT * FROM tin_dichvu ORDER BY id desc limit 6";
        $tv_1 = mysqli_query($link, $tv);

        while ($row = mysqli_fetch_array($tv_1)) {
            $id = $row['id']; // PHẢI CÓ DÒNG NÀY
            $link_hinh = "HinhCTSP/Hinhdichvu/$row[hinhanh]";
            $tieude = $row['tieude'];
            $mota = $row['mota'];
            $linkurl = $row['linkurl'];

            $link = "dich-vu-$linkurl-$id";
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

<section class="service-process">
    <div class="service-container">
        <div class="service-process__heading"><p class="service-eyebrow">CÁCH CHÚNG TÔI LÀM VIỆC</p><h2>Một quy trình gọn gàng,<br>một trải nghiệm nhẹ nhàng.</h2></div>
        <div class="service-process__grid">
            <article><span>01</span><h3>Lắng nghe</h3><p>Tiếp nhận nhu cầu, khảo sát hiện trạng và thống nhất mục tiêu công trình.</p></article>
            <article><span>02</span><h3>Kiến tạo</h3><p>Phát triển ý tưởng, bản vẽ và dự toán để bạn dễ hình dung và quyết định.</p></article>
            <article><span>03</span><h3>Hoàn thiện</h3><p>Thi công chỉn chu, kiểm tra từng chi tiết và bàn giao đúng cam kết.</p></article>
        </div>
    </div>
</section>

<section class="service-cta">
    <div class="service-container service-cta__inner"><div><p class="service-eyebrow">BẠN ĐÃ SẴN SÀNG BẮT ĐẦU?</p><h2>Hãy kể chúng tôi nghe<br>về không gian bạn mong muốn.</h2></div><a class="service-primary-btn" href="lien-he">Trao đổi cùng DanaHome <i class="fa-solid fa-arrow-right"></i></a></div>
</section>
