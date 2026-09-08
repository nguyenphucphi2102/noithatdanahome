<style>
    input#searchBox {
        width: 100%;
        padding: 10px 15px;
        font-size: 16px;
        color: #1f7f5c !important;
        border: 1px solid #ccc;
        border-radius: 6px 0 0 6px;
        outline: none;
        box-sizing: border-box;
    }

    .btn-search {
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        background-color: #1f7f5c;
        color: white;
        border-radius: 0 6px 6px 0;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-search:hover {
        background-color: #155f47;
    }

    #suggestionBox {
        position: absolute;
        top: 100%;
        left: 0;
        width: calc(100% - 0px);
        background: #fff;
        border: 1px solid #ccc;
        max-height: 300px;
        overflow-y: auto;
        z-index: 999;
        margin-top: 5px;
        border-radius: 6px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    .suggestion-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #eee;
        cursor: pointer;
    }

    .suggestion-item img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        margin-right: 10px;
        border-radius: 5px;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }

    /* --- Optional: responsive cho mobile nếu cần --- */
    @media (max-width: 768px) {
        .search-bar {
            flex-direction: column;
        }

        .btn-search {
            width: 100%;
            border-radius: 0 0 6px 6px;
        }

        input#searchBox {
            border-radius: 6px 6px 0 0;
        }
    }
</style>


<?php
require('db.php');
$search = isset($_GET['q']) ? trim(mysqli_real_escape_string($link, $_GET['q'])) : '';
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

if (!empty($search)) {
    $totalResults = 0;

    $res = mysqli_query($link, "SELECT id, tieude, linkurl, thuocloai FROM ma_sanpham WHERE tieude LIKE '%$search%' LIMIT 10");
    while ($row = mysqli_fetch_assoc($res)) {
        $totalResults++;
        $id = $row['id'];
        $title = htmlspecialchars($row['tieude']);
        $thuocloai = $row['thuocloai'];
        $linkurl = "quan_tri.php?p=sua_masanpham&id=$id&thuocloai=$thuocloai&page=$page";
        echo "<a href='$linkurl' class='suggestion-item'><span>$title</span></a>";
    }

    $res = mysqli_query($link, "SELECT id, tieude_en, linkurl, thuocloai FROM tin_dichvu WHERE tieude_en LIKE '%$search%' LIMIT 10");
    while ($row = mysqli_fetch_assoc($res)) {
        $totalResults++;
        $id = $row['id'];
        $title = htmlspecialchars($row['tieude_en']);
        $thuocloai = $row['thuocloai'];
        $linkurl = "quan_tri.php?p=sua_tin_dichvu&id=$id&thuocloai=$thuocloai&page=$page";
        echo "<a href='$linkurl' class='suggestion-item'><span>$title</span></a>";
    }

    $res = mysqli_query($link, "SELECT id, tieude_en, linkurl, thuocloai FROM tin_dichvuu WHERE tieude_en LIKE '%$search%' LIMIT 10");
    while ($row = mysqli_fetch_assoc($res)) {
        $totalResults++;
        $id = $row['id'];
        $title = htmlspecialchars($row['tieude_en']);
        $thuocloai = $row['thuocloai'];
        $linkurl = "quan_tri.php?p=sua_tin_dichvuu&id=$id&thuocloai=$thuocloai&page=$page";
        echo "<a href='$linkurl' class='suggestion-item'><span>$title</span></a>";
    }

    $res = mysqli_query($link, "SELECT id, tieude_en, linkurl, thuocloai FROM tin_tintuc WHERE tieude_en LIKE '%$search%' LIMIT 10");
    while ($row = mysqli_fetch_assoc($res)) {
        $totalResults++;
        $id = $row['id'];
        $title = htmlspecialchars($row['tieude_en']);
        $thuocloai = $row['thuocloai'];
        $linkurl = "quan_tri.php?p=sua_tin_tintuc&id=$id&thuocloai=$thuocloai&page=$page";
        echo "<a href='$linkurl' class='suggestion-item'><span>$title</span></a>";
    }

    if ($totalResults === 0) {
        echo "<div class='suggestion-item'><span>Không tìm thấy kết quả nào.</span></div>";
    }

} else {
    echo "<div class='suggestion-item'><span>Vui lòng nhập từ khóa để tìm kiếm</span></div>";
}

?>