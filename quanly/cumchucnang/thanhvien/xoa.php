<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `thanh_vien` WHERE `thanh_vien`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>