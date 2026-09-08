<style>
    .share-linknd {
        width: 100%;
        margin: 0px 0;
        border-radius: 4px;
        display: inline-block;
        background: #fcf1bd;
    }
</style>
<h3 style="font-size:0px; margin: 0px; height:0px; color:#fff; margin: 0px; padding: 0px;"><a>Cửa trượt tự động Lâm Đồng</a></h3>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="blog-section .container" style="background:#e9ecef; margin-top:69px; padding: 2px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                //$id = intval(preg_replace('/[^a-z0-9]+/i', '', $_GET["id"]));
                $id = $_GET['url'];
                $tv = "select * from tin_dichvu where linkurl like '%" . $id . "%' order by id ";
                $tv_1 = mysqli_query($link, $tv);
                $a_tv_1 = mysqli_query($link, $tv);
                $tv_2 = mysqli_fetch_array($tv_1);
                $thuocloai = "$tv_2[thuocloai]";
                $mysql = mysqli_query($link, "select * from loai_tin_dichvu where id=$thuocloai limit 1");
                $row = mysqli_fetch_array($mysql);
                $ten = "$tv_2[tieude_en]";
                ?>
                <ul class="breadcrumb">
                    <li><a href="thicong-xaydung-lamdong"><i class="fa fa-home"></i> Trang chủ &nbsp;/&nbsp;</a></li>
                    <li><a href="donvithietke-xaydung-lamdong">Dịch vụ &nbsp;/&nbsp;</a></li>
                    <li><?php echo "$ten" ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page title end -->
<!-- END SECTION HEADINGS -->

