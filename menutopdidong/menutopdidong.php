
<link rel="stylesheet" href="sitebds/css/menu.css"> 

<!-- =========================
     TOP BAR (Trên header)
========================= -->
<section id="topbar-atv">
    <section class="topbar-container">
 
        <ul class="topbar-left">
            <li>
                <span class="icon-wrap"><i class="fa-regular fa-clock"></i></span>
                Hotline: <strong>0914 454 348</strong>
            </li>
        </ul>
 
        <ul class="topbar-right">
            <li>
                <a href="mailto:info@dienlanhtantai.com">
                    <i class="fa-regular fa-envelope"></i>
                    Kinhdoanhatv@gmail.com
                </a>
            </li>
            <li class="topbar-social">
                <a href="#" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" target="_blank" aria-label="Youtube"><i class="fa-brands fa-youtube"></i></a>
                <a href="#" target="_blank" aria-label="Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" target="_blank">Zalo</a>
            </li>
        </ul>
 
    </section>
</section>





<!-- FORM TƯ VẤN -->




<!-- =========================
     MENU ATV FULL
========================= -->



<!-- =========================
     HEADER
========================= -->

<header id="menuatv-header">

    <section class="menuatv-container">

        <!-- ================= LOGO ================= -->
        <section class="menuatv-logo">
            <a href="trang-chu">
                <img src="hinhmenu/logodanahome.png" alt="in thẻ chip">
            </a>
        </section>

        <!-- ================= DESKTOP MENU ================= -->
        <nav class="menuatv-nav">

            <ul class="menuatv-ul">

                <!-- HOME -->
                <li class="menuatv-li">
                    <a href="trang-chu">Trang chủ</a>
                </li>
                
				  <li class="menuatv-li">
                    <a href="gioithieu-thietke-noithat">Giới thiệu</a>
                </li>

                <li class="menuatv-li menuatv-has-sub">

                    <a href="sanphaminan-thechip">
                      Dự án
                        <span class="menuatv-arrow">▼</span>
                    </a>

                    <ul class="menuatv-submenu">

                         <?php
                        $tv1 = "select * from loai_tin_sanphama order by id DESC ";
                        $tv_11 = mysqli_query($link, $tv1);
                        while ($tv_21 = mysqli_fetch_array($tv_11)) {
                            $id        = $tv_21['id'];
                            $thuocloai = $tv_21['thuocloai'];
                            $linkurl   = strtolower($tv_21['linkurl']);
                            ?>
                            <li class="menuatv-sub-li">
                                <a style="color:#222222" href="cung-cap/<?php echo $linkurl; ?>">
                                    <?php echo $thuocloai; ?>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>

                </li>

                
                

               


              
                

                


                 <li class="menuatv-li menuatv-has-sub">

                    <a href="dichvu-inthe">
                      Dịch vụ
                        <span class="menuatv-arrow">▼</span>
                    </a>

                    <ul class="menuatv-submenu">

                                        <?php
                        $sql = "SELECT id, tieude, linkurl FROM tin_dichvu ORDER BY id ASC";
                        $result = mysqli_query($link, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <li>
                                <a href="dich-vu-<?php echo $row['linkurl']; ?>-<?php echo $row['id']; ?>">
                                    <?php echo htmlspecialchars($row['tieude']); ?>
                                </a>
                            </li>
                        <?php } ?>

                    </ul>

                </li>

					 
                <li class="menuatv-li">
                    <a href="tintuc-inanthechip">Tin tức</a>
                </li>

                <li class="menuatv-li">
                    <a href="lien-he">Liên hệ</a>
                </li>

                

            </ul>
            

        </nav>
        <div class="menuatv-hotline">
            <div class="hotline-icon">
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="hotline-text">
                <span class="hotline-label">Hotline</span>
                <a href="tel:0914454348" class="hotline-number">(+84) 0914-454-348</a>
            </div>
        </div>

        <!-- ================= MOBILE BUTTON ================= -->
        <section class="menuatv-toggle">
            ☰
        </section>

    </section>

</header>

<!-- ================= MOBILE MENU ================= -->
<section class="menuatv-mobile">

    <section class="menuatv-close">×</section>

    <ul class="menuatv-mobile-ul">

        <li><a href="trang-chu">Trang chủ</a></li>

        <li><a href="gioithieu-thietke-noithat">Giới thiệu</a></li>
        
        <li><a href="sanphaminan-thechip">Dự án</a></li>

        <li><a href="dichvu-inthe">  Dịch vụ </a></li>
        
        <li><a href="tintuc-inanthechip">Tin tức</a></li>

        <li><a href="lien-he">Liên hệ</a></li>

    </ul>

</section>

<!-- OVERLAY -->

<section class="menuatv-overlay"></section>

<!-- =========================
     JS
========================= -->




<script>
// ===== placeholder chạy chữ =====
const input = document.getElementById("searchInput");

const texts = [
  "Bạn muốn tìm sản phẩm nào...",
  "Máy lạnh công nghiệp...",
  "Dịch vụ điện lạnh...",
  "Sửa máy giặt, tủ lạnh..."
];

let i = 0;

setInterval(() => {
  input.placeholder = texts[i];
  i = (i + 1) % texts.length;
}, 2000);


// ===== MODAL =====
const scheduleBtn = document.getElementById("scheduleBtn");
const consultBtn = document.getElementById("consultBtn");

const scheduleModal = document.getElementById("scheduleModal");
const consultModal = document.getElementById("consultModal");

// open
scheduleBtn.onclick = () => {
  scheduleModal.style.display = "flex";
};

consultBtn.onclick = () => {
  consultModal.style.display = "flex";
};

// close all modal
document.querySelectorAll(".close").forEach(btn => {
  btn.onclick = () => {
    scheduleModal.style.display = "none";
    consultModal.style.display = "none";
  };
});

// click outside close
window.onclick = (e) => {
  if (e.target === scheduleModal) scheduleModal.style.display = "none";
  if (e.target === consultModal) consultModal.style.display = "none";
};

</script>


<script>

/* MOBILE */

const menuToggle = document.querySelector(".menuatv-toggle");
const mobileMenu = document.querySelector(".menuatv-mobile");
const menuClose = document.querySelector(".menuatv-close");
const overlay = document.querySelector(".menuatv-overlay");

/* OPEN */

menuToggle.onclick = () => {

    mobileMenu.classList.add("active");

    overlay.classList.add("active");

};

/* CLOSE */

menuClose.onclick = () => {

    mobileMenu.classList.remove("active");

    overlay.classList.remove("active");

};

overlay.onclick = () => {

    mobileMenu.classList.remove("active");

    overlay.classList.remove("active");

};

/* MOBILE SUBMENU */

document.querySelectorAll(".menu-mobile-has > a").forEach(item => {

    item.addEventListener("click", function(e){

        e.preventDefault();

        this.parentElement.classList.toggle("active");

    });

});

/* HEADER SCROLL */

window.addEventListener("scroll", function(){

    const header = document.getElementById("menuatv-header");

    if(window.scrollY > 50){

        header.classList.add("menu-scroll");

    }else{

        header.classList.remove("menu-scroll");

    }

});

</script>
