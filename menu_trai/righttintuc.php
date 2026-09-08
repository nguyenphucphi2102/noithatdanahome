 <section class="tin-box" aria-label="Bài viết liên quan">
        
        <header class="tin-box-header">
            <h2 class="tin-title">Bài viết liên quanere</h2>
        </header>

        <ul class="tin-list">
            
        <?php
            require('db.php');
            $sql = "SELECT * FROM tin_tintuc ORDER BY id DESC LIMIT 7";
            $result = mysqli_query($link, $sql);

            while ($row = mysqli_fetch_assoc($result)):
                $image = 'HinhCTSP/' . htmlspecialchars($row['hinhanh']);
                $title = htmlspecialchars($row['tieude']);
                $link = htmlspecialchars($row['tieude_en']);
        ?>

            <li class="tin-item">
                <a class="tin-thumb" href="<?= $link; ?>" title="<?= $title; ?>">
                    <img src="<?= $image; ?>"
                         alt="<?= $title; ?>"
                         loading="lazy">
                </a>

                <h3 class="tin-heading">
                    <a href="<?= $link; ?>" title="<?= $title; ?>">
                        <?= $title; ?>
                    </a>
                </h3>
            </li>

        <?php endwhile; ?>

        </ul>

    </section>