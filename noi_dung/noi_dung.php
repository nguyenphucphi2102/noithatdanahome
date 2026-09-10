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
                <img src="hinhmenu/banner-main-1.png" alt="Thiết kế nội thất DanaHome"
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
                        <img src="hinhmenu/banner-side-1.png" alt="Về DanaHome" class="img-fluid main-img">
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
            $tv = "SELECT * FROM tin_dichvu ORDER BY id DESC LIMIT 3";
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
                    $link_chitiet = "dich-vu-noi-that-" . $linkurl . "-" . $id;

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
                <span class="features-badge">DỊCH VỤ THIẾT KẾ NỘI THẤT</span>
                <h2 class="pricing-title">THIẾT KẾ NỘI THẤT HIỆN ĐẠI, THÔNG MINH VÀ ĐẸP TỪNG CHI TIẾT</h2>
            </div>
            <div class="col-lg-6 col-md-12 reveal-fade">
                <p class="pricing-desc">
                    DanaHome mang đến giải pháp thiết kế nội thất trọn gói, tối ưu công năng sử dụng, tạo cảm giác sang trọng và mang dấu ấn riêng cho từng không gian sống.
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
                        <span class="tab-text">Thiết kế nội thất căn hộ</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-2">
                        <span class="tab-icon"><i class="fa fa-building"></i></span>
                        <span class="tab-text">Thi công nội thất trọn gói</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-3">
                        <span class="tab-icon"><i class="fa fa-wrench"></i></span>
                        <span class="tab-text">Thi công tủ bếp & đồ gỗ</span>
                    </button>
                    <button class="tab-btn" data-tab="tab-4">
                        <span class="tab-icon"><i class="fa fa-pencil-square-o"></i></span>
                        <span class="tab-text">Thiết kế kiến trúc nội thất</span>
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
                                <span class="card-sub-title">DANAHOME INTERIOR</span>
                                <h3>Thiết kế nội thất căn hộ</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-television"></i></div>
                                        <div class="f-text">
                                            <h5>Tối ưu không gian sống</h5>
                                            <p>Thiết kế căn hộ theo phong cách hiện đại, tối giản và tối ưu công năng sinh hoạt cho từng thành viên.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-star"></i></div>
                                        <div class="f-text">
                                            <h5>Phong cách riêng biệt</h5>
                                            <p>Mỗi không gian được lên ý tưởng theo gu thẩm mỹ, sự tiện nghi và sự hài hòa với môi trường sống.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="hinhmenu/banner-main-1.png" alt="Thiết kế nội thất căn hộ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 2 -->
                    <div class="tab-panel" id="tab-2">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME INTERIOR</span>
                                <h3>Thi công nội thất trọn gói</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-cubes"></i></div>
                                        <div class="f-text">
                                            <h5>Thi công chuẩn xác</h5>
                                            <p>Thi công theo bản vẽ kỹ thuật, bề mặt tỉ mỉ, vật liệu đạt tiêu chuẩn và thời gian thực hiện rõ ràng.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-users"></i></div>
                                        <div class="f-text">
                                            <h5>Đội ngũ chuyên nghiệp</h5>
                                            <p>Nhân sự kỹ thuật và thợ thi công giàu kinh nghiệm, kiểm soát tiến độ và chất lượng từng hạng mục.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="hinhmenu/banner-main-2.png" alt="Thi công nội thất trọn gói">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 3 -->
                    <div class="tab-panel" id="tab-3">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME INTERIOR</span>
                                <h3>Thi công tủ bếp & đồ gỗ</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-clock-o"></i></div>
                                        <div class="f-text">
                                            <h5>Vật liệu bền đẹp</h5>
                                            <p>Sử dụng gỗ MDF, laminate, acrylic hoặc gỗ cao cấp theo yêu cầu, mang lại độ bền và thẩm mỹ lâu dài.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-check-circle"></i></div>
                                        <div class="f-text">
                                            <h5>Tiện nghi tối ưu</h5>
                                            <p>Thiết kế theo mô hình lưu trữ khoa học, tối ưu diện tích và giúp việc nấu nướng dễ dàng hơn.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="hinhmenu/banner-side-1.png" alt="Thi công tủ bếp và đồ gỗ">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Content 4 -->
                    <div class="tab-panel" id="tab-4">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12 mb-20">
                                <span class="card-sub-title">DANAHOME INTERIOR</span>
                                <h3>Thiết kế kiến trúc nội thất</h3>
                                <div class="panel-features">
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-paint-brush"></i></div>
                                        <div class="f-text">
                                            <h5>Phong cách đa dạng</h5>
                                            <p>Hiện đại, tối giản, tân cổ điển, Scandinavian hoặc phong cách mang dấu ấn riêng theo sở thích khách hàng.</p>
                                        </div>
                                    </div>
                                    <div class="feature-item">
                                        <div class="f-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="f-text">
                                            <h5>Hình ảnh 3D chân thực</h5>
                                            <p>Trình bày mô hình 3D rõ nét, giúp khách hàng hình dung không gian trước khi thi công.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-12">
                                <div class="panel-image">
                                    <img src="hinhmenu/banner-main-1.png" alt="Thiết kế kiến trúc nội thất">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

 
   <!-- Dự án & Mẫu thiết kế -->
