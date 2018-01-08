<?php
	chong_pha_hoai();
	$tv="select * from footer";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	echo $tv_2['noi_dung'];
?>
