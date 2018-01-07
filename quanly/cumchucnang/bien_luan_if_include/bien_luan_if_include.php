<?php
	chong_pha_hoai();
?>
<?php
	$tv="select * from bienluan_phanthan_trang_quanly";
	$tv_1=mysql_query($tv);
	while($tv_2=mysql_fetch_array($tv_1))
	{
		if($_GET['thamso']==$tv_2['ten_tham_so'])
		{
			include($tv_2['duong_dan']);
		}
	}
?>