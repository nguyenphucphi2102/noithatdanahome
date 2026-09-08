<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>Dự án</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Dự án
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=danhsach_thuongmai" class="btn btn-primary"> Danh sách dự án
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



          $chuoi = " $today/$today1/$today3 ";

          //include_once('database.php');
          include_once('db.php');

          $id = $_REQUEST["id"];

          $thuocloai = $_REQUEST["thuocloai"];



          $tentaptin = $_FILES['txt_hinhanh']['name'];
          $fileup = '';
          if ($tentaptin != "") {

            $fileup = "`hinhanh` = '$tentaptin',";
          } else {
            $fileup = "";
          }

          $noidung = str_replace("'", "", $_POST['txt_noidung']);

          $tieude = str_replace("'", "", $_POST['tieude']);

          //$trangchu = $_POST['trangchu'];

          $mota = str_replace("'", "", $_POST['mota']);

          //$noidung_en = str_replace("'", "", $_POST['txt_noidung_en']);

          $tieude_en = str_replace("'", "", $_POST['tieude_en']);

          //$mota_en = str_replace("'", "", $_POST['mota_en']);

          $truyvan = "UPDATE `du_an` SET $fileup
                                      `tieude` = '$tieude',
                                      `tieude_en` = '$tieude_en',
                                      `mota` = '$mota',
                                      `noidung` = '$noidung'

                                      WHERE `id` =$id;";
          $result = @mysqli_query($link, $truyvan);
          if ($result) {

            if ($fileup != '') {
              dichuyen_taptin_vaothumuc($tentaptin);
            }
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {

            echo "Upload không thành công.Bạn thử lại xem  ";
          }
        }





        function dichuyen_taptin_vaothumuc($tentaptin)
        {

          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];

          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {

            echo "Chúc mừng bạn Upload thành công thông tin ";
          } else {

            xoataptin($tentaptin);

            echo "Chúc mừng bạn Upload thành công thông tin";
          }
        }



        function xoataptin($tentaptin)
        {

          //$ketnoi_maychu = ketnoi_MC();

          //chon_CSDL($ketnoi_maychu);

          $masotaptin = mysqli_insert_id();

          $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin ";

          //$ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
          $ketqua_truyvan = mysqli_query($link, $truyvan);
        }

        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa giới thiệu</h2>
            </div>
            <div class="card-body">
              <div class="row ec-vendor-uploads">
                <?php

                include('db.php');

                $id = $_REQUEST["id"];

                $result = mysqli_query($link, "SELECT * FROM du_an where id like '$id' ");

                $row_dulieu_sua = mysqli_fetch_array($result);

                $tieude = $row_dulieu_sua['tieude'];

                $tieude_en = $row_dulieu_sua['tieude_en'];

                $mota = $row_dulieu_sua['mota'];

                $noidung = $row_dulieu_sua['noidung'];

                $hinhanh = $row_dulieu_sua['hinhanh'];


                ?>
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-4">
                    <div class="ec-vendor-img-upload">
                      <div class="ec-vendor-main-img">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                            <input name="txt_hinhanh" type='file' id="txt_hinhanh" class="ec-image-upload"
                              accept=".png, .jpg, .jpeg" />
                            <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh"
                              value="<?php echo "$hinhanh"; ?>" size="40" />

                            <label for="txt_hinhanh"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                alt="edit" /></label>
                          </div>
                          <div class="avatar-preview ec-preview">
                            <div class="imagePreview ec-div-preview">
                              <img id="imagePreview"
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/' . $hinhanh : 'assets/img/products/hinhdoitac.jpg'; ?>"
                                alt="preview" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    document.getElementById("txt_hinhanh").addEventListener("change", function (event) {
                      const reader = new FileReader();
                      reader.onload = function () {
                        document.getElementById("imagePreview").src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    });
                  </script>
                  <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail">
                      <div class="row">
                        <div class="col-md-12 mt-3">
                          <label for="inputEmail4" class="form-label fw-bold">Tiêu
                            đề</label>
                          <input name="tieude" type="text" id="tieude2" class="form-control" size="90" maxlength="150"
                            value="<?php echo "$tieude"; ?>" />
                        </div>
                        <div class="col-md-12 mt-3">
                          <label for="inputEmail4" class="form-label fw-bold">Liên kết</label>
                          <input name="tieude_en" type="text" id="tieude_en" class="form-control" size="90" maxlength="150"
                            value="<?php echo "$tieude_en"; ?>" />
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- Nút lưu -->
                        <div class="col-md-12 mt-3">
                          <input name="luu" class="btn btn-primary px-4 py-2 fw-bold" type="submit" id="luu"
                            value="Lưu Lại" />
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