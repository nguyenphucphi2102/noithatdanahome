<link rel="stylesheet" href="sitebds/css/trangchu.css">
<style>
/* ==========================================================================
   1. BANNER PARTICLES JS (THAY CHO BREADCRUMB CŨ)
   ========================================================================== */
#particles-js {
  width: 100%;
  height: 230px;
  background: #1F5C2E;
  position: relative;
  overflow: hidden;
}

#particles-js .title {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #ffffff;
  font-family: 'Segoe UI', sans-serif;
  width: 90%;
  text-align: center;
  z-index: 2;
}

#particles-js .page-title {
  font-size: 50px;
  font-weight: bold;
  color: #F8B802;
  margin-bottom: 8px;
  text-transform: uppercase;
  text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

#particles-js .breadcrumb {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
  font-size: 15px;
  background: transparent;
  padding: 0;
  margin: 0;
}

#particles-js .breadcrumb a {
  color: #9cd3e6;
  text-decoration: none;
  transition: color 0.2s;
}

#particles-js .breadcrumb a:hover {
  color: #ffffff;
}

#particles-js .breadcrumb .sep {
  color: rgba(255, 255, 255, 0.6);
}

#particles-js .breadcrumb .current {
  color: #ffffff;
  font-weight: 600;
}

/* ==========================================================================
   2. CAT-NEWS CUSTOM STYLES (DANH SÁCH BÀI VIẾT)
   ========================================================================== */
.cat-news-wrapper {
  padding-bottom: 70px;
}

.cat-news-heading {
  font-size: 1.8rem;
  font-weight: 800;
  color: #1b2b12;
  border-bottom: 3px solid #359544;
  display: inline-block;
  padding-bottom: 8px;
}

.cat-news-heading a {
  color: inherit;
  text-decoration: none;
}

/* Khung Thẻ Sản Phẩm/Bài Viết */
.cat-news-card {
  background: #ffffff;
  border: 1px solid #e3ebd9;
  border-radius: 12px;
  overflow: hidden;
  height: 100%;
  display: flex;
  flex-direction: column;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
  transition: all 0.3s ease;
}

.cat-news-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 10px 25px rgba(53, 149, 68, 0.12);
  border-color: #359544;
}

/* Khung Ảnh */
.cat-news-thumb {
  width: 100%;
  height: 200px;
  background-color: #eaeaea;
  position: relative;
  overflow: hidden;
}

.cat-news-thumb a {
  display: block;
  width: 100%;
  height: 100%;
}

.cat-news-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.4s ease;
}

.cat-news-card:hover .cat-news-thumb img {
  transform: scale(1.05);
}

/* Nội Dung Bài Viết */
.cat-news-body {
  padding: 18px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.cat-news-title {
  font-size: 1.05rem;
  font-weight: 700;
  line-height: 1.4;
  margin-bottom: 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.cat-news-title a {
  color: #1b2b12;
  text-decoration: none;
  transition: color 0.2s ease;
}

.cat-news-title a:hover {
  color: #359544;
}

.cat-news-desc {
  font-size: 0.88rem;
  color: #555555;
  line-height: 1.5;
  margin-bottom: 0;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* ==========================================================================
   3. PHÂN TRANG (FIX LỖI DẤU CHẤM BLACK DOTS)
   ========================================================================== */
.cat-news-pagination {
  margin-top: 30px;
  padding-top: 20px;
  border-top: 1px dashed #dbe5d2;
  display: flex;
  justify-content: flex-end;
}

.cat-news-pagination .phantrang {
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  color: #555;
}

.cat-news-pagination .phantrang,
.cat-news-pagination .phantrang ul,
.cat-news-pagination .phantrang li {
  list-style: none !important;
  margin: 0 !important;
  padding: 0 !important;
  display: inline-flex !important;
  align-items: center;
}

.cat-news-pagination .phantrang ul::before,
.cat-news-pagination .phantrang li::before {
  content: none !important;
}

.cat-news-pagination .phantrang a,
.cat-news-pagination .phantrang b,
.cat-news-pagination .phantrang span {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 34px;
  height: 34px;
  padding: 0 8px;
  border: 1px solid #dbe5d2;
  border-radius: 6px;
  color: #1b2b12;
  text-decoration: none;
  font-size: 0.9rem;
  background: #fff;
  transition: all 0.2s ease;
}

.cat-news-pagination .phantrang a:hover,
.cat-news-pagination .phantrang b {
  background-color: #359544;
  color: #ffffff !important;
  border-color: #359544;
}
</style>

<?php
include('phantrang/phantrang_dichvu.php');
require('db.php');

// Lấy thông tin danh mục theo URL
$did  = $_GET["url"];
$tv   = "SELECT * FROM loai_tin_sanpham WHERE linkurl = '" . mysqli_real_escape_string($link, $_GET['url']) . "' ORDER BY id";
$tv_1 = mysqli_query($link, $tv);
$tv_2 = mysqli_fetch_array($tv_1);
$id   = $tv_2['id'];
$ten  = $tv_2['thuocloai'];
?>


<!-- DANH SÁCH BÀI VIẾT (FULL WIDTH 100%) -->
<section class="cat-news-wrapper tp-section-gap mt-4">
    <div class="container">

        <h1 class="cat-news-heading mb-4"><a href="#"><?php echo ucwords($ten); ?></a></h1>
        
        <div class="row g-4">
            <?php
            $limit = 12;
            $p = new pager;
            $start = $p->findStart($limit);

            $stmt = $link->prepare("SELECT COUNT(*) FROM tin_sanpham WHERE thuocloai = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            $pages = $p->findPages($count, $limit);

            $stmt = $link->prepare("SELECT * FROM tin_sanpham WHERE thuocloai = ? ORDER BY id DESC LIMIT ?, ?");
            $stmt->bind_param('iii', $id, $start, $limit);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_object()) {
                $product_id   = htmlspecialchars($row->id, ENT_QUOTES, 'UTF-8');
                
                $tieude       = htmlspecialchars($row->tieude, ENT_QUOTES, 'UTF-8');
                $mota         = htmlspecialchars($row->mota, ENT_QUOTES, 'UTF-8');
                
                $hinhanh_name = htmlspecialchars($row->hinhanh, ENT_QUOTES, 'UTF-8');
                $link_hinh    = !empty($hinhanh_name) ? "HinhCTSP/Hinhdichvu/" . $hinhanh_name : "https://via.placeholder.com/400x250?text=No+Image";
                
                $url          = htmlspecialchars($row->linkurl, ENT_QUOTES, 'UTF-8');
                $link_baiviet = strtolower("thiet-ke-$url-$product_id");
            ?>
                
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cat-news-card">
                        <div class="cat-news-thumb">
                            <a href="<?php echo $link_baiviet; ?>">
                                <img src="<?php echo $link_hinh; ?>" 
                                     alt="<?php echo $tieude; ?>" 
                                     onerror="this.onerror=null; this.src='https://via.placeholder.com/400x250?text=No+Image';" />
                            </a>
                        </div>
                        <div class="cat-news-body">
                            <h2 class="cat-news-title">
                                <a href="<?php echo $link_baiviet; ?>">
                                    <?php echo $tieude; ?>
                                </a>
                            </h2>
                            <?php if (!empty($mota)): ?>
                                <p class="cat-news-desc"><?php echo $mota; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>

       

    </div>
</section>

