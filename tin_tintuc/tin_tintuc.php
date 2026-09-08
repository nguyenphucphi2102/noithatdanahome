<!--link css-->
<link rel="stylesheet" href="sitebds/css/css_tintuc.css">
<style> 
  /* =========================================================
   CSS THANH PHÂN TRANG (PAGINATION)
========================================================= */

.pagination-wrapper {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    margin-bottom: 20px;
    width: 100%;
}

.pagination {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    gap: 8px;
    align-items: center;
}

.pagination li a {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 14px;
    background: #ffffff;
    color: #333333;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.03);
    cursor: pointer;
}

.pagination li a:hover {
    background: #CEA679;
    color: #ffffff;
    border-color: #CEA679;
    transform: translateY(-2px);
}

.pagination li.active a {
    background: #CEA679;
    color: #ffffff;
    border-color: #CEA679;
    cursor: default;
}

/* Responsive di động */
@media (max-width: 576px) {
    .pagination li a {
        min-width: 34px;
        height: 34px;
        padding: 0 10px;
        font-size: 13px;
    }
}
</style>

<!-- INNER-BANNER --> 
<div class="page-banner-section">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content">
            <h1>Tin Tức & Cẩm Nang</h1>
            <ul class="page-breadcrumb">
                <li><a href="home.html">Trang chủ</a></li>
                <li class="sep">/</li>
                <li>Tin tức</li>
            </ul>
        </div>
    </div>
</div>

<!-- START SECTION TIN TỨC -->
<section class="tintuc-vnemico">

    <?php
    require('db.php');

    // Lấy toàn bộ bài viết (PHP xuất dữ liệu ra HTML, JS sẽ lo phần phân trang)
    $tv = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 0, 300";
    $tv_1 = mysqli_query($link, $tv);
    ?>

    <ul class="tintuc-grid" id="tintucGrid">
        <?php
        while ($row = mysqli_fetch_array($tv_1)) {
            $id = $row['id'];
            $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
            $tieude = $row['tieude'];
            $linkurl = $row['linkurl'];
            $mota = $row['mota'];
            $link = "thong-tin-$linkurl-$id";
        ?>
            <li class="tintuc-item">
                <article class="tintuc-card">
                    <figure class="tintuc-image">
                        <a href="<?php echo $link; ?>">
                            <img src="<?php echo $link_hinh; ?>" alt="<?php echo $tieude; ?>">
                        </a>
                    </figure>
                    <section class="tintuc-content">
                        <h3 class="tintuc-name">
                            <a href="<?php echo $link; ?>">
                                <?php echo $tieude; ?>
                            </a>
                        </h3>
                        <p class="tintuc-desc">
                            <?php echo $mota; ?>
                        </p>
                    </section>
                </article>
            </li>
        <?php } ?>
    </ul>

    <!-- Thanh phân trang do JS tự dựng -->
    <div class="pagination-wrapper">
        <ul class="pagination" id="paginationContainer"></ul>
    </div>

</section>

<!-- SCRIPT PHÂN TRANG JAVASCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const itemsPerPage = 9; // Số bài hiển thị trên 1 trang
    const grid = document.getElementById("tintucGrid");
    const items = Array.from(grid.getElementsByClassName("tintuc-item"));
    const paginationContainer = document.getElementById("paginationContainer");

    const totalPages = Math.ceil(items.length / itemsPerPage);
    let currentPage = 1;

    if (totalPages <= 1) return;

    function showPage(page) {
        currentPage = page;
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        // Ẩn/hiện bài viết theo trang
        items.forEach((item, index) => {
            if (index >= start && index < end) {
                item.style.display = "";
            } else {
                item.style.display = "none";
            }
        });

        renderPagination();

        // Cuộn mượt lên đầu danh sách tin tức khi bấm đổi trang
        grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    function renderPagination() {
        paginationContainer.innerHTML = "";

        // Nút Nút Trước
        if (currentPage > 1) {
            const prevLi = document.createElement("li");
            prevLi.innerHTML = `<a href="javascript:void(0);">&laquo; Trước</a>`;
            prevLi.addEventListener("click", () => showPage(currentPage - 1));
            paginationContainer.appendChild(prevLi);
        }

        // Danh sách số trang
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            if (i === currentPage) li.classList.add("active");
            li.innerHTML = `<a href="javascript:void(0);">${i}</a>`;
            li.addEventListener("click", () => showPage(i));
            paginationContainer.appendChild(li);
        }

        // Nút Sau
        if (currentPage < totalPages) {
            const nextLi = document.createElement("li");
            nextLi.innerHTML = `<a href="javascript:void(0);">Sau &raquo;</a>`;
            nextLi.addEventListener("click", () => showPage(currentPage + 1));
            paginationContainer.appendChild(nextLi);
        }
    }

    // Khởi tạo trang 1
    showPage(1);
});
</script>