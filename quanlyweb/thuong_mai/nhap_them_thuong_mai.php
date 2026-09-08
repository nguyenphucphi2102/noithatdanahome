
  <div class="wrapper">
    <div class="ec-page-wrapper">
      <div class="ec-content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
              <h1>SLIDE</h1>
              <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Slide
              </p>
            </div>
            <div>
              <a href="quan_tri.php?p=danhsach_thuongmai" class="btn btn-primary"> Danh sách slide
              </a>
            </div>
          </div>
          <div class="row">
            <?php
            if (isset($_POST['luu'])) {

              $today2 = date("D");

              $today = date("d");

              $today1 = date("m");

              $today3 = date("Y");

              /*if($today2=='Mon')

        $thu='Thứ 2';

      if($today2=='Tue')

        $thu='Thứ 3';

      if($today2=='Wed')

        $thu='Thứ 4';

      if($today2=='Thu')

        $thu='Thứ 5';

      if($today2=='Fri')

        $thu='Thứ 6';

      if($today2=='Sat')

        $thu='Thứ 7';

      if($today2=='Sun')

        $thu='Chủ Nhật';*/

              $chuoi = " $today/$today1/$today3 ";

              require('database.php');
              require('db.php');

              $tentaptin = $_FILES['txt_hinhanh']['name'];

              // $noidung = str_replace("'", "", $_POST['txt_noidung']);

              $tieude = str_replace("'", "", $_POST['tieude']);

              $mota = str_replace("'", "", $_POST['mota']);

              //$trangchu = $_POST['trangchu'];



              //$noidung_en = str_replace("'", "", $_POST['txt_noidung_en']);

              //$tieude_en = str_replace("'", "", $_POST['tieude_en']);

              //$mota_en = str_replace("'", "", $_POST['mota_en']);


              upload($tentaptin, $mota, $tieude);
              $page = isset($_GET["page"]) ? $_GET["page"] : 1;
              echo "<script>window.location='quan_tri.php?p=danhsach_thuongmai&page=" . $page . "'</script>";
              exit;

            }



            function upload($tentaptin, $mota, $tieude)
            {
              require('db.php');
              //$ketnoi_maychu = ketnoi_MC();

              //chon_CSDL($ketnoi_maychu);



              $truyvan = "INSERT INTO thuong_mai (hinhanh,mota,tieude) VALUES ('" . $tentaptin . "','" . $mota . "','" . $tieude . "')";



              //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
              $ketqua_truyvan = mysqli_query($link, $truyvan);

              if ($ketqua_truyvan) {
                if ($tentaptin != '') {
                  dichuyen_taptin_vaothumuc($tentaptin);
                } else {
                  echo "Upload thành công.";
                }
              } else {

                echo "Upload không thành công.Bạn thử lại xem";



                mysqli_close($ketnoi_maychu);
              }
            }



            function dichuyen_taptin_vaothumuc($tentaptin)
            {

              $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];

              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin"))

                echo "Chúc mừng bạn Upload thành công";
              else {

                xoataptin($tentaptin);

                echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
              }

            }



            function xoataptin($tentaptin)
            {

              $ketnoi_maychu = ketnoi_MC();

              chon_CSDL($ketnoi_maychu);

              $masotaptin = mysqli_insert_id();

              $truyvan = "DELETE FROM sanpham WHERE id = $masotaptin ";

              $ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
            }

            ?>

            <?php



            include('db.php');





            //$noi_dung=str_replace("\d","",$noi_dung);

            //echo $noi_dung;echo"<hr>";



            function hop_option()
            {

              $tv = "select * from loai_thuong_mai where phanloai like '1' ORDER BY id ASC";

              $tv_1 = mysqli_query($link, $tv);

              echo "<select name=\"cap_do\" class=\"form-group\">";

              echo "<option value=\"\">--- Chọn loại sản phẩm ---</option>";

              while ($tv_2 = mysqli_fetch_array($tv_1)) {

                echo "<option value=\"$tv_2[id]\" >";

                echo $tv_2['thuocloai'];

                echo "</option>";
              }

              echo "</select>";
            }


            ?>
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                  <h2>Thêm slide mới</h2>
                </div>
                <div class="card-body">
                  <div class="row ec-vendor-uploads">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                      <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                          <div class="ec-vendor-main-img">
                            <div class="avatar-upload">
                              <div class="avatar-edit">
                                <input name="txt_hinhanh" type='file' id="txt_hinhanh" class="ec-image-upload"
                                  accept=".png, .jpg, .jpeg" />
                                <label for="txt_hinhanh"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                    alt="edit" /></label>
                              </div>
                              <div class="avatar-preview ec-preview">
                                <div class="imagePreview ec-div-preview">
                                  <img class="ec-image-preview" src="assets/img/products/hinhslide.jpg"
                                    alt="edit" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="ec-vendor-upload-detail">
                          <div class="row">
                            <div class="col-md-7">
                              <label for="inputEmail4" class="form-label fw-bold">Tiêu đề</label>
                              <input name="tieude" class="form-control" type="text" id="tieude2" size="90"
                                maxlength="150" />
                            </div>
                            <div class="col-md-7">
                              <label for="inputEmail4" class="form-label fw-bold">Mô tả</label>
                              <textarea name="mota" id="textarea" cols="70" class="form-control" rows="5"
                                maxlength="250"></textarea>
                            </div>
                            <div class="col-md-12 mt-3">
                              <input class="btn btn-primary" name="luu" type="submit" id="luu" value="Lưu Lại" />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    var editor = CKEDITOR.replace('content_vi', {
      uiColor: '#e7e7e7',
      language: 'en',
      skin: 'moono',
      width: 'auto',
      height: 350,
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
      filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    });
  </script>


</html>