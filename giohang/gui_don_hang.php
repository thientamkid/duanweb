<?php
	chong_pha_hoai();
	if($xacdinh_dangnhap=="co")
	{
		//thongbao("Thuc hien gui don hang");
		if($_POST['ho_ten'] and $_POST['dien_thoai']!="" and $_POST['email']!="")
		{
			$noi_dung=nl2br($_POST['noi_dung']);
			$kd=$_SESSION[$ten_danh_dau.'ky_danh__abc'];
			$don_hang="";
			for($i=0;$i<count($_SESSION[$ten_danh_dau.'id_giohang']);$i++)
			{
				$id_sp=$_SESSION[$ten_danh_dau.'id_giohang'][$i];
				$sl_sp=$_SESSION[$ten_danh_dau.'soluong_giohang'][$i];
				if($sl_sp!=0)
				{
					$don_hang=$don_hang."".$id_sp."___".$sl_sp."______";
					$tv="select * from san_pham where id='$id_sp'";
					$tv_1=mysql_query($tv);
					$tv_2=mysql_fetch_array($tv_1);
					$so=$tv_2['so_luong_duoc_mua']+$sl_sp;
					$up="UPDATE `san_pham` SET `so_luong_duoc_mua` = '$so' WHERE `id` ='$id_sp' LIMIT 1 ;";
					mysql_query($up);
				}
			}
			$chuoi="
				INSERT INTO `hoa_don` ( `id` , `don_hang` , `ho_ten` , `dia_chi` , `email` , `dien_thoai` , `noi_dung` , `ky_danh` )
				VALUES (
				NULL , '$don_hang', '$_POST[ho_ten]', '$_POST[dia_chi]', '$_POST[email]', '$_POST[dien_thoai]', '$noi_dung', '$kd'
				);
			";
			mysql_query($chuoi);
			unset($_SESSION[$ten_danh_dau.'id_giohang']);
			unset($_SESSION[$ten_danh_dau.'soluong_giohang']);
			$_SESSION['jac_91']="co";
			thongbao("Hóa đơn của bạn đã được gửi cho chúng tôi\\nCảm ơn bạn đã mua hàng tại website chúng tôi");
		}
		else
		{
			thongbao("Không được bỏ trống họ tên , hòm thư , điện thoại");
		}
	}
	else
	{
		thongbao("Cần đăng ký để mua hàng");
		$_SESSION['jac_82']="co";
		trangtruoc();
		exit();
		//chuyentrang("?thamso=dang_ky");
	}
?>