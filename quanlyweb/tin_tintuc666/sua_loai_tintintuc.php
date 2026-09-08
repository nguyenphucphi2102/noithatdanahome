

    <div class="ec-page-wrapper">
      <div class="ec-content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
              <h1>THÊM LOẠI TIN TỨC</h1>
              <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Thêm loại tin tức
              </p>
            </div>
            <div>
              <a href="quan_tri.php?p=them_tin_tintuc" class="btn btn-primary"> Thêm tin tức
              </a>
            </div>
          </div>
          <div class="row">
            <?php
            if (isset($_POST['luu'])) {
              include('db.php');
              $id = $_REQUEST["id"];
              $tentaptin = $_FILES['txt_hinhanh']['name'];
              if ($tentaptin == "") {
                $tentaptin = $_POST['txt_hinhanh_hide'];
              }
              //$tenlogo =  $_FILES['txt_logo']['name'];
              //if ($tenlogo == "") {
              //$tenlogo = $_POST['txt_logo_hide'];
              //}
              $tentaptin = $_FILES['txt_hinhanh']['name'];
              $thuocloai = $_POST['thuocloai2'];
              $url = str_replace(" ", "-", khongdau($_POST['thuocloai2']));
              //$thuocloai_en = $_POST['thuocloai_en'];
              $noidung = $_POST['noidung'];
              //$noidung_en = $_POST['noidung_en'];
              $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['thuocloai2'])));
              upload($thuocloai, $tentaptin, $noidung, $id, $url);
            }

            function upload($thuocloai, $tentaptin, $noidung, $id, $url)
            {
              include('db.php');
              //$ketnoi_maychu = ketnoi_MC();
              ///chon_CSDL($ketnoi_maychu);
              $truyvan = "update  loai_tin_tintuc set `thuocloai` = '$thuocloai' , `thuocloai_en` = '' , `hinhanh` = '$tentaptin' , `logo` = '', `noidung` = '$noidung' , `name_url` = '$url' , `noidung_en` = '' where id='$id'";

              $ketqua_truyvan = mysqli_query($link, $truyvan);
              echo "<script>window.location='quan_tri.php?p=danhsach_loai_tintintuc&page=" . $_GET["page"] . "'</script>";
              if ($ketqua_truyvan) {
                dichuyen_taptin_vaothumuc($tentaptin);
                //dichuyen_logo_vaothumuc($tenlogo);

              } else {
                echo "Upload không thành công.Bạn thử lại xem";
              }
              //mysqli_close($ketnoi_maychu);
            }

            function dichuyen_taptin_vaothumuc($tentaptin)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                xoataptin($tentaptin);
                echo "Chúc mừng bạn Upload thành công thông tin";
              }
            }
            function dichuyen_logo_vaothumuc($tenlogo)
            {
              $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../Hinh CTSP/$tenlogo")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                xoataptin($tenlogo);
                echo "Chúc mừng bạn Upload thành công thông tin";
              }
            }
            function xoataptin($tentaptin)
            {
              require('db.php');

              // Ensure $link is your valid connection variable
              global $link;

              // Sanitize the filename to prevent SQL injection
              $tentaptin = mysqli_real_escape_string($link, $tentaptin);

              // Prepare the DELETE statement
              $truyvan = "DELETE FROM ma_dichvu WHERE filename = '$tentaptin'";

              // Execute the DELETE query
              $ketqua_truyvan = mysqli_query($link, $truyvan);

              // Check for query execution success
              if ($ketqua_truyvan) {
                echo "File deleted successfully.";
              } else {
                echo "Error deleting file: " . mysqli_error($link);
              }
            }
            ?>
            <?php
            include('db.php');
            $id = $_REQUEST["id"];
            $result = mysqli_query($link, "SELECT * FROM loai_tin_tintuc where id like '$id' ");

            $row_dulieu_sua = mysqli_fetch_array($result);
            $thuocloai2 = $row_dulieu_sua['thuocloai'];
            $thuocloai_en = $row_dulieu_sua['thuocloai_en'];
            $hinhanh = $row_dulieu_sua['hinhanh'];
            $logo = $row_dulieu_sua['logo'];
            $noidung = $row_dulieu_sua['noidung'];
            $noidung = str_replace('"', '\"', $noidung);
            $noidung = str_replace("\n", "", $noidung);
            $noidung = str_replace("\r", "", $noidung);
            $noidung = str_replace("\t", "", $noidung);

            $noidung_en = $row_dulieu_sua['noidung_en'];
            $noidung_en = str_replace('"', '\"', $noidung_en);
            $noidung_en = str_replace("\n", "", $noidung_en);
            $noidung_en = str_replace("\r", "", $noidung_en);
            $noidung_en = str_replace("\t", "", $noidung_en);
            ?>
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                  <h2>Thêm loại tin tức mới</h2>
                </div>
                <div class="card-body">
                  <div class="row ec-vendor-uploads">
                    <div class="col-lg-4">
                      <div class="ec-vendor-img-upload">
                        <div class="ec-vendor-main-img">
                          <div class="avatar-upload">
                            <div class="avatar-edit">
                              <input name="txt_hinhanh" type='file' id="txt_hinhanh" class="ec-image-upload" accept=".png, .jpg, .jpeg" />
                              <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh" value="<?php echo "$hinhanh"; ?>" size="40" />
                              <label for="txt_hinhanh">
                                <img src="assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                              </label>
                            </div>
                            <div class="avatar-preview ec-preview">
                              <div class="imagePreview ec-div-preview">
                                <?php echo "<img class='ec-image-preview' src='../HinhCTSP/$hinhanh' width='60' height='50' alt='Product Image' />"; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="ec-vendor-upload-detail">
                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                          <div class="col-md-7">
                            <label for="inputEmail4" class="form-label">Loại tin tức</label>
                            <input name="thuocloai2" type="text" id="thuocloai_ban" value="<?php echo "$thuocloai2"; ?>" size="70" />
                          </div>
                          <div class="col-md-12">
                            <input class="btn btn-primary" name="luu" type="submit" id="luu" value="Lưu Lại" />
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

