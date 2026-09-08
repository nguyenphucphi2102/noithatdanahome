<?php
require('db.php');
$tv = "select * from thuong_mai order by id ASC limit 0,1";
$tv_1 = mysqli_query($link, $tv);
$a_tv_1 = mysqli_query($link, $tv);
?>
<?php
while ($tv_2 = mysqli_fetch_array($tv_1)) {
    $link_hinh = "HinhCTSP/$tv_2[hinhanh]";
    $id = "$tv_2[id]";
    $tieude = "$tv_2[tieude]";
    $mota = "$tv_2[mota]";
    $ngay = "$tv_2[ngay]";
    ?>
    <!--Hero Item start-->

    <img src="HinhCTSP/<?php echo $tv_2["hinhanh"]; ?>" alt="<?php echo "$tieude"; ?>" class='sidetc' />


    <!--Hero Item end-->

<?php } ?>