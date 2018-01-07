<?php
	chong_pha_hoai();
?>
<?php
	$noi_dung=thay_the_fckeditor($_POST['noidung']);
	$chuoi="UPDATE `footer` SET `noi_dung` = '$noi_dung'
			WHERE `footer`.`id` ='1' LIMIT 1 ;";
			//thongbao($chuoi);
			//echo $chuoi."<hr>";exit();
	mysql_query($chuoi);
?>