

		<!-- PAGE WRAPPER -->
		<div class="ec-page-wrapper">
			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>DANH SÁCH LOẠI TIN TỨC</h1>
							<p class="breadcrumbs"><span><a href="index.html">Trang chủ</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Tin tức
								<span><i class="mdi mdi-chevron-right"></i></span>Danh sách loại tin tức
							</p>
						</div>
						<div>
							<a href="quan_tri.php?p=nhap_them_loai_tin_tintuc" class="btn btn-primary"> Thêm loại tin tức</a>
						</div>
					</div>
					<div class="row">
						<script type="text/javascript">
							function chuyen_avc(value) {
								//alert("chao");
								var link = "?p=6&macdinh=" + value;
								window.location = link;
							}
						</script>
						<?php



						class pager
						{



							function findStart($limit)
							{

								if (!isset($_GET['page']) || ($_GET['page'] == "1")) {

									$start = 0;

									$_GET['page'] = 1;
								} else {

									$start = ($_GET['page'] - 1) * $limit;
								}

								return $start;
							}

							function findPages($count, $limit)
							{

								$page = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1;

								return $page;
							}

							function pageList($curpage, $pages)
							{

								$page_list = "";



								if (($curpage != 1) && ($curpage)) {

									$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=danhsach_tin_thicong&page=1\" title=\"Trang đầu\" style='margin:4px;'> << </a>";
								}

								if ($curpage - 1 > 0) {

									$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_dichvu&page=" . ($curpage - 1) . "\" title=\"Về trang trước\" style='margin:4px;'><font color='#00ccff'> < </font></a>";
								}

								for ($i = 1; $i <= $pages; $i++) {

									if ($i == $curpage) {

										$page_list .= "<b>" . $i . "</b>";
									} else {

										$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_dichvu&page=" . $i . "\" title=\"Trang " . $i . "\" style='margin:4px;'><font color='red'>[" . $i . "]</font></a>";
									}

									$page_list .= "";
								}

								if (($curpage + 1) <= $pages) {

									$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_dichvu&page=" . ($curpage + 1) . "\" title=\"Đến trang sau\" style='margin:4px;' ><font color='#00ccff'> > </font></a>";
								}

								if (($curpage != $pages) && ($pages != 0)) {

									$page_list .= "<a href=\"" . $_SERVER['PHP_SELF'] . "?p=ds_tin_dichvu&page=" . $pages . "\" title=\"Trang cuối\" > >> </a>";
								}

								$page_list .= "</td>\n";

								return $page_list;
							}

							function nextprev($curpage, $page)
							{

								$next_prev = "";

								if (($curpage - 1) < 0 || ($curpage - 1) != 1) {

									$next_prev .= "Back";
								} else {



									$next_prev = "<a href=\"?p=ds_tin_dichvu&page=" . ($curpage - 1) . "\">Back</a>";
								}

								$next_prev .= "|";

								if (($curpage + 1) > $page) {

									$next_prev .= "Next";
								} else {

									$next_prev = "<a href=\"?p=ds_tin_dichvu&page=" . ($curpage + 1) . "\">Next</a>";
								}

								return $next_prev;
							}
						}

						?>
						<?php
						// kết nối CSDL
						//include_once("phan_trang.php");
						require('db.php');
						$p = new pager;

						$limit = 30;

						$start = $p->findStart($limit);

						$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM loai_tin_tintuc "));

						$pages = $p->findPages($count, $limit);

						$result = mysqli_query($link, "SELECT * FROM loai_tin_tintuc ORDER BY id ASC limit $start,$limit");
						?>

						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead>
												<tr>
													<th>ID</th>
													<th>Loại hệ thống phân phối</th>
													<th>Icon</th>
													<th>Xóa</th>
													<th>Sửa</th>
												</tr>
											</thead>

											<tbody>
												<?php
												while ($row = mysqli_fetch_object($result)) {
													$id = $row->id;
													$noidung = $row->thuocloai;
													$noidung_en = $row->thuocloai_en;
													$hinhanh = "../HinhCTSP/" . $row->hinhanh;
													$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";
													$logo = "../HinhCTSP/" . $row->logo;
													$logo = "<img src='$logo' width='40' height='20' '>";
													?>
													<tr>
														<td><?php echo "$id"; ?></td>
														<td><?php echo "$noidung"; ?></td>
														<td><?php echo "$hinhanh"; ?></td>
														<td>
															<a href="quan_tri.php?p=xoa_loai_tintintuc&id=<?= $id ?>"
																onclick="return confirm('Bạn có muốn xóa thông tin này ?')">
																<button class="btn btn-danger">Xóa</button>
															</a>
														</td>

														<td>
															<a
																href="quan_tri.php?p=sua_loai_tintintuc&id=<?= $id ?>&thuocloai=1&page=<?= $_GET['page'] ?>">
																<button class="btn btn-warning">Sửa</button>
															</a>
														</td>

													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> <!-- End Content -->
			</div> <!-- End Content Wrapper -->

		</div> <!-- End Page Wrapper -->
