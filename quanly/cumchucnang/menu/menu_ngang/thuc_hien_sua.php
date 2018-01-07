<?php
	chong_pha_hoai();
?>
<?php
	if($_POST['ten']!="")
	{
		$chuoi="UPDATE `menu` SET `ten` = '$_POST[ten]',`lien_ket`='$_POST[lien_ket]' WHERE `menu`.`id` ='$_GET[id]' LIMIT 1 ;";
		mysql_query($chuoi);
	}
	else
	{
		thongbao("Không được bỏ trống tên menu");
	}
?>