

		<!-- PAGE WRAPPER -->
		<div class="ec-page-wrapper">

			<!-- CONTENT WRAPPER -->
			<div class="ec-content-wrapper">
				<div class="content">
					<div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
						<div>
							<h1>DANH SÁCH ĐỐI TÁC</h1>
							<p class="breadcrumbs"><span><a href="index.html">Trang chủ</a></span>
								<span><i class="mdi mdi-chevron-right"></i></span>Đối tác
								<span><i class="mdi mdi-chevron-right"></i></span>Danh sách đối tác
							</p>
						</div>
					</div>
					<div class="row">



						<?php class pager
						{
							function findStart($limit)
							{
								if (!isset($_GET["page"]) || $_GET["page"] == "1") {
									$start = 0;

									$_GET["page"] = 1;
								} else {
									$start = ($_GET["page"] - 1) * $limit;
								}

								return $start;
							}

							function findPages($count, $limit)
							{
								$page =
									$count % $limit == 0
									? $count / $limit
									: floor($count / $limit) + 1;

								return $page;
							}

							function pageList($curpage, $pages)
							{
								$page_list = "";

								if ($curpage != 1 && $curpage) {
									$page_list .=
										"<a href=\"" .
										$_SERVER["PHP_SELF"] .
										"?p=danhsach_doitac&page=1\" title=\"Trang đầu\"> << </a>";
								}

								if ($curpage - 1 > 0) {
									$page_list .=
										"<a href=\"" .
										$_SERVER["PHP_SELF"] .
										"?p=danhsach_doitac&page=" .
										($curpage - 1) .
										"\" title=\"Về trang trước\"><font color='#00ccff'> < </font></a>";
								}

								for ($i = 1; $i <= $pages; $i++) {
									if ($i == $curpage) {
										$page_list .= "<b>" . $i . "</b>";
									} else {
										$page_list .=
											"<a href=\"" .
											$_SERVER["PHP_SELF"] .
											"?p=danhsach_doitac&page=" .
											$i .
											"\" title=\"Trang " .
											$i .
											"\"><font color='#E6E600'>[" .
											$i .
											"]</font></a>";
									}

									$page_list .= "";
								}

								if ($curpage + 1 <= $pages) {
									$page_list .=
										"<a href=\"" .
										$_SERVER["PHP_SELF"] .
										"?p=danhsach_doitac&page=" .
										($curpage + 1) .
										"\" title=\"Đến trang sau\"><font color='#00ccff'> > </font></a>";
								}

								if ($curpage != $pages && $pages != 0) {
									$page_list .=
										"<a href=\"" .
										$_SERVER["PHP_SELF"] .
										"?p=danhsach_doitac&page=" .
										$pages .
										"\" title=\"Trang cuối\"> >> </a>";
								}

								$page_list .= "</td>\n";

								return $page_list;
							}
						} ?>
						<?php
						// kết nối CSDL
						require('db.php');
						$p = new pager;
						$limit = 20;
						$start = $p->findStart($limit);
						$count = mysqli_num_rows(mysqli_query($link, "SELECT*FROM doi_tac"));
						$pages = $p->findPages($count, $limit);
						$result = mysqli_query($link, "SELECT * FROM doi_tac ORDER BY id DESC limit $start,$limit");
						$stt = 1;
						?>

						<div class="col-12">
							<div class="card card-default">
								<div class="card-body">
									<div class="table-responsive">
										<table id="responsive-data-table" class="table" style="width:100%">
											<thead class="text-center">
												<tr>
													<th>Tiêu đề</th>
													<th>Hình ảnh</th>
													<th>Xóa</th>
													<th>Sửa</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<?php
												while ($row = mysqli_fetch_object($result)) {
													$thuocloai = $row->thuocloai;
													$id = $row->id;
													$moi = $row->moi;
													$tieude_en = $row->tieude_en;
													$did = $row->thuocloai;
													$sql3 = mysqli_query($link, "select * from doi_tac where id='" . $did . "'");
													$loai = mysqli_fetch_array($sql3);
													$loai1 = $loai['thuocloai'];
													$tieude = $row->tieude;
													$tukhoa = $row->tukhoa;
													$tukhoa2 = $row->tukhoa2;
													$ngay = $row->ngay;
													$hinhanh = "../HinhCTSP/" . $row->hinhanh;
													$hinhanh = "<img src='$hinhanh' width='40' height='20' '>";
													?>
													<tr>
														<td><?php echo "$tieude"; ?></td>
														<td><?php echo "$hinhanh"; ?></td>
														<td>
															<a href="quan_tri.php?p=xoa_doitac&id=<?= $id ?>"
																onclick="return confirm('Bạn có muốn xóa thông tin này ?')">
																<button class="btn btn-danger">Xóa</button>
															</a>
														</td>
														<td>
															<a
																href="quan_tri.php?p=sua_doitac&id=<?= $id ?>&thuocloai=1&page=<?= $_GET['page'] ?>">
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


