<?php
	chong_pha_hoai();
?>
<?php
	$kd=$_SESSION[$ten_danh_dau.'ky_danh__abc'];
	$mk=$_SESSION[$ten_danh_dau.'mat_khau__abc'];
	$tv="select count(*) from thanh_vien where ky_danh='$kd' and mat_khau='$mk'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_row($tv_1);
	if($tv_2[0]!=0)
	{
		$xacdinh_dangnhap="co";
	}
	else
	{
		$xacdinh_dangnhap="khong";
	}
?>