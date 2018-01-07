<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `san_pham` WHERE `san_pham`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>