<?php
	chong_pha_hoai();
?>
<?php
	$noi_dung=thay_the_fckeditor($_POST['noidung']);
	$chuoi="UPDATE `banner` SET `noi_dung` = '$noi_dung'
			WHERE `banner`.`id` ='1' LIMIT 1 ;";
			//thongbao($chuoi);
			//echo $chuoi."<hr>";exit();
	mysql_query($chuoi);
?>