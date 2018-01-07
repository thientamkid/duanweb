<?php
	chong_pha_hoai();
	if($_POST['ky_danh']!="" and $_POST['mat_khau']!="")
	{
		$chuoi="UPDATE `thongtin_quantri` SET `ky_danh` = '$_POST[ky_danh]',
			`mat_khau` = '$_POST[mat_khau]'
			WHERE `thongtin_quantri`.`id` ='1' LIMIT 1 ;";
			mysql_query($chuoi);
		$_SESSION[$ten_danh_dau."ky_danh__quan_tri"]=$_POST['ky_danh'];
		$_SESSION[$ten_danh_dau."mat_khau__quan_tri"]=$_POST['mat_khau'];
	}
	else
	{
		thongbao("Không được bỏ trống ký danh và mật khẩu");
	}
?>