<?php
require('db.php');

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$result = mysqli_query($link, "SELECT * FROM doi_tac WHERE id = $id");
$row_dulieu_sua = mysqli_fetch_array($result);

if ($row_dulieu_sua) {
    $hinhanh = $row_dulieu_sua['hinhanh'];
    $taptin  = "../HinhCTSP/$hinhanh";

    if (!empty($hinhanh) && file_exists($taptin)) {
        unlink($taptin);
    }

    mysqli_query($link, "DELETE FROM doi_tac WHERE id = $id");
}

echo "<script>window.location='quan_tri.php?p=danhsach_doitac';</script>";
exit;
?>
<script type="text/javascript">
	if (document.frm_dangnhap) {

		var trangcanchuyen = document.frm_dangnhap.chuyentrang.value;

		window.location = trangcanchuyen;

	}
</script>