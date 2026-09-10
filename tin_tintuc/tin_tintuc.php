<!--link css-->
<link rel="stylesheet" href="sitebds/css/css_tintuc.css">
<style> 
  .tintuc-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 18px;
    justify-content: center;
    align-items: center;
    margin-bottom: 30px;
    padding: 18px 20px;
    background: #f1efed;
    border-radius: 14px;
    border: 1px solid #e4d7c5;
  }

  .tintuc-filter__item {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    appearance: none;
    border: 1px solid #c8b39c;
    background: #ffffff;
    color: #2f2f2f;
    border-radius: 999px;
    padding: 10px 22px;
    min-width: 140px;
    height: 46px;
    font-size: 15px;
    font-weight: 500;
    line-height: 1;
    cursor: pointer;
    transition: all 0.25s ease;
    text-decoration: none;
    text-align: center;
    box-sizing: border-box;
  }

  .tintuc-filter__item:hover {
    background: #f8efe6;
    border-color: #c8a57a;
  }

  .tintuc-filter__item.active {
    background: #c19a69;
    color: #fff;
    border-color: #c19a69;
    box-shadow: 0 8px 20px rgba(193, 154, 105, 0.18);
  }

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

.tintuc-empty {
    text-align: center;
    color: #666;
    padding: 24px 0 8px;
    font-size: 16px;
}

/* Responsive di động */
@media (max-width: 576px) {
    .pagination li a {
        min-width: 34px;
        height: 34px;
        padding: 0 10px;
        font-size: 13px;
    }

    .tintuc-filter__item {
        min-width: 120px;
        padding: 10px 18px;
        font-size: 14px;
    }
}
</style>

<!-- INNER-BANNER --> 
<section class="page-banner-section">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content">
            <p class="service-eyebrow">DANAHOME / TIN TỨC</p>
            <h1>Tin Tức &amp; Cẩm Nang</h1>
            <ul class="page-breadcrumb">
                <li><a href="home.html">Trang chủ</a></li>
                <li class="sep">/</li>
                <li>Tin tức</li>
            </ul>
        </div>
    </div>
</section>

<!-- START SECTION TIN TỨC -->
<section class="tintuc-vnemico">

    <?php
    require('db.php');

    // Lấy toàn bộ danh mục
    $danhmuc_sql = "SELECT * FROM loai_tin_tintuc ORDER BY id ASC";
    $danhmuc_query = mysqli_query($link, $danhmuc_sql);

    // Lấy toàn bộ bài viết (lọc sẽ xử lý bằng JS, không reload trang)
    $tv = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 0, 300";
    $tv_1 = mysqli_query($link, $tv) or die(mysqli_error($link));
    ?>

    <!-- data-loai="0" nghĩa là "Tất cả" -->
    <div class="tintuc-filter" id="tintucFilter">
        <button type="button" class="tintuc-filter__item active" data-loai="0">
            Tất cả
        </button>

        <?php while ($danhmuc = mysqli_fetch_array($danhmuc_query)) { ?>
            <button type="button" class="tintuc-filter__item" data-loai="<?php echo (int) $danhmuc['id']; ?>">
                <?php echo htmlspecialchars($danhmuc['thuocloai']); ?>
            </button>
        <?php } ?>
    </div>

    <ul class="tintuc-grid" id="tintucGrid">
        <?php
        if (mysqli_num_rows($tv_1) > 0) {
            while ($row = mysqli_fetch_array($tv_1)) {
                $id = $row['id'];
                $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
                $tieude = $row['tieude'];
                $linkurl = $row['linkurl'];
                $mota = $row['mota'];
                $link = "tin-tuc-noi-that-$linkurl-$id";
                $loai_id = (int) $row['thuocloai']; // dùng để lọc bằng JS
        ?>
                <li class="tintuc-item" data-loai="<?php echo $loai_id; ?>">
                    <article class="tintuc-card">
                        <figure class="tintuc-image">
                            <a href="<?php echo $link; ?>">
                                <img src="<?php echo $link_hinh; ?>" alt="<?php echo htmlspecialchars($tieude); ?>">
                            </a>
                        </figure>
                        <section class="tintuc-content">
                            <h3 class="tintuc-name">
                                <a href="<?php echo $link; ?>">
                                    <?php echo htmlspecialchars($tieude); ?>
                                </a>
                            </h3>
                            <p class="tintuc-desc">
                                <?php echo htmlspecialchars($mota); ?>
                            </p>
                        </section>
                    </article>
                </li>
        <?php
            }
        } else {
        ?>
            <li class="tintuc-empty">Chưa có bài viết trong danh mục này.</li>
        <?php } ?>
    </ul>

    <p class="tintuc-empty" id="tintucNoResult" style="display:none;">Chưa có bài viết trong danh mục này.</p>

    <!-- Thanh phân trang do JS tự dựng -->
    <div class="pagination-wrapper">
        <ul class="pagination" id="paginationContainer"></ul>
    </div>

