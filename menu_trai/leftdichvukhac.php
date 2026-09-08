<style>

    .sidebar-menu {
        width: 100%;
        background-color: #ffffff; 
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); 
    }

    .sidebar-title {
        background: linear-gradient(to right, #1f7f5c, #28a745); 
        padding: 10px 15px;
        border-radius: 6px;
        margin-bottom: 1rem;
        text-align: center;
    }

    .sidebar-title b {
        color: #fff; 
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sidebar-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .sidebar-item {
        margin-bottom: 8px;
    }

    .sidebar-link {
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 15px;
        background: #f0f8f0;
        border-radius: 6px;
        transition: all 0.3s ease;
        text-decoration: none; 
        color: #333; 
        font-weight: bold;
        font-size: 16px;
    }

    .sidebar-link:hover {
        background: #e6ffe6; 
        transform: translateY(-2px); 
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .sidebar-link span { 
        color: inherit;
    }

    .toggle-icon {
        color: #1f7f5c; 
        transition: transform 0.3s ease;
        font-size: 14px;
    }

    .toggle-icon.active {
        transform: rotate(180deg);
    }

    .sidebar-submenu {
        list-style: none;
        padding-left: 20px; 
        margin-top: 5px;
        overflow: hidden; 
        transition: all 0.4s ease-in-out; 
        max-height: 0; 
        opacity: 0; 
    }

    .sidebar-submenu.show {
        max-height: 500px; 
        opacity: 1;
    }

    .sidebar-sublink {
        display: block;
        padding: 8px 0;
        text-decoration: none;
        color: #555;
        font-weight:bold;
        font-size: 15px;
        transition: all 0.2s ease;
    }

    .sidebar-sublink:hover {
        color: #ff385c; 
        padding-left: 5px; 
    }

    .sidebar-sublink i.fas.fa-chevron-right {
        font-size: 10px; 
        padding-right: 8px;
        color: #ff385c; 
    }
</style>

<div class="sidebar-menu">
    <div class="sidebar-title">
        <b>DANH MỤC IN ẤN ATV</b>
    </div>

    <ul class="list-unstyled sidebar-list">
        
        
        <li class="sidebar-item">
            <div class="sidebar-link" onclick="toggleSubmenu(this)">
                <span><b>ẤN PHẨM KHÁC</b></span>
                <i class="fas fa-angle-down toggle-icon active"></i>
            </div>
            <ul class="list-unstyled sidebar-submenu show">
                <?php
                require('db.php');
                $tv = "select * from loai_tin_dichvuu order by id asc limit 0,16";
                $tv_1 = mysqli_query($link, $tv);
                ?>
                <?php
                while ($row = mysqli_fetch_array($tv_1)) {
                    ?>
                    <li>
                        <a href="cong-ty/<?php echo $row['name_url']; ?>" class="sidebar-sublink">
                            <i class="fas fa-chevron-right"></i><?php echo $row['thuocloai']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
        
        <li class="sidebar-item">
            <div class="sidebar-link" onclick="toggleSubmenu(this)">
                <span><b>ẤN PHẨM VĂN PHÒNG</b></span> 
                <i class="fas fa-angle-down toggle-icon"></i>
            </div>
            <ul class="list-unstyled sidebar-submenu"> 
                <?php
                require('db.php');
                $tv = "select * from loai_ma_sanpham order by id asc limit 0,16";
                $tv_1 = mysqli_query($link, $tv);
                ?>
                <?php
                while ($row = mysqli_fetch_array($tv_1)) {
                    ?>
                    <li>
                        <a href="in-an/<?php echo $row['name_url']; ?>" class="sidebar-sublink">
                            <i class="fas fa-chevron-right"></i><?php echo $row['thuocloai']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

        <li class="sidebar-item">
            <div class="sidebar-link" onclick="toggleSubmenu(this)">
                <span><b>ẤN PHẨM QUÀ TẶNG</b></span>
                <i class="fas fa-angle-down toggle-icon"></i>
            </div>
            <ul class="list-unstyled sidebar-submenu">
                <?php
                require('db.php');
                $tv = "select * from loai_tin_dichvu order by id asc limit 0,16";
                $tv_1 = mysqli_query($link, $tv);
                ?>
                <?php
                while ($row = mysqli_fetch_array($tv_1)) {
                    ?>
                    <li>
                        <a href="xuong-in/<?php echo $row['name_url']; ?>" class="sidebar-sublink">
                            <i class="fas fa-chevron-right"></i><?php echo $row['thuocloai']; ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>

    </ul>
</div>

<script>
    function toggleSubmenu(element) {
        const submenu = element.nextElementSibling;
        const icon = element.querySelector('.toggle-icon');

        if (submenu.classList.contains('show')) {
            submenu.classList.remove('show');
            icon.classList.remove('active');
        } else {
            // Đóng tất cả các submenu khác trước khi mở cái mới
            document.querySelectorAll('.sidebar-submenu.show').forEach(openSubmenu => {
                openSubmenu.classList.remove('show');
                openSubmenu.previousElementSibling.querySelector('.toggle-icon').classList.remove('active');
            });

            submenu.classList.add('show');
            icon.classList.add('active');
        }
    }

    // Tự động mở mục "Ấn phẩm Văn phòng" khi trang tải
    document.addEventListener('DOMContentLoaded', function() {
        const firstSubmenuLink = document.querySelector('.sidebar-item:first-child .sidebar-link');
        if (firstSubmenuLink) {
            const submenu = firstSubmenuLink.nextElementSibling;
            const icon = firstSubmenuLink.querySelector('.toggle-icon');

            // Kiểm tra nếu submenu chưa mở thì mở nó
            if (!submenu.classList.contains('show')) {
                submenu.classList.add('show');
                icon.classList.add('active');
            }
        }
    });
</script>