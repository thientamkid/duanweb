<?php
	chong_pha_hoai();
	$chuoi="DELETE FROM `quangcao` WHERE `quangcao`.`id` = '$_GET[id]' LIMIT 1";
	mysql_query($chuoi);
?>