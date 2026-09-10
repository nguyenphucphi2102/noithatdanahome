<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>SỬA LOẠI SẢN PHẨM</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa loại sản phẩm
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=danhsach_loai_tinsanpham" class="btn btn-primary"> Xem tất cả
          </a>
        </div>
      </div>
      <div class="row">
        <?php
        if (isset($_POST['luu'])) {
            require_once('db.php');

            $id        = $_REQUEST["id"];
            $tentaptin = $_FILES['txt_hinhanh']['name'];
            if ($tentaptin == "") {
                $tentaptin = $_POST['txt_hinhanh_hide'];
            }

            $thuocloai    = mysqli_real_escape_string($link, $_POST['thuocloai2']);
            $thuocloai_en = mysqli_real_escape_string($link, !empty($_POST['thuocloai_en']) ? $_POST['thuocloai_en'] : '');
            $linkurl      = strtolower(str_replace(' ', '-', khongdau(str_replace("'", "", $_POST['thuocloai2']))));

            upload($thuocloai, $thuocloai_en, $tentaptin, $id, $linkurl);
            exit;
        }

        function upload($thuocloai, $thuocloai_en, $tentaptin, $id, $linkurl)
        {
            global $link;

            $sql = "UPDATE loai_tin_sanpham SET
                        `thuocloai` = '$thuocloai',
                        `thuocloai_en` = '$thuocloai_en',
                        `hinhanh` = '$tentaptin',
                        `linkurl` = '$linkurl'
                    WHERE id = '$id'";

            $result = mysqli_query($link, $sql);

            if (!$result) {
                die('MySQL Error: ' . mysqli_error($link));
            }

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
                      window.location = 'quan_tri.php?p=danhsach_loai_tinsanpham&page=" . $_GET["page"] . "';
                    }, 2000);
                  </script>";
        }

        function dichuyen_taptin_vaothumuc($tentaptin)
        {
            $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
            if (!move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
                echo "Không thể copy tập tin $tentaptin vào thư mục tài liệu";
            }
        }

        if (!isset($link)) {
            require_once('db.php');
        }
        ?>
        <?php
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM loai_tin_sanpham WHERE id = '$id'");
        $row_dulieu_sua = mysqli_fetch_array($result);
        $thuocloai2   = $row_dulieu_sua['thuocloai'];
        $thuocloai_en = $row_dulieu_sua['thuocloai_en'];
        $hinhanh      = $row_dulieu_sua['hinhanh'];
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa loại sản phẩm</h2>
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
                            <input name="txt_hinhanh_hide" type="hidden" id="txt_hinhanh"
                              value="<?php echo "$hinhanh"; ?>" size="40" />
                            <label for="txt_hinhanh">
                              <img src="assets/img/icons/edit.svg" class="svg_img header_svg" alt="edit" />
                            </label>
                          </div>
                          <div class="avatar-preview ec-preview">
                            <div class="imagePreview ec-div-preview">
                              <img id="imagePreview"
                                src="<?php echo !empty($hinhanh) ? '../HinhCTSP/' . $hinhanh : 'assets/img/products/hinhsanphama.jpg'; ?>"
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
                        <label for="inputEmail4" class="form-label">Tên loại sản phẩm</label>
                        <input class="form-control" name="thuocloai2" type="text" id="thuocloai_ban"
                          value="<?php echo "$thuocloai2"; ?>" size="70" />
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