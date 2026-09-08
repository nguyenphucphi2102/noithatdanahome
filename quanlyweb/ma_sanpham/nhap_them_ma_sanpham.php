<!-- PAGE WRAPPER -->
<div class="ec-page-wrapper">

  <!-- Header -->


  <!-- CONTENT WRAPPER -->
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>Thêm sản phẩm</h1>
          <p class="breadcrumbs"><span><a href="index.html">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sản phẩm
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=danhsach_masanpham" class="btn btn-primary"> Xem tất cả
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Thêm sản phẩm</h2>
            </div>
            <?php
            if (isset($_POST['luu'])) {
              $today2 = date("D");
              $today = date("d");
              $today1 = date("m");
              $today3 = date("Y");
              $ngay = " $today/$today1/$today3 ";
              require('db.php');
              $file_name = $_FILES['txt_hinhanh']['name'];
              $file_hinhanh1 = $_FILES['txt_hinhanh1']['name'];
              $file_hinhanh2 = $_FILES['txt_hinhanh2']['name'];
              $file_hinhanh3 = $_FILES['txt_hinhanh3']['name'];
              $random_digit = rand(0000, 9999);
              $tentaptin = $_FILES['txt_hinhanh']['name'];
              $tenhinhanh1 = $random_digit . $file_hinhanh1;
              $tenhinhanh2 = $random_digit . $file_hinhanh2;
              $tenhinhanh3 = $random_digit . $file_hinhanh3;
              $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
              $mota = mysqli_real_escape_string($link, $_POST['mota']);
              $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
              $tieude_en = mysqli_real_escape_string($link, $_POST['tieude_en']);
              $mota_en = mysqli_real_escape_string($link, $_POST['mota_en']);
              $noidung_en = mysqli_real_escape_string($link, $_POST['txt_noidung_en']);
              $giagoc = mysqli_real_escape_string($link, $_POST['giagoc']);
              $giaban = mysqli_real_escape_string($link, $_POST['giaban']);
              $tukhoa1 = mysqli_real_escape_string($link, $_POST['tukhoa1']);
              $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
              $sale = mysqli_real_escape_string($link, !empty($_POST['sale']) ? $_POST['sale'] : 0);
              $hot = mysqli_real_escape_string($link, !empty($_POST['hot']) ? $_POST['hot'] : 0);
              $new = mysqli_real_escape_string($link, !empty($_POST['new']) ? $_POST['new'] : 0);
              $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
              $thuocloai = $_POST['cap_do'];
              $danhmuc = '1';
              $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
              upload($tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3, $mota, $noidung,$tieude_en,$mota_en,$noidung_en, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $tieude, $thuocloai, $linkurl);
              $page = isset($_GET["page"]) ? $_GET["page"] : 1;
              echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
              echo "<script>
              Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: 'Sản phẩm đã được cập nhật.',
                showConfirmButton: false,
                timer: 2000
              }).then(() => {
                window.location = 'quan_tri.php?p=danhsach_masanpham&page=" . $page . "';
              });
            </script>";
              exit;
            }

            function upload($tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3, $mota, $noidung, $tieude_en, $mota_en, $noidung_en, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $tieude, $thuocloai, $linkurl)
            {
              require('db.php');

              // Xử lý đặc biệt với ký tự trong câu truy vấn
              $truyvan = "INSERT INTO ma_sanpham(tieude,hinhanh,hinhanh1,hinhanh2,hinhanh3,mota,noidung,tieude_en,mota_en,noidung_en,giagoc,giaban,tukhoa1,tukhoa2,sale,hot,new,ngay,thuocloai,noibat,banchay,khuyenmai,linkurl)
                        VALUES('$tieude','$tentaptin','$tenhinhanh1','$tenhinhanh2','$tenhinhanh3','$mota','$noidung','$tieude_en','$mota_en','$noidung_en','$giagoc','$giaban','$tukhoa1','$tukhoa2','$sale','$hot','$new','$ngay','$thuocloai','0','0','0','$linkurl')";

              $ketqua_truyvan = mysqli_query($link, $truyvan);
              if ($ketqua_truyvan) {

                if ($_FILES["txt_hinhanh"]["name"] != "") {
                  dichuyen_taptin_vaothumuc($tentaptin);
                }
                if ($_FILES["txt_hinhanh1"]["name"] != "") {
                  dichuyen_hinhanh1_vaothumuc($tenhinhanh1);
                }
                if ($_FILES["txt_hinhanh2"]["name"] != "") {
                  dichuyen_hinhanh2_vaothumuc($tenhinhanh2);
                }
                if ($_FILES["txt_hinhanh3"]["name"] != "") {
                  dichuyen_hinhanh3_vaothumuc($tenhinhanh3);
                }



              }
            }

            function dichuyen_taptin_vaothumuc($tentaptin)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tentaptin"))
                echo "Chúc mừng bạn Upload sản phẩm thành công &nbsp;";
              else {
                xoataptin($tentaptin);
                echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
              }
            }
            function dichuyen_hinhanh1_vaothumuc($tenhinhanh1)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh1']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh1"))
                echo "Chúc mừng bạn Upload hình ảnh 1 thành công &nbsp;";
              else {
                xoataptin($tenhinhanh1);
                echo "Không thể copy tập tin  $tenhinhanh1 vào thư mục tài liệu";
              }
            }
            function dichuyen_hinhanh2_vaothumuc($tenhinhanh2)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh2']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh2"))
                echo "Chúc mừng bạn Upload hình ảnh 2 thành công  &nbsp;";
              else {
                xoataptin($tenhinhanh2);
                echo "Không thể copy tập tin  $tenhinhanh2 vào thư mục tài liệu";
              }
            }
            function dichuyen_hinhanh3_vaothumuc($tenhinhanh3)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh3']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh3"))
                echo "Chúc mừng bạn Upload hình ảnh 3 thành công";
              else {
                xoataptin($tenhinhanh3);
                echo "Không thể copy tập tin  $tenhinhanh3 vào thư mục tài liệu";
              }
            }
            function dichuyen_logo_vaothumuc($tenlogo)
            {
              require('db.php');
              $thumuctam_chuataptin = $_FILES['txt_logo']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenlogo"))
                echo "Chúc mừng bạn Upload thành công";
              else {
                xoataptin($tenlogo);
                echo "Không thể copy tập tin  $tenlogo vào thư mục tài liệu";
              }
            }
            function xoataptin($tentaptin)
            {
              require('db.php');
              global $link;
              $tentaptin = mysqli_real_escape_string($link, $tentaptin);
              $truyvan = "DELETE FROM ma_dichvu WHERE filename = '$tentaptin'";
              $ketqua_truyvan = mysqli_query($link, $truyvan);
              if ($ketqua_truyvan) {
                echo "File deleted successfully.";
              } else {
                echo "Error deleting file: " . mysqli_error($link);
              }
            }
            ?>
            <?php
            include('db.php');
            function hop_option()
            {
              include('db.php');
              $tv = "select * from loai_ma_sanpham ORDER BY id ASC";
              $tv_1 = mysqli_query($link, $tv);
              echo "<select name=\"cap_do\" class=\"form-control\">";
              echo "<option value=\"\">--- Chọn loại sản phẩm---</option>";
              while ($tv_2 = mysqli_fetch_array($tv_1)) {
                echo "<option value=\"$tv_2[id]\" >";
                echo $tv_2['thuocloai'];
                echo "</option>";
              }
              echo "</select>";
            }
            function danhmuc_option()
            {
              include('db.php');
              $tv = "select * from danhmuc ORDER BY id ASC";
              $tv_1 = mysqli_query($link, $tv);
              echo "<select name=\"danhmuc\">";
              echo "<option value=\"\">--- Chọn loại HTPP---</option>";
              while ($tv_2 = mysqli_fetch_array($tv_1)) {
                echo "<option value=\"$tv_2[id]\" >";
                echo $tv_2['tieude'];
                echo "</option>";
              }
              echo "</select>";
            }
            ?>
            <div class="card-body">
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
                <div class="row ec-vendor-uploads">
                  <div class="col-lg-4">
                    <div class="ec-vendor-img-upload">
                      <div class="ec-vendor-main-img">
                        <div class="avatar-upload">
                          <div class="avatar-edit">
                            <input name="txt_hinhanh" type="file" id="txt_hinhanh" size="50" class="ec-image-upload"
                              accept=".png, .jpg, .jpeg" />
                            <label for="txt_hinhanh"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                alt="edit" /></label>
                          </div>
                          <div class="avatar-preview ec-preview">
                            <div class="imagePreview ec-div-preview">
                              <img class="ec-image-preview" src="assets/img/products/hinhsanpham.jpg" alt="edit" />
                            </div>
                          </div>
                        </div>
                        <div class="thumb-upload-set colo-md-12">
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh1" type="file" id="txt_hinhanh1" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <label for="txt_hinhanh1"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img class="image-thumb-preview ec-image-preview"
                                  src="assets/img/products/hinhsanpham.jpg" alt="edit" />
                              </div>
                            </div>
                          </div>
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh2" type="file" id="txt_hinhanh2" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <label for="txt_hinhanh2"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img class="image-thumb-preview ec-image-preview"
                                  src="assets/img/products/hinhsanpham.jpg" alt="edit" />
                              </div>
                            </div>
                          </div>
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh3" type="file" id="txt_hinhanh3" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <label for="txt_hinhanh3"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img class="image-thumb-preview ec-image-preview"
                                  src="assets/img/products/hinhsanpham.jpg" alt="edit" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail">
                      <div class="row">
                        <div class="col-md-12">
                          <label for="inputEmail4" class="form-label fw-bold">Tiêu đề</label>
                          <input class="form-control" name="tieude" type="text" id="tieude" size="90" maxlength="70" />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Chọn loại</label>
                          <?php hop_option(); ?>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Mô tả ngắn ( 160 - 300 ký tự)</label>
                          <textarea class="form-control" name="mota" id="textarea" cols="88" rows="3"></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Từ khoá 1</label>
                          <div class="col-12">
                            <input class="form-control" name="tukhoa1" type="text" id="tukhoa1" size="90"
                              maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Từ khoá 2</label>
                          <div class="col-12">
                            <input class="form-control" name="tukhoa2" type="text" id="tukhoa2" size="90"
                              maxlength="70" />
                          </div>
                        </div>
                        <!-- <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Giá gốc</label>
                          <div class="col-12">
                            <input name="giagoc" type="text" id="giagoc" class="form-control" size="90"
                              maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Giá bán</label>
                          <div class="col-12">
                            <input name="giaban" type="text" id="giaban" class="form-control" size="90"
                              maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="slug" class="col-12 col-form-label fw-bold">Sale</label>
                          <div class="col-12">
                            <input name="sale" type="text" id="sale" class="form-control" size="90" maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="slug" class="col-12 col-form-label fw-bold">Hot</label>
                          <div class="col-12">
                            <input name="hot" type="text" id="hot" class="form-control" size="90" maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="slug" class="col-12 col-form-label fw-bold">New</label>
                          <div class="col-12">
                            <input name="new" type="text" id="new" class="form-control" size="90" maxlength="70" />
                          </div>
                        </div> -->
						
						
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Nội dung sản phẩm</label>
                          <textarea name="txt_noidung" id="content_vi" class="form-control" rows="4"></textarea>
                        </div>
						
						 <div class="col-md-12">
                          <label class="form-label fw-bold">Nội dung chi tiết</label>
                          <textarea name="txt_noidung_en" id="content_en" class="form-control" rows="4"></textarea>
                        </div>
						

                        <div class="col-md-12 text-center mt-3">
                          <input name="luu" class="btn btn-success px-4 py-2 fw-bold" type="submit" id="luu"
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
    </div> <!-- End Content -->
  </div> <!-- End Content Wrapper -->
</div> <!-- End Page Wrapper -->


<!-- Common Javascript -->
<script type="text/javascript">
  var editor = CKEDITOR.replace('content_vi', {
    uiColor: '#e7e7e7',
    language: 'vi',
    skin: 'moono',
    width: 'auto',
    height: 350,
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
  });
</script>
<script type="text/javascript">
  var editor = CKEDITOR.replace('content_en', {
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