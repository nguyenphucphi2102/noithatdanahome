<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="wrapper">
  <div class="ec-page-wrapper">
    <div class="ec-content-wrapper">
      <div class="content">
        <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
          <div>
            <h1>QUẢN LÝ DỊCH VỤ</h1>
            <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
              <span><i class="mdi mdi-chevron-right"></i></span>Dịch vụ
            </p>
          </div>
          <div>
            <a href="quan_tri.php?p=ds_tin_sanpham" class="btn btn-primary"> Xem tất cả
            </a>
          </div>
        </div>
        <div class="row">
         <?php
if (isset($_POST['luu'])) {
    $today  = date("d");
    $today1 = date("m");
    $today3 = date("Y");
    $ngay   = " $today/$today1/$today3 ";
    require_once('db.php');

    $tentaptin = $_FILES['txt_hinhanh']['name'];

    $tieude    = mysqli_real_escape_string($link, $_POST['tieude']);
    $tieude_en = mysqli_real_escape_string($link, $_POST['tieude_en']);
    $mota      = mysqli_real_escape_string($link, $_POST['mota']);
    $noidung   = mysqli_real_escape_string($link, $_POST['txt_noidung']);
    $tukhoa    = mysqli_real_escape_string($link, !empty($_POST['tukhoa']) ? $_POST['tukhoa'] : '');
    $thuocloai = mysqli_real_escape_string($link, $_POST['cap_do']);
    $linkurl   = strtolower(khongdau(str_replace("'", "", $_POST['tieude'])));

    upload($noidung, $tentaptin, $tieude, $mota, $thuocloai, $tieude_en, $tukhoa, $ngay, $linkurl);

    $page = isset($_GET["page"]) ? $_GET["page"] : 1;
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
        window.location = 'quan_tri.php?p=ds_tin_sanpham&page=" . $page . "';
      }, 2000);
    </script>";
    exit;
}

function upload($noidung, $tentaptin, $tieude, $mota, $thuocloai, $tieude_en, $tukhoa, $ngay, $linkurl)
{
    global $link;

    $trangchu   = '';
    $title      = $tieude;
    $facebook   = '';
    $nguon      = '';
    $noidung_en = '';
    $mota_en    = '';
    $xem        = 0;
    $hinhqcab   = '';
    $hinhqcabc  = '';
    $hinhndab   = '';
    $hinhndabc  = '';
    $hinhndabcd = '';
    $noibat     = 0;
    $star       = 0;

    $sql = "
        INSERT INTO tin_sanpham (
            hinhanh, noidung, noidung_en, trangchu, mota, mota_en,
            tieude, tieude_en, title, tukhoa, facebook, linkurl, ngay,
            xem, nguon, hinhqcab, hinhqcabc, hinhndab, hinhndabc, hinhndabcd,
            thuocloai, noibat, star
        ) VALUES (
            '$tentaptin','$noidung','$noidung_en','$trangchu','$mota','$mota_en',
            '$tieude','$tieude_en','$title','$tukhoa','$facebook','$linkurl','$ngay',
            '$xem','$nguon','$hinhqcab','$hinhqcabc','$hinhndab','$hinhndabc','$hinhndabcd',
            '$thuocloai','$noibat','$star'
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
    if (!move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/Hinhdichvu/$tentaptin")) {
        echo "Không thể copy tập tin $tentaptin vào thư mục tài liệu";
    }
}

function hop_option()
{
    global $link;
    $tv = "select * from loai_tin_sanpham ORDER BY id ASC";
    $tv_1 = mysqli_query($link, $tv);
    echo "<select name=\"cap_do\" class=\"form-control\">";
    echo "<option value=\"\">--- Chọn loại dịch vụ ---</option>";
    while ($tv_2 = mysqli_fetch_array($tv_1)) {
        echo "<option value=" . $tv_2['id'] . ">" . $tv_2['thuocloai'] . "</option>";
    }
    echo "</select>";
}

if (!isset($link)) {
    require_once('db.php');
}
?>
          <div class="col-12">
            <div class="card card-default">
              <div class="card-header card-header-border-bottom">
                <h2>Thêm dịch vụ mới</h2>
              </div>
              <div class="card-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                  <div class="row ec-vendor-uploads">
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
                    <div class="col-lg-8">
                      <div class="ec-vendor-upload-detail">
                        <div class="row">
                          <div class="col-md-5">
                            <label class="form-label fw-bold">Chọn loại</label>
                            <?php hop_option(); ?>
                          </div>

                          <div class="col-md-7">
                            <label class="form-label fw-bold">Tiêu đề dịch vụ</label>
                            <input name="tieude" type="text" id="tieude" class="form-control" maxlength="70" />
                          </div>

                          <div class="col-md-12 mt-3">
                            <label class="form-label fw-bold">Mô tả ngắn (160 - 300 ký tự)</label>
                            <textarea name="mota" id="textarea" class="form-control" rows="5" maxlength="300"></textarea>
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="tukhoa" class="form-label fw-bold">Từ khoá H1</label>
                            <input name="tukhoa" type="text" id="tukhoa" class="form-control" maxlength="160" />
                          </div>

                          <div class="col-md-12 mt-3">
                            <label for="tieude_en" class="form-label fw-bold">Từ khoá H2</label>
                            <input name="tieude_en" type="text" id="tieude_en" class="form-control" maxlength="160" />
                          </div>

                          <div class="col-md-12 mt-3">
                            <label class="form-label fw-bold">Nội dung chi tiết</label>
                            <textarea name="txt_noidung" id="content_vi" class="form-control"></textarea>
                          </div>
                          <br><br><br><br><br>

                          <div class="col-md-12 text-center mt-3">
                            <input name="luu" class="btn btn-success px-4 py-2 fw-bold" type="submit" id="luu" value="Lưu Lại" />
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