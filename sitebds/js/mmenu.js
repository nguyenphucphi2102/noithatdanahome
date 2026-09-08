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