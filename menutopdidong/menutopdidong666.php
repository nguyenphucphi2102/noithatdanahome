
<!-- Offcanvas Area Start -->

<div class="fix-area">
    
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="trangchu">
                            <img src="hinhmenu/logo-thienlyfoods.png" alt="Thiên Lý Foods">
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <p class="text d-none d-xl-block">
                    Thiên Lý Foods chuyên cung cấp xiên que, cá viên chiên, xúc xích, cá viên thả lẩu, phomai que, topokki... 
                    Chúng tôi cam kết 100% sản phẩm tươi ngon, an toàn vệ sinh thực phẩm, phù hợp cho mọi bữa tiệc, quán ăn, 
                    hoặc gia đình và đạt chuẩn vệ sinh an toàn thực phẩm theo quy định. Đặt hàng ngay: 0389 511 603!
                </p>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <!-- <h4>Thông tin liên hệ</h4> -->
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">24 Nguyễn Duy, P. Cẩm Lệ, Tp. Đà Nẵng</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:thienlyfoods@gmail.com">thienlyfoods@gmail.com</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">Thứ 2 - Thứ 7, 8:00 - 17:00</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:0389 511 603">0389 511 603</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Area Start -->
<header class="header-section-3">
<img src="hinhmenu/Bannerweb.jpg" alt="Thiên Lý Foods" style='width:100%; height:30px;'>

    <div id="banner-top" class="banner-container">
        <div class="banner-column">
            <a href=""><img src="hinhmenu/logo-thienlyfoods.png" alt="Thiên Lý Foods"></a>
        </div>

        <div class="banner-column center">
            <div class="search-wrapper" style="position: relative; width: 100%; max-width: 600px; margin: auto;">
                <div class="search-bar" style="display: flex;">
                    <input class="search-input" type="text" id="searchBox" placeholder="" autocomplete="off" />
                    <button class="btn-search"><b>Tìm kiếm</b></button>
                </div>
                <div id="suggestionBox" class="suggestion-box"></div>
            </div>
        </div>

        <div class="banner-column">
            <img src="hinhmenu/dat-hang.gif" alt="thiên lý foods" >
        </div>
    </div>
    <style>
        .banner-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 15px 0;
            flex-wrap: nowrap;
                background: #fbc105;
        }

        .banner-column {
            flex: 5;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .banner-column img {
            max-height: 70px;
            height: auto;
            width: auto;
            object-fit: contain;
            margin: 0 5px;
        }

        /* Khối giữa chứa tìm kiếm */
        .banner-column.center {
            flex: 3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-wrapper {
            position: relative;
            width: 100%;
            max-width: 600px;
        }

        .search-bar {
            display: flex;
            width: 100%;
            align-items: stretch;
            /* để input + button cùng chiều cao */
        }

        #searchBox {
            flex: 1;
            padding: 12px 15px;
            /* chỉnh lại để khớp button */
            font-size: 16px;
            color: #1f7f5c !important;
            border: 1px solid #ccc;
            border-right: none;
            border-radius: 6px 0 0 6px;
            outline: none;
            box-sizing: border-box;
        }

        .btn-search {
            padding: 0 20px;
            /* bỏ padding trên dưới để chiều cao khớp với input */
            font-size: 16px;
            border: 1px solid #ccc;
            background-color: #1f7f5c;
            color: white;
            border-radius: 0 6px 6px 0;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .btn-search:hover {
            background-color: #155f47;
        }

        #suggestionBox {
            position: absolute;
            top: calc(100% + 5px);
            /* ngay dưới search bar, có chút khoảng cách */
            left: 0;
            width: 100%;
            background: #fff;
            /* border: 1px solid #ccc; */
            max-height: 300px;
            overflow-y: auto;
            z-index: 10001;
            border-radius: 0 0 6px 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .banner-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 10px 0;
            flex-wrap: nowrap;
        }

        .slogan {
            font-style: italic;
            color: #333;
        }

        .hotline {
            font-weight: bold;
            color: #1f7f5c;
        }

        .divider-line {
            margin: 0 10px 10px;
            border: none;
            border-top: 1px solid #ccc;
        }
    </style>


    <div id="header-sticky" class="header-4">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container" >
                <a class="navbar-brand fw-bold" href="https://thienlyfoods.com.vn/">
                    <img src="hinhmenu/logo-thienlyfoods.png" alt="Thiên Lý Foods" style="width:60%;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == 'trangchu' ? 'active' : '' ?>" href="trang-chu">TRANG CHỦ</a>
                        </li>
                        
                             <li class="nav-item">
                            <a class="nav-link <?= $current_page == 'xuongin-danang' ? 'active' : '' ?>" href="gioi-thieu"> GIỚI THIỆU </a>
                        </li>
                        
                       <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="inan-danang" id="anphamvanphongLink">SẢN PHẨM THIÊN LÝ FOODS</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/in-an/in-danh-thiep">Viên chiên </a></li>
                                <li><a class="dropdown-item" href="san-pham/danh-thiep-chuan-46">Cá viên chiên </a> </li>
                                    <li><a class="dropdown-item" href="san-pham/danh-thiep-giay-my-thuat-49">Bò viên chiên</a> </li>
                                    <li><a class="dropdown-item" href="san-pham/danh-thiep-ep-kim-47">Tôm viên chiên </a></li>
                                    <li><a class="dropdown-item" href="san-pham/danh-thiep-ky-thuat-so-52">Viên thả lẩu </a></li>
                                    <li><a class="dropdown-item" href="san-pham/danh-thiep-dap-noi-chim-54">Viên bạch tuộc surimi</a></li>
                                    <li><a class="dropdown-item dropdown-highlight " href="https://congtyinandanang.com.vn/in-an/In-To-Roi-To-Gap">Thực phẩm đông lạnh</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/to-gap-sieu-re-105">Đùi gà chiên giòn</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/to-gap-3-101">Cánh gà rán </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/in-an/In-Tui-Giay">Gà cuộn rong biển</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/tui-giay-kraft-65">Mực vòng nugget</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/tui-giay-ep-kim-64">Sò điệp vị singapore</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/in-an/In-Bao-Thu">Xúc xích & Lạp xưởng</a> </li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-thu-nho-76">Xúc xích lốc xoáy </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-thu-trung-77">Xúc xích hotdog  </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-thu-lon-75">Lạp xưởng tươi </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-thu-giay-kraft-73">Chả cá Hàn Quốc</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-thu-nho-76">Chả giò ré tôm mực</a></li>
                                    <li><a class="dropdown-item dropdown-highlight" href="https://congtyinandanang.com.vn/in-an/In-Catalogue">Bánh & Phomai</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bia-ho-so-cao-cap-86">Bánh bao nhân kim sa </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bia-ho-so-1-tay-gap-84">Phomai que </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/catalogue-cao-cap-88">Khoai môn lệ phố </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/hoa-don-ban-le-106">Bánh bạch tuột Takoyaki </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/ve-giu-xe-108">Bánh gạo topokki</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item dropdown-highlight" href="https://congtyinandanang.com.vn/in-an/In-Giay-Tieu-De">Đồ ăn đặc biệt & Nước sốt</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/giay-ghi-chep-115">Mì trộn tương đen</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/phieu-bao-hanh-134">Ba chỉ bò cuộn </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/gift-voucher-57">Bò cuộn lá lốt </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/lich-de-ban-135">Ốc nhồi hải sản </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/in-an/In-Decal">Ram tôm đất</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/nhan-giay-124">Pizza xúc xích </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/nhan-nhua-127">Tinh dầu cay Hàn Quốc </a></li>
                                     <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/decal-boi-format-96">Tương ớt đỏ</a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-li-xi-dung-130">Xốt Mayonnaise </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-li-xi-ngang-131">Bột gia vị lạp xưởng </a></li>
                                    <li><a class="dropdown-item" href="https://congtyinandanang.com.vn/san-pham/bao-li-xi-ngang-131">Sốt tương O!Sajang </a></li>
                                </ul>
                            </div>
                        </li>
                        
                        
                        
                             <li class="nav-item">
                            <a class="nav-link <?= $current_page == 'xuongin-danang' ? 'active' : '' ?>" href="xuongin-danang">CHÍNH SÁCH </a>
                            
                             <ul>
                            <?php
                            $tv1 = "select * from loai_ma_sanpham order by id ASC ";
                            $tv_11 = mysqli_query($link, $tv1);
                            $a_tv_11 = mysqli_query($link, $tv1);
                            $stt = 1;
                            while ($tv_21 = mysqli_fetch_array($tv_11)) {
                                $id = "$tv_21[id]";
                                $thuocloai = "$tv_21[thuocloai]";
                                $name_url = "$tv_21[name_url]";
                            ?>
                          <li><a href="nha-phanphoi/<?php echo $tv_21['name_url']; ?>"><?php echo $thuocloai; ?></a></li>
                          <?php } ?>
                           </ul>
                        </li>
                        
                        
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == 'xuongin-danang' ? 'active' : '' ?>"
                                href="xuongin-danang">
                                TIN TỨC
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?= $current_page == 'lien-he' ? 'active' : '' ?>" href="lien-he">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- popup liên hệ -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const popup = document.getElementById("popup");

        const popupDelay = 5000;
        const popupCooldown = 10 * 60 * 1000;

        const lastShown = localStorage.getItem("popupLastShown");

        if (!lastShown || Date.now() - lastShown > popupCooldown) {
            setTimeout(() => {
                popup.classList.add("show");
                const now = Date.now();
                localStorage.setItem("popupLastShown", now);

                const nextTime = new Date(now + popupCooldown);
                console.log("Lần tiếp theo popup sẽ hiện sau:", nextTime.toLocaleString());
            }, popupDelay);
        } else {
            const nextTime = new Date(parseInt(lastShown) + popupCooldown);
            console.log(nextTime.toLocaleString());
        }


        if (!lastShown || Date.now() - lastShown > popupCooldown) {
            setTimeout(() => {
                popup.classList.add("show");
                localStorage.setItem("popupLastShown", Date.now());
            }, popupDelay);
        }


        document.querySelector(".open-popup").addEventListener("click", function () {
            popup.classList.add("show");
        });

        document.querySelector(".close-popup").addEventListener("click", function () {
            popup.classList.remove("show");
        });

        popup.addEventListener("click", function (event) {
            if (event.target === popup) {
                popup.classList.remove("show");
            }
        });
    });


