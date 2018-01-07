<?php
	chong_pha_hoai();
	if($_POST['nick_yahoo']!="")
	{
		$chuoi="UPDATE `hotro_tructuyen` SET `ten_nick` = '$_POST[nick_yahoo]'
			WHERE `hotro_tructuyen`.`id` ='$_GET[id]' LIMIT 1 ;";
			mysql_query($chuoi);
	}
	else
	{
		thongbao("Không được bỏ trống tên nick");
	}
?>