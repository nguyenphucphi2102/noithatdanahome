<link rel="stylesheet" href="sitebds/css/trangchu.css">
<link rel="stylesheet" href="sitebds/css/bootstrap.min.css">
<link rel="stylesheet" href="sitebds/css/iconfont.min.css">
<link rel="stylesheet" href="sitebds/css/plugins.css">
<link rel="stylesheet" href="sitebds/css/helper.css">
    <!-- <link rel="stylesheet" href="sitebds/css/brand-colors.css"> -->
<main class="main-content">
    <!-- Banner Showcase Section -->
    <section class="banner-showcase" id="homeHeroBanner">
        <div class="banner-showcase-track">
            <div class="banner-center-slide">
                <img src="/images/banner-main-1.avif" alt="Thiết kế nội thất DanaHome"
                    class="banner-center-img">
                <div class="banner-hero-overlay"></div>
                <div class="banner-hero-content">
                    <h1><span style="color:#00286F">DANA</span><span style="color:#FBCE5D">HOME </span></h1>
                    <p>Giải pháp thiết kế và thi công nội thất trọn gói, tối ưu công năng và nâng tầm trải
                        nghiệm sống cho mỗi gia đình.</p>
                    <a href="Quotation&Contact.html" class="banner-hero-btn">Tư vấn ngay</a>
                </div>

                <button class="banner-arrow banner-arrow-prev" aria-label="Ảnh trước">
                    <i class="fa fa-chevron-left"></i>
                </button>
                <button class="banner-arrow banner-arrow-next" aria-label="Ảnh sau">
                    <i class="fa fa-chevron-right"></i>
                </button>
            </div>
        </div>

        <!-- Chấm điều hướng -->
        <div class="banner-dots">
            <button class="banner-dot active" data-slide="0"></button>
            <button class="banner-dot" data-slide="1"></button>
            <button class="banner-dot" data-slide="2"></button>
        </div>
    </section>

    

    <!-- Về DanaHome -->
    <section class="home-about section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 reveal-fade">
                    <div class="about-img-box">
                        <img src="hinhmenu/banner-side-1.avif" alt="Về DanaHome" class="img-fluid main-img">
                        <div class="about-badge">
                            <h3>5+</h3>
                            <p>Năm Kinh Nghiệm</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 reveal-right">
                    <div class="about-content">
                        <span class="sub-title">VỀ DANAHOME</span>
                        <h2>Kiến Tạo Không Gian <br>Nâng Tầm Cuộc Sống</h2>
                        <p>DanaHome là đơn vị hàng đầu tại Đà Nẵng chuyên thiết kế và thi công nội thất trọn
                            gói. Chúng tôi sở hữu xưởng sản xuất trực tiếp rộng lớn cùng đội ngũ kiến trúc sư
                            đầy sáng tạo, cam kết mang lại không gian sống sang trọng, tối ưu công năng cho ngôi
                            nhà của bạn.</p>
                        <div class="about-features">
                            <div class="feature-item">
                                <i class="fa fa-check-circle"></i> <span>Xưởng sản xuất trực tiếp</span>
                            </div>
                            <div class="feature-item">
                                <i class="fa fa-check-circle"></i> <span>Đội ngũ KTS chuyên nghiệp</span>
                            </div>
                        </div>
                        <a href="Services.html" class="theme-btn">Xem thêm về chúng tôi <i
                                class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= VIDEO PROMOTE ================= -->
     <section class="home-video section-padding">
        <div class="container">
            <div class="section-heading text-center mb-50 reveal-fade">
                <span class="sub-title">VIDEO</span>
                <h2>Khám Phá DanaHome Qua Hình Ảnh Thực Tế</h2>
                <span class="heading-underline"></span>
            </div>

            <div class="video-player-shell">
               <iframe id="videoPlayerFrame" class="video-player-frame"
                src="https://www.youtube.com/embed/I3piKNJDhGE?controls=0&rel=0&modestbranding=1&iv_load_policy=3&enablejsapi=1&playlist=I3piKNJDhGE"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>


    <!-- Dịch Vụ Của Chúng Tôi -->
