<?php
	chong_pha_hoai();
	//thongbao("vaoday");
?>
<?php
	$id=$_GET['id'];
	$tv="select count(*) from menu where thuoc_menu='$id'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_row($tv_1);
	if($tv_2[0]==0)
	{
		$a_tv="select count(*) from san_pham where thuoc_menu='$id'";
		$a_tv_1=mysql_query($a_tv);
		$a_tv_2=mysql_fetch_row($a_tv_1);
		if($a_tv_2[0]==0)
		{
			$xoa="DELETE FROM `menu` WHERE `menu`.`id` = '$id' LIMIT 1";
			mysql_query($xoa);
		}
		else
		{
			thongbao("Menu này đã có dữ liệu nên không được xóa\\nNếu muốn xóa menu này hãy xóa các dữ liệu nằm trong menu này");
		}
	}
	else
	{
		thongbao("Không thể xóa menu này vì vẫn còn menu con trong nó\\nNếu bạn muốn xóa hãy xóa các menu con trước");
	}
?>