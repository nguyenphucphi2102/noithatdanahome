<style>
/* ===================================
   LIÊN HỆ
=================================== */

.titlelienheatv{
    position:relative;

    padding:0px 0;

    background:
    linear-gradient(rgba(15,23,42,.60),rgba(15,23,42,.60)),
    url("hinhmenu/bg-lienhe.jpg") no-repeat center center;

    background-size:cover;

    overflow:hidden;
}

/* ===================================
   FORM
=================================== */

.titlelienheatv-form{
    max-width:620px;

    background:rgba(255,255,255,.96);

    padding:40px;

    border-radius:0px;

    border:1px solid rgba(255,255,255,.3);

    box-shadow:
    0 20px 50px rgba(0,0,0,.14);

    backdrop-filter:blur(8px);

    transition:.35s ease;
}

.titlelienheatv-form:hover{
    transform:translateY(-4px);
}

/* ===================================
   HEADER
=================================== */

.titlelienheatv-header{
    margin-bottom:24px;
}

.titlelienheatv-title{
    font-size:34px;
    font-weight:800;
    color:#0f172a;

    line-height:1.3;

    margin-bottom:10px;
}

.titlelienheatv-desc{
    font-size:15px;
    line-height:1.7;

    color:#64748b;
}

/* ===================================
   INPUT
=================================== */

.titlelienheatv-form p{
    margin-bottom:18px;
}

.titlelienheatv-form input{
    width:100%;
    height:56px;

    padding:0 18px;

    border:1px solid #dbe4ee;
    border-radius:14px;

    background:#fff;

    font-size:15px;
    color:#0f172a;

    outline:none;

    transition:.3s ease;
}

/* PLACEHOLDER */

.titlelienheatv-form input::placeholder{
    color:#94a3b8;
}

/* FOCUS */

.titlelienheatv-form input:focus{
    border-color:#0097fc;

    box-shadow:
    0 0 0 4px rgba(0,151,252,.10);
}

/* ===================================
   BUTTON
=================================== */

