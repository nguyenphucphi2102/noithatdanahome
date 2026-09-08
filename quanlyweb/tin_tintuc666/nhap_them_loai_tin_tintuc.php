

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
              require('db.php');
              $file_name = $_FILES['txt_hinhanh']['name'];
              $tentaptin = $_FILES['txt_hinhanh']['name'];
              $thuocloai = $_POST['thuocloai'];
              $thuocloai_en = $_POST['thuocloai_en'];
              $url = str_replace(" ", "-", khongdau($_POST['thuocloai']));
              upload($thuocloai, $thuocloai_en, $tentaptin, $url);
              echo "<script>window.location='quan_tri.php?p=danhsach_loai_tintintuc" . $_GET["page"] . "'</script>";
            }
            function upload($thuocloai, $thuocloai_en, $tentaptin, $url)
            {
              require('db.php');
              $truyvan = " INSERT INTO loai_tin_tintuc (thuocloai,thuocloai_en,trangchu,hinhanh,logo,noidung,noidung_en,name_url) VALUES ('" . $thuocloai . "', '" . $thuocloai_en . "','0','" . $tentaptin . "','','','','" . $url . "')";
              $ketqua_truyvan = mysqli_query($link, $truyvan);
              if ($ketqua_truyvan) {
                dichuyen_taptin_vaothumuc($tentaptin);
                echo "Upload  thành công thông tin";
              } else {
                echo "Upload không thành công.Bạn thử lại xem ";
              }
              //mysqli_close($ketnoi_maychu);
            }
            function dichuyen_taptin_vaothumuc($tentaptin)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
              $duongdan_moi = "../HinhCTSP/$tentaptin";

              if (move_uploaded_file($thumuctam_chuataptin, $duongdan_moi)) {
                echo "Chúc mừng bạn Upload thành công";
              } else {
                echo "Không thể copy tập tin $tentaptin vào thư mục tài liệu. Vui lòng thử lại.";
              }
            }


            function xoataptin($tentaptin)
            {
              require('db.php');
              global $link;

              if (!$link) {
                die("Database connection failed: " . mysqli_connect_error());
              }

              $tentaptin = mysqli_real_escape_string($link, $tentaptin);

              // Sửa bảng thành loai_tin_tintuc và cột thành hinhanh (hoặc bảng đúng)
              $truyvan = "DELETE FROM loai_tin_tintuc WHERE hinhanh = '$tentaptin'";

              if (mysqli_query($link, $truyvan)) {
                echo "File deleted successfully.";
              } else {
                echo "Error deleting file: " . mysqli_error($link);
              }
            }


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
                              <input name="txt_hinhanh" type='file' id="txt_hinhanh" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <label for="txt_hinhanh"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="avatar-preview ec-preview">
                              <div class="imagePreview ec-div-preview">
                                <img class="ec-image-preview" src="assets/img/products/vender-upload-preview.jpg"
                                  alt="edit" />
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
                            <input name="thuocloai" type="text" id="tieude" size="60" maxlength="70" />
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

 