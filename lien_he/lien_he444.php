	<link rel="stylesheet" href="sitemaylanh/css/style.css"/>
	<link rel="stylesheet" href="sitemaylanh/css/font-awesome.min.css"/>

<?php
if (isset($_POST['luu'])) {
    include_once('database.php');
    $hoten = $_POST['txt_hoten'];
    $diachi = $_POST['txt_diachi'];
    $dt = $_POST['txt_dt'];
    $email = $_POST['txt_email'];
    $diemden = $_POST['txt_diemden'];
    $fax = $_POST['txt_fax'];
    $tieude = $_POST['txt_tieude'];
    $noidung = $_POST['txt_nd'];
    $email_lh = 'bm.binhminh.24@gmail.com';

    // Prepare the HTML content with inline CSS
    $tinnhan = "
    <html>
    <body style='font-family: Arial, sans-serif;'>
        <div style='width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; background-color: #f9f9f9;'>
            <div style='background-color: #4CAF50; padding: 10px 0; color: white; text-align: center; border-radius: 10px 10px 0 0;'>
                <h2>Thông Tin Khách Hàng</h2>
            </div>
            <div style='padding: 20px;'>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Họ Và Tên:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_hoten']}</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Email:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_email']}</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Số Điện Thoại:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_dt']}</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Địa Chỉ:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_diachi']}</span></div>
                <div style='margin-bottom: 15px;'><span style='font-weight: bold;'>Nội Dung:</span><span style='margin-left: 10px; color: #555;'>{$_POST['txt_nd']}</span></div>
            </div>
        </div>
    </body>
    </html>";
    $to = 'bm.binhminh.24@gmail.com';
    $subject = $tieude;
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";
    
    // Send email using PHP's mail function
    mail($to, $subject, $tinnhan, $headers);
    // Using PHPMailer for sending email with more options
    require("class.phpmailer.php");
    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->CharSet = "utf-8";

    $mailer->SMTPAuth = true;
    $mailer->SMTPSecure = "ssl";
    $mailer->Host = "smtp.gmail.com";
    $mailer->Port = 465;

    $mailer->Username = "domainaz102@gmail.com";
    $mailer->Password = "jfkl nzio gkyu nxeu";
    $mailer->AddAddress('bm.binhminh.24@gmail.com', 'Recipient Name');

    $mailer->FromName = $hoten;
    $mailer->From = $email;
    $mailer->Subject = "$hoten - Đăng Ký Tư Vấn";
    $mailer->IsHTML(true);

    $mailer->Body = $tinnhan;

    if (!$mailer->Send()) {
        echo "Không gửi được ";
        echo "Lỗi: " . $mailer->ErrorInfo;
        echo "<script>window.location='?thamso=index.php'</script>";
    } else {
        echo '<script>
            alert("Cảm ơn đã liên hệ với chúng tôi!");
            </script>';
    }

    $ketnoi_maychu = ketnoi_MC();
    chon_CSDL($ketnoi_maychu);
    $truyvan = "INSERT INTO lienhe(hoten,diemden,diachi,dt,email,fax,tieude,noidung) VALUES ('$hoten','$diemden','$diachi','$dt','$email','$fax','$tieude','$noidung')";
    $kequa_truyvan = truyvan($truyvan, $ketnoi_maychu);
    if ($kequa_truyvan)
        thanhcong($hoten, $diemden, $diachi, $dt, $email, $fax, $tieude, $noidung);
    else
        loi($hoten);
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
    if ($somautin > 0)
        echo "<script>window.location='?thamso=index.php'</script>";
    else
       echo "<script>window.location='?thamso=index.php'</script>";
}
?>
<!-- Page Title Start -->

<div class="page-title">

	<div class="container">

		<div class="row">

			<div class="col-md-12">

				<ul class="breadcrumb">

					<li><a href="home">Trang chủ / </a></li>

					<li>Liên hệ</li>

				</ul>

			</div>

		</div>

	</div>

</div>

<!-- Page title end -->
<!-- 1rd Block Wrapper Start -->
<section class="utf_block_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12 contact_area" style="padding: 20px;">
				<div style='font-size: 23px;
    color: #c00;
    line-height: 30px;'>Hãy gửi mail cho chúng tôi</div>
    
    <hr style='margin: 6px;'>
    </br>
				<form id="tt_mh" name="tt_mh" method="post" action=""  onsubmit="return checkInput();">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên </label>
								<input class="form-control form-control-name" type="text" name="txt_hoten" id="txt_hoten" required="" placeholder="Enter Full Name..." type="text" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Email</label>
								<input class="form-control form-control-email" type="text" name="txt_email" id="txt_email" required="" placeholder="Email..." type="email" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Hotline</label>
								<input class="form-control form-control-phone" type="text" name="txt_dt" id="txt_dt" required="" placeholder="Enter Hotline..." required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Địa chỉ</label>
								<input class="form-control form-control-subject" type="text" name="txt_diachi" id="txt_diachi" required="" placeholder="Enter Address..." required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Nội dung </label>
						<textarea class="form-control form-control-message" type="text" name="txt_nd" id="txt_nd" placeholder="Enter Content..." rows="10" required></textarea>
					</div>
					<div class="form-group" style="text-align: center; padding: 20px;">
						<button name="luu" type="submit" id="luu" class="btn btn-primary solid blank" type="submit" style="width: 40%;">Send Now </button>
					</div>
				</form>
			</div>
            
			<div class="col-lg-4 col-md-12 contact_detail_area">
				<div class="sidebar utf_sidebar_right">
					<div class="widget">
					
    </br>  </br>
						<ul class="contct_detail_list">
                        <div style='font-size: 23px;
    color: #000;
    line-height: 30px;'>THÔNG TIN LIÊN HỆ </div>
    </br>
							<!-- giới thiệu -->
							<p><b style="color:#c00;"> CÔNG TY TNHH MTV DỊCH VỤ KHẮC DẤU BÌNH MINH </b></p>
   
                            <p><b style="color:#c00;"> Địa chỉ:</b> 26 Nguyễn Duy, Cẩm Lệ, Đà Nẵng</p>
                            
                             <p><b style="color:#c00;"> Hotline:</b> 0973 611 973 </p>
                            <p><b style="color:#c00;"> Email:</b> bm.binhminh.24@gmail.com</p>
						</ul>

					</div>
                         
                         </br>
				
				</div>
			</div>
		</div>
	</div>
</section>