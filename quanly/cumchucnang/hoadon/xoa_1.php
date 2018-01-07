<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `hoa_don` WHERE `hoa_don`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
	chuyentrang("?thamso=quanly_hoadon&trang=$_GET[trang]");
?>