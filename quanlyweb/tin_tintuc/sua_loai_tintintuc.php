<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>SỬA LOẠI TIN TỨC</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa loại tin tức
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

            $id           = $_REQUEST["id"];
            $thuocloai    = mysqli_real_escape_string($link, $_POST['thuocloai2']);
            $thuocloai_en = mysqli_real_escape_string($link, !empty($_POST['thuocloai_en']) ? $_POST['thuocloai_en'] : '');
            $url          = strtolower(str_replace(' ', '-', khongdau($_POST['thuocloai2'])));

            upload($thuocloai, $thuocloai_en, $url, $id);
        }

        function upload($thuocloai, $thuocloai_en, $url, $id)
        {
            global $link;

            $sql = "UPDATE loai_tin_tintuc SET
                        `thuocloai` = '$thuocloai',
                        `thuocloai_en` = '$thuocloai_en',
                        `name_url` = '$url'
                    WHERE id = '$id'";

            $result = mysqli_query($link, $sql);

            if (!$result) {
                die('MySQL Error: ' . mysqli_error($link));
            }

            echo "<script>window.location='quan_tri.php?p=danhsach_loai_tintintuc&page=" . $_GET["page"] . "'</script>";
            exit;
        }
        ?>
        <?php
        include('db.php');
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM loai_tin_tintuc WHERE id = '$id'");
        $row_dulieu_sua = mysqli_fetch_array($result);
        $thuocloai2   = $row_dulieu_sua['thuocloai'];
        $thuocloai_en = $row_dulieu_sua['thuocloai_en'];
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa loại tin tức</h2>
            </div>
            <div class="card-body">
              <div class="row ec-vendor-uploads">
                <div class="col-lg-12">
                  <div class="ec-vendor-upload-detail">
                    <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                      <div class="col-md-7">
                        <label for="inputEmail4" class="form-label">Loại tin tức</label>
                        <input name="thuocloai2" type="text" id="thuocloai_ban" class="form-control"
                          value="<?php echo "$thuocloai2"; ?>" size="70" />
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