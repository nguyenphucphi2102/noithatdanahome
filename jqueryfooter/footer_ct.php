<style>
    .chu-trang{
           color: #fff;
    font-size: 15px;
    line-height: 32px;
    }
     .chu-trang:hover{
        color:#ff0;
    }
    .newsletter-section {
        background: linear-gradient(to right,#0096fc, #f69217);
        padding: 20px  0;
        color: #ffffff;
    }
    .footer-social a {
    display: inline-block;
    margin-right: 15px;
    font-size: 22px;
    color: #fff;
    width: 40px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 50%;
    background-color: rgba(137, 223, 98, 0.73);
    transition: color 0.3s ease, transform 0.3s ease;
}
    .newsletter-title {
         font-size: 18px;
    font-weight: 600;
    margin-bottom: 5px;
    color: #ff0;
    margin-top: 10px;
    }

    .newsletter-desc {
        font-size: 16px;
        opacity: 0.9;
    }

    .newsletter-form input.form-control {
        border: none;
        height: 45px;
        border-radius: 5px;
        padding-left: 15px;
        margin: 10px 0;
    }

    .newsletter-form .btn {
       width: 150px;
    height: 47px;
    border-radius: 5px;
    background-color: #c00;
    color: #fff;
    border: none;
    transition: background-color 0.3s ease;
    margin-top: 9px;
    font-size: 18px;
    }

    .newsletter-form .btn:hover {
        background-color: #006edc;
    }

    a {
        transition: .3s;

    }

    a:hover,
    a:active,
    a:focus {
        outline: none;
        text-decoration: none;
      
    }

    .footer {
        position: relative;
       
   
    }
   .footernewbg{
          padding: 40px 0;
    text-align: center;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-color: #0197fb;
    text-align: left;
    position: relative;
    padding-bottom: 20px;
    background-attachment: fixed;
    background-image: url(hinhmenu/address-bg.png);
   }
    .footer .footer-blog,
    .footer .footer-insta,
    .footer .footer-tags,
    .footer .footer-newsletter {
        position: relative;
        margin-bottom: 25px;
    }

    .footer .footer-newsletter input::placeholder {
        color: #eeeeee;
        opacity: 1;
    }

    .footer .footer-blog h3,
    .footer .footer-insta h3,
    .footer .footer-tags h3,
    .footer .footer-newsletter h3 {
        position: relative;
        margin-bottom: 20px;
        padding-bottom: 10px;
        font-size: 18px;
        font-weight: 400;
        color: #ffffff;
    }

    .footer .footer-blog h3::after,
    .footer .footer-insta h3::after,
    .footer .footer-tags h3::after,
    .footer .footer-newsletter h3::after {
        position: absolute;
        content: "";
        width: 50px;
        height: 2px;
        left: 0;
        bottom: 0;
        background: #ffffff;
    }

    .footer-title {
        position: relative;
        margin-bottom: 20px;
        padding-bottom: 10px;
        font-size: 18px;
        font-weight: 400;
        color: #ffffff;
    }

    .footer-title::after {
        position: absolute;
        content: "";
        width: 50px;
        height: 2px;
        left: 0;
        bottom: 0;
        background: #ffffff;
    }


    .footer .footer-blog div {
        position: relative;
        /* padding-left: 15px; */
    }

    /* .footer .footer-blog div::before {
        position: absolute;
        content: "\f105";
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        color: #cccccc;
        left: 0;
    } */

    .footer .footer-blog div a {
        display: block;
        margin-bottom: 12px;
        font-size: 16px;
        color: #cccccc;
    }

    .footer .footer-blog div a:hover {
        color: #0085ff;
    }

    .footer .footer-blog div p {
        /* padding-left: 20px; */
        color: #c5bfbf;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    /* .footer .footer-blog div p::before {
        position: absolute;
        content: "\f017";
        font-family: "Font Awesome 5 Free";
        font-weight: 400;
        color: #757575;
        left: 15px;
    } */

    .footer .footer-insta {
        float: left;
        font-size: 0;
    }

    .footer .footer-insta a {
        padding: 0 5px 5px 0;
        display: block;
        width: 33.33%;
        float: left;
    }

    .footer .footer-insta a img {
        width: 100%;
    }

    .footer .footer-consultants h3 {
        color: #ffffff;
        margin-bottom: 20px;
        font-size: 18px;
        font-weight: 400;
        padding-bottom: 8px;
        border-bottom: 2px solid #ffffff;
    }

    .footer .consultant img {
        border: 2px solid #ffffff;
    }

    .footer .consultant div {
        color: #dddddd;
        font-size: 15px;
        line-height: 1.2;
        padding: 8px 7px;
    }


    .footer .footer-tags {
        font-size: 0;
    }

    .footer .footer-tags a {
        display: inline-block;
        margin: 0 5px 5px 0;
        padding: 3px 8px;
        font-size: 14px;
        color: #dddddd;
        text-transform: capitalize;
        border: 1px solid #dddddd;
    }

    .footer .footer-tags a:hover {
        color: #ffffff;
        background: #0085ff;
        border-color: #0085ff;
    }

    .footer .footer-newsletter .form {
        position: relative;
        width: 100%;
    }

    .footer .footer-newsletter input {
        height: 45px;
        border: 1px solid #dddddd;
        border-radius: 0;
        color: #fff;
        background: #121518;
        margin-bottom: 15px;
    }

    .footer .footer-newsletter .btn {
        display: block;
        width: 100%;
        height: 45px;
        padding: 8px 20px;
        font-size: 16px;
        font-weight: 400;
        text-transform: uppercase;
        color: #dddddd;
        background: #000000;
        border-radius: 0;
        border: 1px solid #dddddd;
        transition: .3s;
    }

    .footer .footer-newsletter .btn:hover {
        color: #ffffff;
        background: #0085ff;
        border-color: #0085ff;
    }

    .footer .footer-newsletter .btn:focus {
        box-shadow: none;
    }

    .footer .footer-contact {
        position: relative;
        padding: 25px 0;
        text-align: center;
        border-top: 1px solid rgba(256, 256, 256, .1);
    }

    .footer .footer-contact h4 {
        position: relative;
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #ffffff;
    }

    .footer .footer-contact p {
        margin: 0;
        font-size: 16px;
        color: #999999;
    }

    .footer .footer-contact a {
        display: inline-block;
    }

    .footer .footer-contact a i {
        margin-right: 10px;
        font-size: 18px;
        color: #999999;
    }

    .footer .footer-contact a:last-child i {
        margin: 0;
    }

    .footer .footer-contact a:hover i {
        color: #0085ff;
    }

    @media (max-width: 767.98px) {
        .footer .footer-contact .col-md-4 {
            margin-bottom: 25px;
        }

        .footer .footer-contact .col-md-4:last-child {
            margin: 0;
        }
    }

    .footer .copyright {
            position: relative;
    /* padding: 10px 0; */
    background: #f69118;
    padding-top: 11px;
    padding-bottom: 10px;
    }

    .footer .copyright .copy-text p {
        margin: 0;
        font-size: 15px;
        color: #000;
    }

    .footer .copyright .copy-text p a {
        color: #000;
    }

    .footer .copyright .copy-text p a:hover {
        color: #0085ff;
    }

     .footer .copyright .copy-menu {
        position: relative;
        font-size: 0;
        text-align: right;
        display: flex;
        gap: 40px;
        justify-content: flex-end;

    }

    .footer .copyright .copy-menu a {
        color: #000;
        font-size: 15px;
        margin-right: 15px;
        padding-right: 15px;
        border-right: 1px solid rgba(255, 255, 255, .3);
    }

    .footer .copyright .copy-menu a:hover {
        color: #0085ff;
    }

    .footer .copyright .copy-menu a:last-child {
        margin-right: 0;
        padding-right: 0;
        border-right: none;
    }

    @media (max-width: 767.98px) {

        .footer .copyright .copy-text,
        .footer .copyright .copy-menu {
            text-align: center;
        }

        .footer .copyright .copy-text p {
            margin-bottom: 5px;
        }

    }
</style>

<?php
$current_page = basename($_SERVER['REQUEST_URI']);
?>


<?php

        include('lien_he/lien_hetc.php');

?>



<div class="footer footernewbg">
    <div class="container">
        <div class="row">
            <!-- Blog -->

            <!-- Công ty -->
            <div class="col-md-12 col-lg-5" style='border: 0px solid #f00;'>
                <div style='font-size: 21px; color: #fff; line-height: 31px;'><b>ĐIỆN MÁY QUỐC KHÁNH </b></div>
               
        <p style='font-size: 14px; font-weight: 600; color: #ff0;'> CHUYÊN MUA BÁN - SỬA CHỮA ĐIỆN LẠNH CÁC LOẠI </p>
                 
        <div style='font-size: 15px; color: #fff; line-height: 25px;'>Samsung, LG, Panasonic, Toshiba, Sharp, Electrolux, Hitachi, Aqua, Sanyo, Daikin, Mitsubishi Electric, Midea, Casper..</div>
        
        
        <!-- trụ sở công ty -->
        </br>
        <div style='border-bottom: 1px solid #07924f; margin-bottom: 16px;'> </div>
        
       <div style='font-weight: 700; color: #ff0;margin-bottom: 10px;line-height: 25px;'>  THÔNG TIN CÔNG TY: </div>
        
       <!-- <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> -->
        
       <!-- <i class='fa fa-map-marker' style='color:#ff0;padding-right: 5px'></i> 522 Nguyễn Phước Nguyên, An Khê, Đà Nẵng-->
       <!-- </div>-->
        
       <!--    <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> -->
        
       <!--<i class='fa fa-phone' style='color:#ff0;padding-right: 5px'></i>  0906 087 817 </div>-->
        
       <!-- <div style='border-bottom: 1px solid #07924f; margin-bottom: 16px;'> </div>-->
        
        
        <!-- nhà máy công ty -->
        
       <!--<div style='font-weight: 700; color: #ff0;margin-bottom: 10px;line-height: 25px;'>  NHÀ KHO: </div>-->
         <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> 
        <b>MST:</b> 049087000707 do Sở Kế Hoạch và Đầu Tư Thành Phố Đà Nẵng cấp ngày 02/04/2026
        </div>
        <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> 
        <i class='fa fa-home' style='color:#ff0;padding-right: 5px'></i>CS1: 522 Nguyễn Phước Nguyên - Đà Nẵng
        </div>
        <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> 
        <i class='fa fa-home' style='color:#ff0;padding-right: 5px'></i>CS2: : 14 Đông Lợi 4 (261 Trường Chinh rẽ vào) - Đà Nẵng
        </div>
        
        
        <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'>  
        <i class='fa fa-phone' style='color:#ff0;padding-right: 5px'></i>  0906 087 817
        </div>
        
       <div style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px;'> 
        
      <i class="fab fa-facebook-f footer-icon" style='color:#ff0;'></i> <a href="https://www.facebook.com/Bantulanhcugiaredanang/">  <font style='color:#fff;  padding-left: 8px;'> Điện máy thanh lý Quốc Khánh 0906087817  </font></a>
        </div>
         <!-- mail công ty -->
        
        <div style='border-bottom: 1px solid #07924f; margin-bottom: 16px;'> </div>
        
        <div  class="col-12 col-md-4 col-lg-6" style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px; float:left;'> 
        <i class='fas fa-envelope mr-2' style='color:#ff0;padding-right: 5px'></i> quockhanh1080@gmail.com
        </div>
        
        
        <div class="col-12 col-md-4 col-lg-6" style='font-size: 15px; color: #fff; line-height: 25px; margin-bottom: 10px; float:left;'>  
        <i class='fa fa-home' style='color:#ff0;padding-right: 5px'></i>  dienmayquockhanh.com.vn
        </div>
        
        <!--<div class='col-12 col-md-12 col-lg-12'>-->
        <!--<div class="col-12 col-md-4 col-lg-6" style='border: 0px solid #f00; float:left;'> -->
        <!--  <div style='color: #fff;font-size: 15px;margin-bottom: 10px;'> <i class='fas fa-envelope mr-2' style='color:#ff0;padding-right: 5px'></i> quockhanh1080@gmail.com</div>-->
        <!--</div> -->
        
        <!--<div class="col-12 col-md-4 col-lg-6" style='border: 0px solid #f00; float:left;'>-->
        <!--         <div style='color: #fff;font-size: 15px;margin-bottom: 10px;'><i class='fa fa-home' style='color:#ff0;padding-right: 5px'></i> dienmayquockhanh.com.vn</div>-->
        <!--</div>  -->
        <!--</div>-->
        <!-- nhà máy công ty -->
        </br>
        
        <div style='font-weight: 700; color: #ff0;margin-bottom: 10px;line-height: 25px;'>  KẾT NỐI VỚI CHÚNG TÔI: </div>
        
                 <div class="footer-social mt-4">
                        <a href="https://www.facebook.com/Bantulanhcugiaredanang/"><i class="fab fa-facebook-f footer-icon"></i></a>
                        <a href="https://www.facebook.com/Bantulanhcugiaredanang/"><i class="fab fa-twitter footer-icon"></i></a>
                        <a href="https://www.facebook.com/Bantulanhcugiaredanang/"><i class="fab fa-youtube footer-icon"></i></a>
                        <a href="https://www.facebook.com/Bantulanhcugiaredanang/"><i class="fab fa-tiktok footer-icon"></i></a>
                    </div>
        
        
            </div>
              
         


            <!-- Tư vấn viên -->
            
           <!-- Công ty -->
            <div class="col-md-12 col-lg-3" style='border: 0px solid #f00;'>
                <div style='font-size: 17px; color: #ff0;'><b>VỀ CHÚNG TÔI </b></div>
                <div class="footer-blog">

                <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/trang-chu">Trang chủ </a> </li>
                <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/gioi-thieu/dien-lanh-da-nang">Giới thiệu</a> </li>
                <li style='color:#fff;line-height:29px;'><a class="chu-trang" href="/muaban-tulanhcu-danang/may-giat">Máy giặt cũ </a>   </li>
                <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/muaban-tulanhcu-danang/tu-lanh">Tủ lạnh cũ </a> </li>
                <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/muaban-tulanhcu-danang/may-lanh">Máy lạnh cũ </a> </li>
                <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/muaban-tulanhcu-danang/may-nuoc-nong">Máy nước nóng cũ </a> </li>
                </div>
                
                
                <div style='font-size: 17px; color: #ff0;   margin-bottom: 17px;'><b>LỊCH LÀM VIỆC </b></div>
                <div class="footer-blog">

              <div style='color:#fff;line-height:29px; font-size: 15px;'> Làm việc tất cả các ngày trong tuần  </div>
              <div style='color:#fff;line-height:29px; font-size: 15px;'> Sáng: 8h - 12h   </div>
              <div style='color:#fff;line-height:29px; font-size: 15px;'> Chiều: 13h30 - 17h30  </div>
        


                </div>
                

                  <div class="footer-title"><b>CHẤP NHẬN THANH TOÁN</b></div>
                <div class="footer-blog">

               <img src="hinhmenu/payment.png" alt="Tư vấn viên">


                </div>
            </div>



            <!-- Tags -->


            <!-- Newsletter -->
            <div class="col-md-12 col-lg-4" style='border: 0px solid #f00;'>

                <div>

                   <div style='font-size: 17px; color: #ff0; margin-bottom: 10px;'><b> TƯ VẤN ĐẶT HÀNG </b></div>

                </div>

                <div style='margin-bottom: 25px;'><b style='color: #fff;
    font-size: 16px;'>Hotline:</b> <font style='font-size: 22px;
    color: #fff;'>0906 087 817 </font></div>

            
            <div style='font-size: 17px; color: #ff0; margin-bottom: 10px;'><b>CHÍNH SÁCH & ĐIỀU KHOẢN </b></div>
                <div class="footer-blog">

              <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/chinh-sach/chinh-sach-bao-mat-thong-tin">Chính sách bảo mật </a> </li>
              <li style='color:#fff;line-height:29px;'><a class="chu-trang" href="/chinh-sach/chinh-sach-doi-tra"> Chính sách đổi trả  </a>   </li>
              <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/chinh-sach/chinh-sach-kiem-hang">Chính sách kiểm hàng  </a> </li>
              <li style='color:#fff;line-height:29px;'> <a class="chu-trang" href="/chinh-sach/chinh-sach-van-chuyen">Chính sách vận chuyển </a> </li>

                </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.35385671822!2d108.18415188198627!3d16.047117082158504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142190b0bd75263%3A0xfcba43da0faddcef!2zxJBp4buHbiBNw6F5IFF14buRYyBLaMOhbmg!5e0!3m2!1sen!2s!4v1758702277453!5m2!1sen!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            </div>

        </div>

    </div>
    
    


<div class="footer">
  
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-left mb-2 mb-md-0">
                    <div class="copy-text">
                        <p>Bản quyền © 2025 <a href="#"><b>Điện Máy Quốc Khánh</b> </a></p>
                    </div>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <div class="copy-menu">

                        <?php include 'counter.php'; ?>


        <div class="visitor-box">
            <p>👥 Đang truy cập: </p>
            <p class="number"><?php echo $online; ?></p>
        </div>

        <div class="visitor-box">
            <p>📈 Tổng lượt truy cập: </p>
            <p class="number"><?php echo $total; ?></p>
        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div>


<!--đếm truy cập-->
<style>

.visitor-box {
    border-radius: 12px;
    text-align: end;
    transition: 0.3s ease;
    display: flex;
}

.visitor-box p {
    font-size: 15px;
    margin-bottom: 10px;
    font-weight: bold;
}

.number {
    font-weight: bold;
    color: #fff;
    margin-bottom: 10px;
    padding-left: 15px;
    font-size: 15px;
}



/* Mobile */
@media (max-width: 900px) {

    .visitor-box {
        padding: 0;
    }

}
</style>

<script>
    function checkInput() {
        const hoten = document.getElementById('txt_hoten').value.trim();
        const sdt = document.getElementById('txt_dt').value.trim();

        // Honeypot checks
        if (
            document.getElementById('email_fake').value !== '' ||
            document.getElementById('phone_fake').value !== '' ||
            document.getElementById('name_fake').value !== ''
        ) {
            console.warn("Bot detected.");
            return false;
        }

        const nameRegex = /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểẾỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỳỵỷỹýỲỴỶỸ\s]{2,100}$/;
        const sdtRegex = /^[0-9\-\+\s]{10,11}$/;

        if (hoten === '' || sdt === '') {
            alert("Vui lòng điền đầy đủ Họ Tên và Số Điện Thoại.");
            return false;
        }

        if (!sdtRegex.test(sdt)) {
            alert("Số điện thoại không hợp lệ.");
            return false;
        }
        if (!nameRegex.test(hoten)) {
            alert("Vui lòng nhập họ tên hợp lệ.");
            return false;
        }

        return true;
    }
</script>