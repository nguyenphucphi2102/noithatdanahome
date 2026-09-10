<?php
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['luu'])) {
    $hoten = trim($_POST['txt_hoten'] ?? '');
    $diachi = trim($_POST['txt_diachi'] ?? '');
    $dt = trim($_POST['txt_dt'] ?? '');
    $email = trim($_POST['txt_email'] ?? '');
    $diemden = trim($_POST['txt_diemden'] ?? '');
    $fax = trim($_POST['txt_fax'] ?? '');
    $tieude = trim($_POST['txt_tieude'] ?? '');
    $noidung = trim($_POST['txt_nd'] ?? '');

    $tinnhan = "<html><body style='font-family:Arial,sans-serif'>
        <h2>Thông tin khách hàng</h2>
        <p><strong>Họ và tên:</strong> {$hoten}</p>
        <p><strong>Số điện thoại:</strong> {$dt}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Địa chỉ:</strong> {$diachi}</p>
        <p><strong>Nội dung:</strong> {$noidung}</p>
    </body></html>";

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'domainaz102@gmail.com';
        $mail->Password = 'jfkl nzio gkyu nxeu';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('domainaz102@gmail.com', $hoten);
        $mail->addAddress('hoaithuong22dn@gmail.com', 'DanaHome');
        $mail->isHTML(true);
        $mail->Subject = $tieude ?: ($hoten . ' - Yêu cầu tư vấn');
        $mail->Body = $tinnhan;
        $mail->AltBody = strip_tags($tinnhan);
        $mail->send();
        echo '<script>alert("Cảm ơn bạn đã liên hệ với DanaHome!"); window.location="?thamso=index.php";</script>';
    } catch (Exception $e) {
        echo '<script>alert("Không thể gửi yêu cầu lúc này. Vui lòng gọi hotline để được hỗ trợ.");</script>';
    }

    require 'db.php';
    $ketnoi_maychu = ketnoi_MC();
    chon_CSDL($ketnoi_maychu);
    $truyvan = "INSERT INTO lienhe(hoten, diemden, diachi, dt, email, fax, tieude, noidung) VALUES ('$hoten', '$diemden', '$diachi', '$dt', '$email', '$fax', '$tieude', '$noidung')";
    truyvan($truyvan, $ketnoi_maychu);
}
?>

<link rel="stylesheet" href="sitebds/css/css_lienhe.css">

<main class="contact-page">
    <section class="contact-hero">
        <div class="container contact-hero__inner">
            <div class="contact-hero__copy">
                <p class="contact-kicker">DANAHOME / CONTACT STUDIO</p>
                <h1>Kể chúng tôi nghe<br><em>về không gian bạn cần.</em></h1>
                <p class="contact-hero__lead">Từ một căn phòng trống đến một ngôi nhà có cá tính. Đội ngũ DanaHome sẵn sàng lắng nghe và biến ý tưởng của bạn thành không gian sống đáng tự hào.</p>
                <a class="contact-hero__phone" href="tel:0935911222"><i class="fa-solid fa-phone"></i><span><small>Gọi để được tư vấn ngay</small>0935 911 222</span></a>
            </div>
            <div class="contact-hero__stamp" aria-hidden="true"><span>DESIGN<br>&amp; BUILD</span><strong>DH</strong></div>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="contact-details__grid">
                <a class="contact-detail" href="mailto:danahome222@gmail.com">
                    <div class="contact-detail__media" style="background-image: url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=900&q=80');">
                        <div class="contact-detail__icon-wrap"><i class="fa-regular fa-envelope"></i></div>
                    </div>
                    <div class="contact-detail__body">
                        <h3 class="contact-detail__title">Gửi email</h3>
                        <p class="contact-detail__text contact-detail__text--small">danahome222@gmail.com</p>
                    </div>
                </a>

                <a class="contact-detail" href="tel:0935911222">
                    <div class="contact-detail__media" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=900&q=80');">
                        <div class="contact-detail__icon-wrap"><i class="fa-solid fa-phone-volume"></i></div>
                    </div>
                    <div class="contact-detail__body">
                        <h3 class="contact-detail__title">Liên hệ ngay</h3>
                        <p class="contact-detail__text">0935 911 222</p>
                    </div>
                </a>

                <div class="contact-detail">
                    <div class="contact-detail__media" style="background-image: url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=900&q=80');">
                        <div class="contact-detail__icon-wrap"><i class="fa-solid fa-location-dot"></i></div>
                    </div>
                    <div class="contact-detail__body">
                        <h3 class="contact-detail__title">Địa chỉ</h3>
                        <p class="contact-detail__text contact-detail__text--small">18 Kinh Dương Vương<br>Phường Thanh Khê<br>TP. Đà Nẵng</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-main">
        <div class="container contact-main__grid">
            <div class="contact-about">
                <span class="contact-badge">GỬI EMAIL</span>
                <h2>Liên hệ với chúng tôi nếu có thắc mắc</h2>
                <p>Bạn đang có nhu cầu xây nhà trọn gói hoặc cần tư vấn về thiết kế, thi công nội thất? Hãy liên hệ ngay với chúng tôi để nhận hỗ trợ nhanh chóng và giải pháp phù hợp nhất cho không gian của bạn.</p>
            </div>

            <div class="contact-form-panel">
                <form id="tt_mh" name="tt_mh" method="post" action="" class="contact-form">
                    <div class="contact-form__row">
                        <label>Họ tên<span>*</span><input name="txt_hoten" type="text" placeholder="Họ tên" required></label>
                        <label>Email<span>*</span><input name="txt_email" type="email" placeholder="Email" required></label>
                    </div>
                    <div class="contact-form__row">
                        <label>Số điện thoại<span>*</span><input name="txt_dt" type="tel" placeholder="Số điện thoại" required></label>
                        <label>Chủ đề<span>*</span><input name="txt_tieude" type="text" placeholder="Chủ đề" required></label>
                    </div>
                    <label class="contact-form__full">Nội dung<textarea name="txt_nd" placeholder="Nội dung" required></textarea></label>
                    <input name="txt_fax" type="hidden" value="">
                    <input name="txt_diachi" type="hidden" value="18 Kinh Dương Vương - Phường Thanh Khê - TP Đà Nẵng">
                    <input name="txt_diemden" type="hidden" value="18 Kinh Dương Vương - Phường Thanh Khê - TP Đà Nẵng">
                    <button name="luu" type="submit" class="contact-submit-btn"><span>Gửi liên hệ</span></button>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-map-section">
        <div class="container contact-map-wrap">
            <iframe
                src="https://www.google.com/maps?q=18+Kinh+D%C6%B0%C6%A1ng+V%C6%B0%C6%A1ng,+Ph%C6%B0%E1%BB%9Dng+Thanh+Kh%C3%AA,+%C4%90%C3%A0+N%E1%BA%B5ng&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen>
            </iframe>
        </div>
    </section>
</main>
