<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>SỬA LOẠI sản phẩm</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa loại sản phẩm
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
          include('db.php');
          $id = $_REQUEST["id"];
          $tentaptin = $_FILES["txt_hinhanh"]["name"];
          if ($tentaptin == "") {
            $tentaptin = $_POST["txt_hinhanh_hide"];
          }
          //$tenlogo =  $_FILES['txt_logo']['name'];
          //if ($tenlogo == "") {
          //$tenlogo = $_POST['txt_logo_hide'];
          //}
          $tukhoa1 = $_POST['tukhoa1'];
          $tukhoa2 = $_POST['tukhoa2'];
          $thuocloai = $_POST['thuocloai2'];
          $url = str_replace(" ", "-", khongdau($_POST['thuocloai2']));
          //$thuocloai_en = $_POST['thuocloai_en'];
          $noidung = mysqli_real_escape_string($link, $_POST["txt_noidung"]);
          //$noidung_en = $_POST['noidung_en'];
          $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['thuocloai2'])));
          upload($thuocloai,$tukhoa1,$tukhoa2, $tentaptin, $noidung, $id, $url);
        }


        function upload($thuocloai,$tukhoa1,$tukhoa2, $tentaptin, $noidung, $id, $url)
        {
          include('db.php');
          //$ketnoi_maychu = ketnoi_MC();
          ///chon_CSDL($ketnoi_maychu);
          $truyvan = "update  loai_ma_sanpham set `thuocloai` = '$thuocloai' , `tukhoa1` = '$tukhoa1' , `tukhoa2` = '$tukhoa2' , `thuocloai_en` = '' , `hinhanh` = '$tentaptin' , `logo` = '', `noidung` = '$noidung' , `name_url` = '$url' , `noidung_en` = '' where id='$id'";

          $ketqua_truyvan = mysqli_query($link, $truyvan);
          if ($ketqua_truyvan) {
            if ($_FILES["txt_hinhanh"]["name"] != "") {
              dichuyen_taptin_vaothumuc($tentaptin);
            }

            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
                    Swal.fire({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      title: 'Đã lưu thành công!',
                      showConfirmButton: false,
                      timer: 2500,
                      timerProgressBar: true,
                      didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                      }
                    });
                    setTimeout(() => {
                      window.location = 'quan_tri.php?p=danhsach_loai_masanpham&page=" . $_GET["page"] . "';
                    }, 2000);
                  </script>";
          } else {
            echo "Upload không thành công. Bạn thử lại xem";
          }
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
        $result = mysqli_query($link, "SELECT * FROM loai_ma_sanpham where id like '$id' ");

        $row_dulieu_sua = mysqli_fetch_array($result);
        $thuocloai2 = $row_dulieu_sua['thuocloai'];
        $thuocloai_en = $row_dulieu_sua['thuocloai_en'];
        $hinhanh = $row_dulieu_sua['hinhanh'];
        $tukhoa1 = $row_dulieu_sua['tukhoa1'];
        $tukhoa2 = $row_dulieu_sua['tukhoa2'];
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
                            <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh_hide"
                              value="<?php echo $hinhanh; ?>" />
                            <label for="txt_hinhanh">
                              <img src="assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                            </label>
                          </div>
                          <div class="avatar-preview ec-preview">
                            <div class="imagePreview ec-div-preview">
                              <img id="imagePreview"
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/' . $hinhanh : 'assets/img/products/hinhsanpham.jpg'; ?>"
                                alt="preview" />
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
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail">
                      <div class="col-md-7">
                        <label for="inputEmail4" class="form-label fw-bold">Loại sản phẩm</label>
                        <input class="form-control" name="thuocloai2" type="text" id="thuocloai_ban"
                          value="<?php echo "$thuocloai2"; ?>" size="70" />
                      </div>
                      
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fw-bold">Từ khoá 1 </label>
                        <input class="form-control" name="tukhoa1" type="text" id="tukhoa1"
                          value="<?php echo "$tukhoa1"; ?>" size="70" />
                      </div>
                      
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fw-bold">Từ khoá 2</label>
                        <input class="form-control" name="tukhoa2" type="text" id="tukhoa2"
                          value="<?php echo "$tukhoa2"; ?>" size="70" />
                      </div>
                      
                      <div class="col-md-12">
                        <label class="form-label fw-bold">Nội dung chi tiết</label>
                        <textarea name="txt_noidung" id="content_vi" class="form-control"
                          rows="4"><?php echo "$noidung"; ?></textarea>
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


</html>