<?php
	chong_pha_hoai();
	$tv="select * from game where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	if(is_file("../hinhanh_flash/game/$tv_2[hinh_anh]"))
	{
		unlink("../hinhanh_flash/game/$tv_2[hinh_anh]");
	}
	if(is_file("../hinhanh_flash/flash_game/$tv_2[file_flash]"))
	{
		unlink("../hinhanh_flash/flash_game/$tv_2[file_flash]");
	}
	$chuoi="DELETE FROM `game` WHERE `game`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>