<!-- nhasp -->
 <style>
    .section-title {
        text-align: center;
        font-size: 36px;
        margin: 50px 0;
    }

    .section-content {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 30px;
        justify-content: space-between;
    }

    .section-card {
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 48%;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        transition: transform 0.3s ease-in-out;
    }

    .section-card img {
        width: 100%;
        border-radius: 8px;
        height: 200px;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .section-card h3 {
        color: #2c3e50;
        font-size: 24px;
        margin-bottom: 10px;
    }

    .section-card p {
        color: #000;
        font-size: 16px;
        line-height: 1.5;
        margin-bottom: 20px;
    }

    .section-card:hover {
        transform: translateY(-10px);
    }

    .section-card a {
        text-decoration: none;
        color: #fff;
        background-color: #3498db;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .section-card a:hover {
        background-color: #2980b9;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .section-card {
            width: 100%;
        }
    }
</style>
<div class="container">
    <h1 class="section-title">Thống Kê Xu Hướng Thành Lập Công Ty tại Đà Nẵng</h1>

    <div class="section-content">
        <div class="section-card">
            <img src="hinhmenu/anh1.jpg" alt="Công ty startup và công nghệ">
            <h3>Công Ty Startup và Công Nghệ</h3>
            <p>Đà Nẵng đang trở thành trung tâm khởi nghiệp mạnh mẽ, đặc biệt trong lĩnh vực công nghệ thông tin và ứng
                dụng di động. Các công ty khởi nghiệp tại đây đang phát triển nhanh chóng nhờ vào môi trường kinh doanh
                thuận lợi.</p>
        </div>

        <div class="section-card">
            <img src="hinhmenu/anh2.jpg" alt="Dịch vụ du lịch và dịch vụ">
            <h3>Công Ty Du Lịch và Dịch Vụ</h3>
            <p>Các công ty du lịch và dịch vụ như cho thuê xe, tổ chức tour, khách sạn, nhà hàng đang phát triển mạnh mẽ
                tại Đà Nẵng, nơi có lượng khách du lịch trong và ngoài nước lớn.</p>
        </div>
    </div>

    <div class="section-content">
        <div class="section-card">
            <img src="hinhmenu/anh3.jpg" alt="Công ty sản xuất và xuất nhập khẩu">
            <h3>Công Ty Sản Xuất và Xuất Nhập Khẩu</h3>
            <p>Đà Nẵng là điểm đến hấp dẫn cho các công ty sản xuất và xuất nhập khẩu nhờ vào hạ tầng giao thương phát
                triển, đặc biệt là các khu công nghiệp và cảng biển.</p>
        </div>

        <div class="section-card">
            <img src="hinhmenu/anh4.jpg" alt="Công ty tài chính và kế toán">
            <h3>Công Ty Dịch Vụ Tài Chính và Kế Toán</h3>
            <p>Các công ty cung cấp dịch vụ tài chính, kế toán và tư vấn thuế đang phát triển mạnh mẽ tại Đà Nẵng, đáp
                ứng nhu cầu lớn của các doanh nghiệp nhỏ và vừa trong thành phố.</p>
        </div>
    </div>

    <div class="section-content">
        <div class="section-card">
            <img src="hinhmenu/anh5.jpg" alt="Công ty giáo dục và đào tạo">
            <h3>Công Ty Giáo Dục và Đào Tạo</h3>
            <p>Đà Nẵng cũng đang chứng kiến sự phát triển của các công ty trong lĩnh vực giáo dục và đào tạo, từ các
                trung tâm ngoại ngữ đến các khóa đào tạo nghề nghiệp cho người lao động.</p>
        </div>

        <div class="section-card">
            <img src="hinhmenu/anh6.jpg" alt="Chính sách hỗ trợ doanh nghiệp">
            <h3>Mô hình doanh nghiệp trực tuyến</h3>
            <p>Trong bối cảnh dịch bệnh Covid-19, nhiều doanh nghiệp đã chuyển sang mô hình kinh doanh trực tuyến. Xu
                hướng này tiếp tục phát triển mạnh mẽ, với sự thành lập của nhiều công ty thương mại điện tử và công ty
                dịch vụ trực tuyến tại Đà Nẵng.</p>
        </div>
    </div>