</script> -->

<!-- <script>
    const currentUrl = window.location.href;
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        const links = dropdown.querySelectorAll('.dropdown-item');
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (href !== "#" && currentUrl.includes(href)) {
                const toggleLink = dropdown.querySelector('.nav-link.dropdown-toggle');
                toggleLink.classList.add('active');
            }
        });
    });
</script> -->

<script>
    document.getElementById('searchBox').addEventListener('input', function () {
        const keyword = this.value.trim();
        if (keyword.length >= 2) {
            fetch('timkiem.php?q=' + encodeURIComponent(keyword))
                .then(res => res.text())
                .then(html => {
                    document.getElementById('suggestionBox').innerHTML = html;
                    document.getElementById('suggestionBox').style.display = 'block';
                });
        } else {
            document.getElementById('suggestionBox').style.display = 'none';
        }
    });

    // Ẩn khi click ngoài vùng
    document.addEventListener('click', function (e) {
        if (!e.target.closest('#suggestionBox') && e.target.id !== 'searchBox') {
            document.getElementById('suggestionBox').style.display = 'none';
        }
    });

</script>

<!-- chặn bot spam bằng honeypot -->
<!-- <script>
    function checkInput() {
        const hoten = document.getElementById('txt_hoten').value.trim();
        const sdt = document.getElementById('txt_dt').value.trim();
        const nd = document.getElementById('txt_nd').value.trim();

        // Honeypot checks
        if (
            document.getElementById('email_fake').value !== '' ||
            document.getElementById('phone_fake').value !== '' ||
            document.getElementById('name_fake').value !== ''
        ) {
            console.warn("Bot detected.");
            return false;
        }

        const nameRegex = /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỳỵỷỹýỲỴỶỸ\s]{2,100}$/;
        const sdtRegex = /^[0-9\-\+\s]{10,11}$/;

        if (hoten === '' || sdt === '') {
            alert("Vui lòng điền đầy đủ Họ Tên và Số Điện Thoại.");
            return false;
        }

        if (!sdtRegex.test(sdt)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        if (!nameRegex.test(hoten)) {
            alert("Vui lòng nhập họ tên hợp lệ.");
            return false;
        }

        return true;
    }
