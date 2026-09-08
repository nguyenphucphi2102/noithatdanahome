


    <div class="ec-page-wrapper">
      <div class="ec-content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
              <h1>QUẢN LÝ TIN TỨC</h1>
              <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Tin tức
              </p>
            </div>
            <div>
              <a href="quan_tri.php?p=ds_tin_thicong" class="btn btn-primary"> Xem tất cả
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
              require('db.php');
              $file_name = $_FILES['txt_hinhanh']['name'];
              $file_hinhndab = $_FILES['txt_hinhndab']['name'];
              $random_digit = rand(0000, 9999);
              $tentaptin = $_FILES['txt_hinhanh']['name'];
              $tieude = mysqli_real_escape_string($link, $_POST['tieude_en']);
              $tieude_en = mysqli_real_escape_string($link, $_POST['tieude_en']);
              $mota = mysqli_real_escape_string($link, $_POST['mota']);
              $noidung = mysqli_real_escape_string($link, $_POST['txt_noidung']);
              $noidung_en = mysqli_real_escape_string($link, $_POST['txt_noidung_en']);
              $tukhoa = mysqli_real_escape_string($link, $_POST['tukhoa']);
              $tukhoa2 = mysqli_real_escape_string($link, $_POST['tukhoa2']);
              $sale = mysqli_real_escape_string($link, !empty($_POST['sale']) ? $_POST['sale'] : 0);
              $hot = mysqli_real_escape_string($link, !empty($_POST['hot']) ? $_POST['hot'] : 0);
              $new = mysqli_real_escape_string($link, !empty($_POST['new']) ? $_POST['new'] : 0);
              $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
              $thuocloai = $_POST['cap_do'];
              $danhmuc = '1';
              $linkurl = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));
              upload(
                $noidung,
                $noidung_en,
                $tentaptin,
                $tieude,
                $mota,
                $thuocloai,
                $tieude_en,
                $tukhoa,
                $ngay,
                $linkurl
            );
              $page = isset($_GET["page"]) ? $_GET["page"] : 1;
              echo "<script>window.location='quan_tri.php?p=ds_tin_thicong&page=" . $page . "'</script>";
              exit;
            }

            function upload(
                $noidung,
                $noidung_en,
                $tentaptin,
                $tieude,
                $mota,
                $thuocloai,
                $tieude_en,
                $tukhoa,
                $ngay,
                $linkurl
            ) {
                require('db.php');
            
                $trangchu = '';
                $title = $tieude;
                $facebook = '';
                $nguon = '';
                $noibat = 0;
            
                $sql = "
                    INSERT INTO tin_thicong (
                        hinhanh,
                        noidung,
                        noidung_en,
                        trangchu,
                        mota,
                        tieude,
                        tieude_en,
                        title,
                        tukhoa,
                        facebook,
                        linkurl,
                        ngay,
                        nguon,
                        thuocloai,
                        noibat
                    ) VALUES (
                        '$tentaptin',
                        '$noidung',
                        '$noidung_en',
                        '$trangchu',
                        '$mota',
                        '$tieude',
                        '$tieude_en',
                        '$title',
                        '$tukhoa',
                        '$facebook',
                        '$linkurl',
                        '$ngay',
                        '$nguon',
                        '$thuocloai',
                        '$noibat'
                    )
                ";
            
                $result = mysqli_query($link, $sql);
            
                if (!$result) {
                    die('MySQL Error: ' . mysqli_error($link));
                }
            
                if ($tentaptin != '') {
                    dichuyen_taptin_vaothumuc($tentaptin);
                }
            
                return true;
            }
            function dichuyen_taptin_vaothumuc($tentaptin)
            {
              $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
              if (move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tentaptin"))
                echo "Chúc mừng bạn Upload thành công";
              else {
                xoataptin($tentaptin);
                echo "Không thể copy tập tin  $tentaptin vào thư mục tài liệu";
              }
            }


            function xoataptin($tentaptin)
            {
              require('db.php');
              global $link;
              $tentaptin = mysqli_real_escape_string($link, $tentaptin);
              $truyvan = "DELETE FROM maykhoanda WHERE filename = '$tentaptin'";
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
            //$noi_dung=str_replace("\d","",$noi_dung);
            //echo $noi_dung;echo"<hr>";
            function hop_option()
            {
              include('db.php');
              $tv = "select * from loai_tin_thicong ORDER BY id ASC";
              $tv_1 = mysqli_query($link, $tv);
              echo "<select name=\"cap_do\" class=\"form-control\">";
              echo "<option value=\"\">--- Chọn loại tin tức ---</option>";
              while ($tv_2 = mysqli_fetch_array($tv_1)) {
                echo "<option value=" . $tv_2['id'] . ">";
                echo $tv_2['thuocloai'];
                echo "</option>";
              }
              echo "</select>";
            }

            ?>
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                  <h2>Thêm tin tức mới</h2>
                </div>
                <div class="card-body">
                  <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                    <div class="row ec-vendor-uploads">
                      <!-- Upload Ảnh -->
                      <div class="col-lg-4">
                        <div class="ec-vendor-img-upload">
                          <div class="ec-vendor-main-img">
                            <div class="avatar-upload">
                              <div class="avatar-edit">
                                <input name="txt_hinhanh" type="file" id="txt_hinhanh" class="ec-image-upload"
                                  accept=".png, .jpg, .jpeg" />
                                <label for="txt_hinhanh">
                                  <img src="assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                                </label>
                              </div>
                              <div class="avatar-preview ec-preview">
                                <div class="imagePreview ec-div-preview">
                                  <img class="ec-image-preview" id="imagePreview"
                                    src="assets/img/products/hinhtintuc-hinhdichvu.jpg" alt="edit" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Thông tin tin tức -->
                      <div class="col-lg-8">
                        <div class="ec-vendor-upload-detail">
                          <div class="row">
                            <!-- Chọn loại -->
                            <div class="col-md-5">
                              <label class="form-label fw-bold">Chọn loại</label>
                              <?php hop_option(); ?>
                            </div>


                            <!-- Tiêu đề tin tức -->
                            <div class="col-md-7">
                              <label for="inputEmail4" class="form-label fw-bold">Tiêu đề tin tức</label>
                              <input name="tieude_en" type="text" id="tieude_en" class="form-control" maxlength="70" />
                            </div>

                            <!-- Mô tả ngắn -->
                            <div class="col-md-12 mt-3">
                              <label class="form-label fw-bold">Mô tả ngắn (160 - 300 ký tự)</label>
                              <textarea name="mota" id="textarea" class="form-control" rows="5"
                                maxlength="300"></textarea>
                            </div>

                            <!-- Từ khoá 1 -->
                            <div class="col-md-12 mt-3">
                              <label for="tukhoa" class="form-label fw-bold">Từ khoá 1</label>
                              <input name="tukhoa" type="text" id="tukhoa" class="form-control" maxlength="160" />
                            </div>

                            <!-- Từ khoá 2 -->
                            <div class="col-md-12 mt-3">
                              <label for="tieude_en" class="form-label fw-bold">Từ khoá 2</label>
                              <input name="tieude_en" type="text" id="tieude_en" class="form-control" maxlength="160" />
                            </div>

                            <!-- Nội dung chi tiết -->
                            <div class="col-md-12 mt-3">
                              <label class="form-label fw-bold">Nội dung chi tiết</label>
                              <textarea name="txt_noidung" id="content_vi" class="form-control"></textarea>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <!-- Nút lưu -->
                            <div class="col-md-12 text-center mt-3">
                              <input name="luu" class="btn btn-success px-4 py-2 fw-bold" type="submit" id="luu"
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


