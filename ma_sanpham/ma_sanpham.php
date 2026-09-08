
<link rel="stylesheet" href="sitebds/css/csssanpham.css">
<?php
include('phantrang/phantrang_dichvu.php');
?>


<!-- =========================
     HEADING
========================= -->


<img src="hinhmenu/dien-may-da-nang-43.jpg" alt="điện máy thanh lý đà nẵng" style='margin-top:0px; width:100%;'>

<section class="headings">


    <header class="text-heading container">

        <h1>ĐIỆN LẠNH CÔNG NGHIỆP TẤN TÀI </h1>

        <nav class="breadcrumb-custom">
            <a href="dienmay-danang">Sản Phẩm</a>
            &nbsp;/&nbsp;
            Điện LẠNH HCM
        </nav>

    </header>
</section>

<!-- =========================
     CONTENT
========================= -->
<main class="page-layout">

    <!-- PRODUCTS -->
    <section class="main-content">

        <section class="product-grid">

                <?php
                require('db.php');
                include('phantrang/phantrang_sanpham.php');

                function escape($value){
                    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }

                $p = new pager;
                $limit = 16;
                $start = $p->findStart($limit);

                $countResult = mysqli_query($link, "SELECT COUNT(*) AS total FROM ma_sanpham");
                $countRow = mysqli_fetch_assoc($countResult);
                $count = $countRow['total'];

                $sql = mysqli_query($link,
                    "SELECT * FROM ma_sanpham
                    ORDER BY id DESC
                    LIMIT $start, $limit"
                );

                while($row = mysqli_fetch_assoc($sql)):

                    $id = $row['id'];
                    $ma = $row['ma'];
                    $ten = escape($row['ten']);
                    $tieude = escape($row['tieude']);
                    $link_hinh = "HinhCTSP/HinhSanPham/".$row['hinhanh'];
                    $giagoc = $row['giagoc'];
                    $url = escape($row['linkurl']);

                    $product_link = str_replace(",", "", strtolower("san-pham/$url-$id"));
                ?>

               <article class="titlespatv-card">

    <a href="<?php echo $product_link; ?>" class="titlespatv-image">
        <img
            src="<?php echo $link_hinh; ?>"
            alt="<?php echo $tieude; ?>"
        >
    </a>

    <section class="titlespatv-content">

        <h2 class="titlespatv-title">
            <a href="<?php echo $product_link; ?>">
                <?php echo $tieude; ?>
            </a>
        </h2>

        <!--<p class="titlespatv-price">
            Giá:
            <?php echo number_format($giagoc,0,',','.'); ?> ₫
        </p>-->

      <section class="titlespatv-contact-box">


    <p class="titlespatv-hotline">
        <a href="tel:0932876323">0932 876 323</a>
    </p>

</section>

        <a href="<?php echo $product_link; ?>" class="titlespatv-button">
            Mua hàng
        </a>

    </section>

</article>

                <?php endwhile; ?>

            </section>


<!-- PAGINATION -->
<nav class="pagination-custom" style='text-align: center;'>

<?php

function pagelist($current_page, $total_pages){

    $output = '';

    // Nút Previous
    if($current_page > 1){

        $previous_page = $current_page - 1;

        $output .= '
        <a href="danh-muc/'.$previous_page.'" class="page-arrow" aria-label="Trang trước">
            <i class="fa fa-angle-left"></i>
        </a>';
    }

    // Giới hạn số trang hiển thị
    $start = max(1, $current_page - 2);
    $end   = min($total_pages, $current_page + 2);

    // Trang đầu
    if($start > 1){
        $output .= '<a href="danh-muc/1">1</a>';

        if($start > 2){
            $output .= '<span class="dots">...</span>';
        }
    }

    // Các trang chính
    for($i = $start; $i <= $end; $i++){

        if($i == $current_page){

            $output .= '<span class="current">'.$i.'</span>';

        }else{

            $output .= '<a href="danh-muc/'.$i.'">'.$i.'</a>';
        }
    }

    // Trang cuối
    if($end < $total_pages){

        if($end < ($total_pages - 1)){
            $output .= '<span class="dots">...</span>';
        }

        $output .= '<a href="danh-muc/'.$total_pages.'">'.$total_pages.'</a>';
    }

    // Nút Next
    if($current_page < $total_pages){

        $next_page = $current_page + 1;

        $output .= '
        <a href="danh-muc/'.$next_page.'" class="page-arrow" aria-label="Trang sau">
            <i class="fa fa-angle-right"></i>
        </a>';
    }

    return $output;
}

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if($current_page < 1){
    $current_page = 1;
}

$total_pages = ceil($count / $limit);

echo pagelist($current_page, $total_pages);

?>

</nav>



        </section>

        <!-- SIDEBAR -->
        <aside class="sidebar-shop">

            <?php include('menu_trai/leftsanpham.php'); ?>

        </aside>

    </main>

