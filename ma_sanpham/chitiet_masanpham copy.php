<style>
    .related-products-inline {
        margin: 40px 0;
        padding: 20px;
        background: #fafafa;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
    }

    .section-heading {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        margin-bottom: 16px;
        border-bottom: 2px solid #d4af37;
        display: inline-block;
        padding-bottom: 6px;
    }

    .products-inline-grid {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .product-inline-card {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 6px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        text-decoration: none;
        transition: transform 0.2s ease;
        flex: 1 1 48%;
        min-width: 280px;
        padding: 10px;
    }

    .product-inline-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .product-inline-card img {
        width: 64px;
        height: 64px;
        object-fit: cover;
        border-radius: 6px;
        margin-right: 12px;
    }

    .product-inline-info h4 {
        font-size: 15px;
        color: #111;
        font-weight: 500;
        line-height: 1.4;
        margin: 0;
    }

      .titleweb{
        margin-top: 110px;
    }
    @media (max-width: 768px) {
        .products-inline-grid {
            flex-direction: column;
        }

        .product-inline-card {
            flex: 1 1 100%;
        }

        .product-inline-card img {
            width: 60px;
            height: 60px;
        }

        .product-inline-info h4 {
            font-size: 14px;
        }
    }

    .share-linknd {
        width: 100%;
        margin: 0px 0;
        border-radius: 4px;
        display: inline-block;

    }
    .titleweb{
        margin-top: 110px;
    }

     @media (max-width: 400px) {
        .products-inline-grid {
            flex-direction: column;
        }

        .product-inline-card {
            flex: 1 1 100%;
        }

        .product-inline-card img {
            width: 60px;
            height: 60px;
        }

        .product-inline-info h4 {
            font-size: 14px;
        }
    }

    .share-linknd {
        width: 100%;
        margin: 0px 0;
        border-radius: 4px;
        display: inline-block;

    }
    .titleweb{
        margin-top: 90px;
    }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper section-padding bg-cover" style="background:#f6f6f6; padding-bottom: 51px;">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title text-center titleweb">
                <div style="font-size: 30px; font-weight: bold;" class="wow fadeInUp" data-wow-delay=".3s"> CÔNG TY IN ẤN ATV</div>
                <?php
                $id = $_GET['url'];
                $tv = "select * from ma_sanpham where linkurl like '%" . $id . "%' order by id ";
                $tv_1 = mysqli_query($link, $tv);
                $tv_2 = mysqli_fetch_array($tv_1);
                $thuocloai = "$tv_2[thuocloai]";
                $phanloai = mysqli_fetch_array(mysqli_query($link, "select * from  loai_ma_sanpham where id=" . $thuocloai . " limit 1"));
                $mota = "$tv_2[mota]";
                $hinhanh = "$tv_2[hinhanh]";
                $hinhanh1 = "$tv_2[hinhanh1]";
                $hinhanh2 = "$tv_2[hinhanh2]";
                $hinhanh3 = "$tv_2[hinhanh3]";
                $mysql = mysqli_query($link, "select * from loai_ma_sanpham where id=$thuocloai limit 1");
                $row = mysqli_fetch_array($mysql);
                $ten = "$tv_2[tieude]";

                ?>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="trangchu">
                            Trang chủ
                        </a>
                    </li>
                    <li>
                      <i class="fas fa-chevron-right" style='font-size: 11px;'></i>
                    </li>
                    <li>
                    <?php echo "$ten" ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page title end -->
<!-- END SECTION HEADINGS -->

<!-- START SECTION BLOG -->
<section class="blog blog-section bg-white" style="padding-top: 50px;">
    <div class="container" id="pinBoxContainer">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row space2 pb-4 thumax-2">
                            <!-- Ảnh chính -->
                            <div class="col-md-6">
                                <div class="single-portfolio p-3 border rounded shadow-sm bg-white">
                                    <div class="portfolio-img text-center">
                                        <img id="main-image" class="img-fluid rounded mb-3"
                                            src="HinhCTSP/HinhSanPham/<?php echo $hinhanh ?: 'default.jpg'; ?>"
                                            alt="<?php echo "$tieude"; ?>" />
                                        <span></span>
                                    </div>

                                    <!-- Ảnh phụ -->
                                    <div class="d-flex justify-content-center flex-wrap gap-2">
                                        <?php
                                        $hinh_phu = [$hinhanh, $hinhanh1, $hinhanh2, $hinhanh3];
                                        foreach ($hinh_phu as $hinh) {
                                            if (!empty($hinh) && file_exists("HinhCTSP/HinhSanPham/$hinh")) { ?>
                                                <img class="img-thumbnail thumb-img"
                                                    src="HinhCTSP/HinhSanPham/<?php echo $hinh; ?>"
                                                    alt="<?php echo "$tieude"; ?>"
                                                    onclick="changeMainImage('<?php echo $hinh; ?>', this)" />
                                            <?php }
                                        } ?>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 single-p-info shop">
                                <h1 style='font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
        margin-top: 10px;
    line-height: 30px;'><?php echo "$ten" ?></h1>

                                <div style="text-align: left; font-weight: bold;color: #ff0000;">
                                    <p style="margin-bottom:3px;">
                                        <font style='color:#000; font-size: 16px; font-weight:bold'>Giá:</font>
                                        <font style='color:#ff0000; font-size: 16px; font-weight:bold'>Liên Hệ </font>
                                    </p>
                                    <p style="margin-bottom:3px;">
                                        <font style='color:#000; font-size: 16px; font-weight:bold'>Danh mục:</font>
                                        <font style='color:#ff0000; font-size: 16px; font-weight:bold'>
                                            <?php echo $phanloai['thuocloai']; ?>
                                        </font>
                                    </p>
                                    <p style="margin-bottom:20px;">
                                        <font style='color:#000; font-size: 16px; font-weight:bold'>Hotline:</font>
                                        <font style='color:#ff0000; font-size: 16px; font-weight:bold'>0799 454 348

                                        </font>
                                    </p>
                                </div>
                                <p class="mt-1 mb-4" style="color: #000; font-size: 17px;"><?php echo "$mota" ?></p>
                                <div style="text-align: left; margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-6 text-center">
                                            <img src="hinhmenu/thietke-mienphi.png" alt="thiết kế miễn phí"
                                                class="img-fluid rounded shadow-sm" style="max-width: 100%;">
                                        </div>
                                        <div class="col-6 text-center">
                                            <img src="hinhmenu/mienphi-giaohang.png" alt="miễn phí giao hàng"
                                                class="img-fluid rounded shadow-sm" style="max-width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <p style="margin-bottom:18px; margin-top: 25px;">
                                    <font style='color:#000; font-size: 17px; font-weight:bold'>GIAO HÀNG TẬN NƠI:
                                    </font>
                                    <font style='color:blue; font-size: 16px; font-weight:bold'>ĐÀ NẴNG,
                                        HUẾ, QUẢNG TRỊ, QUẢNG NGÃI, GIA LAI, KHÁNH HOÀ
                                    </font> </br>
                                    <font style='color:#c00; font-size: 17px; font-weight:bold'>Hỗ trợ gởi hàng: 0914 454 348 (Mr. Vinh )
                                    </font>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- Star Reviews -->

                <?php
                include_once("phan_trang.php");
                require('db.php');
                $p = new pager;
                $limit = 1;
                $start = $p->findStart($limit);
                $count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM ma_sanpham"));
                $pages = $p->findPages($count, $limit);
                $id = $_REQUEST["url"];
                $result = mysqli_query($link, "SELECT * FROM ma_sanpham where linkurl like '%" . $id . "%' order by id desc limit $start,$limit");
                // hiển thị DL
                if (mysqli_num_rows($result) <> 0) {
                    echo " <table width='100%' border='0' align='left'>";
                    $stt = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $thuocloai = $row->thuocloai;
                        $phanloai = mysqli_fetch_array(mysqli_query($link, "select * from  loai_ma_sanpham where id=" . $thuocloai . " limit 1"));
                        $thuocloai = $row->thuocloai;
                        $tieude = doikyty($row->tieude);
                        $noidung = doikyty($row->noidung);
                        $mota = doikyty($row->mota);
                        $tieude_en = doikyty($row->tieude_en);
                        $tukhoa2 = doikyty($row->tukhoa2);
                        $tukhoa1 = $row->tukhoa1;
                        $url = khongdau($row->tieude_en);
                        $link = str_replace("?", "", strtolower("san-pham/$url-$id"));
                        $hinhanh = "HinhCTSP/HinhSanPham/" . $row->hinhanh;
                        $hinhanh = "<img src='$hinhanh'  text-align: center; alt='$tieude_en' title='$tieude_en'  >  ";
                        if ($stt % 2 == 0) {
                            echo "<tr>";
                        }
                        echo "<td align='left' width='100%'>";
                        echo "<table align='left' width='100%'>";
                        echo "<div>
                                  <h2 style='padding: 0px;margin: 0px;font-size: 0px;line-height: 0px;color: #fff;'></i><a href='$link'>$tukhoa1</a></h2>


                               <div class='mb-2' style='color: #ff0000;font-weight: bold;width: 98%;text-transform: uppercase;'>Chi Tiết Sản Phẩm: </div>


                               <div style='border-bottom: 1px solid #ccc; width: 100%; color:#ccc; margin-bottom: 20px;'></div>


                               <div style='font-size: 18px;'>
                               $noidung
                                   </div>

                                    <h2 style='padding: 0px;margin: 0px;font-size: 0px;line-height: 0px;color: #fff;'></i><a href='$link'>$tukhoa2</a></h2>
                        </div>";
                        echo " </table>";
                        echo "</td>";
                        $stt = $stt + 1;

                        if ($stt % 1 == 0) {
                            echo "</tr>";
                        }
                    }
                    echo " </table>";
                }
                ?>
                <!-- đường dẫn h2 -->
                <div class="share-linknd clearfix " style=' margin-top: 5px;
    margin-bottom: 12px;'>
                    <?php
                    require('db.php');
                    //$tv = "select * from tin_tintuc order by id desc limit 0,1";
                    $tv = "SELECT * FROM (SELECT * FROM ma_sanpham  ORDER BY id DESC LIMIT 1, 100) as recent_news ORDER BY RAND() LIMIT 1";
                    $tv_1 = mysqli_query($link, $tv);
                    $a_tv_1 = mysqli_query($link, $tv);
                    ?>
                    <?php
                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                        $id = "$tv_2[id]";
                        $tieude_en = "$tv_2[tieude_en]";
                        $tieude = "$tv_2[tieude]";
                        $url = $tv_2['linkurl'];
                        $link = str_replace("?", "", strtolower("san-pham/$url-$id"));
                        ?>
                        <div style="padding:0px;margin: 0px;font-size: 17px;font-weight: 300;">
                            <img src="hinhmenu/me-rev.gif" alt="<?php echo "$tieude"; ?>"
                                style="  margin-top:0px;width: 30px;padding-right: 10px; float: left;" />
                            <div class="author_name">
                                <h2 style="font-size: 17px; font-weight: bold; line-height:27px;" class="author_name"><a
                                        href="<?php echo "$link"; ?>"><?php echo "$tieude"; ?></a></h2>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            <span class="rating_num"> </span>
                        </div>
                    <?php } ?>
                </div>
                <!-- đường dẫn h2 -->

                <!-- kết bài -->
                <div class="author_name">
                    <?php
                    include_once("phan_trang.php");
                    require('db.php');
                    $tv = "select * from gioi_thieu order by id=10 desc limit 0,1";
                    $tv_1 = mysqli_query($link, $tv);
                    $a_tv_1 = mysqli_query($link, $tv);
                    ?>
                    <?php
                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                        $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
                        $id = "$tv_2[id]";
                        $tieude = "$tv_2[tieude]";
                        $noidung = "$tv_2[noidung]";

                        ?>
                        <div style='margin:0px;' class="author_img">
                            <div style='text-align: center;'>
                                <img src="HinhCTSP/<?php echo $tv_2["hinhanh"]; ?>" alt="<?php echo "$tieude"; ?>" style='    text-align: center;
    padding: 20px;' />
                            </div>
                            <span style="font-size: 18px; "><?php echo "$noidung"; ?></span>

                        </div>
                        <div class="rating_wrap">
                            <span class="rating_num">
                            </span>
                        </div>
                    <?php } ?>
                </div>
                <!-- kết bài -->

                <!-- đường dẫn h2 -->
                <div class="related-products-inline">
                    <div class="section-heading">Sản phẩm bán chạy</div>
                    <div class="products-inline-grid">
                        <?php
                        require('db.php');
                        $tv = "SELECT * FROM (SELECT * FROM tin_dichvu ORDER BY id DESC LIMIT 50) as recent_products ORDER BY RAND() LIMIT 2";
                        $tv_1 = mysqli_query($link, $tv);
                        while ($row = mysqli_fetch_array($tv_1)) {
                            $link_hinh = "HinhCTSP/Hinhdichvu/{$row['hinhanh']}";
                            $tieude_en = $row['tieude_en'];
                            $id = $row['id'];
                            $url = $row['linkurl'];
                            $link = str_replace(",", "", strtolower("$url-$id"));
                            ?>
                            <a href="<?= $link ?>" class="product-inline-card">
                                <img src="<?= $link_hinh ?>" alt="<?= $tieude_en ?>">
                                <div class="product-inline-info">
                                    <h3><?= $tieude_en ?></h3>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
                <!-- đường dẫn h2 -->

                <!-- HTML -->
                <section class="why-choose-us" style='background: #f6f6f6;'>
                    <div style='color: #007bff; margin-bottom: 20px;font-size: 23px;padding: 10px;line-height: 28px;font-weight: bold;'>VÌ SAO CHỌN CHÚNG TÔI</div>
                    <div class="features">
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-credit-card"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>THANH TOÁN AN TOÀN</div>
                            <p>Chúng tôi có nhiều phương thức thanh toán đảm bảo tính an toàn và nhanh nhất cho khách
                                hàng.</p>
                        </div>
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-truck"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>GIAO HÀNG TẬN NƠI</div>
                            <p>Chúng tôi có thể giao hàng tận nơi trong nội thành, đến các tỉnh thông qua các đối tác
                                giao nhận.</p>
                        </div>
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>GIÁ CẢ ỔN ĐỊNH</div>
                            <p>Chúng tôi đảm bảo giá luôn hợp lý và ổn định mà chất lượng không đổi.</p>
                        </div>
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-clock"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>THỜI GIAN HOÀN THÀNH</div>
                            <p>Chúng tôi cam kết sản phẩm đến tay quý khách đúng hẹn.</p>
                        </div>
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-users-cog"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>ĐỘI NGŨ CHUYÊN NGHIỆP</div>
                            <p>Chúng tôi sẽ hỗ trợ in mẫu miễn phí để quý khách duyệt trước khi in chính thức.</p>
                        </div>
                        <div class="feature-box">
                            <div class="icon"><i class="fas fa-headset"></i></div>
                            <div style='font-weight: bold; padding-bottom: 8px; color: #007bff;'>DỊCH VỤ KHÁCH HÀNG</div>
                            <p>Chúng tôi luôn có những chính sách tốt nhất dành cho khách hàng thân thiết.</p>
                        </div>
                    </div>
                </section>

                <!-- CSS -->
                <style>
                    .why-choose-us {
                        padding: 40px 20px;
                        max-width: 1200px;
                        margin: auto;
                        text-align: center;
                        font-family: sans-serif;
                    }

                    .why-choose-us h2 {
                        font-size: 28px;
                        margin-bottom: 30px;
                        color: #2a4d1f;
                    }

                    .why-choose-us h2 span {
                        color: #4caf50;
                        font-weight: bold;
                    }

                    .features {
                        display: grid;
                        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                        gap: 25px;
                    }

                    .feature-box {
                        background: #f9f9f9;
                        border-radius: 10px;
                        padding: 25px 20px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
                        transition: 0.3s;
                    }

                    .feature-box:hover {
                        transform: translateY(-5px);
                    }

                    .icon {
                        font-size: 36px;
                        color: #4caf50;
                        margin-bottom: 15px;
                    }

                    .feature-box h3 {
                        color: #2a4d1f;
                        font-size: 18px;
                        margin-bottom: 10px;
                    }

                    .feature-box p {
                        font-size: 15px;
                        color: #333;
                    }

                     .swiper-slide {
                        margin-right: 0 !important;
                        padding-left: 5px;
                        padding-right: 5px;
                        padding-bottom: 25px;
                    }

                    .products-box-items {
                        padding: 5px;
                        margin: 0 auto;
                    }
                </style>




                <!-- sp liên quan -->

                 <div class="col-mob-12 col-xs-12 col-sm-12 col-md-12 col-lg-12"
                    style="margin-bottom:10px;margin-top: 10px;">
                    <div style="border-bottom: 2px solid #000;
    padding: 7px;
    color: #ff0000;
        margin-bottom:30px;
    font-weight: bold;font-size: 16px;
    padding-left: 5px;"><i class="fa fa-bars" style="padding-right:10px;"></i> SẢN PHẨM LIÊN QUAN </div>


                </div>



                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
                
                <section class="product-slider-section" style="padding: 0px 0 30px 0;">
                  <div class="container">
                    <div class="swiper my-product-swiper">
                      <div class="swiper-wrapper">
                           <?php
            //include_once("phan_trang.php");
            require('db.php');
            $tv = "SELECT
            m.*,
            l.thuocloai AS ten_loai,
            l.thuocloai_en,
            l.trangchu,
            l.hinhanh AS loai_hinhanh,
            l.logo,
            l.noidung,
            l.noidung_en,
            l.name_url
            FROM (
                SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 20
            ) AS m
            LEFT JOIN loai_ma_sanpham l ON m.thuocloai = l.id
            ORDER BY RAND()
            LIMIT 10
            ";
            $tv_1 = mysqli_query($link, $tv);
            $a_tv_1 = mysqli_query($link, $tv);
            ?>
            <?php
            while ($row = mysqli_fetch_array($tv_1)) {
                $link_hinh = "HinhCTSP/HinhSanPham/$row[hinhanh]";
                $id = "$row[id]";
                $ten_loai = $row['ten_loai'];
                $tieude = "$row[tieude]";
                $mota = "$row[mota]";
                $giaban = $row['giaban'];
                $url = $row['linkurl'];
                $link = str_replace("?", "", strtolower("san-pham/$url-$id"));
                ?>
                        <div class="swiper-slide">
                          <div class="product-card">
                            <a href="<?php echo $link; ?>">
                              <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                            </a>
                            <div><a href="<?php echo $link; ?>"><b><?php echo $tieude; ?></b></a></div>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="swiper-pagination"></div>
                    </div>
                  </div>
                </section>
                
                
                <!-- Swiper JS -->
                <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
                
                <script>
                  var swiper = new Swiper(".my-product-swiper", {
                    loop: true,
                    autoplay: {
                      delay: 3000,
                      disableOnInteraction: false,
                    },
                    pagination: {
                      el: ".swiper-pagination",
                      clickable: true,
                    },
                    breakpoints: {
                      0: {
                        slidesPerView: 2,
                        spaceBetween: 0,
                      },
                      768: {
                        slidesPerView: 4,
                        spaceBetween: 0,
                      },
                    },
                  });
                </script>
                
                <style>
                .product-card {
                  background: #fff;
                  border: 1px solid #ddd;
                  padding: 10px;
                  text-align: center;
                  box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
                  border-radius: 8px;
                }
                .product-card img {
                  width: 100%;
                  height: auto;
                  object-fit: cover;
                  margin-bottom: 10px;
                }
                .swiper-slide {
                  box-sizing: border-box;
                }
                .swiper-pagination {
                  position: static !important;
                  margin-top: 0px;
                  text-align: center;
                }
                
                .my-product-swiper {
                  padding-bottom: 20px; /* Tạo khoảng dưới cho pagination */
                }
                
                </style>

                <!-- sp liên quan -->


            </div>


            <aside class="col-lg-3 col-md-12">
                <div class="pinBox">
                    <?php
                    include('menu_trai/leftsanpham.php');
                    ?>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->
<!-- bạn cần biết -->
<section class="eblog-bottom-post-area tp-section-gap blog-section .container" style='padding:18px;'>
    <div class="container">
        <div style="border-bottom: 2px solid #000;
    padding: 7px;
    color: #ff0000;
        margin-bottom: 30px;
    font-weight: bold;font-size: 16px;
    padding-left: 1px;"><i class="fa fa-bars" style="padding-right:10px;"></i> BẠN CẦN BIẾT </div>
        <div class="section-inner">
            <div class="row">


                <?php
                require('db.php');

                // Function to fetch a random post
                function fetchRandomPost($link)
                {
                    $query = "SELECT * FROM (SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 8";
                    $stmt = $link->prepare($query);
                    if ($stmt === false) {
                        die('Prepare failed: ' . htmlspecialchars($link->error));
                    }
                    $stmt->execute();
                    return $stmt->get_result();
                }

                // Fetch random post
                $posts = fetchRandomPost($link);
                ?>
                <?php if ($posts && $posts->num_rows > 0): ?>
                    <?php while ($row = $posts->fetch_assoc()): ?>
                        <?php
                        $imageSrc = htmlspecialchars("HinhCTSP/Hinhtintuc/{$row['hinhanh']}");
                        $postLink = htmlspecialchars(str_replace("?", "", strtolower("tin-tuc/" . urlencode($row['linkurl']))));
                        $postTitle = htmlspecialchars($row['tieude_en']);
                        $postDate = htmlspecialchars($row['ngay']);
                        $postDescription = htmlspecialchars($row['mota']);
                        ?>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="eblog-featured-news style-two small">
                                <div class="image-area">
                                    <a href="<?php echo $postLink; ?>"> <img src="<?php echo $imageSrc; ?>"
                                            alt="<?php echo $postTitle; ?>" /></a>
                                </div>
                                <div class="blog-content text-left">

                                    <a href="<?php echo $postLink; ?>">
                                        <h3 class="heading-title ml--0 mb--10 text-start" style="font-size: 17px;
    line-height: 23px;
    padding: 10px;
    font-weight: bold; padding-bottom:5px"><?php echo $postTitle; ?></h3>
                                    </a>

                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No posts available.</p>
                <?php endif; ?>

                <?php
                $link->close();
                ?>


            </div>
        </div>
    </div>
</section>
<!-- End Bạn cần biết -->


<!-- END SECTION PARTNERS -->
<script src="js/jquery.pinBox.js"></script>
<script src="Scripts/anhchitietthem_sanpham.js"></script>
<script>
    $(document).ready(function () {

        $(".pinBox").pinBox({
            //default 0px
            Top: '70px',
            //default '.container'
            Container: '#pinBoxContainer',
            //default 20
            ZIndex: 20,
            //default '767px' if you disable pinBox in mobile or tablet
            MinWidth: '1170px'
            //events if scrolled or window resized
        });

    });
</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
</script>