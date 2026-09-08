<style>
    .bg-chitiet {
        margin-top: 145px;
    }

    .p-3 {
        padding: 0rem !important;
    }

    .product-default img:hover {
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }

    .pinBox {
        position: sticky;
        top: 20px;
        max-height: 100vh;
        /* overflow-y: auto; */
    }

    .bgphantranga {
        padding: 10px;
        border-radius: 5px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .phantrang {
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333;
    }

    .phantrang a {
        text-decoration: none;
        color: #007bff;
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: background-color 0.3s, color 0.3s;
    }

    .phantrang a:hover {
        background-color: #007bff;
        color: #fff;
    }

    .phantrang .current {
        font-weight: bold;
        color: #fff;
        background-color: #007bff;
        padding: 5px 10px;
        border-radius: 4px;
        margin: 0 5px;
    }

    .phantrang .back,
    .phantrang .next {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .phantrang .back i,
    .phantrang .next i {
        font-size: 12px;
        margin: 0 2px;
    }

    .phantrang .back:hover,
    .phantrang .next:hover {
        background-color: #0056b3;
        color: #fff;
        cursor: pointer;
    }

    @media (max-width: 991px) {
        .pinBox {
            display: none !important;
        }
    }

    @media (max-width: 767px) {
        .bg-chitiet {
            margin-top: 79px;
        }
    }
</style>



<?php
include('phantrang/phantrang_dichvu.php');
?>

<div class="bg-chitiet">
    <div class="row">
        <div style='padding:0px;'>
            <?php
            require('db.php');
            $did = $_GET["url"];
            $tv = "select * from loai_tin_dichvu where name_url='" . $_GET['url'] . "' order by id ";
            $tv_1 = mysqli_query($link, $tv);
            $a_tv_1 = mysqli_query($link, $tv);
            $tv_2 = mysqli_fetch_array($tv_1);
            $id = $tv_2['id'];
            $ten = "$tv_2[thuocloai]";
            $noidung = "$tv_2[noidung]";
            $hinhanh = "$tv_2[hinhanh]";
            $hinhanh = "HinhCTSP/$hinhanh";
            ?>
            <img src="<?php echo "$hinhanh"; ?>" alt="<?php echo $ten; ?>" >
        </div>


    </div>
</div>
<div class="breadcrumb-wrapper section-padding bg-cover" style="padding:13px;">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title text-center">

                <?php
                require('db.php');
                $did = $_GET["url"];
                $tv = "select * from loai_tin_dichvu where name_url='" . $_GET['url'] . "' order by id ";
                $tv_1 = mysqli_query($link, $tv);
                $a_tv_1 = mysqli_query($link, $tv);
                $tv_2 = mysqli_fetch_array($tv_1);
                $id = $tv_2['id'];
                $ten = "$tv_2[thuocloai]";
                $tukhoa1 = "$tv_2[tukhoa1]";
                $tukhoa2 = "$tv_2[tukhoa2]";
                $noidung = "$tv_2[noidung]";
                $hinhanh = "$tv_2[hinhanh]";
                $hinhanh = "HinhCTSP/$hinhanh";
                ?>
                </br>
                <h2 style="font-size: 30px; margin-bottom:0" class="wow fadeInUp" data-wow-delay=".3s">
                    <?php echo ucwords($ten); ?>
                </h2>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s" style="font-size: 10px;  margin-bottom: 30px;">
                    <i>
                        <li>
                            <a href="trangchu">
                                Trang chủ
                            </a>
                        </li>
                        <li>
                            /
                        </li>
                        <li style="text-transform: initial; font-size: 15px;">
                            Ấn phẩm quà tặng
                        </li>
                    </i>
                </ul>

                <div style="font-size: 18px; text-align: left;">

                    <h1 style='padding: 0px;margin: 0px;font-size: 0px;line-height: 0px;color: #fff;'></i> <?php echo ucwords($tukhoa1); ?></h1>
                    <?php echo $noidung; ?>

                    <h2 style='padding: 0px;margin: 0px;font-size: 0px;line-height: 0px;color: #fff;'></i> <?php echo ucwords($tukhoa2); ?></h2>
                </div>

            </div>
        </div>
    </div>
</div>

</br>

<div class="container">
    <div class="row">
        <div class="col-lg-12 main-content" style="padding-top: 10px;">


            <div class="container">
                <div class="row g-4">
                    <?php
                    require('db.php');
                    $limit = 12;
                    $p = new pager;
                    $start = $p->findStart($limit);

                    // Đếm tổng số sản phẩm thuộc loại $id
                    $sp = $link->prepare("SELECT COUNT(*) FROM tin_dichvu WHERE thuocloai = ?");
                    $sp->bind_param('i', $id);
                    $sp->execute();
                    $sp->bind_result($count);
                    $sp->fetch();
                    $sp->close();

                    // Tính số trang cần có
                    $pages = $p->findPages($count, $limit);

                    // Lấy danh sách sản phẩm theo loại, sắp xếp theo id mới nhất và giới hạn số lượng
                    $sp = $link->prepare("SELECT * FROM tin_dichvu WHERE thuocloai = ? ORDER BY id DESC LIMIT ?, ?");
                    $sp->bind_param('iii', $id, $start, $limit);
                    $sp->execute();
                    $result = $sp->get_result();

                    if ($count > 0) {
                         while ($row = $result->fetch_object()) {
                            $tieude_en = htmlspecialchars($row->tieude_en, ENT_QUOTES, 'UTF-8');
                           $id = htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8');
                             $linkurl = htmlspecialchars($row->linkurl, ENT_QUOTES, 'UTF-8');
                            $link_hinh = "HinhCTSP/Hinhdichvu/" . htmlspecialchars($row->hinhanh, ENT_QUOTES, 'UTF-8');
                            $url = htmlspecialchars($row->linkurl, ENT_QUOTES, 'UTF-8');
                            $link = str_replace(",", "", strtolower("$url-$id"));
                            ?>
                            <div class="col-6 col-md-3" style="padding-left: 10px !important; padding-right: 10px !important;">
                                <div
                                    class="product-default inner-quickview inner-icon border p-3 rounded shadow-sm bg-white h-100">
                                    <figure class="position-relative">
                                        <a href="<?php echo $link; ?>">
                                            <img src="<?php echo $link_hinh; ?>" class="img-fluid d-block mx-auto rounded"
                                                style="width: 100%; object-fit: contain;" alt="<?php echo $tieude_en; ?>">
                                        </a>
                                    </figure>

                                    <div class="product-details text-center mt-3">
                                        <p class="product-title fw-bold">
                                            <a href="<?php echo $link; ?>" class="text-dark text-decoration-none">
                                                <h3 style="font-size: 16px;"><?php echo $tieude_en; ?></h3>
                                            </a>
                                        </p>
                                        <div class="price-box">
                                            <span class="product-price text-danger fw-bold">LIÊN HỆ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "
                        <div style='text-align: center; padding: 20px; border: 2px dashed #ff5733; border-radius: 10px; background-color: #ffe6e6;'>
                            <h2 style='color: #ff5733;'>Chưa có sản phẩm</h2>
                            <p style='font-size: 18px;'>Danh mục này chưa có sản phẩm nào.</p>
                            <img src='hinhmenu/chu-ky-so-danang.gif' alt='No Products' style='width: 50%; max-width: 300px;'>
                        </div>
                        ";
                    }
                    $sp->close();
                    ?>
                    <div class="bgphantranga">
                        <?php
                        function pagelist($current_page, $total_pages, $url, $id)
                        {
                            $output = '';

                            // Generate "Back" button
                            if ($current_page > 1) {
                                $previous_page = $current_page - 1;
                                $output .= "<a href='$url/$previous_page' class='back'><i class='fa fa-arrow-left'></i></a>";
                            }

                            // Generate page numbers
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == $current_page) {
                                    $output .= "<span class='current'>$i</span>";
                                } else {
                                    $output .= "<a href='$url/$i'>$i</a>";
                                }
                            }

                            // Generate "Next" button
                            if ($current_page < $total_pages) {
                                $next_page = $current_page + 1;
                                $output .= "<a href='$url/$next_page' class='next'><i class='fa fa-arrow-right'></i></a>";
                            }

                            return $output;
                        }

                        $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;
                        $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                        $url = isset($_GET['url']) ? $_GET['url'] : '';
                        $total_pages = ceil($count / $limit);
                        $pagelist = pagelist($current_page, $total_pages, $url, $id);
                        echo "<div align='left' class='phantrang' style='float: left;width: 100%;text-align: center;'> ";
                        echo $pagelist;
                        echo "</div>";
                        ?>
                    </div>




                </div>
            </div>
        </div>
        <!-- End .col-lg-9 -->
      <div class="sidebar-overlay"></div>
         <!-- <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar font2">
            <div class="pinBox ">
                <?php
                //include('menu_trai/leftsanpham.php');
                ?>
            </div>
        </aside>-->
    </div>
</div>
