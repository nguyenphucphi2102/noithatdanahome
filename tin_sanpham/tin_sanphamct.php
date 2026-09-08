<?php
include('phantrang/phantrang_dichvu.php');
?>
</br> </br></br></br>

 <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                <div style="padding:10px;">
                    <?php
                        require('db.php');
                        $did = $_GET["url"];
                        $tv = "select * from loai_tin_sanphamh where name_url='" . $_GET['url'] . "' order by id ";
                        $tv_1 = mysqli_query($link, $tv);
                        $a_tv_1 = mysqli_query($link, $tv);
                        $tv_2 = mysqli_fetch_array($tv_1);
						$hinhanh = "HinhCTSP/" . htmlspecialchars($row['hinhanh']);
                        $id = $tv_2['id'];
                        $ten = "$tv_2[thuocloai]";
                        ?>
					<figure class="banner">
    <img src="<?= $hinhanh; ?>" alt="<?= $ten; ?>" loading="lazy">
</figure>	
                    <h1 style="font-weight: bold; color:#c00;"><?php echo ucwords($ten); ?></h1>
                    <div><a href="trangchu">Trang chủ </a> &nbsp;/&nbsp; Dịch vụ</div>
                    </div>
                </div>
            </div>
        </section>
    
    <!-- End Breadcrumb Area -->

    <!-- Start Feature Post Area -->
   <section class="blog-section">
            <div class="container">
                <div class="news-wrap">
                    <div class="row">
                                      <?php
                            require('db.php');

                            // Pagination settings
                            $limit = 12;
                            $p = new pager;
                            $start = $p->findStart($limit);

                            // Prepare SQL queries
                            $stmt = $link->prepare("SELECT COUNT(*) FROM tin_sanphamh WHERE thuocloai = ?");
                            $stmt->bind_param('i', $id);
                            $stmt->execute();
                            $stmt->bind_result($count);
                            $stmt->fetch();
                            $stmt->close();

                            $pages = $p->findPages($count, $limit);

                            $stmt = $link->prepare("SELECT * FROM tin_sanphamh WHERE thuocloai = ? ORDER BY id DESC LIMIT ?, ?");
                            $stmt->bind_param('iii', $id, $start, $limit);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            // Initialize the counter for row management
                            $stt = 0;
                            while ($row = $result->fetch_object()) {
                                $product_id = htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8');
                                $tieude = htmlspecialchars($row->tieude, ENT_QUOTES, 'UTF-8');
                                $tieude_en = htmlspecialchars($row->tieude_en, ENT_QUOTES, 'UTF-8');
                                $mota = htmlspecialchars($row->mota, ENT_QUOTES, 'UTF-8');
                                $giagoc = number_format($row->giagoc, 2, '.', ',');
                                $giagoc_formatted = '$' . $giagoc;
                                $link_hinh = "HinhCTSP/Hinhdichvu/" . htmlspecialchars($row->hinhanh, ENT_QUOTES, 'UTF-8');
                                $url = htmlspecialchars($row->linkurl, ENT_QUOTES, 'UTF-8');
                                $link = strtolower("tung/$url");

                                // Start a new row every 4 items
                                if ($stt % 4 == 0 && $stt != 0) {
                                    echo "</div><div class='row'>";
                                }
                            ?>
                                  <div class="col-lg-3 col-md-12 col-xs-12" style="margin-bottom:0px; padding:10px;">
                            <div class="news-item">
                                <a href="<?php echo "$link";?>" class="news-img-link">
                                    <div class="img-box hover-effect">
                                        <img class="img-responsive" src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude_en; ?>" style=" padding: 10px;"/>
                                    </div>
                                </a>
                                 <div class="news-item-text">
                                    <a href="<?php echo "$link";?>">
                                    <h2 class="title-tintuc"><?php echo $tieude_en; ?></h2></a>
                                  
                                    <div class="news-item-descr big-news">
                                        <p> <?php echo $mota; ?> </p>
                                    </div>
                                  
                                </div>
                            </div>
                      
                      </div>
                                        
                                         <?php } ?>
                      
                        </div>
                    </div>
       
        </div>
    </section>
    <!-- End Feature Post Area -->

   