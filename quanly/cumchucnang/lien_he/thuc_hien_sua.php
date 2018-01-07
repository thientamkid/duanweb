<?php
	chong_pha_hoai();
?>
<?php
	$noi_dung=thay_the_fckeditor($_POST['noidung']);
	$chuoi="UPDATE `lien_he` SET `gia_tri` = '$noi_dung'
			WHERE `lien_he`.`id` ='2' LIMIT 1 ;";
	mysql_query($chuoi);
	$chuoi_1="UPDATE `lien_he` SET `gia_tri` = '$_POST[email]'
			WHERE `lien_he`.`id` ='1' LIMIT 1 ;";
	mysql_query($chuoi_1);
?>