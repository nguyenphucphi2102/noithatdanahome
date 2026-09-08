<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>QUẢN LÝ dịch vụ</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa dịch vụ
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=ds_tin_dichvuu" class="btn btn-primary"> Xem tất cả
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
          $ngay = " $today/$today1/$today3 ";
          include_once('db.php');
          $id = $_REQUEST["id"];
          $thuocloai = $_REQUEST["thuocloai"];
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
          $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
          $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
          $mota = mysqli_real_escape_string($link, $_POST['mota']);
          $tieude_en = str_replace("'", "", $_POST['tieude_en']);
          $tukhoa = mysqli_real_escape_string($link, $_POST['tukhoa']);
          $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
          $linkurl = strtolower(str_replace(",", "", khongdau(str_replace("'", "", $_POST['tieude_en']))));
          $thuocloai = $_POST['thuocloai'];

          $truyvan = "UPDATE `tin_dichvuu` SET $fileup
                    `thuocloai` = '$thuocloai',
                    `hinhanh`   ='$tentaptin',
                    `hinhanh1` ='$tenhinhanh1',
                    `hinhanh2` ='$tenhinhanh2',
                    `hinhanh3` ='$tenhinhanh3',
                    `noidung` = '$noidung',
                    `trangchu` = '',
                    `mota` = '$mota',
                    `tieude` = '$tieude',
                    `tukhoa` = '$tukhoa',
                    `tukhoa2` = '$tukhoa2',
                    `linkurl` = '$linkurl',
                    `ngay` = '$ngay',
                    `tieude_en` = '$tieude_en'
                     WHERE `id` = $id;";

          $result = mysqli_query($link, $truyvan);
          if ($result) {
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
                window.location = 'quan_tri.php?p=ds_tin_dichvuu&page=" . $_GET["page"] . "';
              }, 2000);
            </script>";

          }
        }
        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tentaptin")) {
            echo "Chúc mừng bạn Upload thành công thông tin ";

          } else {
            xoataptin($tentaptin);
            echo "Chúc mừng bạn Upload thành công thông tin";
          }
        }
        function dichuyen_hinhanh1_vaothumuc($tenhinhanh1)
        {
          $thumuctam_chuataptin = $_FILES["txt_hinhanh1"]["tmp_name"];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhanh1")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            echo "Upload không thành công";
          }
        }
        function dichuyen_hinhanh2_vaothumuc($tenhinhanh2)
        {
          $thumuctam_chuataptin = $_FILES["txt_hinhanh2"]["tmp_name"];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhanh2")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            echo "Upload không thành công";
          }
        }
        function dichuyen_hinhanh3_vaothumuc($tenhinhanh3)
        {
          $thumuctam_chuataptin = $_FILES["txt_hinhanh3"]["tmp_name"];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tenhinhanh3")) {
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            echo "Upload không thành công";
          }
        }
        function xoataptin($tentaptin)
        {
          include_once('db.php');
          $truyvan = "DELETE FROM maykhoanda WHERE id = $masotaptin";
          mysqli_query($link, $truyvan);
        }
        ?>
        <?php
        include('db.php');
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM tin_dichvuu where id like '$id' ");
        $row_dulieu_sua = mysqli_fetch_array($result);
        $hinhanh = $row_dulieu_sua["hinhanh"];
        $hinhanh1 = $row_dulieu_sua["hinhanh1"];
        $hinhanh2 = $row_dulieu_sua["hinhanh2"];
        $hinhanh3 = $row_dulieu_sua["hinhanh3"];
        $tieude = $row_dulieu_sua['tieude'];
        $mota = $row_dulieu_sua['mota'];
        $hinhanh = $row_dulieu_sua['hinhanh'];
        $tieude_en = $row_dulieu_sua['tieude_en'];
        $title = $row_dulieu_sua['title'];
        $tukhoa = $row_dulieu_sua['tukhoa'];
        $tukhoa2 = $row_dulieu_sua['tukhoa2'];
        $ngay = $row_dulieu_sua['ngay'];
        $linkurl = $row_dulieu_sua['linkurl'];
        $trangchu = $row_dulieu_sua['trangchu'];
        $noidung = $row_dulieu_sua['noidung'];
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa dịch vụ</h2>
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
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/Hinhdichvu/' . $hinhanh : 'assets/img/products/hinhtintuc-hinhdichvu.jpg'; ?>"
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
                              <input name="txt_hinhanh1_hide" type="hidden" id="txt_hinhanh1_hide" value="<?php echo $hinhanh1; ?>" />
                              <label for="txt_hinhanh1"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image1Preview"
                                  src="<?php echo !empty($hinhanh1) ? '../HinhCTSP/Hinhdichvu/' . $hinhanh1 : 'assets/img/products/hinhsanpham.jpg'; ?>"
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
                              <input name="txt_hinhanh2_hide" type="hidden" id="txt_hinhanh2_hide" value="<?php echo $hinhanh2; ?>" />
                              <label for="txt_hinhanh2"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image2Preview"
                                  src="<?php echo !empty($hinhanh2) ? '../HinhCTSP/Hinhdichvu/' . $hinhanh2 : 'assets/img/products/hinhsanpham.jpg'; ?>"
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
                              <input name="txt_hinhanh3_hide" type="hidden" id="txt_hinhanh3_hide" value="<?php echo $hinhanh3; ?>" />
                              <label for="txt_hinhanh3"><img src="assets/img/icons/edit.svg" class="svg_img header_svg"
                                  alt="edit" /></label>
                            </div>
                            <div class="thumb-preview ec-preview">
                              <div class="image-thumb-preview">
                                <img id="image3Preview"
                                  src="<?php echo !empty($hinhanh3) ? '../HinhCTSP/Hinhdichvu/' . $hinhanh3 : 'assets/img/products/hinhsanpham.jpg'; ?>"
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
                      <div class="row gy-3">
                        <div class="col-md-5">
                          <label class="form-label fw-bold">Chọn loại</label>
                          <?php
                          $id = $_REQUEST["id"];
                          $sq = mysqli_query($link, "SELECT * FROM tin_dichvuu where id=" . $id . "");
                          $loai = mysqli_fetch_array($sq);
                          ?>
                          <select name="thuocloai" class="form-control">
                            <?php
                            $selected = "";
                            $sql = mysqli_query($link, "SELECT * FROM loai_tin_dichvuu ORDER BY id DESC");
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
                        <!-- Tiêu đề dịch vụ -->
                        <div class="col-md-7">
                          <label for="inputEmail4" class="form-label fw-bold">Tiêu đề dịch vụ</label>
                          <input name="tieude_en" type="text" id="tieude_en" class="form-control"
                            value="<?php echo "$tieude_en"; ?>" maxlength="70" />
                        </div>

                        <!-- Mô tả ngắn -->
                        <div class="col-md-12 mt-3">
                          <label class="form-label fw-bold">Mô tả ngắn ( 160 - 300 ký tự)</label>
                          <textarea name="mota" class="form-control" maxlength="300"><?php echo $mota; ?></textarea>
                        </div>

                        <!-- Từ khoá 1 -->
                        <div class="col-md-12 mt-3">
                          <label for="tukhoa" class="form-label fw-bold">Từ khoá 1</label>
                          <input name="tukhoa" type="text" id="tukhoa" value="<?php echo "$tukhoa"; ?>"
                            class="form-control" maxlength="160" />
                        </div>

                        <!-- Từ khoá 2 -->
                        <div class="col-md-12 mt-3">
                          <label for="tukhoa2" class="form-label fw-bold">Từ khoá 2</label>
                          <input name="tukhoa2" type="text" id="tukhoa2" class="form-control"
                            value="<?php echo "$tukhoa2"; ?>" maxlength="160" />
                        </div>

                        <!-- Nội dung chi tiết -->
                        <div class="col-md-12 mt-3">
                          <label class="form-label fw-bold">Nội dung chi tiết</label>
                          <textarea name="txt_noidung" id="txt_noidung" rows="10"
                            cols="50"><?php echo htmlspecialchars($noidung); ?></textarea>
                        </div>

                        <!-- Nút lưu -->
                        <div class="col-md-12 text-center mt-3">
                          <input name="luu" class="btn btn-success" type="submit" id="luu" value="Lưu Lại" />
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


<script type="text/javascript">
  var editor = CKEDITOR.replace('txt_noidung', {
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