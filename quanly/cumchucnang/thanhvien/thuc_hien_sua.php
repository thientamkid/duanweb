<?php
	chong_pha_hoai();
	if($_POST['ky_danh']!="" and $_POST['mat_khau']!="")
	{
		$dia_chi=nl2br($_POST['dia_chi']);
		$chuoi="UPDATE `thanh_vien` SET `ky_danh` = '$_POST[ky_danh]',
			`mat_khau` = '$_POST[mat_khau]',
			`email` = '$_POST[email]',
			`dien_thoai` = '$_POST[dien_thoai]',
			`dia_chi` = '$dia_chi' WHERE `thanh_vien`.`id` ='$_GET[id]' LIMIT 1 ;";
			mysql_query($chuoi);
	}
	else
	{
		thongbao("Không được bỏ trống ký danh và mật khẩu");
	}
?>