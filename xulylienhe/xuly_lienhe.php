<?php
require 'PHPMailer.php';
require 'Exception.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (
    !empty($_POST['email_fake']) ||
    !empty($_POST['phone_fake']) ||
    !empty($_POST['name_fake'])
) {
    die("Bot detected.");
}

function isNameValid($hoten)
{
    // Chấp nhận chữ cái, dấu cách và dấu tiếng Việt, ít nhất 2 ký tự
    return preg_match("/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỳỵỷỹýỲỴỶỸ\s]{2,100}$/", $hoten);
}

// Hàm kiểm tra số điện thoại hợp lệ
function isPhoneValid($sdt)
{
    return preg_match("/^[0-9\-\+\s]{9,15}$/", $sdt);
}

// Kiểm tra nếu form đã được gửi
if (isset($_POST['luu'])) {
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
        <div style='width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #ffffff;'>
            <div style='background-color: #4CAF50; padding: 15px; color: white; text-align: center; border-radius: 10px 10px 0 0;'>
                <h2 style='margin: 0;'>Thông Tin Khách Hàng</h2>
            </div>
            <div style='padding: 20px;'>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold; font-size: 16px;'>Họ Và Tên:</span> <span style='margin-left: 10px; color: #555;'>$hoten</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold; font-size: 16px;'>Email:</span> <span style='margin-left: 10px; color: #555;'>$email</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold; font-size: 16px;'>Địa Chỉ:</span> <span style='margin-left: 10px; color: #555;'>$diachi</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold; font-size: 16px;'>Số Điện Thoại:</span> <span style='margin-left: 10px; color: #555;'>$dt</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold; font-size: 16px;'>Nội Dung:</span> <span style='margin-left: 10px; color: #555;'>$noidung</span></div>
            </div>
            <p style='text-align: center; font-size: 14px; color: #777;'>2025 © ĐIỆN LẠNH QUỐC KHÁNH ĐÀ NẴNG.</p>
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
        $mail->Username = ' quockhanh1080@gmail.com'; // Địa chỉ email gửi
        $mail->Password = 'jfkl nzio gkyu nxeu'; // Mật khẩu email
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        // Người nhận
        $mail->setFrom(' quockhanh1080@gmail.com', $hoten);
        $mail->addAddress('quockhanh1080@gmail.com', 'Recipient Name');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "$hoten - Đăng Ký Thông Tin Dịch Vụ";
        $mail->Body = $tinnhan;
        $mail->AltBody = strip_tags($tinnhan);

        $mail->send();
        echo '<script>alert("Cảm ơn đã liên hệ với chúng tôi!");   window.location.href = "http://localhost:81/inan2/?thamso=index.php" </script>';
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

    mysqli_close($ketnoi_maychu);
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
    $somautin = @mysqli_num_rows($kequa_truyvan);
    if ($somautin > 0) {
        echo '<script>window.location="?thamso=index.php";</script>';
    } else {
        echo '<script>window.location="?thamso=index.php";</script>';
    }
}
?>