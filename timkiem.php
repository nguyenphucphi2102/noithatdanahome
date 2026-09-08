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
$search = isset($_GET['q']) ? trim(urldecode(mysqli_real_escape_string($link, $_GET['q']))) : '';

if (!empty($search)) {
    // Tin tức
    $res1 = mysqli_query($link, "SELECT id, tieude_en AS title, hinhanh , linkurl FROM tin_tintuc WHERE tieude_en LIKE '%$search%' LIMIT 5");
    while ($row = mysqli_fetch_assoc($res1)) {
        $img = "HinhCTSP/Hinhtintuc/" . $row['hinhanh'];
        $title = htmlspecialchars($row['title']);
        $linkurl = strtolower("tin-tuc/" . $row['linkurl']);
        echo "<a href='$linkurl' class='suggestion-item'>
                <img src='$img' alt='$title'>
                <span>$title</span>
              </a>";
    }

    // Dịch vụ
    $res2 = mysqli_query($link, "SELECT id, tieude_en AS title, hinhanh , linkurl FROM tin_dichvu WHERE tieude_en LIKE '%$search%' LIMIT 5");
    while ($row = mysqli_fetch_assoc($res2)) {
        $img = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
        $title = htmlspecialchars($row['title']);
        $url = htmlspecialchars($row['linkurl']);
        $linkurl = strtolower("$url-" . $row['id']);
        echo "<a href='$linkurl' class='suggestion-item'>
                <img src='$img' alt='$title'>
                <span>$title</span>
              </a>";
    }

    // Sản phẩm
    $res3 = mysqli_query($link, "SELECT id, tieude, hinhanh , linkurl FROM ma_sanpham WHERE tieude LIKE '%$search%' LIMIT 5");
    while ($row = mysqli_fetch_assoc($res3)) {
        $img = "HinhCTSP/HinhSanPham/" . $row['hinhanh'];
        $title = htmlspecialchars($row['tieude']);
        $url = htmlspecialchars($row['linkurl']);
        $linkurl = strtolower("san-pham/$url-" . $row['id']);
        echo "<a href='$linkurl' class='suggestion-item'>
                <img src='$img' alt='$title'>
                <span>$title</span>
              </a>";
    }
}
?>