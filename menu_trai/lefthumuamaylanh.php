<link rel="stylesheet" href="sitebds/css/css_menurightsp.css">
<section class="tintuc-bds-right">
<?php
require 'db.php';

$sql = "
    SELECT
        id AS productId,
        tieude,
        linkurl
    FROM tin_sanphama
    ORDER BY id DESC
     LIMIT 10
";

$result = mysqli_query($link, $sql);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}
?>

<div class="sidebar-menu">
    <div class="sidebar-title">
        <b>THU MUA MÁY LẠNH</b>
    </div>
    <ul class="list-unstyled sidebar-list">
        <?php foreach ($products as $product): ?>
            <?php
            $productId = (int)$product['productId'];
            $title = htmlspecialchars(mb_convert_case( $product['tieude'], MB_CASE_TITLE, 'UTF-8' ), ENT_QUOTES, 'UTF-8');
            $url = htmlspecialchars( $product['linkurl'], ENT_QUOTES, 'UTF-8');
            $link = str_replace(',', '', strtolower("cung-cap-{$url}-{$productId}") );
            ?>
            <li>
                <a href="<?= $link ?>" class="sidebar-sublink">
                    <i class="fas fa-chevron-right"></i>
                    <?= $title ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</section>