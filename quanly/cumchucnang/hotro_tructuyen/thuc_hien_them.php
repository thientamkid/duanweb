<?php
	chong_pha_hoai();
	if($_POST['ten']!="")
	{

		$chen="INSERT INTO `hotro_tructuyen` ( `ten_nick` , `id`)
			VALUES (
			'$_POST[ten]', NULL
			);";

		mysql_query($chen);
	}
	else
	{
		thongbao("Không được bỏ trống tên nick");
	}
	trangtruoc();
	exit();
?>
