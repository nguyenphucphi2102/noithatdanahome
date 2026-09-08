
<!--link css-->

<link rel="stylesheet" href="sitebds/css/css_chitiettintuc.css">

<style>
.br + br {
  display: none; /* Ẩn các thẻ <br> liền nhau (dòng trống thừa) */
}
.img {
  display: inline-block;
  max-width: 100%;
  height: auto;
}

/* Ẩn các ảnh bị lỗi không tải được */
.img:not([src]), 
.img[src=""], 
.img[src=" "], 
.img[src="#"], 
.img[src="null"], 
.img[src="undefined"], 
.img:empty {
  display: none !important;
  visibility: hidden;
}

/* Ẩn luôn khoảng trống ảnh lỗi */
.img[onerror], img.broken {
  display: none !important;
}
/* Section title */
    .section-title {
        text-align: left;
        margin: 50px 0;
        position: relative;
    }

    .section-title h2 {
        font-size: 25px;
        position: relative;
        z-index: 2;
    }

    .section-title .bg-text {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        font-size: 90px;
        color: rgba(0, 0, 0, 0.07);
        font-weight: bold;
        letter-spacing: 10px;
        white-space: nowrap;
        pointer-events: none;
    }
  #particles-js {
    width: 100%;
    height: 230px;
    background-color: #004a70; /* Màu nền xanh đậm như trong ảnh */
    position: relative;
  }

  .title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #9cd3e6;
    font-size: 28px;
    font-family: 'Segoe UI', sans-serif;
    font-weight: bold;
    width: 83%;
    text-align: center;
    line-height: 48px;
  }
</style>

<section id="particles-js"> 
<section class="container">
 <header class="title"> 
<h1 class="page-title"> MÁY LẠNH CŨ GIÁ CAO </h1> 
<nav class="breadcrumb"> 
<a href="trang-chu" class="breadcrumb-home"> 
<i class="themifyicon ti-home"></i> Trang Chủ </a> 
<span class="sep">/</span> 
<span class="current"> Tin tức </span> 
</nav> 
</header> 
</section> 
</section>

<!-- Thu vi?n Particles.js -->
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script>
particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 80,
      "density": { "enable": true, "value_area": 800 }
    },
    "color": { "value": "#ffffff" },
    "shape": {
      "type": "circle",
      "stroke": { "width": 0, "color": "#000000" }
    },
    "opacity": {
      "value": 0.5,
      "random": false
    },
    "size": {
      "value": 3,
      "random": true
    },
    "line_linked": {
      "enable": true,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 2,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "out"
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": { "enable": true, "mode": "repulse" },
      "onclick": { "enable": true, "mode": "push" }
    },
    "modes": {
      "repulse": { "distance": 100, "duration": 0.4 },
      "push": { "particles_nb": 4 }
    }
  },
  "retina_detect": true
});
</script>

<!--site-slide start-->

<!-- START SECTION TIN TỨC -->
          <section class="tintuc-vnemico">

    <ul class="tintuc-grid">

        <?php
        require('db.php');
        $tv = "SELECT * FROM tin_sanpham ORDER BY id DESC limit 0, 12";
        $tv_1 = mysqli_query($link, $tv);

        while ($row = mysqli_fetch_array($tv_1)) {

            $link_hinh = "HinhCTSP/Hinhdichvu/$row[hinhanh]";
            $tieude = $row['tieude_en'];
            $mota = $row['mota'];
            $linkurl = $row['linkurl'];

            $link = "thong-tin-$linkurl-$id";
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


<!-- END SECTION TIN TỨC -->
