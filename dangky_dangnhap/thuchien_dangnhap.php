<?php
	chong_pha_hoai();
?>
<?php
	$kd=$_POST['ky_danh'];
	$mk=$_POST['mat_khau'];
	$tv="select count(*) from thanh_vien where ky_danh='$kd' and mat_khau='$mk'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_row($tv_1);
	if($tv_2[0]!=0)
	{
		$_SESSION[$ten_danh_dau.'ky_danh__abc']=$_POST['ky_danh'];
		$_SESSION[$ten_danh_dau.'mat_khau__abc']=$_POST['mat_khau'];
		//unset($_SESSION[$ten_danh_dau."thong_ke"]);
		setcookie($ten_danh_dau."so_nguoi_online");
		$tv_x="DELETE FROM `so_nguoi_online` WHERE ky_danh='' LIMIT 1";
		mysql_query($tv_x);
	}
	else
	{
		thongbao("Sai ký danh hoặc mật khẩu");
	}
?>
