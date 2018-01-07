<?php
	ob_start();
	setcookie("gido","gido", time() +3600);
	session_start();
	ini_set('display_errors', 0);
	include("ketnoi.php");
	include("cumchucnang/ham/ham.php");
	include("cumchucnang/dangky_dangnhap/xacdinh_dangnhap.php");
	include("cumchucnang/title_meta/title_meta.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>web bán rượu</title>
<meta name="keywords" content="<?php echo $title_meta; ?>" />
<meta name="description" content="<?php echo $title_meta; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="giaodien/chung.css">
<script type="text/javascript" src="giaodien/chung.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="giaodien/menu_ngang/menu_ngang.css">
<link rel="stylesheet" type="text/css" media="screen" href="giaodien/menu_doc/menu_doc.css">
<script type="text/javascript" src="giaodien/menu_doc/menu_doc.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="giaodien/menu_ngang_duoi/menu_ngang_duoi.css">
<script type="text/javascript" src="giaodien/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="giaodien/slideshow/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="giaodien/slideshow/js/jquery.galleryview-1.1.js"></script>
<script type="text/javascript" src="giaodien/slideshow/js/jquery.timers-1.1.2.js"></script>
<?php
	//include("cumchucnang/link_script/link_script.php");
?>
</head>
<body>
<?php
	include("cumchucnang/xu_ly_post_get/xu_ly_post_get.php");
?>
	<center>
		<table width="990px" border="0" style="text-align:left" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="3">
					<?php
						include("cumchucnang/banner/banner.php");
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<?php
						include("cumchucnang/menu_ngang/menu_ngang.php");
						echo "<div class=\"cao_3_px\"></div>";
					?>
				</td>
			</tr>
			<tr>
				<td width="170px" valign="top">
					<?php
						include("cumchucnang/tim_kiem/khung.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/menu_doc/menu_doc.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/san_pham/khung_san_pham_moi.php");
						echo "<div class=\"cao_3_px\"></div>";

					?>
				</td>
				<td width="650px" valign="top">
					<?php
						include("cumchucnang/bienluan_phanthan/bienluan_phanthan.php");
					?>
				</td>
				<td width="170px" valign="top">
					<?php
						include("cumchucnang/dangky_dangnhap/hop_dang_nhap.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/giohang/hop_gio_hang.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/san_pham/khung_san_pham_ban_chay.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/hotro_tructuyen/hotro_tructuyen.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/thoi_tiet/thoi_tiet.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/thongke/thongke.php");
						echo "<div class=\"cao_3_px\"></div>";
						include("cumchucnang/quangcao_2/qc.php");
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<div class="cao_3_px"></div>
					<?php
						include("cumchucnang/menu_ngang_duoi/menu_ngang_duoi.php");
					?>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<?php
						include("cumchucnang/footer/footer.php");
					?>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
<?php ob_flush(); ?>