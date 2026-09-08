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
            <a href="quan_tri.php?p=danhsach_thuongmai" class="btn btn-primary"> Danh sách Slide
            </a>
          </div>
        </div>
        <div class="row">
          <?php
          if (isset($_POST['luu'])) {
            $today = date("d/m/Y");
            include_once('db.php');
            $id = $_REQUEST["id"];
            $thuocloai = $_REQUEST["thuocloai"];
            $tentaptin = $_FILES['txt_hinhanh']['name'];
            $fileup = '';

            if ($tentaptin != "") {
              $fileup = "`hinhanh` = '$tentaptin',";
            }
            $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
            $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
            $trangchu = $_POST['trangchu'];
            $mota = mysqli_real_escape_string($link, $_POST['mota']);
            $tukhoa1 = mysqli_real_escape_string($link, $_POST['tukhoa1']);
            $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
            $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
            //$mota_en = mysqli_real_escape_string($link, $_POST['mota_en']);
          
            $truyvan = "UPDATE `thuong_mai` SET $fileup
                    `mota` = '$mota',
                    `tieude` = '$tieude' WHERE `id` = $id;";

            $result = mysqli_query($link, $truyvan);
            if ($result) {
              if ($fileup != '') {
                dichuyen_taptin_vaothumuc($tentaptin);
              }
              echo "Chúc mừng bạn Upload thành công thông tin";
            } else {
              echo "Upload không thành công. Bạn thử lại xem ";
            }
            echo "<script>window.location='quan_tri.php?p=danhsach_thuongmai&page=" . $_GET["page"] . "'</script>";

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
            include_once('db.php');
            $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin";
            mysqli_query($link, $truyvan);
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
                  $result = mysqli_query($link, "SELECT * FROM thuong_mai WHERE id = '$id'");
                  $row_dulieu_sua = mysqli_fetch_array($result);

                  $tieude = $row_dulieu_sua['tieude'];
                  $mota = $row_dulieu_sua['mota'];
                  $hinhanh = $row_dulieu_sua['hinhanh'];
                  //$mota_en = $row_dulieu_sua['mota_en'];
                  //$tieude_en = $row_dulieu_sua['tieude_en'];
                  $trangchu = $row_dulieu_sua['trangchu'];
                  $noidung = $row_dulieu_sua['noidung'];

                  //$noidung_en = $row_dulieu_sua['noidung_en'];
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
                                  src="<?php echo !empty($hinhanh) ? '../HinhCTSP/' . $hinhanh : 'assets/img/products/hinhslide.jpg'; ?>"
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
                          <div class="col-md-7">
                            <label for="inputEmail4" class="form-label fw-bold">Tiêu
                              đề</label>
                            <input name="tieude" type="text" id="tieude2" class="form-control" size="90" maxlength="150"
                              value="<?php echo "$tieude"; ?>" />
                          </div>
                          <div class="col-md-7">
                            <label for="inputEmail4" class="form-label fw-bold">Mô
                              tả</label>
                            <textarea name="mota" id="textarea" cols="70" class="form-control" rows="5"
                              maxlength="250"><?php echo "$mota"; ?></textarea>
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