<!-- START SECTION BLOG -->
<section class="blog blog-section bg-white">
    <div class="container" id="pinBoxContainer">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">

                <?php
                include_once("phan_trang.php");
                require('db.php');
                $p = new pager;
                $limit = 1;
                $start = $p->findStart($limit);
                $count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM tin_dichvu"));
                $pages = $p->findPages($count, $limit);
                $id = $_REQUEST["url"];
                $result = mysqli_query($link, "SELECT * FROM tin_dichvu where linkurl like '%" . $id . "%' order by id desc limit $start,$limit");
                // hiển thị DL
                if (mysqli_num_rows($result) <> 0) {
                    echo " <table width='100%' border='0' align='left'>";
                    $stt = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $ngay = $row->ngay;
                        $thuocloai = $row->thuocloai;
                        $tieude = doikyty($row->tieude);
                        $noidung = doikyty($row->noidung);
                        $mota = doikyty($row->mota);
                        $tieude_en = doikyty($row->tieude_en);
                        $tukhoa2 = doikyty($row->tukhoa2);
                        $facebook = $row->facebook;
                        $tukhoa = $row->tukhoa;
                        $url = khongdau($row->tieude_en);
                        $link = str_replace("?", "", strtolower("$url" . "-" . $row->id));
                        $hinhanh = "HinhCTSP/Hinhdichvu/" . $row->hinhanh;
                        $hinhanh = "<img src='$hinhanh'  text-align: center; style='width:70%' alt='$tieude_en' title='$tieude'  >  ";
                        if ($stt % 2 == 0) {
                            echo "<tr>";
                        }
                        echo "<td align='left' width='100%'>";
                        echo "<table align='left' width='100%'>";
                        echo "<div>
                                  <h1 style='padding: 0px;margin: 0px;font-size: 0px;line-height: 0px;color: #fff;'></i><a href='$link'>$tukhoa</a></h1>
                            <h3 style='font-size: 24px;
                            font-weight: bold;
                            margin-bottom: 15px;
                            line-height: 35px;'> $tieude_en</h3>

                    		<p style='font-size: 17px; color: #000' class='author_name'> $mota</p>

                                <div style='padding:20px; text-align: center;'>
                            	<a href='$link'> $hinhanh </a></div>
                               <div style='font-size: 18px; font-family:'Arial', sans-serif;' class='author_name'>
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
                    $tv = "SELECT * FROM (SELECT * FROM tin_tintuc  ORDER BY id DESC LIMIT 1, 100) as recent_news ORDER BY RAND() LIMIT 1";
                    $tv_1 = mysqli_query($link, $tv);
                    $a_tv_1 = mysqli_query($link, $tv);
                    ?>
                    <?php
                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                        $link_hinh = "HinhCTSP/Hinhtintuc/$tv_2[hinhanh]";
                        $id = "$tv_2[id]";
                        $tieude_en = "$tv_2[tieude_en]";
                        $tieude = "$tv_2[tieude]";
                        $url = $tv_2['linkurl'];
                        $link = str_replace("?", "", strtolower("tin-tuc/$url"));
                        ?>
                        <div style="padding: 10px;margin: 2px;font-size: 17px;font-weight: 300;">
                            <img src="hinhmenu/me-rev.gif" alt="<?php echo "$tieude"; ?>"
                                style="  margin-top:0px;width: 30px;padding-right: 10px; float: left;" />
                            <div class="author_name">
                                <h3 style="font-size: 17px; font-weight: 400; line-height:27px;" class="author_name"><a
                                        href="<?php echo "$link"; ?>"><?php echo "$tieude"; ?></a></h3>
                            </div>
                        </div>
                        <div class="rating_wrap">
                            <span class="rating_num"> </span>
                        </div>
                    <?php } ?>
                </div>


                <!-- đường dẫn h2 -->
                <div class="author_name">
                    <?php
                    include_once("phan_trang.php");
                    require('db.php');
                    $tv = "select * from gioi_thieu order by id=20 desc limit 0,1";
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
                                <img src="HinhCTSP/<?php echo $tv_2["hinhanh"]; ?>" alt="<?php echo "$tieude_en"; ?>" style='    text-align: center;
    padding: 20px;' />
                            </div>
                            <span style="font-size: 18px;"><?php echo "$noidung"; ?></span>

                        </div>
                        <div class="rating_wrap">
                            <span class="rating_num">
                            </span>
                        </div>
                    <?php } ?>
                </div>
                <!-- đường dẫn h2 -->
                <div class="share-linknd clearfix " style=' margin-top: 5px;
    margin-bottom: 12px;'>
                    <?php
                    require('db.php');
                    //$tv = "select * from tin_tintuc order by id desc limit 0,1";
                    $tv = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id asc LIMIT 1, 100) as recent_news ORDER BY RAND() LIMIT 1";
                    $tv_1 = mysqli_query($link, $tv);
                    $a_tv_1 = mysqli_query($link, $tv);
                    ?>
                    <?php
                    while ($tv_2 = mysqli_fetch_array($tv_1)) {
                        $link_hinh = "HinhCTSP/HinhSanPham/$tv_2[hinhanh]";
                        $id = "$tv_2[id]";
                        $tieude_en = "$tv_2[tieude_en]";
                        $tieude = "$tv_2[tieude]";
                        $url = $tv_2['linkurl'];
                        $link = str_replace("?", "", strtolower("dich-vu/$url"));
                        ?>
                        <div style="    padding: 10px;
    margin: 2px;
    font-size: 17px;
    font-weight: 300;"><img src="hinhmenu/me-rev.gif" alt="<?php echo "$tieude_en"; ?>" style="float: left;  margin-top: 0px;
    width: 30px;
    padding-right: 10px;" />
                            <h3 style="font-size: 17px; font-weight: 400; line-height:27px;"><a
                                    href="<?php echo "$link"; ?>"><?php echo "$tieude"; ?></a></h3>
                        </div>

                    <?php } ?>
                </div>
                <!-- Comments form end -->

                <div class="col-mob-12 col-xs-12 col-sm-12 col-md-12 col-lg-12"
                    style="margin-bottom: 20px;margin-top: 40px;">
                    <div style="border-bottom: 2px solid #000;
    padding: 7px;
    color: #c00;
        margin-bottom: 30px;
    font-weight: bold;font-size: 16px;
    padding-left: 5px;"><i class="fa fa-bars" style="padding-right:10px;"></i> TIN LIÊN QUAN </div>

                    <div class="row">

                        <?php
                        include_once("phan_trang.php");
                        require('db.php');
                        // Ensure $thuocloai is defined
                        $thuocloai = isset($thuocloai) ? $thuocloai : 0; // Default to 0 or appropriate value
                        $p = new pager;
                        $limit = 6;
                        $start = $p->findStart($limit);
                        $count_query = mysqli_query($link, "SELECT * FROM tin_dichvu WHERE thuocloai = " . $thuocloai);
                        $count = mysqli_num_rows($count_query);
                        $pages = $p->findPages($count, $limit);
                        $sql = mysqli_query($link, "SELECT * FROM (SELECT * FROM tin_dichvu WHERE thuocloai = $thuocloai ORDER BY id DESC LIMIT 100) AS latest_20 ORDER BY RAND() LIMIT 9");
                        // Error handling
                        if (!$sql) {
                            echo "Error: " . mysqli_error($link);
                        }
                        // Store IDs of related posts
                        $related_ids = [];
                        // Display data
                        while ($tv_2 = mysqli_fetch_array($sql)) {
                            $link_hinh = "HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
                            $related_ids[] = $id;
                            $thuocloai = $tv_2['tieude_en'];
                            $tieude_en = $tv_2['tieude_en'];
                            $tieude = $tv_2['tieude'];
                            $mota = $tv_2['mota'];
                            $ngay = $tv_2['ngay'];
                            $url = $tv_2['linkurl'];
                            $link = str_replace("?", "", strtolower("$url"));
                            ?>


                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="eblog-featured-news style-two small">
                                    <div class="image-area">
                                        <a href="<?php echo "$link" . '-' . $tv_2['id']; ?>"><img src="<?php echo $link_hinh; ?>"
                                                alt="<?php echo $tieude_en; ?>" /></a>
                                    </div>
                                    <div class="blog-content text-left">

                                        <h3 style="
    color: #222;
    font-size: 15px;
    font-weight: 800;
      text-transform: none;
    padding: 10px;"><a href="<?php echo "$link" . '-' . $tv_2['id']; ?>" style="line-height:22px;"><?php echo $tieude_en; ?> </a></h3>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>



                    </div>
                </div>
                <!-- Comments form end -->


            </div>


            <aside class="col-lg-3 col-md-12">
                <div class="pinBox">
                    <?php
                    include('menu_trai/lefttintuc.php');
                    ?>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->
<!-- Start Blog Area -->
<section class="eblog-bottom-post-area tp-section-gap blog-section .container">
    <div class="container">
        <div style="border-bottom: 2px solid #000;
    padding: 7px;
    color: #c00;
        margin-bottom: 30px;
    font-weight: bold;font-size: 16px;
    padding-left: 1px;"><i class="fa fa-bars" style="padding-right:10px;"></i> BẠN CẦN BIẾT </div>
        <div class="section-inner">
            <div class="row g-5">


                <?php
                require('db.php');

                // Function to fetch a random post
                function fetchRandomPost($link)
                {
                    $query = "SELECT * FROM (SELECT * FROM ma_sanpham ORDER BY id DESC LIMIT 100) as recent_news ORDER BY RAND() LIMIT 6";
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
                        $imageSrc = htmlspecialchars("HinhCTSP/HinhSanPham/{$row['hinhanh']}");
                        $postLink = htmlspecialchars(str_replace("?", "", strtolower("dich-vu/{$row['linkurl']}")));
                        $postTitle = htmlspecialchars($row['tieude']);
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
                                        <div class="heading-title ml--0 mb--10 text-start" style="font-size: 15px;
    line-height: 23px;
    padding: 10px;
    font-weight: bold; padding-bottom:30px"><?php echo $postTitle; ?></div>
                                    </a>

                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Không có bài viết nào.</p>
                <?php endif; ?>

                <?php
                $link->close();
                ?>


            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->

<script src="js/jquery.pinBox.js"></script>
<script>
    $(document).ready(function () {

        $(".pinBox").pinBox({
            //default 0px
            Top: '30px',
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