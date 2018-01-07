<?php
	chong_pha_hoai();
	//thongbao("vaoday");
?>
<?php
	$id=$_GET['id'];
	$xoa="DELETE FROM `menu` WHERE `menu`.`id` = '$id' LIMIT 1";
	mysql_query($xoa);
?>