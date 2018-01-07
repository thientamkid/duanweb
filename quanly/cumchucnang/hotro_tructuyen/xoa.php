<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `hotro_tructuyen` WHERE `hotro_tructuyen`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>