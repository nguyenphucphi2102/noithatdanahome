
<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">

<style>
    .product-page-shell {
        background: linear-gradient(180deg, #f7f3ee 0%, #f4efe7 100%);
        color: #2d221d;
        padding: 0 0 90px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-hero {
        position: relative;
        overflow: hidden;
        background: url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
        padding: 110px 0 90px;
    }

    .product-hero::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(90deg, rgba(24, 18, 14, 0.78), rgba(31, 23, 18, 0.5));
    }

    .product-hero .container {
        position: relative;
        z-index: 1;
    }

    .product-hero__inner {
        display: grid;
        grid-template-columns: 1.4fr 0.9fr;
        gap: 32px;
        align-items: center;
    }

    .product-hero__eyebrow {
        display: inline-block;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #e9c38d;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .product-hero h1 {
        font-size: clamp(32px, 4vw, 60px);
        line-height: 1.08;
        letter-spacing: -0.04em;
        color: #fff;
        margin: 0 0 18px;
        font-weight: 700;
    }

    .product-hero p {
        color: rgba(255,255,255,0.85);
        font-size: 18px;
        line-height: 1.8;
        max-width: 640px;
        margin: 0 0 28px;
    }

    .product-hero__actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
        align-items: center;
    }

    .product-hero__btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 14px 26px;
        border-radius: 999px;
        font-weight: 700;
        text-decoration: none;
        transition: all .25s ease;
    }

    .product-hero__btn--primary {
        background: #d6ae76;
        color: #201814;
        box-shadow: 0 10px 25px rgba(214, 174, 118, 0.25);
    }

    .product-hero__btn--secondary {
        border: 1px solid rgba(255,255,255,0.55);
        color: #fff;
        background: rgba(255,255,255,0.04);
    }

    .product-hero__btn:hover {
        transform: translateY(-1px);
        opacity: 0.96;
    }

    .product-hero__card {
        background: rgba(255,255,255,0.08);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 18px 45px rgba(0,0,0,0.18);
    }

    .product-hero__card img {
        width: 100%;
        height: 420px;
        display: block;
        object-fit: cover;
    }

    .product-hero__card-body {
        background: rgba(18, 14, 11, 0.38);
        padding: 18px 20px 20px;
        color: #fff;
    }

    .product-hero__card-body span {
        display: inline-block;
        color: #e9c38d;
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .product-hero__card-body h3 {
        margin: 0;
        font-size: 24px;
        line-height: 1.3;
    }

    .product-showcase {
        position: relative;
        margin-top: -24px;
        z-index: 2;
    }

    .product-showcase .container {
        max-width: 1220px;
    }

    .section-heading {
        text-align: center;
        margin-bottom: 34px;
    }

    .section-heading .sub-title {
        display: inline-block;
        color: #b98a54;
        letter-spacing: 3px;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .section-heading h2 {
        color: #201814;
        font-size: clamp(28px, 3vw, 42px);
        margin: 0;
        letter-spacing: -0.04em;
        font-weight: 700;
    }

    .heading-underline {
        display: inline-block;
        width: 110px;
        height: 3px;
        background: linear-gradient(90deg, #bf9068, #d8b27a);
        border-radius: 999px;
        margin-top: 18px;
    }

    .product-grid {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 28px;
    }

    .tintuc-item {
        list-style: none;
    }

    .tintuc-card {
        background: #fff;
        border: 1px solid rgba(56, 43, 36, 0.08);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 16px 35px rgba(45, 34, 29, 0.06);
        transition: transform .25s ease, box-shadow .25s ease;
        height: 100%;
    }

    .tintuc-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 22px 45px rgba(45, 34, 29, 0.12);
    }

    .tintuc-image {
        position: relative;
        margin: 0;
        height: 280px;
        overflow: hidden;
    }

    .tintuc-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }

    .tintuc-card:hover .tintuc-image img {
        transform: scale(1.04);
    }

    .tintuc-content {
        padding: 20px 22px 24px;
    }

    .tintuc-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        color: #8e735a;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .tintuc-meta .dot {
        width: 6px;
        height: 6px;
        background: #d6ae76;
        border-radius: 50%;
        display: inline-block;
        margin: 0 8px;
    }

    .tintuc-name {
        margin: 0 0 12px;
        font-size: 22px;
        line-height: 1.4;
        font-weight: 700;
    }

    .tintuc-name a {
        color: #211915;
        text-decoration: none;
        transition: color .2s ease;
    }

    .tintuc-name a:hover {
        color: #b98a54;
    }

    .tintuc-desc {
        color: #5f514b;
        font-size: 15px;
        line-height: 1.75;
        margin: 0;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .tintuc-readmore {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        color: #8d5f2f;
        text-decoration: none;
        font-weight: 700;
    }

    .tintuc-readmore i {
        transition: transform .2s ease;
    }

    .tintuc-readmore:hover i {
        transform: translateX(3px);
    }

    .reveal-fade {
        opacity: 0;
        transform: translateY(18px);
        transition: opacity .6s ease, transform .6s ease;
    }

    .reveal-fade.visible {
        opacity: 1;
        transform: translateY(0);
    }

    @media (max-width: 991px) {
        .product-hero__inner {
            grid-template-columns: 1fr;
        }

        .product-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 640px) {
        .product-hero {
            padding-top: 90px;
        }

        .product-grid {
            grid-template-columns: 1fr;
        }

        .product-hero__card img {
            height: 300px;
        }
    }
</style>

<section class="product-page-shell">
    <section class="product-hero">
        <div class="container">
            <div class="product-hero__inner">
                <div>
                    <span class="product-hero__eyebrow">DanaHome Projects</span>
                    <h1>Mẫu Thiết Kế Nội Thất Nổi Bật</h1>
                    <p>
                        Khám phá các không gian sống đẹp, hiện đại và tối ưu công năng từ phong cách tối giản,
                        cổ điển đến sang trọng, được thiết kế theo từng nhu cầu thực tế của gia đình bạn.
                    </p>
                    <div class="product-hero__actions">
                        <a href="lien-he" class="product-hero__btn product-hero__btn--primary">Gọi tư vấn</a>
                        <a href="du-an-noi-that" class="product-hero__btn product-hero__btn--secondary">Xem dự án</a>
                    </div>
                </div>

               

                <div class="product-hero__card">
                    <img src="hinhmenu/banner_mau.png" alt="hình ảnh nội thất">
                    <div class="product-hero__card-body">
                        <span>Featured</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-showcase">
        <div class="container">
            <div class="section-heading reveal-fade">
                <span class="sub-title">Bộ sưu tập</span>
                <h2>Thiết kế theo từng phong cách</h2>
                <span class="heading-underline"></span>
            </div>

            <ul class="product-grid">
                <?php
                require('db.php');
                $tv = "SELECT * FROM tin_sanpham ORDER BY id DESC LIMIT 9";
                $tv_1 = mysqli_query($link, $tv);

                if ($tv_1 && mysqli_num_rows($tv_1) > 0) {
                    while ($row = mysqli_fetch_array($tv_1)) {
                        $id = (int) $row['id'];
                        $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
                        $tieude = htmlspecialchars($row['tieude']);
                        $mota = isset($row['mota']) ? htmlspecialchars($row['mota']) : '';
                        $linkurl = isset($row['linkurl']) ? $row['linkurl'] : '';
                        $link = "danh-muc-san-pham-" . $linkurl . "-" . $id;
                ?>
                    <li class="tintuc-item reveal-fade">
                        <article class="tintuc-card">
                            <figure class="tintuc-image">
                                <a href="<?php echo $link; ?>">
                                    <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
                                </a>
                            </figure>
                            <div class="tintuc-content">
                                <div class="tintuc-meta">
                                    <span>Dự án</span>
                                    <span><i class="fa fa-circle dot"></i> DanaHome</span>
                                </div>
                                <h3 class="tintuc-name">
                                    <a href="<?php echo $link; ?>"><?php echo $tieude; ?></a>
                                </h3>
                                <p class="tintuc-desc"><?php echo $mota; ?></p>
                                <a href="<?php echo $link; ?>" class="tintuc-readmore">
                                    Xem chi tiết <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </article>
                    </li>
                <?php
                    }
                } else {
                    echo '<li class="text-center w-100" style="list-style:none; padding:30px 0; color:#5f514b;">Chưa có sản phẩm nào.</li>';
                }
                ?>
            </ul>
        </div>
    </section>
</section>

<script>
(function () {
    const revealEls = document.querySelectorAll('.reveal-fade');
    if (!revealEls.length) return;

    const revealObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

    revealEls.forEach((el, index) => {
        const delay = Number(el.dataset.delay || index * 0.08);
        el.style.transitionDelay = delay + 's';
        revealObserver.observe(el);
    });
})();
</script>

