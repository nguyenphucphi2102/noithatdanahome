


    <div class="ec-page-wrapper">
      <div class="ec-content-wrapper">
        <div class="content">
          <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
            <div>
              <h1>TRANG CHỦ</h1>
              <p class="breadcrumbs"><span><a href="">Quản lý</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Trang chủ
              </p>
            </div>
            <div>
              <a href="quan_tri.php?p=nhap_them_ma_sanpham" class="btn btn-primary"> Thêm sản phẩm
              </a>
            </div>
          </div>
          <div class="row">
            <?php
             if(isset($_POST['luu']))

             {
          
              $today2 = date("D") ;
          
              $today = date("d") ;
            
              $today1 = date("m") ;
            
              $today3 = date("Y") ;
          
          
              $chuoi= " $today/$today1/$today3 ";
          
               //include_once('database.php');
               include('db.php');
          
              $tieude= $_POST['tieude'];
          
              $mota= $_POST['mota'];
          
              $dis= $_POST['dis'];
          
               upload( $tieude,$mota,$dis);
             }
          
          function upload( $tieude,$mota,$dis)
          
           {
              include('db.php');
             $truyvan = "UPDATE he_thong SET tieude = '".$tieude."',dis = '".$dis."',mota = '".$mota."' WHERE id=1";
              $result= @mysqli_query($link,$truyvan);
          
             if($result)
             {
                echo "Cập nhật thành công";
             }else{
               echo "Upload không thành công.Bạn thử lại xem";
            }
           }
            ?>
            <?php
            include('db.php');
            //if(!empty($_REQUEST["id"]))
            //{
            //$id=$_REQUEST["id"];
            //}

            $result= mysqli_query($link,"SELECT * FROM he_thong where id like '1' ");
            $row_dulieu_sua		= mysqli_fetch_array($result);
            $tieude					=	$row_dulieu_sua['tieude'];
            $dis					=	$row_dulieu_sua['dis'];
            $key                    =	$row_dulieu_sua['mota'];
            ?>
            <div class="col-12">
              <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                  <h2>TRANG CHỦ</h2>
                </div>
                <div class="card-body">
                  <div class="row ec-vendor-uploads">
                    <div class="col-lg-12">
                      <div class="ec-vendor-upload-detail">
                        <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                          <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Tiêu đề trang chủ</label>
                            <input name="tieude" type="text" id="tieude" size="70"  value="<?php echo $tieude; ?>"/>
                          </div>
                          <div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Mô tả (160 - 300 ký tự)</label>
                            <textarea name="dis" cols="70" rows="5" id="dis"><?php echo $dis; ?></textarea>
                          </div><div class="col-md-12">
                            <label for="inputEmail4" class="form-label">Từ khóa</label>
                            <textarea name="mota" cols="70" rows="8" id="key"><?php echo $key; ?></textarea>
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
