<div class="recent-post" >
    <div style="font-size: 22px; color: #c00; margin-bottom: 10px; font-weight: bold;">
        BÀI VIẾT LIÊN QUAN
    </div>
    <div style="height: 3px; background-color: #c00; width: 111px; margin-top: .5rem; margin-bottom: 1rem;"></div>

    <div class="row pt-3">
        <?php
        require('db.php');
        $tv = "SELECT * FROM tin_sanpham ORDER BY id DESC LIMIT 0,20";
        $tv_1 = mysqli_query($link, $tv);
        while ($row = mysqli_fetch_array($tv_1)) {
            $link_hinh = "HinhCTSP/Hinhdichvu/" . $row['hinhanh'];
            $tieude = $row['tieude'];
            $tieude = mb_convert_case($tieude, MB_CASE_TITLE, "UTF-8");
            $url = $row['linkurl'];
            $link = "$url-$id";
        ?>
            <div class="col-12 mb-3 fade-in">
                <div class="recent-item">
                    <div class="card-img-wrappertrai">
                        <a href="<?= $link ?>">
                            <img src="<?= $link_hinh ?>" alt="<?= $tieude ?>">
                        </a>
                    </div>
                    <div class="recent-title" style='text-align: left;'>
                        <a href="<?= $link ?>" class="text-dark"><?= $tieude ?></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<style>
/* Hiệu ứng xuất hiện */
.fade-in {
    opacity: 0;
    transform: translateY(20px);
    animation: fadeInUp 0.6s ease forwards;
}
.fade-in:nth-child(1) { animation-delay: 0.1s; }
.fade-in:nth-child(2) { animation-delay: 0.2s; }
.fade-in:nth-child(3) { animation-delay: 0.3s; }
.fade-in:nth-child(4) { animation-delay: 0.4s; }
.fade-in:nth-child(5) { animation-delay: 0.5s; }
.fade-in:nth-child(6) { animation-delay: 0.6s; }
@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Bố cục item */
.recent-item {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

/* Ảnh */
.card-img-wrappertrai {
    overflow: hidden;
    border-radius: 6px;
    flex-shrink: 0;
    margin-right: 10px;
}
.card-img-wrappertrai img {
    width: 90px;
    height: 60px;
    object-fit: cover;
    border-radius: 4px;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.card-img-wrappertrai:hover img {
    transform: scale(1.1);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
}

/* Tiêu đề */
.recent-title a {
    font-size: 16px;
    font-weight: bold;
    line-height: 1.4;
    text-decoration: none;
    color: #222;
    transition: color 0.3s ease, transform 0.3s ease;
    display: inline-block;
}
.recent-title a:hover {
    color: #c00;
    transform: translateX(4px);
    text-shadow: 0px 2px 6px rgba(0, 0, 0, 0.2);
}

.pinBox{
    padding: 20px;
    box-shadow: 0 0px 15px rgba(0, 0, 0, 0.08);
    border-radius: 15px;
}

</style>

<script>
// JS để thêm class fade-in khi load
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".fade-in").forEach(el => {
        el.classList.add("visible");
    });
});
</script>