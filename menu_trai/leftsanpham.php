<link rel="stylesheet" href="sitebds/css/css_menurightsp.css">
<section class="tintuc-bds-right">
<?php
require 'db.php';

$sql = "
    SELECT
        c.id AS categoryId,
        c.thuocloai AS categoryName,

        p.id AS productId,
        p.tieude,
        p.linkurl

    FROM loai_tin_sanphama c
    LEFT JOIN tin_sanphama p
        ON p.thuocloai = c.id

    ORDER BY c.id ASC, p.id DESC
";

$result = mysqli_query($link, $sql);

if (!$result) {
    die('MySQL Error: ' . mysqli_error($link));
}

$categories = [];

while ($row = mysqli_fetch_assoc($result)) {

    $categoryId = (int)$row['categoryId'];

    if (!isset($categories[$categoryId])) {
        $categories[$categoryId] = [
            'name' => $row['categoryName'],
            'products' => []
        ];
    }

    if (!empty($row['productId'])) {
        $categories[$categoryId]['products'][] = $row;
    }
}
?>

<div class="sidebar-menu">
    <div class="sidebar-title">
        <b>DANH MỤC Dự ÁN</b>
    </div>
    <ul class="list-unstyled sidebar-list">
        <?php $isFirst = true; ?>
        <?php foreach ($categories as $category): ?>
            <li class="sidebar-item">
                <div class="sidebar-link" onclick="toggleSubmenu(this)">
                    <span>
                        <i class="fa fa-bars" style="padding-right:10px;color:#c00;"></i>
                        <b>
                            <?= htmlspecialchars( mb_strtoupper($category['name'], 'UTF-8'), ENT_QUOTES, 'UTF-8' ) ?>
                        </b>
                    </span>
                    <i class="fas fa-angle-down toggle-icon <?= $isFirst ? 'active' : '' ?>"></i>
                </div>
                <ul class="list-unstyled sidebar-submenu <?= $isFirst ? 'show' : '' ?>">
                    <?php foreach ($category['products'] as $product): ?>
                        <?php
                        $productId = (int)$product['productId'];
                        $title = htmlspecialchars(mb_convert_case( $product['tieude'], MB_CASE_TITLE, 'UTF-8' ), ENT_QUOTES, 'UTF-8');
                        $url = htmlspecialchars( $product['linkurl'], ENT_QUOTES, 'UTF-8');
                        $link = str_replace(',', '', strtolower("mau-thiet-ke-$url-$productId") ); ?>
                     
                        <li>
                            <a href="<?= $link ?>" class="sidebar-sublink">
                                <i class="fas fa-chevron-right"></i>
                                <?= $title ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <?php $isFirst = false; ?>
        <?php endforeach; ?>
    </ul>
</div>
</section>
<script>
    function toggleSubmenu(element) {
        const submenu = element.nextElementSibling;
        const icon = element.querySelector('.toggle-icon');

        if (submenu.classList.contains('show')) {
            submenu.classList.remove('show');
            icon.classList.remove('active');
        } else {
            document.querySelectorAll('.sidebar-submenu.show').forEach(openSubmenu => {
                openSubmenu.classList.remove('show');
                openSubmenu.previousElementSibling.querySelector('.toggle-icon').classList.remove('active');
            });

            submenu.classList.add('show');
            icon.classList.add('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const firstSubmenuLink = document.querySelector('.sidebar-item:first-child .sidebar-link');
        if (firstSubmenuLink) {
            const submenu = firstSubmenuLink.nextElementSibling;
            const icon = firstSubmenuLink.querySelector('.toggle-icon');

            if (!submenu.classList.contains('show')) {
                submenu.classList.add('show');
                icon.classList.add('active');
            }
        }
    });
</script>