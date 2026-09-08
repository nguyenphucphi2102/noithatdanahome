
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>ĐỐI TÁC</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Đối tác
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=danhsach_doitac" class="btn btn-primary"> Danh sách đối tác
          </a>
        </div>
      </div>
      <div class="row">
     <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  ...
  <?php
  if (isset($_POST['luu'])) {
      require_once('db.php');

      $tentaptin = $_FILES['txt_hinhanh']['name'];
      $tieude    = mysqli_real_escape_string($link, $_POST['tieude']);

      upload($tentaptin, $tieude);

      $page = isset($_GET["page"]) ? $_GET["page"] : 1;
      echo "<script>window.location='quan_tri.php?p=danhsach_doitac&page=" . $page . "'</script>";
      exit;
  }

  function upload($tentaptin, $tieude)
  {
      global $link;   // ← thêm dòng này
      require_once('db.php');

      $tieude_en = '';
      $url_link  = '';

      $sql = "INSERT INTO doi_tac (hinhanh, tieude, tieude_en, url_link)
              VALUES ('$tentaptin', '$tieude', '$tieude_en', '$url_link')";

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
      global $link;   // ← thêm luôn nếu hàm này có dùng $link (hiện chưa dùng nhưng phòng sau này)
      $thumuctam_chuataptin = $_FILES['txt_hinhanh']['tmp_name'];
      if (!move_uploaded_file($thumuctam_chuataptin, "../HinhCTSP/$tentaptin")) {
          echo "Không thể copy tập tin $tentaptin vào thư mục tài liệu";
      }
  }



        function xoataptin($tentaptin)
        {

          $ketnoi_maychu = ketnoi_MC();

          chon_CSDL($ketnoi_maychu);

          $masotaptin = mysqli_insert_id();

          $truyvan = "DELETE FROM sanpham WHERE id = $masotaptin ";

          $ketqua_truyvan = truyvan($truyvan, $ketnoi_maychu);
        }

        ?>

        <?php



        include('db.php');





        //$noi_dung=str_replace("\d","",$noi_dung);

        //echo $noi_dung;echo"<hr>";



        function hop_option()
        {

          $tv = "select * from loai_doi_tac where phanloai like '1' ORDER BY id ASC";

          $tv_1 = mysqli_query($link, $tv);

          echo "<select name=\"cap_do\" class=\"form-group\">";

          echo "<option value=\"\">--- Chọn loại sản phẩm ---</option>";

          while ($tv_2 = mysqli_fetch_array($tv_1)) {

            echo "<option value=\"$tv_2[id]\" >";

            echo $tv_2['thuocloai'];

            echo "</option>";
          }

          echo "</select>";
        }


        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Thêm đối tác mới</h2>
            </div>
            <div class="card-body">
              <div class="row ec-vendor-uploads">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
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
                              <img class="ec-image-preview" src="assets/img/products/hinhdoitac.jpg"
                                alt="edit" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-8">
                    <div class="ec-vendor-upload-detail">
                      <div class="row">
                        <div class="col-md-12 mt-3">
                          <label for="inputEmail4" class="form-label fw-bold">Tiêu đề</label>
                          <input name="tieude" class="form-control" type="text" id="tieude2" size="90"
                            maxlength="150" />
                        </div>
                        
                        <div class="col-md-12 mt-3">
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