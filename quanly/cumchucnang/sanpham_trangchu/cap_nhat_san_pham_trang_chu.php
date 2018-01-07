<?php
	chong_pha_hoai();
?>
<?php
	for($i=1;$i<=$_POST['name_tong'];$i++)
	{
		$name_select="select_trang_chu___$i";
		$name_id="name_id___$i";
		$post_name_select=$_POST[$name_select];
		$post_name_id=$_POST[$name_id];
		$id=$post_name_id;
		$chuoi="UPDATE `san_pham` SET `trang_chu` = '$post_name_select' WHERE `san_pham`.`id` ='$id' LIMIT 1 ;";
		mysql_query($chuoi);
	}
?>