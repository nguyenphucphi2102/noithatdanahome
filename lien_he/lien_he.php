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
                <a class="contact-hero__phone" href="tel:0914454348"><i class="fa-solid fa-phone"></i><span><small>Gọi để được tư vấn ngay</small>0914 454 348</span></a>
            </div>
            <div class="contact-hero__stamp" aria-hidden="true"><span>DESIGN<br>&amp; BUILD</span><strong>DH</strong></div>
        </div>
    </section>

    <section class="contact-details">
        <div class="container">
            <div class="contact-details__grid">
                <a class="contact-detail" href="tel:0914454348"><span class="contact-detail__icon"><i class="fa-solid fa-phone"></i></span><span><b>Hotline tư vấn</b><strong>0914 454 348</strong><small>Thứ 2 - Thứ 7, 08:00 - 17:00</small></span></a>
                <a class="contact-detail" href="mailto:ngoky023@gmail.com"><span class="contact-detail__icon"><i class="fa-regular fa-envelope"></i></span><span><b>Email</b><strong>ngoky023@gmail.com</strong><small>Phản hồi trong vòng 24 giờ</small></span></a>
                <div class="contact-detail"><span class="contact-detail__icon"><i class="fa-solid fa-location-dot"></i></span><span><b>Văn phòng</b><strong>Khu phố 1B, P. An Phú</strong><small>TP. Hồ Chí Minh</small></span></div>
            </div>
        </div>
    </section>

    <section class="contact-main">
        <div class="container contact-main__grid">
            <div class="contact-about">
                <p class="contact-kicker">GẶP GỠ DANAHOME</p>
                <h2>Mỗi không gian đẹp đều bắt đầu từ một cuộc trò chuyện.</h2>
                <p>Chúng tôi cung cấp giải pháp thiết kế và thi công nội thất trọn gói, từ tư vấn ý tưởng, triển khai bản vẽ đến hoàn thiện tại công trình.</p>
                <ul class="contact-checklist">
                    <li><i class="fa-solid fa-check"></i> Tư vấn theo nhu cầu và ngân sách thực tế</li>
                    <li><i class="fa-solid fa-check"></i> Quy trình rõ ràng, chủ động tiến độ</li>
                    <li><i class="fa-solid fa-check"></i> Đồng hành sau khi bàn giao</li>
                </ul>
                <div class="contact-note"><i class="fa-solid fa-quote-left"></i><span>Đừng ngại bắt đầu bằng một ý tưởng còn dang dở. Chúng tôi sẽ cùng bạn làm rõ nó.</span></div>
            </div>

            <div class="contact-form-panel">
                <div class="contact-form-panel__head"><p class="contact-kicker">GỬI YÊU CẦU</p><h2>Để lại thông tin</h2><p>Chúng tôi sẽ liên hệ lại để trao đổi kỹ hơn về nhu cầu của bạn.</p></div>
                <form id="tt_mh" name="tt_mh" method="post" action="" class="contact-form">
                    <div class="contact-form__row"><label>Họ và tên<input name="txt_hoten" type="text" placeholder="Nguyễn Văn A" required></label><label>Số điện thoại<input name="txt_dt" type="tel" placeholder="0912 345 678" required></label></div>
                    <div class="contact-form__row"><label>Email<input name="txt_email" type="email" placeholder="email@example.com"></label><label>Địa điểm công trình<input name="txt_diemden" type="text" placeholder="Đà Nẵng, Hội An..." required></label></div>
                    <label>Địa chỉ<input name="txt_diachi" type="text" placeholder="Địa chỉ cụ thể"></label>
                    <label>Chủ đề trao đổi<input name="txt_tieude" type="text" placeholder="Thiết kế phòng khách, thi công trọn gói..." required></label>
                    <label>Nội dung cần tư vấn<textarea name="txt_nd" placeholder="Bạn đang hình dung không gian của mình như thế nào?" required></textarea></label>
                    <input name="txt_fax" type="hidden" value="">
                    <button name="luu" type="submit"><span>Gửi yêu cầu tư vấn</span><i class="fa-solid fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </section>

    <section class="contact-map-section"><div class="container contact-map"><div><p class="contact-kicker">ĐỊA CHỈ LÀM VIỆC</p><h2>Ghé DanaHome khi bạn tiện.</h2><p>Chúng tôi luôn chào đón bạn đến trao đổi trực tiếp về công trình và vật liệu.</p><a href="https://maps.google.com/?q=Khu+phố+1B,+Phường+An+Phú,+Hồ+Chí+Minh" target="_blank" rel="noopener">Mở trên Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i></a></div><div class="contact-map__visual"><i class="fa-solid fa-location-dot"></i><span>DANAHOME<br><small>TP. HỒ CHÍ MINH</small></span></div></div></section>
+</main>
