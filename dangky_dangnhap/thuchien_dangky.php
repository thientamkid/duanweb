<?php
	chong_pha_hoai();
?>
<?php
	if($_POST['ho_ten']!="" and $_POST['mat_khau']!="")
	{
		$kd=$_POST['ho_ten'];
		$mk=$_POST['mat_khau'];
		$tv="select count(*) from thanh_vien where ky_danh='$kd'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]==0)
		{
			$dia_chi=nl2br($_POST['dia_chi']);
			$chuoi="
				INSERT INTO `thanh_vien` ( `id` , `ky_danh` , `mat_khau` , `hinh_dai_dien` , `email` , `dien_thoai` , `dia_chi` )
				VALUES (
				NULL , '$_POST[ho_ten]', '$_POST[mat_khau]', '', '$_POST[email]', '$_POST[dien_thoai]', '$dia_chi'
				);";
			mysql_query($chuoi);
			$_SESSION[$ten_danh_dau.'ky_danh__abc']=$_POST['ho_ten'];
			$_SESSION[$ten_danh_dau.'mat_khau__abc']=$_POST['mat_khau'];
			//unset($_SESSION[$ten_danh_dau."thong_ke"]);
			setcookie($ten_danh_dau."so_nguoi_online");
			$tv_x="DELETE FROM `so_nguoi_online` WHERE ky_danh='' LIMIT 1";
			mysql_query($tv_x);
		}
		else
		{
			thongbao("Đã có người đăng ký ký danh này \\nBạn hãy đăng ký ký danh khác");
		}
	}
	else
	{
		thongbao("Không được bỏ trống họ tên và mật khẩu");
	}
?>