</script> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const link1 = document.getElementById("anphamvanphongLink");
        const link2 = document.getElementById("anphamquatangLink");
        const link3 = document.getElementById("anphamkhacLink");

        function updateDropdownBehavior() {
            const links = [link1, link2, link3];
            links.forEach(link => {
                if (!link) return; // kiểm tra nếu link không tồn tại
                if (window.innerWidth < 992) {
                    link.setAttribute("data-bs-toggle", "dropdown");
                    link.setAttribute("role", "button");
                    link.setAttribute("aria-expanded", "false");
                } else {
                    link.removeAttribute("data-bs-toggle");
                    link.removeAttribute("role");
                    link.removeAttribute("aria-expanded");
                }
            });
        }

        updateDropdownBehavior();
        window.addEventListener("resize", updateDropdownBehavior);
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        let input = document.querySelector(".search-input");
        let placeholderText = "Tìm kiếm sản phẩm...";
        let index = 0;
        let isDeleting = false;

        function animatePlaceholder() {
            if (!isDeleting) {
                input.setAttribute("placeholder", placeholderText.substring(0, index));
                index++;
                if (index > placeholderText.length) {
                    isDeleting = true;
                    setTimeout(animatePlaceholder, 300);
                    return;
                }
            } else {
                index--;
                input.setAttribute("placeholder", placeholderText.substring(0, index));
                if (index === 0) {
                    isDeleting = false;
                }
            }
            setTimeout(animatePlaceholder, 70);
        }

        animatePlaceholder();
    });


</script>