<section class="home-services section-padding bg-light-gray">
    <div class="container">
        <div class="section-heading text-center reveal-fade">
            <span class="sub-title">DỊCH VỤ CỦA CHÚNG TÔI</span>
            <h2>Giải Pháp Thiết Kế & Thi Công Tổng Thể</h2>
            <span class="heading-underline"></span>
        </div>

        <div class="row mt-50">
            <?php
            require_once('db.php');

            // Lấy danh sách dịch vụ từ CSDL
            $tv = "SELECT * FROM tin_dichvu ORDER BY id DESC LIMIT 6";
            $tv_1 = mysqli_query($link, $tv);

            if ($tv_1 && mysqli_num_rows($tv_1) > 0) {
                $i = 0;
                while ($row = mysqli_fetch_array($tv_1)) {
                    $id           = $row['id'];
                    $tieude       = htmlspecialchars($row['tieude']);
                    $linkurl      = $row['linkurl'];
                    $link_hinh    = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
                    
                    // Rút ngắn mô tả ngắn để layout các thẻ đồng đều
                    $mota         = htmlspecialchars($row['mota']);
                    if (mb_strlen($mota) > 110) {
                        $mota = mb_substr($mota, 0, 110) . '...';
                    }

                    // Đổi tên biến tránh ghi đè biến $link kết nối CSDL
                    $link_chitiet = "dich-vu-" . $linkurl . "-" . $id;

                    // Delay hiệu ứng xuất hiện
                    $delay = $i * 0.1;
                    $i++;
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 reveal-fade mb-30" style="transition-delay: <?php echo $delay; ?>s;">
                        <div class="service-box-card">
                            <!-- Hình ảnh Dịch vụ -->
                            <div class="service-img-wrapper">
                                <a href="<?php echo $link_chitiet; ?>">
                                    <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
                                </a>
                            </div>

                            <!-- Nội dung Dịch vụ -->
                            <div class="service-content">
                                <h3>
                                    <a href="<?php echo $link_chitiet; ?>">
                                        <?php echo $tieude; ?>
                                    </a>
                                </h3>
                                <p><?php echo $mota; ?></p>
                                <a href="<?php echo $link_chitiet; ?>" class="read-more">
                                    Xem chi tiết <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else {
                echo '<p class="text-center w-100">Hiện chưa có dữ liệu dịch vụ.</p>';
            }
            ?>
        </div>
    </div>
</section>


<!-- ================= SECTION: BẢNG GIÁ & DỊCH VỤ ================= -->
<section class="pricing-tabs-section section-padding">
    <div class="container">
        <!-- Tiêu đề Section -->
        <div class="row align-items-center mb-40">
            <div class="col-lg-6 col-md-12 reveal-fade">
                <span class="features-badge">DỊCH VỤ CHÚNG TÔI CUNG CẤP</span>
                <h2 class="pricing-title">CUNG CẤP GIÁ XÂY DỰNG MINH BẠCH, HỢP LÝ</h2>
            </div>
            <div class="col-lg-6 col-md-12 reveal-fade">
                <p class="pricing-desc">
                    Với đội ngũ nhân viên chuyên nghiệp, nhiệt tình và sáng tạo, DanaHome luôn nỗ lực để tạo ra những công trình độc đáo, bền vững và hiện đại nhất.
                </p>
            </div>
        </div>

        <!-- Khung Nội Dung Tabs -->
        <div class="row align-items-center">
            <!-- Cột trái: Danh sách nút Tab -->
            <div class="col-lg-4 col-md-5 reveal-fade mb-30">
                <div class="tab-nav-list">
                    <button class="tab-btn active" data-tab="tab-1">
                        <span class="tab-icon"><i class="fa fa-home"></i></span>
                        <span class="tab-text">Giá xây nhà trọn gói</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-2">
                        <span class="tab-icon"><i class="fa fa-building"></i></span>
                        <span class="tab-text">Giá xây dựng phần thô</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-3">
                        <span class="tab-icon"><i class="fa fa-wrench"></i></span>
                        <span class="tab-text">Giá sửa nhà trọn gói</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-4">
                        <span class="tab-icon"><i class="fa fa-pencil-square-o"></i></span>
                        <span class="tab-text">Giá thiết kế kiến trúc</span>
                    </button>
                </div>
            </div>

            <!-- Cột phải: Nội dung tương ứng với Tab -->
            <div class="col-lg-8 col-md-7 reveal-right mb-30">
                <div class="tab-content-card">
                    <!-- Tab Content 1 -->
                    <div class="tab-panel active" id="tab-1">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME SERVICES</span>
                                <h3>Xây nhà trọn gói</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-globe"></i></div>
                                        <div class="f-text">
                                            <h5>Miễn phí thiết kế</h5>
                                            <p>Tặng 100% bản vẽ thiết kế kiến trúc và hồ sơ thi công khi ký hợp đồng dịch vụ trọn gói.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-shield"></i></div>
                                        <div class="f-text">
                                            <h5>Bảo hành kết cấu 10 năm</h5>
                                            <p>Cam kết chất lượng công trình lâu dài, hỗ trợ kiểm tra và bảo trì định kỳ cho khách hàng.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="/images/banner-main-1.avif" alt="Xây nhà trọn gói">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 2 -->
                    <div class="tab-panel" id="tab-2">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME SERVICES</span>
                                <h3>Xây dựng phần thô</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-cubes"></i></div>
                                        <div class="f-text">
                                            <h5>Vật tư tiêu chuẩn cao</h5>
                                            <p>Cam kết sử dụng sắt thép, xi măng, gạch đá đúng chuẩn thương hiệu uy tín.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-users"></i></div>
                                        <div class="f-text">
                                            <h5>Giám sát liên tục</h5>
                                            <p>Đội ngũ kỹ sư túc trực tại công trình đảm bảo thi công đúng tiến độ và kết cấu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="/images/banner-main-2.avif" alt="Xây dựng phần thô">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 3 -->
                    <div class="tab-panel" id="tab-3">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME SERVICES</span>
                                <h3>Sửa nhà trọn gói</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-clock-o"></i></div>
                                        <div class="f-text">
                                            <h5>Thi công nhanh chóng</h5>
                                            <p>Cải tạo, nâng cấp không gian sống tối ưu thời gian và hạn chế ảnh hưởng sinh hoạt.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-check-circle"></i></div>
                                        <div class="f-text">
                                            <h5>Tối ưu chi phí</h5>
                                            <p>Báo giá chi tiết từng mục, không phát sinh chi phí ngoài hợp đồng.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="/images/banner-main-1.avif" alt="Sửa nhà trọn gói">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 4 -->
                    <div class="tab-panel" id="tab-4">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME SERVICES</span>
                                <h3>Thiết kế kiến trúc</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-paint-brush"></i></div>
                                        <div class="f-text">
                                            <h5>Đa dạng phong cách</h5>
                                            <p>Cập nhật xu hướng thiết kế Hiện đại, Tân cổ điển, Indochine sáng tạo.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="f-text">
                                            <h5>Hình ảnh 3D chân thực</h5>
                                            <p>Cung cấp góc nhìn thực tế công trình trước khi tiến hành xây dựng.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="/images/banner-main-2.avif" alt="Thiết kế kiến trúc">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>s

 
   <!-- Dự án & Mẫu thiết kế -->
<section class="home-projects section-padding">
    <div class="container">
        <div class="section-heading text-center reveal-fade">
            <span class="sub-title">BỘ SƯU TẬP</span>
            <h2>Dự Án & Mẫu Thiết Kế Nổi Bật</h2>
            <span class="heading-underline"></span>
        </div>

        <div class="project-grid mt-40">
            <?php
            require_once('db.php'); // Gọi file kết nối CSDL nếu chưa gọi ở đầu trang
            
            $tv = "SELECT * FROM tin_sanphama ORDER BY id DESC LIMIT 6";
            $tv_1 = mysqli_query($link, $tv);

            if ($tv_1 && mysqli_num_rows($tv_1) > 0) {
                while ($row = mysqli_fetch_array($tv_1)) {
                    $id           = $row['id'];
                    $tieude       = htmlspecialchars($row['tieude']);
                    $linkurl      = $row['linkurl'];
                    $link_hinh    = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
                    $link_chitiet = "tin-san-pham-" . $linkurl . "-" . $id;
                    
                    // Lấy danh mục/mô tả ngắn nếu có, mặc định là 'Dự án nổi bật'
                    $danhmuc     = !empty($row['thuocloai']) ? htmlspecialchars($row['thuocloai']) : 'Dự án nổi bật';
            ?>
                    <div class="project-item reveal-fade" data-category="living-room">
                        <div class="project-img-wrapper">
                            <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
                            <div class="project-overlay">
                                <div class="overlay-content">
                                    <span><?php echo $danhmuc; ?></span>
                                    <h4><?php echo $tieude; ?></h4>
                                    <a href="<?php echo $link_chitiet; ?>" class="view-btn">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } 
            ?>
        </div>
    </div>
</section>

    <!-- ================= SECTION: ĐẶC ĐIỂM NỔI BẬT ================= -->
<section class="home-features section-padding">
    <div class="container">
        <div class="row align-items-center">
            <!-- Cột bên trái: Tiêu đề & Giới thiệu -->
            <div class="col-lg-5 col-md-12 mb-40 reveal-fade">
                <div class="features-main-content">
                    <span class="features-badge">DANAHOME FEATURES</span>
                    <h2>ĐẶC ĐIỂM NỔI BẬT CỦA DANAHOME</h2>
                    <p>DanaHome cung cấp đầy đủ các dịch vụ thiết kế và xây dựng trọn gói cho cá nhân, gia đình và doanh nghiệp. Chúng tôi luôn đặt sự hài lòng và hiệu quả của khách hàng lên hàng đầu.</p>
                    <a href="Quotation&Contact.html" class="theme-btn features-btn">Liên hệ tư vấn</a>
                </div>
            </div>

            <!-- Cột bên phải: 4 đặc điểm nổi bật -->
            <div class="col-lg-7 col-md-12 reveal-right">
                <div class="row">
                    <!-- Item 1 -->
                    <div class="col-md-6 col-sm-6 mb-30">
                        <div class="feature-card">
                            <div class="feature-icon-box">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            <h4>Báo giá miễn phí</h4>
                            <p>Đưa ra phương án thiết kế tối ưu mà không tốn thêm chi phí.</p>
                            <a href="Quotation&Contact.html" class="feature-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="col-md-6 col-sm-6 mb-30">
                        <div class="feature-card">
                            <div class="feature-icon-box">
                                <i class="fa fa-user-circle-o"></i>
                            </div>
                            <h4>Đội ngũ chuyên gia được chứng nhận</h4>
                            <p>Đội ngũ giàu kinh nghiệm sẵn sàng hỗ trợ mọi nhu cầu của bạn.</p>
                            <a href="Services.html" class="feature-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="col-md-6 col-sm-6 mb-30">
                        <div class="feature-card">
                            <div class="feature-icon-box">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <h4>Công nghệ hiện đại</h4>
                            <p>Ứng dụng công nghệ tiên tiến trong mọi công trình thiết kế.</p>
                            <a href="Services.html" class="feature-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>

                    <!-- Item 4 -->
                    <div class="col-md-6 col-sm-6 mb-30">
                        <div class="feature-card">
                            <div class="feature-icon-box">
                                <i class="fa fa-leaf"></i>
                            </div>
                            <h4>Vật liệu bền vững</h4>
                            <p>Sử dụng vật liệu chất lượng cao, thân thiện với môi trường.</p>
                            <a href="Services.html" class="feature-arrow"><i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- Section Đánh Giá Của Khách Hàng -->
<section class="home-testimonials section-padding">
    <div class="container">
        <div class="section-heading text-center reveal-fade">
            <span class="sub-title">CẢM NHẬN KHÁCH HÀNG</span>
            <h2>Khách Hàng Nói Gì Về DanaHome</h2>
            <span class="heading-underline"></span>
        </div>

        <div class="testimonial-grid mt-40">
            <!-- Đánh giá 1 -->
            <div class="testimonial-card reveal-fade">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Đội ngũ DanaHome làm việc rất chuyên nghiệp. Bản thiết kế 3D hoàn toàn khớp với thực tế thi công. Rất hài lòng về chất lượng hoàn thiện căn biệt thự của gia đình."
                </p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/100?img=12" alt="Anh Minh - Khách hàng" class="author-avatar">
                    <div class="author-info">
                        <h5>Anh Hoàng Minh</h5>
                        <span>Chủ biệt thự KĐT Euro Village</span>
                    </div>
                </div>
            </div>

            <!-- Đánh giá 2 -->
            <div class="testimonial-card reveal-fade">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Thi công đúng tiến độ cam kết trong hợp đồng. Hệ tủ bếp Acrylic bóng gương làm rất tỉ mỉ, phụ kiện thông minh tiện dụng. Cảm ơn đội ngũ tư vấn rất nhiều!"
                </p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/100?img=32" alt="Chị Phương Thảo - Khách hàng" class="author-avatar">
                    <div class="author-info">
                        <h5>Chị Phương Thảo</h5>
                        <span>Căn hộ Monarchy Đà Nẵng</span>
                    </div>
                </div>
            </div>

            <!-- Đánh giá 3 -->
            <div class="testimonial-card reveal-fade">
                <div class="testimonial-stars">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p class="testimonial-text">
                    "Báo giá chi tiết, không phát sinh chi phí ngoài hợp đồng. Các bạn kiến trúc sư trẻ nhưng cá tính, giải quyết tối ưu không gian nhà phố nhỏ hẹp rất hiệu quả."
                </p>
                <div class="testimonial-author">
                    <img src="https://i.pravatar.cc/100?img=53" alt="Anh Quốc Tuấn - Khách hàng" class="author-avatar">
                    <div class="author-info">
                        <h5>Anh Quốc Tuấn</h5>
                        <span>Nhà phố Quận Hải Châu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- ================= SECTION: TIN TỨC & CẨM NANG (LATEST NEWS) ================= -->
<section class="home-blog section-padding" style="background: linear-gradient(rgba(255, 255, 255, 0.92), rgba(255, 255, 255, 0.92)), url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat fixed;">
    <div class="container">
        <div class="section-heading text-center reveal-fade">
            <span class="sub-title">CẢM NANG NỘI THẤT</span>
            <h2>Tin Tức & Kinh Nghiệm Hay</h2>
            <span class="heading-underline"></span>
        </div>

        <div class="row mt-50">
            <?php
            require_once('db.php');

            // Lấy 3 bài viết tin tức mới nhất cho trang chủ
            $tv = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 3";
            $tv_1 = mysqli_query($link, $tv);

            if ($tv_1 && mysqli_num_rows($tv_1) > 0) {
                $i = 0;
                while ($row = mysqli_fetch_array($tv_1)) {
                    $id           = $row['id'];
                    $tieude       = htmlspecialchars($row['tieude']);
                    $linkurl      = $row['linkurl'];
                    $link_hinh    = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
                    
                    // Rút ngắn đoạn mô tả để giao diện các thẻ đều đẹp
                    $mota         = htmlspecialchars($row['mota']);
                    if (mb_strlen($mota) > 110) {
                        $mota = mb_substr($mota, 0, 110) . '...';
                    }

                    // Tên biến URL chi tiết (đổi tên để tránh đè biến $link CSDL)
                    $link_chitiet = "thong-tin-" . $linkurl . "-" . $id;

                    // Danh mục & Ngày tháng (Lấy từ DB nếu có, hoặc dùng giá trị mặc định)
                    $danhmuc     = !empty($row['thuocloai']) ? htmlspecialchars($row['thuocloai']) : 'Tin tức';
                    $ngaydang    = !empty($row['ngay']) ? $row['ngay'] : date('d/m/Y');
                    
                    // Hiệu ứng xuất hiện hiệu ứng delay tăng dần
                    $delay = $i * 0.1;
                    $i++;
            ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-30 reveal-fade" style="transition-delay: <?php echo $delay; ?>s;">
                        <div class="blog-card">
                            <div class="blog-img-wrapper">
                                <a href="<?php echo $link_chitiet; ?>">
                                    <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
                                </a>
                                <span class="blog-date"><?php echo $ngaydang; ?></span>
                            </div>
                            <div class="blog-body">
                                <span class="blog-category"><?php echo $danhmuc; ?></span>
                                <h3>
                                    <a href="<?php echo $link_chitiet; ?>">
                                        <?php echo $tieude; ?>
                                    </a>
                                </h3>
                                <p><?php echo $mota; ?></p>
                                <a href="<?php echo $link_chitiet; ?>" class="blog-readmore">
                                    Đọc thêm <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
            <?php 
                }
            } else {
                echo '<p class="text-center w-100">Chưa có bài viết tin tức nào.</p>';
            }
            ?>
        </div>
    </div>
</section>

   
</main>

<!-- Nút cuộn lên đầu trang -->
<button id="backToTop" class="back-to-top" aria-label="Lên đầu trang">
    <i class="fa fa-chevron-up"></i>
</button>
<script src="sitebds/js/trangchu.js"></script>
<script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
<script src="js/modernizr-2.8.3.min.js"></script>
<script src="/js/jquery-1.12.4.min.js"></script>
    <script src="sitebds/js/popper.min.js"></script>
    <script src="sitebds/js/bootstrap.min.js"></script>
    <script src="sitebds/js/plugins.js"></script>
    <script src="sitebds/js/DesignGallery.js"></script>