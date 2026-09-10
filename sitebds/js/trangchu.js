document.addEventListener("DOMContentLoaded", function () {
  // ========== 1. Đồng bộ chiều cao Header -> CSS Variable cho Hero Banner ==========
  const siteHeader = document.querySelector(
    ".header.header-clean, header.header",
  );

  function syncHeroViewportHeight() {
    const headerHeight = siteHeader ? siteHeader.offsetHeight : 0;
    document.documentElement.style.setProperty(
      "--home-header-height",
      `${headerHeight}px`,
    );
  }

  syncHeroViewportHeight();
  window.addEventListener("resize", syncHeroViewportHeight);

  // ========== 2. Tab "Bảng Giá & Dịch Vụ" (Đã cô lập phạm vi) ==========
  const pricingSection = document.querySelector(".pricing-tabs-section");
  if (pricingSection) {
    const pricingTabButtons =
      pricingSection.querySelectorAll(".tab-btn[data-tab]");
    const pricingPanels = pricingSection.querySelectorAll(".tab-panel");

    pricingTabButtons.forEach((button) => {
      button.addEventListener("click", function () {
        const targetTab = this.getAttribute("data-tab");

        pricingTabButtons.forEach((btn) => btn.classList.remove("active"));
        pricingPanels.forEach((panel) => panel.classList.remove("active"));

        this.classList.add("active");
        const activePanel = pricingSection.querySelector(`#${targetTab}`);
        if (activePanel) {
          activePanel.classList.add("active");
        }
      });
    });
  }

  // ========== 3. Hiệu ứng cuộn trang (Scroll Reveal) ==========
  const revealElements = document.querySelectorAll(
    ".reveal, .reveal-fade, .reveal-right, .reveal-left",
  );

  if (revealElements.length) {
    const revealObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("reveal-active");
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.12,
        rootMargin: "0px 0px -8% 0px",
      },
    );

    revealElements.forEach((el, index) => {
      const delay = Number(el.dataset.delay || index * 0.04);
      el.style.transitionDelay = `${delay}s`;
      revealObserver.observe(el);
    });
  }

  // ========== 4. Tự động phát Video YouTube khi cuộn tới ==========
  const videoFrame = document.getElementById("videoPlayerFrame");
  if (videoFrame) {
    let hasPlayed = false;
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting && !hasPlayed) {
            let currentSrc = videoFrame.src;
            const separator = currentSrc.includes("?") ? "&" : "?";
            videoFrame.src = `${currentSrc}${separator}autoplay=1&mute=1&loop=1`;
            hasPlayed = true;
          }
        });
      },
      { threshold: 0.5 },
    );

    observer.observe(videoFrame);
  }
});

// ========== 5. Hero Banner Full Màn Hình (Auto Slide + Dots) ==========
(function () {
  const heroBanner = document.querySelector("#homeHeroBanner");
  const bannerSlide = heroBanner?.querySelector(".banner-center-slide");
  const bannerImg = heroBanner?.querySelector(".banner-center-img");
  const dots = heroBanner?.querySelectorAll(".banner-dot");
  const prevArrow = heroBanner?.querySelector(".banner-arrow-prev");
  const nextArrow = heroBanner?.querySelector(".banner-arrow-next");

  if (!heroBanner || !bannerSlide || !bannerImg || !dots || !dots.length) {
    return;
  }

  const slides = [
    {
      src: "hinhmenu/banner-main-1.png",
      alt: "Thiết kế nội thất DanaHome",
    },
    {
      src: "hinhmenu/banner-side-1.png",
      alt: "Không gian nội thất cao cấp",
    },
    {
      src: "hinhmenu/banner-main-4.png",
      alt: "Công trình kiến trúc DanaHome",
    },
  ];

  let current = 0;
  let autoSlideTimer = null;
  let isAnimating = false;

  // Preload toàn bộ ảnh vào bộ nhớ đệm
  slides.forEach((slide) => {
    const img = new Image();
    img.src = slide.src;
  });

  function updateDots() {
    dots.forEach((dot, dotIndex) => {
      dot.classList.toggle("active", dotIndex === current);
    });
  }

  function render(index, immediate = false) {
    const nextIndex = (index + slides.length) % slides.length;

    if (!immediate && (nextIndex === current || isAnimating)) {
      return;
    }

    if (immediate) {
      current = nextIndex;
      bannerImg.src = slides[current].src;
      bannerImg.alt = slides[current].alt;
      updateDots();
      return;
    }

    isAnimating = true;
    current = nextIndex;
    updateDots();

    // Bước 1: Kích hoạt hiệu ứng Fade Out (Làm mờ ảnh cũ) bằng class is-changing
    bannerSlide.classList.add("is-changing");

    // Đợi ảnh cũ mờ hoàn toàn trước khi thay nguồn ảnh.
    setTimeout(() => {
      bannerImg.src = slides[current].src;
      bannerImg.alt = slides[current].alt;

      // Bước 3: Cho ảnh mới mượt mà hiện lên (Fade In)
      requestAnimationFrame(() => {
        bannerSlide.classList.remove("is-changing");
        setTimeout(() => {
          isAnimating = false;
        }, 700);
      });
    }, 650);
  }

  function nextSlide() {
    render(current + 1);
  }
  function prevSlide() {
    render(current - 1);
  }

  function startAutoSlide() {
    stopAutoSlide();
    autoSlideTimer = setInterval(nextSlide, 3000);
  }

  function stopAutoSlide() {
    if (autoSlideTimer) clearInterval(autoSlideTimer);
  }

  prevArrow?.addEventListener("click", () => {
    prevSlide();
    startAutoSlide();
  });
  nextArrow?.addEventListener("click", () => {
    nextSlide();
    startAutoSlide();
  });

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      render(index);
      startAutoSlide();
    });
  });

  heroBanner.addEventListener("mouseenter", stopAutoSlide);
  heroBanner.addEventListener("mouseleave", startAutoSlide);

  render(0, true);
  startAutoSlide();
})();
