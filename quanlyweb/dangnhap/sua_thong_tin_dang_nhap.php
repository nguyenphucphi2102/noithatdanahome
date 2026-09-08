<div class="ec-page-wrapper">
  <div class="ec-content-wrapper">
    <div class="content">
      <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
          <h1>TÀI KHOẢN</h1>
          <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Tài khoản
          </p>
        </div>
      </div>
      <div class="row">
        <?php
        if (isset($_POST['luu'])) {
          require('database.php');

          $dangnhap = trim($_POST['txt_dangnhap']); // loại bỏ khoảng trắng ở đầu và cuối chuỗi, tránh lỗi nhập dữ liệu trống
          $matkhau = trim($_POST['txt_matkhau']); // loại bỏ khoảng trắng ở đầu và cuối chuỗi, tránh lỗi nhập dữ liệu trống

          if (!empty($dangnhap) && !empty($matkhau)) {
            $matkhau = md5(md5($matkhau)); // Mã hóa MD5 hai lần
            upload($dangnhap, $matkhau);
          } else {
            echo "Vui lòng nhập đầy đủ thông tin!";
          }
        }

        function upload($dangnhap, $matkhau)
        {
          $link = ketnoi_MC(); //Kết nối đến cơ sở dữ liệu
          if (!$link) {
            die("Lỗi kết nối DB: " . mysqli_connect_error());
          }

          // Kiểm tra xem người dùng có tồn tại không trước khi cập nhật
          $sql_check = "SELECT id FROM thongtin_quantri WHERE ky_danh = ?";
          $stmt_check = mysqli_prepare($link, $sql_check);
          mysqli_stmt_bind_param($stmt_check, "s", $dangnhap);
          mysqli_stmt_execute($stmt_check);
          mysqli_stmt_store_result($stmt_check);

          if (mysqli_stmt_num_rows($stmt_check) > 0) {
            // Nếu có tồn tại thì cập nhật mật khẩu
            $sql_update = "UPDATE thongtin_quantri SET mat_khau = ? WHERE ky_danh = ?";
            $stmt_update = mysqli_prepare($link, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "ss", $matkhau, $dangnhap);

            if (mysqli_stmt_execute($stmt_update)) {
              echo "Cập nhật mật khẩu thành công!";
            } else {
              echo "Lỗi cập nhật: " . mysqli_error($link);
            }

            mysqli_stmt_close($stmt_update);
          } else {
            echo "Tài khoản không tồn tại!";
          }

          mysqli_stmt_close($stmt_check);
          mysqli_close($link);
        }

        ?>
        <div class="col-12">
          <div class="card card-default">
            <div class="card-header card-header-border-bottom">
              <h2>Sửa mật khẩu quản trị</h2>
            </div>
            <div class="card-body">
              <div class="row ec-vendor-uploads">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <div class="ec-vendor-upload-detail">
                      <div class="row">
                        <div class="col-md-12 mt-3">
                          <label for="inputEmail4" class="form-label fw-bold">Tên đăng nhập</label>
                          <input class="form-control" name="txt_dangnhap" type="text" id="txt_dangnhap" value="<?php if (isset($_POST["txt_dangnhap"]))
                            echo $_POST["txt_dangnhap"]; ?>" />
                        </div>
                        <div class="col-md-12 mt-3">
                          <label for="inputEmail4" class="form-label fw-bold">Mật khẩu</label>
                          <input class="form-control" name="txt_matkhau" type="password" id="txt_matkhau" value="<?php if (isset($_POST["txt_matkhau"]))
                            echo $_POST["txt_matkhau"]; ?>" size="35" />
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- Nút lưu -->
                        <div class="col-md-12 mt-3">
                          <input name="luu" class="btn btn-primary px-4 py-2 fw-bold" type="submit" id="luu"
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