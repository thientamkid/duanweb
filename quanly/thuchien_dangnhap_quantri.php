<?php
	chong_pha_hoai();
	if($_POST['ky_danh']!="")
	{
		$tv="select count(*) from thongtin_quantri where ky_danh='$_POST[ky_danh]' and mat_khau='$_POST[mat_khau]'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]!=0)
		{
			$_SESSION[$ten_danh_dau."ky_danh__quan_tri"]=$_POST['ky_danh'];
			$_SESSION[$ten_danh_dau."mat_khau__quan_tri"]=$_POST['mat_khau'];
		}
		else
		{
			thongbao("Sai ký danh hoặc mật khẩu");
		}
	}
	else
	{
		thongbao("Không được bỏ trống ký danh , mật khẩu");
	}
?>