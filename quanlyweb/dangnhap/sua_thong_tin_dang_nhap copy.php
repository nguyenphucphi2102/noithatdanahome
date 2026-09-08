<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>Nhập Thêm Danh Mục Sản Phẩm</title>

  <style type="text/css">
    <!--
    body,
    td,
    th {

      font-family: Verdana, Arial, Helvetica, sans-serif;

    }

    .style3 {
      color: #FF0000;
      font-weight: bold;
    }

    .doichu {

      color: #0000FF;

      text-decoration: none;

    }

    A:hover {
      color: #00FF66
    }

    .style4 {
      color: #0000FF;
      text-decoration: none;
      font-weight: bold;
    }
    -->

  </style>

  <script type="text/javascript">

    function checkInput() {

      var isOk = true;

      // if(document.tt_mh.txt_masp.value=="")

      //{

      //  alert("Hãy nhập mã sản phẩm");

      // isOk = false;

      // }

      if (document.tt_mh.txt_dangnhap.value == "") {

        alert("Hãy nhập tên sản phẩm");

        isOk = false;

      }

      if (document.tt_mh.txt_matkhau.value == "") {

        alert("Hãy nhập thông tin hình ảnh sản phẩm");

        isOk = false;

      }



      return isOk;

    }

  </script>

</head>

<body>

  <table width="980" height="293" border="1" bordercolor="#0000FF" style="border-collapse:collapse">



    <tr>

      <td width="480" height="22">
        <div align="center"><strong>Thông Báo </strong></div>
      </td>

      <td>
        <div align="center"><strong>Hướng Dẫn </strong></div>
      </td>

    </tr>

    <tr>

      <td height="58" valign="top">



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
      </td>

      <td valign="top">
        <p><span class="style3">1.</span><em><strong>Vui lòng nhập tên đăng nhập không dấu </strong></em><br />

          <span class="style3">2.</span><em><strong>Nhớ kỹ mật khẫu vì khi thay đổi thì sẽ mã hóa mật khẩu để an toàn dữ
              liệu cho website của bạn. </strong></em><br />

      </td>

    </tr>

    <tr>

      <td height="203" colspan="2" align="center" valign="top">
        <form action="" method="post" enctype="multipart/form-data" name="tt_mh" id="tt_mh"
          onsubmit="return checkInput();">

          <table width="442" border="1" bordercolor="black" style="border-collapse:collapse">

            <tr>

              <td width="162">
                <div align="left"><strong>Tên đăng nhập</strong></div>
              </td>

              <td width="264">
                <div align="left">

                  <input name="txt_dangnhap" type="text" id="txt_dangnhap"
                    value="<?php if (isset($_POST["txt_dangnhap"]))
                      echo $_POST["txt_dangnhap"]; ?>" />

                </div>
              </td>

            </tr>



            <tr>

              <td height="26">
                <div align="left"><strong>Mật khẩu</strong></div>
              </td>

              <td>
                <div align="left">

                  <input name="txt_matkhau" type="password" id="txt_matkhau" value="<?php if (isset($_POST["txt_matkhau"]))
                    echo $_POST["txt_matkhau"]; ?>

            " size="35" />

                </div>
              </td>

            </tr>

            <tr>

              <td>
                <div align="center">

                  <input name="luu" type="submit" id="luu" value="Sửa SP" />

                </div>
              </td>

              <td>
                <div align="center">

                  <input name="xoa" type="reset" id="xoa" value="Nhập Lại" />

                </div>
              </td>

            </tr>

          </table>

        </form>
      </td>

    </tr>

  </table>

</body>

</html>