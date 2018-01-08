<?php
	chong_pha_hoai();
	$kd=$_SESSION[$ten_danh_dau.'ky_danh__abc'];
	unset($_SESSION[$ten_danh_dau.'ky_danh__abc']);
	unset($_SESSION[$ten_danh_dau.'mat_khau__abc']);

	$tv_u="UPDATE `so_nguoi_online` SET `ky_danh` = '' WHERE `so_nguoi_online`.`ky_danh` = '$kd' LIMIT 1 ";
	mysql_query($tv_u);
?>