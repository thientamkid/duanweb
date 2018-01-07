<?php
	session_start();
	ini_set('display_errors', 0);
	include("../ketnoi.php");
	include("../cumchucnang/ham/ham.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="../giaodien/chung.css">
<script type="text/javascript" src="../giaodien/chung.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="../giaodien/menu_ngang_quan_tri/style.css">
<script type="text/javascript" src="../giaodien/menu_ngang_quan_tri/js.js"></script>
<script type="text/javascript" src="fckeditor/fckeditor.js"></script>

<title>Quan ly</title>

</head>
<body>
<?php
	include("xacdinh_dangnhap.php");
	include("cumchucnang/xu_ly_post_get/xu_ly_post_get.php");
?>
<style type="text/css">
	input
	{
		border:1px solid #cccccc
	}
	div
	{
		/*-moz-border-radius:8px;
		-webkit-border-radius:8px;*/
	}
	div.div_abc_ql
	{
		width:988px;
		border-left:1px solid #cccccc;
		border-right:1px solid #cccccc;
		text-align:left
	}
</style>
	<center>
		
		<div class="div_abc_ql">
			<?php
				if($xacdinh_dangnhap!="co")
				{
					include("khung_dang_nhap.php");
				}
				else
				{
					include("index_1.php");
				}
			?>
		</div>
		<img src="../hinhanh_flash/dungchung/bt_d_ql.jpg" style="_margin-top:-15px">
	</center>
</body>
</html>