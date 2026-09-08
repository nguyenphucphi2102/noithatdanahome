<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>THÊM LOẠI TIN TỨC</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Thêm loại tin tức
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=them_tin_tintuc" class="btn btn-primary"> Thêm tin tức
          </a>
        </div>
      </div>
      <div class="row">
        <?php
        if (isset($_POST['luu'])) {
            require_once('db.php');

            $thuocloai    = mysqli_real_escape_string($link, $_POST['thuocloai']);
            $thuocloai_en = mysqli_real_escape_string($link, !empty($_POST['thuocloai_en']) ? $_POST['thuocloai_en'] : '');
            $url          = strtolower(str_replace(' ', '-', khongdau($_POST['thuocloai'])));

            upload($thuocloai, $thuocloai_en, $url);

            $page = isset($_GET["page"]) ? $_GET["page"] : 1;
            echo "<script>window.location='quan_tri.php?p=danhsach_loai_tintintuc&page=" . $page . "'</script>";
            exit;
        }

        function upload($thuocloai, $thuocloai_en, $url)
        {
            global $link;

            $sql = "INSERT INTO loai_tin_tintuc (thuocloai, thuocloai_en, name_url)
                    VALUES ('$thuocloai', '$thuocloai_en', '$url')";

            $result = mysqli_query($link, $sql);

            if (!$result) {
                die('MySQL Error: ' . mysqli_error($link));
            }

            return true;
        }
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Thêm loại tin tức mới</h2>
            </div>
            <div class="card-body">
              <div class="row ec-vendor-uploads">
                <div class="col-lg-12">
                  <div class="ec-vendor-upload-detail">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                      <div class="col-md-7">
                        <label for="inputEmail4" class="form-label">Loại tin tức</label>
                        <input name="thuocloai" type="text" id="tieude" class="form-control" size="60" maxlength="70" />
                      </div>
                      <div class="col-md-12">
                        <input class="btn btn-primary" name="luu" type="submit" id="luu" value="Lưu Lại" />
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
  </div>
</div>