</div>
<!-- nhasp -->

 <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>TIN TỨC </span>NỔI BẬT</h2>
                    <p>Properties In Most Popular Places.</p>
                </div>
                <div class="row">


                    <!-- Single category -->
                    <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 8";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $giagoc = $row['giagoc'];
                            $giagoc_formatted = '$' . number_format($giagoc, 2, '.', ',');
                            $giaban = $row['giaban'];
                            $giaban_formatted = '$' . number_format($giaban, 2, '.', ',');
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2 mob-mt">
                            <div class="small-category-2-thumb img-8">
                                <a href="#"><img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>"/></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="#"><?php echo "$tieude";?></a></h4>
                                <span>145 Properties</span>
                            </div>
                        </div>
                    </div>
                  <?php } ?>


                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

        <!-- START SECTION POPULAR PLACES -->
        <section class="popular-places bg-white-3">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Popular </span>Places</h2>
                    <p>Properties In Most Popular Places.</p>
                </div>
                <div class="row">
                <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 6";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            $tieude = "$row[tieude]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                    <div class="col-sm-6 col-lg-4 col-xl-4" data-aos="zoom-in" data-aos-delay="150">
                        <!-- Image Box -->
                        <a href="properties-map.html" class="img-box hover-effect">
                            <img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" class="img-responsive" alt="">
                            <!-- Badge -->
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="img-box-content visible">
                                <h4>New York City </h4>
                                <span>203 Properties</span>
                            </div>
                        </a>
                    </div>
                   <?php } ?>

                </div>
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

             <!-- START SECTION INFO-HELP -->
        <section class="info-help h17">
            <div class="container">
                <div class="row info-head">
                    <div class="col-lg-6 col-md-8 col-xs-8" data-aos="fade-right">
                        <div class="info-text">
                            <h3>Apartment for rent</h3>
                            <h5 class="mt-3">$6,400/month</h5>
                            <p class="pt-2">We Help you find the best places and offer near you. Bring to the table win-win survival strategies to ensure proactive domination going forward.</p>
                            <div class="inf-btn pro">
                                <a href="contact-us.html" class="btn btn-pro btn-secondary btn-lg">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-3"></div>
                </div>
            </div>
        </section>
        <!-- END SECTION INFO-HELP -->


        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>DỊCH VỤ </span>NỔI BẬT </h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 4";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>

                    <article class="col-lg-3 col-md-6 col-xs-12 serv" data-aos="fade-up" data-aos-delay="150">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>"/>
                                <h3>Wide Renge Of Properties</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                            </div>
                        </div>
                    </article>
               <?php } ?>

                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title discover">
                    <h2><span>CUNG CẤP </span>DỊCH VỤ</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                     <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 12";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale">For Sale</div>
                                                <img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>" class="img-responsive">
                                            </a>
                                        </div>

                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="#"><?php echo "$tieude";?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span>6 Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span>3 Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span>720 sq ft</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span>2 Garages</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html">$ 350,000</a>
                                            </h3>
                                            <div class="compare">
                                                <a href="#" title="Compare">
                                                    <i class="flaticon-compare"></i>
                                                </a>
                                                <a href="#" title="Share">
                                                    <i class="flaticon-share"></i>
                                                </a>
                                                <a href="#" title="Favorites">
                                                    <i class="flaticon-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->

        <!-- START SECTION AGENTS -->
        <section class="team bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>NHÂN VIÊN </span>CÔNG TY </h2>
                    <p>Our Agents are here to help you</p>
                </div>
                <div class="row team-all">
                    <!--Team Block-->
                     <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 6";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                    <div class="team-block col-sm-6 col-md-4 col-lg-4 col-xl-2" data-aos="fade-up" data-aos-delay="150">
                        <div class="inner-box team-details">
                            <div class="image team-head">
                                <a href="agents-listing-grid.html"><img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>" /></a>
                                <div class="team-hover">
                                    <ul class="team-social">
                                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lower-box">
                                <h3><a href="agents-listing-grid.html"><?php echo "$tieude";?></a></h3>
                                <div class="designation">Real Estate Agent</div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- END SECTION AGENTS -->

        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials bg-white-2 rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Ý KIẾN </span>KHÁCH HÀNG </h2>
                    <p>We collect reviews from our customers.</p>
                </div>
                <div class="owl-carousel job_clientSlide">
                 <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 6";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                    <div class="singleJobClinet" data-aos="zoom-in" data-aos-delay="150">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore gna a. Ut enim ad minim veniam,
                        </p>
                        <div class="detailJC">
                            <span><img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>"/></span>
                            <h5>Lisa Smith</h5>
                            <p>New York</p>
                        </div>
                    </div>
               <?php } ?>

                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->

        <!-- STAR SECTION PARTNERS -->
        <div class="partners bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>ĐỐI </span>TÁC</h2>
                    <p>The Companies That Represent Us.</p>
                </div>
                <div class="owl-carousel style2">
                 <?php
                //include_once("phan_trang.php");
                require('db.php');
                // $tv = "select * from tin_ads where thuocloai=1 order by id desc limit 0,1";
                $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 6";
                $tv_1 = mysqli_query($link,$tv);
                $a_tv_1 = mysqli_query($link,$tv);
                ?>
                <?php
                       while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                            $id = "$row[id]";
                            // $tieude_en = "$row[tieude_en]";
                            $tieude = "$row[tieude]";
                            //$mota = "$row[mota]";
                            //$ngay = "$row[ngay]";
                            $url = $row['linkurl'];
                            $link = str_replace("?", "", strtolower("chitietson/$url"));
                ?>
                    <div class="owl-item" data-aos="fade-up"><img src="HinhCTSP/HinhSanPham/<?php echo $row["hinhanh"]; ?>" alt="<?php echo "$tieude";?>"/></div>
     <?php } ?>
                </div>
            </div>
        </div>
        <!-- END SECTION PARTNERS -->
