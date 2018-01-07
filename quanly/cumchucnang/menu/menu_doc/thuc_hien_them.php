<?php
	chong_pha_hoai();
	if($_POST['ten']!="")
	{
		$chuoi="INSERT INTO `menu` ( `id` , `ten` , `vitri_menu` , `lien_ket` , `thuoc_menu` )
			VALUES (
			NULL , '$_POST[ten]', 'doc', '', '$_POST[cap_do]'
			);";
		mysql_query($chuoi);
	}
	else
	{
		thongbao("Không được bỏ trống tên menu");
	}
?>