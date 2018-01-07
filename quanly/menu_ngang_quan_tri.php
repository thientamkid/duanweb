<?php
	chong_pha_hoai();
?>
<div style="width:988px;">
	<ul id="menu_ngang" class="menu_ngang">
		<li><a href="index.php">Trang chủ</a></li>
		<li><a href="">Menu</a>
			<ul>
				<li><a href="?thamso=bien_luan_them_menu">Thêm menu</a>
					<ul>
						<li><a href="?thamso=them_menu_doc">Thêm menu dọc</a></li>
						<li><a href="?thamso=them_menu_ngang">Thêm menu ngang</a></li>
					</ul>
				</li>
				<li><a href="?thamso=bienluan_quanly_menu">Quản lý menu</a>
					<ul>
						<li><a href="?thamso=quan_ly_menu_doc">Menu dọc</a></li>
						<li><a href="?thamso=quan_ly_menu_ngang">Menu ngang</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="">Dữ liệu</a>
			<ul>
				<li><a href="?thamso=bien_luan_them_du_lieu">Thêm dữ liệu</a>
					<ul>
						<li><a href="?thamso=them_san_pham">Thêm sản phẩm</a></li>
						<li><a href="?thamso=them_tin_tuc">Thêm tin tức</a></li>
						<li><a href="?thamso=them_game">Thêm game</a></li>
					</ul>
				</li>
				<li><a href="?thamso=bien_luan_quan_ly_du_lieu">Quản lý dữ liệu</a>
					<ul>
						<li><a href="?thamso=quan_ly_san_pham">Sản phẩm</a></li>
						<li><a href="?thamso=quan_ly_tin_tuc">Tin tức</a></li>
						<li><a href="?thamso=quan_ly_game">Game</a></li>
						<li><a href="?thamso=quan_ly_du_lieu_mot_tin">Hiển thị một tin</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><a href="">Quản lý</a>
			<ul>
				<li><a href="?thamso=quanly_thanhvien">Thành viên</a></li>
				<li><a href="?thamso=quanly_hoadon">Hóa đơn</a></li>
				<li><a href="?thamso=quanly_slideshow">Slideshow trang chủ</a></li>
				<li><a href="?thamso=sanpham_trangchu">Sản phẩm trang chủ</a></li>

			</ul>
		</li>
		<li><a href="">Cụm chức năng</a>
			<ul>
				<li><a href="?thamso=lien_he">Liên hệ</a></li>
				<li><a href="?thamso=bienluan_hotro_tructuyen">Hỗ trợ trực tuyến</a>
					<ul>
						<li><a href="?thamso=them_lien_lac_yahoo">Thêm liên lạc</a></li>
						<li><a href="?thamso=quan_ly_ho_tro_truc_tuyen">Quản lý</a></li>
					</ul>
				</li>
				<li><a href="?thamso=bienluan_vitri_quangcao">Quãng cáo</a>
					<ul>
						<li><a href="?thamso=bienluan_quangcao_trai">Quảng cáo trái</a>
							<ul>
								<li><a href="?thamso=them_quangcao_trai">Thêm</a></li>
								<li><a href="?thamso=quanly_quangcao_trai">Quản lý</a></li>
							</ul>
						</li>
						<li><a href="?thamso=bienluan_quangcao_phai">Quảng cáo phải</a>
							<ul>
								<li><a href="?thamso=them_quangcao_phai">Thêm</a></li>
								<li><a href="?thamso=quanly_quangcao_phai">Quản lý</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="?thamso=thaydoi_banner">Thay đổi banner</a></li>
				<li><a href="?thamso=thaydoi_footer">Thay đổi footer</a></li>
				<li><a href="?thamso=thongtin_quantri" style="line-height:normal">Thay đổi thông tin quản trị</a></li>
			</ul>
		</li>


	</ul>
	<div class="ggg_8">
		<a href="?thamso=thoat" class="nut_thoat" style="float:right;margin:1px 10px 0px 0px;_margin:3px 10px 0px 0px">Thoát</a>
	</div>
</div>
<div style="clear:left"></div>
<script type="text/javascript">
	menu_ngang_quan_tri();
</script>
<?php
	if($trinh_duyet=="ie6")
	{
		?>
			<script type="text/javascript">
				fix_mnn_qt_ie6();
			</script>
		<?php
	}
?>
