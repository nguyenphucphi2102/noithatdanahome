<div class="recent-post pt-5">
    <div class="font-weight-bold">BÀI VIẾT LIÊN QUAN</div>
    <div style="display: block; height: 3px; font-weight: bold; background-color: #FF385C; width: 111px; margin-top: .5rem; margin-bottom: 1rem;"></div>
    <?php
    require('db.php');
    $tv = "select * from ma_sanpham order by id desc limit 0,6";
    $tv_1 = mysqli_query($link, $tv);
    $a_tv_1 = mysqli_query($link, $tv);
    ?>
    <?php
    while ($row = mysqli_fetch_array($tv_1)) {
        $link_hinh = "HinhCTSP/HinhSanPham/" . $row['hinhanh'];
        $id = $row['id'];
        $tieude_en = $row['tieude_en'];
        $tieude = $row['tieude'];
        $mota = $row['mota'];
        $ngay = $row['ngay'];
        $url = $row['linkurl'];
        $link = str_replace("?", "", strtolower("dich-vu/$url"));
    ?>
        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12" style="padding:5px; float: left;">
            <div class="col-xl-4 col-lg-4 col-md-12 col-xs-12" style="border: 0px solid #000; float: left; padding:5px;">
                <div class="recent-img">
                    <a href="<?php echo "$link"; ?>"><img src="<?php echo $link_hinh; ?>" alt="<?php echo "$tieude_en"; ?>" /></a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-xs-12" style="border: 0px solid #f00; float: left; padding:3px;">
                <div class="info-img">

                    <div style="font-size: 14px;line-height: 22px; font-weight:bold"><a href="<?php echo "$link"; ?>"><?php echo "$tieude_en"; ?></a></div>

                </div>
            </div>
        </div>
    <?php } ?>

</div>