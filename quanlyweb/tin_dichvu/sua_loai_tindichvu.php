<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>SỬA LOẠI DỊCH VỤ</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Sửa loại dịch vụ
          </p>
        </div>
        <div>
          <a href="quan_tri.php?p=them_tin_dichvu" class="btn btn-primary"> Thêm dịch vụ
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

            $sql = "UPDATE loai_tin_dichvu SET
                        `thuocloai` = '$thuocloai',
                        `thuocloai_en` = '$thuocloai_en',
                        `name_url` = '$url'
                    WHERE id = '$id'";

            $result = mysqli_query($link, $sql);

            if (!$result) {
                die('MySQL Error: ' . mysqli_error($link));
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
                      window.location = 'quan_tri.php?p=danhsach_loai_tindichvu&page=" . $_GET["page"] . "';
                    }, 2000);
                  </script>";
            exit;
        }
        ?>
        <?php
        include('db.php');
        $id = $_REQUEST["id"];
        $result = mysqli_query($link, "SELECT * FROM loai_tin_dichvu WHERE id = '$id'");
        $row_dulieu_sua = mysqli_fetch_array($result);
        $thuocloai2   = $row_dulieu_sua['thuocloai'];
        $thuocloai_en = $row_dulieu_sua['thuocloai_en'];
        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa loại dịch vụ</h2>
            </div>
            <div class="card-body">
              <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-7">
                  <label for="inputEmail4" class="form-label">Loại dịch vụ</label>
                  <input class="form-control" name="thuocloai2" type="text" id="thuocloai_ban"
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