<?php
chong_pha_hoai();
?>
<?php
$title = "trang-chu";

if (empty($_GET['thamso'])) {

    $title_meta = "Thiết Kế Nội Thất Đẹp, Thi Công Nội Thất Trọn Gói | DanaHome";
    $dis = "DanaHome cung cấp dịch vụ thiết kế và thi công nội thất cho căn hộ, nhà phố, biệt thự, văn phòng, showroom, nhà hàng và cafe.";
    $key = "thiết kế nội thất, thi công nội thất, thiết kế nội thất đẹp, nội thất trọn gói, danahome";

} else {

switch ($_GET['thamso']) {



    case "tin_sanpham":
        $title = "tin_sanpham";
        $title_meta = "Dự Án Thiết Kế Nội Thất Đẹp, Hiện Đại | DanaHome";
        $dis = "Khám phá các dự án thiết kế và thi công nội thất của DanaHome với nhiều loại công trình như căn hộ, nhà phố, biệt thự, văn phòng, showroom và nhà hàng.";
        $key = "dự án nội thất, dự án thiết kế nội thất, công trình nội thất, mẫu nội thất đẹp, danahome";
        break;


    case "tin_dichvu":
        $title = "tin_dichvu";
        $title_meta = "Dịch Vụ Thiết Kế Và Thi Công Nội Thất | DanaHome";
        $dis = "DanaHome cung cấp dịch vụ thiết kế nội thất, thi công nội thất, thiết kế thi công trọn gói và cải tạo không gian theo nhu cầu sử dụng.";
        $key = "dịch vụ thiết kế nội thất, thi công nội thất, thiết kế thi công nội thất, cải tạo nội thất, danahome";
        break;


    case "tin_sanphama":
        $title = "tin_sanphama";
        $title_meta = "Mẫu Thiết Kế Nội Thất Đẹp Cho Mọi Không Gian | DanaHome";
        $dis = "Tổng hợp các mẫu thiết kế nội thất phòng khách, phòng bếp, phòng ngủ, phòng làm việc, phòng thờ, WC và nhiều không gian khác.";
        $key = "mẫu thiết kế nội thất, mẫu nội thất đẹp, thiết kế nội thất hiện đại, mẫu phòng khách đẹp, mẫu phòng ngủ đẹp";
        break;


    case "tin_dichvuu":
        $title = "tin-dichvuu";
        $title_meta = "Thiết Kế Nội Thất Theo Yêu Cầu | DanaHome";
        $dis = "Thiết kế nội thất theo diện tích, công năng và phong cách riêng cho căn hộ, nhà phố, biệt thự, văn phòng và các công trình thương mại.";
        $key = "thiết kế nội thất theo yêu cầu, thiết kế nội thất đẹp, thiết kế nội thất căn hộ, thiết kế nội thất nhà phố";
        break;



    case "lien_he":
        $title = "lien-he";
        $title_meta = "Liên Hệ Tư Vấn Thiết Kế Và Thi Công Nội Thất | DanaHome";
        $dis = "Liên hệ DanaHome để được tư vấn về thiết kế nội thất, thi công nội thất, lựa chọn vật liệu và nhận báo giá phù hợp với công trình.";
        $key = "liên hệ danahome, tư vấn thiết kế nội thất, báo giá nội thất, liên hệ thi công nội thất";
        break;




    case "gioi_thieu":
        $title = "gioi-thieu";
        $title_meta = "Giới Thiệu DanaHome – Thiết Kế Và Thi Công Nội Thất";
        $dis = "Tìm hiểu về DanaHome, đơn vị hoạt động trong lĩnh vực thiết kế, thi công và sản xuất nội thất cho nhà ở, văn phòng và công trình thương mại.";
        $key = "giới thiệu danahome, công ty thiết kế nội thất, đơn vị thi công nội thất, xưởng sản xuất nội thất";
        break;



    case "ma_sanpham":
        $title = "ma-sanpham";
        $title_meta = "Danh Mục Mẫu Thiết Kế Nội Thất Đẹp | DanaHome";
        $dis = "Danh mục các mẫu thiết kế nội thất được phân chia theo từng không gian như phòng khách, phòng bếp, phòng ngủ, phòng làm việc, phòng thờ và nhiều khu vực khác.";
        $key = "danh mục thiết kế nội thất, mẫu thiết kế nội thất, mẫu phòng khách, mẫu phòng bếp, mẫu phòng ngủ";
        break;



    case "ma_sanphamct":
        $title = "ma-sanphamct";
        $title_meta = "Chi Tiết Mẫu Thiết Kế Nội Thất | DanaHome";
        $dis = "Xem chi tiết mẫu thiết kế nội thất, cách bố trí không gian, phong cách, vật liệu và các giải pháp phù hợp với từng công trình.";
        $key = "chi tiết mẫu thiết kế nội thất, thiết kế nội thất đẹp, ý tưởng nội thất, bố trí nội thất";
        break;



    case "tin_dichvuuct":
        $title = "tin-dichvuu";
        $title_meta = "Chi Tiết Dịch Vụ Thiết Kế Và Thi Công Nội Thất | DanaHome";
        $dis = "Thông tin chi tiết về quy trình thiết kế, thi công nội thất, cải tạo không gian và các hạng mục thực hiện tại DanaHome.";
        $key = "chi tiết dịch vụ nội thất, quy trình thiết kế nội thất, quy trình thi công nội thất, thi công nội thất trọn gói";
        break;


    case "tin_dichvuct":
        $title = "tin-dichvu";
        $title_meta = "Thiết Kế Thi Công Nội Thất Theo Yêu Cầu | DanaHome";
        $dis = "Dịch vụ thiết kế và thi công nội thất theo yêu cầu, phù hợp với diện tích, công năng, ngân sách và phong cách của từng công trình.";
        $key = "thiết kế thi công nội thất theo yêu cầu, thi công nội thất trọn gói, thiết kế nội thất theo yêu cầu";
        break;




    case "tin_tintuc":
        $title = "tin-tintuc";
        $title_meta = "Tin Tức Nội Thất – Xu Hướng Thiết Kế Và Thi Công | DanaHome";
        $dis = "Cập nhật xu hướng thiết kế nội thất, kinh nghiệm lựa chọn vật liệu, cách bố trí không gian, phong thủy, màu sắc và giải pháp chiếu sáng.";
        $key = "tin tức nội thất, xu hướng thiết kế nội thất, kinh nghiệm thiết kế nội thất, kiến thức nội thất, danahome";
        break;


    // =========================
    // CHI TIẾT DỰ ÁN
    // =========================

    case "tin_sanphamct":
        $title = "tin-sanphamct";
        $title_meta = "Chi Tiết Dự Án Thiết Kế Nội Thất | DanaHome";
        $dis = "Xem thông tin chi tiết các dự án thiết kế và thi công nội thất, từ ý tưởng, bố trí không gian đến vật liệu và hoàn thiện công trình.";
        $key = "chi tiết dự án nội thất, dự án thiết kế nội thất, công trình nội thất, thi công nội thất";
        break;



    case "chitiet_tintintuc":
        $title = "chitiet-tintintuc";
        $title_meta = "Thông Tin Nội Thất Và Kinh Nghiệm Thiết Kế | DanaHome";
        $dis = "Tổng hợp thông tin và kinh nghiệm hữu ích về thiết kế nội thất, lựa chọn vật liệu, màu sắc, ánh sáng và bố trí không gian.";
        $key = "kiến thức nội thất, kinh nghiệm thiết kế nội thất, thông tin nội thất, xu hướng nội thất";
        break;

    case "tim_kiem":
        $title_meta = $_GET['tu_khoa'];
        break;
	// GIOI THIEU
	case "chitiet_gioithieu":
		$id = $_REQUEST['id'];
		$tv = "select * from gioi_thieu where linkurl like '%" . $id . "%' order by id ";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$title = "gioi-thieu";
		$hinhanh = "/HinhCTSP/" . $tv_2['hinhanh'];
		break;
	// tin tuc
	case "chitiet_tintintuc":
		$title = "tin-tintuc";
		$id = $_GET['url'];
		$tv = "select * from tin_tintuc where linkurl like '%" . $id . "%' order by id ";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tukhoa'];
		$hinhanh = "/HinhCTSP/Hinhtintuc/" . $tv_2['hinhanh'];
		break;
	// dich vu
	case "chitiet_tindichvu":
		$title = "tin-dichvu";
		$id = $_GET['url'];
		$tv = "select * from tin_dichvu where linkurl like '%" . $id . "%' order by id ";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tukhoa'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;
	//dichvuu
	case "chitiet_tindichvuu":
		$title = "tin-dichvuu";
		$id = $_GET['url'];
		$tv = "select * from tin_dichvuu where linkurl like '%" . $id . "%' order by id ";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude_en'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tukhoa'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;
	case "tin_sanphamact":
		$title = "loai-tin-sanphama";
		$id = $_GET['url'];
		$tv = "select * from loai_tin_sanphama where linkurl like '%" . $id . "%' order by id ";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['thuocloai'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tukhoa'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;
	// dich vu
	case "chitiet_tinthicong":
		$title = "tin-thicong";
		$id = $_REQUEST['id'];
		$tv = "select * from tin_thicong where id like '$id'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;

	case "chitiet_tinsanpham":
		$title = "tin-sanpham";
		$id = $_REQUEST['id'];
		$tv = "select * from tin_sanpham where id like '$id'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;
	case "chitiet_tinsanphama":
		$title = "tin-sanphama";
		$id = $_REQUEST['id'];
		$tv = "select * from tin_sanphama where id like '$id'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$hinhanh = "/HinhCTSP/Hinhdichvu/" . $tv_2['hinhanh'];
		break;

	case "chitiet_masanpham":
		$title = "ma-sanpham";
		$id = $_REQUEST['id'];
		$tv = "select * from ma_sanpham where id like '$id'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$hinhanh = "/HinhCTSP/" . $tv_2['hinhanh'];
		break;
	case "chitiet_masanphama":
		$title = "ma-sanphama";
		$id = $_REQUEST['id'];
		$tv = "select * from ma_sanphama where id like '$id'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['tieude'];
		$dis = $tv_2['mota'];
		$key = $tv_2['tieude'];
		$hinhanh = "/HinhCTSP/" . $tv_2['hinhanh'];
		break;

	case "xuat_mot_tin":
		$tv = "select * from du_lieu_mot_tin where id='$_GET[id]'";
		$tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$title_meta = $tv_2['ten'];
		break;
	default:
		$tv = "select * from he_thong  order by id  limit 0,1";
		$tv_1 = mysqli_query($link, $tv);
		$a_tv_1 = mysqli_query($link, $tv);
		$tv_2 = mysqli_fetch_array($tv_1);
		$tieude = "$tv_2[tieude]";
		$dis = "$tv_2[dis]";
		$key = "$tv_2[key]";
		$title_meta = "$tieude";
		$dis = "$dis";
		$key = "$key";
}
}
$config_url = $_SERVER["SERVER_NAME"];
?>