<section class="home-projects section-padding">
    <div class="container">
        <div class="section-heading text-center reveal-fade">
            <span class="sub-title">BỘ SƯU TẬP</span>
            <h2>Dự Án </h2>
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
                    $link_chitiet = "du-an-noi-that-" . $linkurl . "-" . $id;
                    
                    // Lấy danh mục/mô tả ngắn nếu có, mặc định là 'Dự án nổi bật'
                    $danhmuc     = !empty($row['thuocloai']) ? htmlspecialchars($row['thuocloai']) : 'Dự án nổi bật';
            ?>
                    <div class="project-item reveal-fade" data-category="living-room">
                        <div class="project-img-wrapper">
                            <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>" loading="lazy">
                            <div class="project-overlay">
                                <div class="overlay-content">
                                  
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
                    $link_chitiet = "tin-tuc-noi-that-" . $linkurl . "-" . $id;

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

<section class="home-contact-cta" style="position: relative; overflow: hidden; background: url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat; padding: 90px 0;">
    <div style="position:absolute; inset:0; background: rgba(13, 13, 13, 0.62);"></div>
    <div class="container" style="position:relative; z-index:1;">
        <div class="row align-items-center justify-content-between text-center text-lg-start">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <span style="display:inline-block; margin-bottom:12px; color:#d6b07d; font-weight:700; letter-spacing:2px; text-transform:uppercase; font-size:12px;">Liên hệ</span>
                <h2 style="margin:0; color:#fff; font-size: clamp(28px, 4vw, 42px); font-weight:700; line-height:1.2;">
                    Tư vấn thiết kế nội thất phù hợp với không gian của bạn
                </h2>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div style="display:flex; flex-direction:column; gap:14px; align-items:center; justify-content:center;">
                    <a href="tel:0935911222" style="display:inline-flex; align-items:center; justify-content:center; gap:10px; background:#cea679; color:#fff; padding:14px 26px; border-radius:999px; font-weight:700; text-decoration:none; min-width:220px;">
                        <i class="fa fa-phone"></i> Gọi ngay: 0935 911 222
                    </a>
                    <a href="lien-he" style="display:inline-flex; align-items:center; justify-content:center; gap:10px; border:1px solid rgba(255,255,255,0.7); color:#fff; padding:14px 26px; border-radius:999px; font-weight:600; text-decoration:none; min-width:220px;">
                        <i class="fa fa-envelope"></i> Liên hệ tư vấn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</main>

<script src="sitebds/js/trangchu.js"></script>
<script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
<script src="js/modernizr-2.8.3.min.js"></script>
<script src="/js/jquery-1.12.4.min.js"></script>
    <script src="sitebds/js/popper.min.js"></script>
    <script src="sitebds/js/bootstrap.min.js"></script>
    <script src="sitebds/js/plugins.js"></script>
    <script src="sitebds/js/DesignGallery.js"></script>