
<link rel="stylesheet" href="sitebds/css/footerweb.css">

<?php
$current_page = basename($_SERVER['REQUEST_URI']);
require_once __DIR__ . '/../db.php';

$conn = isset($link) && $link instanceof mysqli ? $link : null;
if (!$conn) {
    $conn = @mysqli_connect('localhost', 'root', '', 'noithatdanahome');
    if ($conn) {
        mysqli_set_charset($conn, 'utf8');
    }
}
?>

<?php
 include('jqueryfooter/hotline.php');
?>


  <footer class="ftr">
            <!-- Dải accent trên cùng -->
            <div class="ftr__accent-bar"></div>

            <div class="ftr__main">
                <div class="container">
                    <div class="row">

                        <!-- Cột 1: Thương hiệu -->
                        <div class="col-lg-4 col-md-12 col-sm-12 ftr__col ftr__col--brand">
                            <div class="ftr__brand-logo">
                                <span class="ftr__brand-icon"><i class="fa fa-home"></i></span>
                                <span class="ftr__brand-name">Dana<span>Home</span></span>
                            </div>
                            <p class="ftr__brand-desc">DanaHome tự hào là đơn vị thiết kế và thi công nội thất trọn gói
                                uy tín hàng đầu tại Đà Nẵng. Chúng tôi mang đến giải pháp tối ưu không gian sống từ
                                xưởng sản xuất trực tiếp.</p>
                            <div class="ftr__tagline">
                                <span class="ftr__tagline-text">KIẾN TẠO — KHÔNG GIAN — SỐNG</span>
                            </div>
                            <div class="ftr__social">
                                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class="ftr__social-btn ftr__social-btn--fb" title="Facebook"
                                    aria-label="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" class="ftr__social-btn ftr__social-btn--yt" title="Youtube"
                                    aria-label="Youtube">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" class="ftr__social-btn ftr__social-btn--ins" title="Instagram"
                                    aria-label="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="https://zalo.me/0935911222" target="_blank" rel="noopener noreferrer" class="ftr__social-btn ftr__social-btn--zalo" title="Zalo"
                                    aria-label="Zalo">
                                    <i class="fa fa-comments"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Cột 2: Dịch Vụ -->
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 ftr__col">
                            <h4 class="ftr__heading">
                                <span class="ftr__heading-dot"></span>Dịch Vụ
                            </h4>
                            <ul class="ftr__links">
                                <?php
                                $sql_dv = "SELECT id, tieude, linkurl FROM tin_dichvu ORDER BY id DESC LIMIT 5";
                                $query_dv = $conn ? mysqli_query($conn, $sql_dv) : false;

                                if ($query_dv && mysqli_num_rows($query_dv) > 0) {
                                    while ($row_dv = mysqli_fetch_assoc($query_dv)) {
                                        $id_dv = (int) $row_dv['id'];
                                        $tieude_dv = htmlspecialchars($row_dv['tieude'], ENT_QUOTES, 'UTF-8');
                                        $linkurl_dv = trim($row_dv['linkurl']);
                                        $href_dv = 'dich-vu-noi-that-' . $linkurl_dv . '-' . $id_dv;
                                        echo '<li><a href="' . $href_dv . '"><i class="fa fa-angle-right"></i>' . $tieude_dv . '</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="dich-vu-noi-that"><i class="fa fa-angle-right"></i>Thiết kế nội thất</a></li>';
                                    echo '<li><a href="dich-vu-noi-that"><i class="fa fa-angle-right"></i>Thi công nội thất</a></li>';
                                    echo '<li><a href="dich-vu-noi-that"><i class="fa fa-angle-right"></i>Cải tạo nhà phố</a></li>';
                                    echo '<li><a href="dich-vu-noi-that"><i class="fa fa-angle-right"></i>Thiết kế biệt thự</a></li>';
                                    echo '<li><a href="dich-vu-noi-that"><i class="fa fa-angle-right"></i>Thiết kế chung cư</a></li>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Cột 3: Dự Án -->
                        <div class="col-lg-2 col-md-4 col-sm-6 col-6 ftr__col">
                            <h4 class="ftr__heading">
                                <span class="ftr__heading-dot"></span>Dự Án
                            </h4>
                            <ul class="ftr__links">
                                <?php
                                $sql_da = "SELECT id, tieude, linkurl FROM tin_sanphama ORDER BY id DESC LIMIT 5";
                                $query_da = $conn ? mysqli_query($conn, $sql_da) : false;

                                if ($query_da && mysqli_num_rows($query_da) > 0) {
                                    while ($row_da = mysqli_fetch_assoc($query_da)) {
                                        $id_da = (int) $row_da['id'];
                                        $tieude_da = htmlspecialchars($row_da['tieude'], ENT_QUOTES, 'UTF-8');
                                        $linkurl_da = trim($row_da['linkurl']);
                                        $href_da = 'du-an-noi-that-' . $linkurl_da . '-' . $id_da;
                                        echo '<li><a href="' . $href_da . '"><i class="fa fa-angle-right"></i>' . $tieude_da . '</a></li>';
                                    }
                                } else {
                                    echo '<li><a href="du-an-noi-that"><i class="fa fa-angle-right"></i>Biệt thự hiện đại</a></li>';
                                    echo '<li><a href="du-an-noi-that"><i class="fa fa-angle-right"></i>Nhà phố đẹp</a></li>';
                                    echo '<li><a href="du-an-noi-that"><i class="fa fa-angle-right"></i>Căn hộ sang trọng</a></li>';
                                    echo '<li><a href="du-an-noi-that"><i class="fa fa-angle-right"></i>Showroom nội thất</a></li>';
                                    echo '<li><a href="du-an-noi-that"><i class="fa fa-angle-right"></i>Văn phòng hiện đại</a></li>';
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- Cột 4: Liên Hệ -->
                        <div class="col-lg-4 col-md-4 col-sm-12 ftr__col">
                            <h4 class="ftr__heading">
                                <span class="ftr__heading-dot"></span>Liên Hệ
                            </h4>
                            <ul class="ftr__contact">
                                <li class="ftr__contact-item">
                                    <span class="ftr__contact-icon"><i class="fa fa-map-marker"></i></span>
                                    <span class="ftr__contact-text">123 Đường Nguyễn Văn Linh, Hải Châu, Đà Nẵng</span>
                                </li>
                                <!-- <li class="ftr__contact-item">
                                    <span class="ftr__contact-icon"><i class="fa fa-industry"></i></span>
                                    <span class="ftr__contact-text">Lô 45 KCN Hòa Khánh, Đà Nẵng</span>
                                </li> -->
                                <li class="ftr__contact-item">
                                    <span class="ftr__contact-icon"><i class="fa fa-phone"></i></span>
                                    <span class="ftr__contact-text"><a href="tel:0935911222">0935 911 222</a>
                                        <em>(Zalo)</em></span>
                                </li>
                                <li class="ftr__contact-item">
                                    <span class="ftr__contact-icon"><i class="fa fa-envelope-o"></i></span>
                                    <span class="ftr__contact-text"><a
                                            href="mailto:danahome222@gmail.com">danahome222@gmail.com</a></span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="ftr__bottom">
                <div class="ftr__bottom-divider"></div>
                <div class="container">
                    <div class="ftr__bottom-inner">
                        <p class="ftr__copyright">&copy; 2026 <strong>DanaHome</strong>. Bản quyền thuộc về DanaHome.
                        </p>
                        <div class="ftr__bottom-cert">
                            <span class="ftr__cert-badge"><i class="fa fa-shield"></i> Uy tín &amp; Chất lượng</span>
                            <span class="ftr__cert-badge"><i class="fa fa-star"></i> 5 năm kinh nghiệm</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>