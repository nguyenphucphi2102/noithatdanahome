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
            if (isset($_POST["luu"])) {
              $today = date("d/m/Y");
              include "db.php";
              $id = $_REQUEST["id"];
              $tentaptin = $_FILES["txt_hinhanh"]["name"];
              if ($tentaptin == "") {
                $tentaptin = $_POST["txt_hinhanh_hide"];
              }
              $tenhinhanh1 = $_FILES["txt_hinhanh1"]["name"];
              if ($tenhinhanh1 == "") {
                $tenhinhanh1 = $_POST["txt_hinhanh1_hide"];
              }
              $tenhinhanh2 = $_FILES["txt_hinhanh2"]["name"];
              if ($tenhinhanh2 == "") {
                $tenhinhanh2 = $_POST["txt_hinhanh2_hide"];
              }
              $tenhinhanh3 = $_FILES["txt_hinhanh3"]["name"];
              if ($tenhinhanh3 == "") {
                $tenhinhanh3 = $_POST["txt_hinhanh3_hide"];
              }

              // Escape special characters for all text inputs
              $loai = mysqli_real_escape_string($link, $_POST["thuocloai"]);
              $tieude = mysqli_real_escape_string($link, $_POST["tieude"]);
              $mota = mysqli_real_escape_string($link, $_POST["mota"]);
              $noidung = mysqli_real_escape_string($link, $_POST["txt_noidung"]);
              $tieude_en = mysqli_real_escape_string($link, $_POST["tieude_en"]);
              $mota_en = mysqli_real_escape_string($link, $_POST["mota_en"]);
              $noidung_en = mysqli_real_escape_string($link, $_POST["txt_noidung_en"]);
              $giagoc = mysqli_real_escape_string($link, $_POST["giagoc"]);
              $giaban = mysqli_real_escape_string($link, $_POST["giaban"]);
              $tukhoa1 = mysqli_real_escape_string($link, $_POST["tukhoa1"]);
              $tukhoa2 = mysqli_real_escape_string($link, $_POST["tukhoa2"]);
              $sale = !empty($_POST['sale']) ? mysqli_real_escape_string($link, $_POST['sale']) : 0;
              $hot = !empty($_POST['hot']) ? mysqli_real_escape_string($link, $_POST['hot']) : 0;
              $new = !empty($_POST['new']) ? mysqli_real_escape_string($link, $_POST['new']) : 0;

              // Convert title to URL-friendly slug
              $linkurl = mysqli_real_escape_string($link, strtolower(khongdau(str_replace("'", "", $_POST["tieude"]))));

              // Call the function to update the product
              upload($loai, $tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3, $tieude, $mota, $noidung, $tieude_en, $mota_en, $noidung_en, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $today, $linkurl, $id);
              $page = isset($_GET["page"]) ? $_GET["page"] : 1;
              exit;
            }

            function upload($loai, $tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3, $tieude, $mota, $noidung, $tieude_en, $mota_en, $noidung_en, $giagoc, $giaban, $tukhoa1, $tukhoa2, $sale, $hot, $new, $ngay, $linkurl, $id)
            {
              require "db.php";

              $truyvan = "UPDATE ma_sanpham
                        SET thuocloai='$loai', hinhanh='$tentaptin', hinhanh1='$tenhinhanh1', hinhanh2='$tenhinhanh2', hinhanh3='$tenhinhanh3', tieude='$tieude', mota='$mota', noidung='$noidung', tieude_en='$tieude_en', mota_en='$mota_en', noidung_en='$noidung_en',
                            giagoc='$giagoc', giaban='$giaban', tukhoa1='$tukhoa1', tukhoa2='$tukhoa2', sale='$sale',
                            hot='$hot', new='$new', ngay='$ngay', linkurl='$linkurl'
                        WHERE id='$id'";

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
                      window.location = 'quan_tri.php?p=danhsach_masanpham&page=" . $_GET["page"] . "';
                    }, 2000);
                  </script>";
              } else {
                echo "Upload không thành công. Bạn thử lại xem";
              }
            }

            function dichuyen_taptin_vaothumuc($tentaptin)
            {
              $thumuctam_chuataptin = $_FILES["txt_hinhanh"]["tmp_name"];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tentaptin")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                echo "Upload không thành công";
              }
            }
            function dichuyen_hinhanh1_vaothumuc($tenhinhanh1)
            {
              $thumuctam_chuataptin = $_FILES["txt_hinhanh1"]["tmp_name"];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh1")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                echo "Upload không thành công";
              }
            }
            function dichuyen_hinhanh2_vaothumuc($tenhinhanh2)
            {
              $thumuctam_chuataptin = $_FILES["txt_hinhanh2"]["tmp_name"];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh2")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                echo "Upload không thành công";
              }
            }
            function dichuyen_hinhanh3_vaothumuc($tenhinhanh3)
            {
              $thumuctam_chuataptin = $_FILES["txt_hinhanh3"]["tmp_name"];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/HinhSanPham/$tenhinhanh3")) {
                echo "Chúc mừng bạn Upload thành công thông tin";
              } else {
                echo "Upload không thành công";
              }
            }

            function xoataptin($link, $id, $tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3)
            {
              // Tránh SQL Injection
              $id = mysqli_real_escape_string($link, $id);

              // Xóa bản ghi trong cơ sở dữ liệu
              $truyvan = "DELETE FROM maykhoanda WHERE id = '$id'";
              $ketqua_truyvan = mysqli_query($link, $truyvan);

              if ($ketqua_truyvan) {
                // Xóa các tập tin hình ảnh nếu tồn tại
                $path = "../HinhCTSP/HinhSanPham/";
                $files = [$tentaptin, $tenhinhanh1, $tenhinhanh2, $tenhinhanh3];

                foreach ($files as $file) {
                  $filepath = $path . $file;
                  if (!empty($file) && file_exists($filepath)) {
                    unlink($filepath); // Xóa tập tin
                  }
                }

                echo "Xóa dữ liệu và tập tin thành công.";
              } else {
                echo "Lỗi khi xóa bản ghi: " . mysqli_error($link);
              }
            }
            ?>
            <?php
            include "db.php";
            $id = $_REQUEST["id"];
            $result = mysqli_query($link, "SELECT * FROM ma_sanpham where id like '$id' ");
            $row_dulieu_sua = mysqli_fetch_array($result);

            $tieude = $row_dulieu_sua["tieude"];
            $tieude_en = $row_dulieu_sua["tieude_en"];
            $mota = $row_dulieu_sua["mota"];
            $mota_en = $row_dulieu_sua["mota_en"];
            $hinhanh = $row_dulieu_sua["hinhanh"];
            $hinhanh1 = $row_dulieu_sua["hinhanh1"];
            $hinhanh2 = $row_dulieu_sua["hinhanh2"];
            $hinhanh3 = $row_dulieu_sua["hinhanh3"];
            $noidung = $row_dulieu_sua["noidung"];
            $noidung_en = $row_dulieu_sua["noidung_en"];
            $giagoc = $row_dulieu_sua["giagoc"];
            $giaban = $row_dulieu_sua["giaban"];
            $tukhoa1 = $row_dulieu_sua["tukhoa1"];
            $tukhoa2 = $row_dulieu_sua["tukhoa2"];
            $sale = $row_dulieu_sua["sale"];
            $hot = $row_dulieu_sua["hot"];
            $new = $row_dulieu_sua["new"];
            $ngay = $row_dulieu_sua["ngay"];
            ?>
            <div class="card-body">
              <form class="row g-3" action="" method="post" enctype="multipart/form-data">
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
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/HinhSanPham/' . $hinhanh : 'assets/img/products/hinhsanpham.jpg'; ?>"
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
                        <div class="thumb-upload-set colo-md-12">
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh1" type='file' id="txt_hinhanh1" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <input name="txt_hinhanh1_hide" type="hidden" id="txt_hinhanh1_hide"
                                value="<?php echo $hinhanh1; ?>" />
                              <label for="txt_hinhanh1"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image1Preview"
                                  src="<?php echo !empty($hinhanh1) ? '../HinhCTSP/HinhSanPham/' . $hinhanh1 : 'assets/img/products/hinhsanpham.jpg'; ?>"
                                  alt="preview" />
                              </div>
                            </div>
                            <script>
                              document.getElementById("txt_hinhanh1").addEventListener("change", function (event) {
                                const reader = new FileReader();
                                reader.onload = function () {
                                  document.getElementById("image1Preview").src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                              });
                            </script>
                          </div>
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh2" type='file' id="txt_hinhanh2" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <input name="txt_hinhanh2_hide" type="hidden" id="txt_hinhanh2_hide"
                                value="<?php echo $hinhanh2; ?>" />
                              <label for="txt_hinhanh2"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image2Preview"
                                  src="<?php echo !empty($hinhanh2) ? '../HinhCTSP/HinhSanPham/' . $hinhanh2 : 'assets/img/products/hinhsanpham.jpg'; ?>"
                                  alt="preview" />
                              </div>
                            </div>
                            <script>
                              document.getElementById("txt_hinhanh2").addEventListener("change", function (event) {
                                const reader = new FileReader();
                                reader.onload = function () {
                                  document.getElementById("image2Preview").src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                              });
                            </script>
                          </div>
                          <div class="thumb-upload">
                            <div class="thumb-edit">
                              <input name="txt_hinhanh3" type='file' id="txt_hinhanh3" class="ec-image-upload"
                                accept=".png, .jpg, .jpeg" />
                              <input name="txt_hinhanh3_hide" type="hidden" id="txt_hinhanh3_hide"
                                value="<?php echo $hinhanh3; ?>" />
                              <label for="txt_hinhanh3"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image3Preview"
                                  src="<?php echo !empty($hinhanh3) ? '../HinhCTSP/HinhSanPham/' . $hinhanh3 : 'assets/img/products/hinhsanpham.jpg'; ?>"
                                  alt="preview" />
                              </div>
                            </div>
                            <script>
                              document.getElementById("txt_hinhanh3").addEventListener("change", function (event) {
                                const reader = new FileReader();
                                reader.onload = function () {
                                  document.getElementById("image3Preview").src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                              });
                            </script>
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
                          <input class="form-control" name="tieude" type="text" value="<?php echo "$tieude"; ?>"
                            id="tieude" size="90" maxlength="70" />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Chọn loại</label>
                          <?php
                          $id = $_REQUEST["id"];
                          $sq = mysqli_query($link, "SELECT * FROM ma_sanpham where id=" . $id . "");
                          $loai = mysqli_fetch_array($sq);
                          ?>
                          <select name="thuocloai" class="form-control">
                            <?php
                            $selected = "";
                            $sql = mysqli_query($link, "SELECT * FROM loai_ma_sanpham ORDER BY id DESC");
                            while ($row = mysqli_fetch_array($sql)) {
                              if ($row['id'] == $loai['thuocloai']) {
                                $selected = "selected='selected'";
                              } else {
                                $selected = '';
                              }
                              ?>
                              <option value="<?= $row['id'] ?>" <?php echo $selected; ?>><?php echo $row['thuocloai'] ?>
                              </option>
                            <?php } ?>
                          </select>
                        </div>
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Mô tả ngắn ( 160 - 300 ký tự)</label>
                          <textarea class="form-control" name="mota" id="textarea" cols="88"
                            rows="3"><?php echo "$mota"; ?></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Từ khoá 1</label>
                          <div class="col-12">
                            <input class="form-control" name="tukhoa1" value="<?php echo "$tukhoa1"; ?>" type="text"
                              id="tukhoa1" size="90" maxlength="70" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="slug" class="col-12 col-form-label fw-bold">Từ khoá 2</label>
                          <div class="col-12">
                            <input class="form-control" name="tukhoa2" value="<?php echo "$tukhoa2"; ?>" type="text"
                              id="tukhoa2" size="90" maxlength="70" />
                          </div>
                        </div>
                        <!-- <div class="col-md-12">
                              <label for="slug" class="col-12 col-form-label fw-bold">Giá gốc</label>
                              <div class="col-12">
                                <input name="giagoc" type="text" id="giagoc" value="<?php echo "$giagoc"; ?>"
                                  class="form-control" size="90" maxlength="70" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="slug" class="col-12 col-form-label fw-bold">Giá bán</label>
                              <div class="col-12">
                                <input name="giaban" type="text" id="giaban" value="<?php echo "$giaban"; ?>"
                                  class="form-control" size="90" maxlength="70" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="slug" class="col-12 col-form-label fw-bold">Sale</label>
                              <div class="col-12">
                                <input name="sale" type="text" id="sale" class="form-control"
                                  value="<?php echo "$sale"; ?>" size="90" maxlength="70" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="slug" class="col-12 col-form-label fw-bold">Hot</label>
                              <div class="col-12">
                                <input name="hot" type="text" id="hot" class="form-control"
                                  value="<?php echo "$hot"; ?>" size="90" maxlength="70" />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="slug" class="col-12 col-form-label fw-bold">New</label>
                              <div class="col-12">
                                <input name="new" type="text" id="new" class="form-control"
                                  value="<?php echo "$new"; ?>" size="90" maxlength="70" />
                              </div>
                            </div> -->
						   <div class="col-md-12">
                          <label class="form-label fw-bold">Mô tả</label>
                          <textarea name="txt_noidung_en" id="content_en" class="form-control"
                            rows="4"><?php echo htmlspecialchars($noidung_en); ?></textarea>
                        </div>	
							
                        <div class="col-md-12">
                          <label class="form-label fw-bold">Nội dung</label>
                          <textarea name="txt_noidung" id="content_vi" class="form-control"
                            rows="4"><?php echo htmlspecialchars($noidung); ?></textarea>
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