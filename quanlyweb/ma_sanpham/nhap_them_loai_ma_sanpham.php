

    <div class="ec-page-wrapper">
      <div class="ec-content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
              <h1>THÊM LOẠI SẢN PHẨM</h1>
              <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Thêm loại sản phẩm
              </p>
            </div>
            <div>
              <a href="quan_tri.php?p=nhap_them_ma_sanpham" class="btn btn-primary"> Thêm sản phẩm
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
              $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
              $url = str_replace(" ", "-", khongdau($_POST['thuocloai']));
              upload($thuocloai, $thuocloai_en, $tentaptin,  $noidung ,$url);
              echo "<script>window.location='quan_tri.php?p=danhsach_loai_masanpham" . $_GET["page"] . "'</script>";
            }
            function upload($thuocloai, $thuocloai_en, $tentaptin, $noidung, $url)
            {
              require('db.php');
              $truyvan = " INSERT INTO loai_ma_sanpham (thuocloai,thuocloai_en,trangchu,hinhanh,logo,noidung,noidung_en,name_url) VALUES ('" . $thuocloai . "', '" . $thuocloai_en . "','0','" . $tentaptin . "','','" . $noidung . "','','" . $url . "')";
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
              $truyvan = "DELETE FROM loai_ma_sanpham WHERE hinhanh = '$tentaptin'";

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
                  <h2>Thêm loại sản phẩm mới</h2>
                </div>
                <div class="card-body">
                  <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
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
                          <div class="col-md-7">
                            <label for="inputEmail4" class="form-label">Loại sản phẩm</label>
                            <input name="thuocloai" type="text" id="tieude" size="60" maxlength="70" />
                          </div>
                          <div class="col-md-12">
                              <label class="form-label fw-bold">Nội dung chi tiết</label>
                              <textarea name="txt_noidung" id="content_vi" class="form-control" rows="4"></textarea>
                            </div>
                          <div class="col-md-12">
                            <input class="btn btn-primary" name="luu" type="submit" id="luu" value="Lưu Lại" />
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
