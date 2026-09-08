<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>QUẢN LÝ TIN TỨC</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa tin tức
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=ds_tin_tintuc" class="btn btn-primary"> Xem tất cả
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
          $tentaptin = $_FILES['txt_hinhanh']['name'];
          $fileup = '';
          if ($tentaptin != "") {
            $fileup = "`hinhanh` = '$tentaptin',";
          } else {
            $fileup = "";
          }
          $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
          $tieude = mysqli_real_escape_string($link, $_POST['tieude']);
          $mota = mysqli_real_escape_string($link, $_POST['mota']);
          $tieude_en = str_replace("'", "", $_POST['tieude_en']);
          $tukhoa = mysqli_real_escape_string($link, $_POST['tukhoa']);
          $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
          $linkurl = strtolower(str_replace(",", "", khongdau(str_replace("'", "", $_POST['tieude_en']))));
          $thuocloai = $_POST['thuocloai'];

          $truyvan = "UPDATE `tin_tintuc` SET $fileup
                    `thuocloai` = '$thuocloai',
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
          echo "<script>window.location='quan_tri.php?p=ds_tin_tintuc&page=" . $_GET["page"] . "'</script>";
          if ($result) {
            if ($fileup != '') {
              dichuyen_taptin_vaothumuc($tentaptin);

            }
            echo "Chúc mừng bạn Upload thành công thông tin";
          } else {
            echo "Upload không thành công. Bạn thử lại xem ";


          }
        }
        function dichuyen_taptin_vaothumuc($tentaptin)
        {
          $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
          if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhtintuc/$tentaptin")) {
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
        <?php
        include('db.php');
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM tin_tintuc where id like '$id' ");
        $row_dulieu_sua = mysqli_fetch_array($result);
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
              <h2>Sửa tin tức</h2>
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
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/Hinhtintuc/' . $hinhanh : 'assets/img/products/hinhtintuc-hinhdichvu.jpg'; ?>"
                                alt="preview" />
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
                  </div>
                  <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail">
                      <div class="row gy-3">
                        <div class="col-md-5">
                          <label class="form-label fw-bold">Chọn loại</label>
                          <?php
                          $id = $_REQUEST["id"];
                          $sq = mysqli_query($link, "SELECT * FROM tin_tintuc where id=" . $id . "");
                          $loai = mysqli_fetch_array($sq);
                          ?>
                          <select name="thuocloai" class="form-control">
                            <?php
                            $selected = "";
                            $sql = mysqli_query($link, "SELECT * FROM loai_tin_tintuc ORDER BY id DESC");
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
                        <!-- Tiêu đề tin tức -->
                        <div class="col-md-7">
                          <label for="inputEmail4" class="form-label fw-bold">Tiêu đề tin tức</label>
                          <input name="tieude_en" type="text" id="tieude_en" class="form-control"
                            value="<?php echo "$tieude_en"; ?>" maxlength="70" />
                        </div>

                        <!-- Mô tả ngắn -->
                        <div class="col-md-12 mt-3">
                          <label class="form-label fw-bold">Mô tả ngắn ( 160 - 300 ký tự)</label>
                          <textarea name="mota" class="form-control" maxlength="300"
                            required><?php echo $mota; ?></textarea>
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