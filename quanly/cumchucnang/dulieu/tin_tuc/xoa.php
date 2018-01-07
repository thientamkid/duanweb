<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `tin_tuc` WHERE `tin_tuc`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>