.titlelienheatv-btn{
    width:100%;
    height:56px;

    border:none;
    border-radius:14px;

    background:
    linear-gradient(135deg,#0097fc,#0077ff);

    color:#fff;

    font-size:16px;
    font-weight:700;

    cursor:pointer;

    transition:.35s ease;
}

.titlelienheatv-btn:hover{
    transform:translateY(-2px);

    box-shadow:
    0 14px 28px rgba(0,119,255,.24);
}

/* ===================================
   MOBILE
=================================== */

@media(max-width:768px){

    .titlelienheatv{
        padding:0px 0px;
    }

    .titlelienheatv-form{
        padding:24px;
        border-radius:0px;
    }

    .titlelienheatv-title{
        font-size:28px;
    }

    .titlelienheatv-desc{
        font-size:14px;
    }

    .titlelienheatv-form input{
        height:52px;
        font-size:14px;
    }

    .titlelienheatv-btn{
        height:52px;
        font-size:15px;
    }

}
</style>

<?php
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Kiểm tra nếu form đã được gửi
if (isset($_POST['gui_lienhe'])) {
    // Lấy dữ liệu từ form
    $hoten = $_POST['txt_hoten'];
    $diachi = $_POST['txt_diachi'];
    $dt = $_POST['txt_dt'];
    $email = $_POST['txt_email'];
    $diemden = $_POST['txt_diemden'];
    $fax = $_POST['txt_fax'];
    $tieude = $_POST['txt_tieude'];
    $noidung = $_POST['txt_nd'];

    // Tạo nội dung email
    $tinnhan = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <div style='width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;'>
            <div style='background-color: #4CAF50; padding: 10px 0; color: white; text-align: center; border-radius: 10px 10px 0 0;'>
                <h2>CONTACT US</h2>
            </div>
            <div style='padding: 20px;'>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Họ Và Tên:</span><span style='margin-left: 10px; color: #555;'>$hoten</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Email:</span><span style='margin-left: 10px; color: #555;'>$email</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Địa Chỉ:</span><span style='margin-left: 10px; color: #555;'>$diachi</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Số Điện Thoại:</span><span style='margin-left: 10px; color: #555;'>$dt</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Nội Dung:</span><span style='margin-left: 10px; color: #555;'>$noidung</span></div>
            </div>
        </div>
    </body>
    </html>";

    // Cấu hình PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'domainaz102@gmail.com'; // Địa chỉ email gửi
        $mail->Password = 'jfkl nzio gkyu nxeu'; // Mật khẩu email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        // Người nhận
        $mail->setFrom('domainaz102@gmail.com', $hoten);
        $mail->addAddress('ngoky023@gmail.com', 'Recipient Name');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "$hoten - Đăng Ký Thông Tin Dịch Vụ";
        $mail->Body    = $tinnhan;
        $mail->AltBody = strip_tags($tinnhan);

        $mail->send();
        echo '<script>alert("Cảm ơn đã liên hệ với chúng tôi!"); window.location="?thamso=index.php";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Kết nối và lưu dữ liệu vào cơ sở dữ liệu
    require 'db.php'; // Thay thế bằng tệp kết nối cơ sở dữ liệu của bạn

    $ketnoi_maychu = ketnoi_MC();
    chon_CSDL($ketnoi_maychu);
    $truyvan = "INSERT INTO lienhe(hoten, diemden, diachi, dt, email, fax, tieude, noidung) VALUES ('$hoten', '$diemden', '$diachi', '$dt', '$email', '$fax', '$tieude', '$noidung')";
    $kequa_truyvan = truyvan($truyvan, $ketnoi_maychu);

    if ($kequa_truyvan) {
        thanhcong($hoten, $diemden, $diachi, $dt, $email, $fax, $tieude, $noidung);
    } else {
        loi($hoten);
    }

    mysql_close($ketnoi_maychu);
}

function thanhcong($hoten, $diemden, $diachi, $dt, $email, $fax, $tieude, $noidung)
{
    // Success handling code
}

function loi($hoten)
{
    $ketnoi_maychu = ketnoi_MC();
    chon_CSDL($ketnoi_maychu);
    $truyvan = "SELECT * FROM lienhe WHERE hoten='$hoten'";
    $kequa_truyvan = truyvan($truyvan, $ketnoi_maychu);
    $somautin = @mysql_num_rows($kequa_truyvan);
    if ($somautin > 0) {
        echo '<script>window.location="?thamso=index.php";</script>';
    } else {
        echo '<script>window.location="?thamso=index.php";</script>';
    }
}
?>

<!-- Page Title Start -->

<section class="titlelienheatv">

    <section class="container" style='padding:0px;'>

        <article class="titlelienheatv-form">

            <header class="titlelienheatv-header">

                <h2 class="titlelienheatv-title" style='color:#c00;'>
                    Đặt Lịch Hẹn
                </h2>

                <p class="titlelienheatv-desc">
                    Vui lòng để lại thông tin của bạn để được hỗ trợ nhanh chóng
                </p>

            </header>

            <form id="tt_mh" name="tt_mh" method="post" action="xulylienhe/xuly_lienhe.php"  onsubmit="return checkInput();">

                <p>
                    <input type="text"
                           name="txt_hoten"
                           placeholder="Họ và tên..."
                           required>
                </p>

                <p>
                    <input type="text"
                           name="txt_dt"
                           placeholder="Hotline..."
                           required>
                </p>

                <p>
                    <input type="text"
                           name="txt_tieude"
                           placeholder="Nội dung cần tư vấn..."
                           required>
                </p>
         
                <button type="submit" name="gui_lienhe"
                        class="titlelienheatv-btn">

                    ĐĂNG KÝ NGAY

                </button>

            </form>

        </article>

    </section>

</section>