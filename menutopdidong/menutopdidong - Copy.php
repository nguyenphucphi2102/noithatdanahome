
<link rel="stylesheet" href="sitebds/css/menu.css"> 







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
                <img src="hinhmenu/logo.png" alt="Điện lạnh TẤN TÀI">
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
                    <a href="gioi-thieu/mua-ban-may-lanh-cu-gia-cao">Giới thiệu</a>
                </li>
                

                

               
				
				   <!-- NEWS -->
               <li class="menuatv-li menuatv-has-sub">
                    <a href="catalogue-tan-tai.pdf">Điện lạnh dân dụng</a>
                    
                </li> 
                 <!-- ================= Điện lạnh công nghiệp================= -->
                  <li class="menuatv-li menuatv-has-sub">

                    <a href="dich-vu-may-lanh-hcm">
                       Điện lạnh công nghiệp
                        <span class="menuatv-arrow">▼</span>
                    </a>

                    <ul class="menuatv-submenu">

                         <?php
                $tv1 = "select * from loai_tin_dichvuu order by id ASC ";
                $tv_11 = mysqli_query($link, $tv1);
                while ($tv_21 = mysqli_fetch_array($tv_11)) {
                    $id = "$tv_21[id]";
                    $thuocloai = "$tv_21[thuocloai]";
                    $name_url = strtolower("$tv_21[name_url]");
                    ?>
                    <li class="menuatv-sub-li">
					<a style="color:#9f5050"
                            href="cung-cap/<?php echo $tv_21['name_url']; ?>"><?php echo $thuocloai; ?></a>
                    </li>
                <?php } ?>

                    </ul>

                </li>
                <!-- =================Mua Bán MÁY LẠNH ================= -->
                <li class="menuatv-li menuatv-has-sub">

                    <a href="mua-ban-may-lanh-cu-hcm">
                        Mua bán máy lạnh 
                        <span class="menuatv-arrow">▼</span>
                    </a>

                   <ul class="menuatv-submenu">

                         <?php
                $tv1 = "select * from loai_ma_sanpham order by id ASC ";
                $tv_11 = mysqli_query($link, $tv1);
                while ($tv_21 = mysqli_fetch_array($tv_11)) {
                    $id = "$tv_21[id]";
                    $thuocloai = "$tv_21[thuocloai]";
                    $name_url = strtolower("$tv_21[name_url]");
                    ?>
                    <li class="menuatv-sub-li">
					<a style="color:#9f5050"
                            href="danh-muc/<?php echo $tv_21['name_url']; ?>"><?php echo $thuocloai; ?></a>
                    </li>
                <?php } ?>

                    </ul>

                </li>
				
				
                <!-- NEWS -->
				
				 <li class="menuatv-li">
                    <a href="dienlanh-binhduong">Dịch vụ</a>
                </li>
				 <li class="menuatv-li">
                    <a href="maylanh-congnghiep">công nghiệp</a>
                </li>
				
                <li class="menuatv-li">
                    <a href="tin-dienlanhcongnghiep">Tin tức</a>
                </li>

                <!-- CONTACT -->
                <li class="menuatv-li">
                    <a href="lien-he">Liên hệ</a>
                </li>

            </ul>

        </nav>

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

        <li class="menuatv-mobile-has">

            <a href="#">
                Dịch vụ <span>+</span>
            </a>

            <ul>

                <?php
                $tv1 = "SELECT * FROM loai_tin_dichvuu ORDER BY id DESC";
                $tv_11 = mysqli_query($link, $tv1);

                while($tv_21 = mysqli_fetch_array($tv_11)){
                ?>

                <li>
                    <a href="dich-vu/<?php echo $tv_21['linkurl']; ?>">
                        <?php echo $tv_21['thuocloai']; ?>
                    </a>
                </li>

                <?php } ?>

            </ul>

        </li>

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
