
<link rel="stylesheet" href="css/css_side.css">

<section class="banner-slider">

    <section class="swiper mySwiper" aria-label="Banner quảng cáo">

        <section class="swiper-wrapper">

            <?php
            require 'db.php';

            $sql = "SELECT * FROM thuong_mai ORDER BY id ASC LIMIT 5";
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

        </section>

    </section>

</section>


<!-- Swiper JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        effect: "coverflow",
        speed: 1500,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false,
        },
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>