</section>

<!-- SCRIPT LỌC + PHÂN TRANG -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const itemsPerPage = 9;
    const grid = document.getElementById("tintucGrid");
    const allItems = grid ? Array.from(grid.getElementsByClassName("tintuc-item")) : [];
    const paginationContainer = document.getElementById("paginationContainer");
    const filterButtons = document.querySelectorAll("#tintucFilter .tintuc-filter__item");
    const noResultEl = document.getElementById("tintucNoResult");

    if (!grid || allItems.length === 0) return;

    let currentPage = 1;
    let currentLoai = "0"; // "0" = tất cả
    let filteredItems = allItems;

    function applyFilter(loai) {
        currentLoai = loai;
        currentPage = 1;

        if (loai === "0") {
            filteredItems = allItems;
        } else {
            filteredItems = allItems.filter(item => item.getAttribute("data-loai") === loai);
        }

        // Cập nhật trạng thái active cho nút bấm
        filterButtons.forEach(btn => {
            btn.classList.toggle("active", btn.getAttribute("data-loai") === loai);
        });

        // Ẩn hết trước, showPage sẽ hiện lại theo trang
        allItems.forEach(item => (item.style.display = "none"));

        if (filteredItems.length === 0) {
            noResultEl.style.display = "block";
            paginationContainer.innerHTML = "";
        } else {
            noResultEl.style.display = "none";
            showPage(1);
        }
    }

    function showPage(page) {
        currentPage = page;
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;

        allItems.forEach(item => (item.style.display = "none"));
        filteredItems.slice(start, end).forEach(item => (item.style.display = ""));

        renderPagination();
        grid.scrollIntoView({ behavior: "smooth", block: "start" });
    }

    function renderPagination() {
        paginationContainer.innerHTML = "";
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);

        if (totalPages <= 1) return;

        if (currentPage > 1) {
            const prevLi = document.createElement("li");
            prevLi.innerHTML = `<a href="javascript:void(0);">&laquo; Trước</a>`;
            prevLi.addEventListener("click", () => showPage(currentPage - 1));
            paginationContainer.appendChild(prevLi);
        }

        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            if (i === currentPage) li.classList.add("active");
            li.innerHTML = `<a href="javascript:void(0);">${i}</a>`;
            li.addEventListener("click", () => showPage(i));
            paginationContainer.appendChild(li);
        }

        if (currentPage < totalPages) {
            const nextLi = document.createElement("li");
            nextLi.innerHTML = `<a href="javascript:void(0);">Sau &raquo;</a>`;
            nextLi.addEventListener("click", () => showPage(currentPage + 1));
            paginationContainer.appendChild(nextLi);
        }
    }

    // Gắn sự kiện click cho từng nút lọc
    filterButtons.forEach(btn => {
        btn.addEventListener("click", function () {
            applyFilter(this.getAttribute("data-loai"));
        });
    });

    // Khởi tạo ban đầu: hiển thị tất cả, trang 1
    applyFilter("0");
});
</script>