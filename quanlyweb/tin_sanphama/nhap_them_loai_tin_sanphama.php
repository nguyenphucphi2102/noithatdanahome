<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>THÊM LOẠI DỊCH VỤ</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Thêm loại dịch vụ
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=them_tin_sanphama" class="btn btn-primary"> Thêm dich vụ
          </a>
        </div>
      </div>
      <div class="row">
        <?php
        if (isset($_POST['luu'])) {
            require_once('db.php');

            $tentaptin    = $_FILES['txt_hinhanh']['name'];
            $thuocloai    = mysqli_real_escape_string($link, $_POST['thuocloai']);
            $thuocloai_en = mysqli_real_escape_string($link, !empty($_POST['thuocloai_en']) ? $_POST['thuocloai_en'] : '');
            $linkurl      = strtolower(str_replace(' ', '-', khongdau(str_replace("'", "", $_POST['thuocloai']))));

            upload($thuocloai, $thuocloai_en, $tentaptin, $linkurl);

            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            echo "<script>window.location='quan_tri.php?p=danhsach_loai_tinsanphama&page=" . $page . "'</script>";
            exit;
        }

        function upload($thuocloai, $thuocloai_en, $tentaptin, $linkurl)
        {
            global $link;

            $logo = '';

            $sql = "INSERT INTO loai_tin_sanphama (thuocloai, thuocloai_en, hinhanh, logo, linkurl)
                    VALUES ('$thuocloai', '$thuocloai_en', '$tentaptin', '$logo', '$linkurl')";

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
            if (!move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
                echo "Không thể copy tập tin $tentaptin vào thư mục tài liệu";
            }
        }
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Thêm loại dịch vụ mới</h2>
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
                        <label for="inputEmail4" class="form-label fw-bold">Loại dịch vụ</label>
                        <input class="form-control" name="thuocloai" type="text" id="tieude2" size="60"
                          maxlength="70" />
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