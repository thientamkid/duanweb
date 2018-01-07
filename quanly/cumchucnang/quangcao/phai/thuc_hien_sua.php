<?php
	chong_pha_hoai();
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	$ten_hinh=$_FILES['hinh_anh']['name'];
	if($ten_hinh=="")
	{
		$ten_hinh=$_POST['hinh_anh_hidden'];
		$ten_hinh_khong_trung="co";
	}
	$mang_vvv=explode(".",$ten_hinh);
	$duoi_hinh=$mang_vvv[count($mang_vvv)-1];
	$chuoi_ten_hinh_hop_le="gif,png,bmp,jpg,jpeg,GIF,PNG,BMP,JPG,JPEG,swf,SWF";
	$mang_th_hl=explode(",",$chuoi_ten_hinh_hop_le);
	$hinh_hop_le="khong";

	for($r=0;$r<count($mang_th_hl);$r++)
	{
		if($duoi_hinh==$mang_th_hl[$r])
		{
			$hinh_hop_le="co";
			break;
		}
	}
	if($hinh_hop_le=="co")
	{
		$tv="select count(*) from quangcao where ten_file='$ten_hinh'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]==0 or $ten_hinh_khong_trung=="co")
		{
			$duong_dan_upload="../hinhanh_flash/quangcao/".$ten_hinh;
			move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_upload);
			//$noi_dung=thay_the_fckeditor($_POST['noidung']);

			$chuoi="UPDATE `quangcao` SET `rong` = '$_POST[rong]',
				`cao` = '$_POST[cao]',
				`link` = '$_POST[lien_ket]',
				`ten_file` = '$ten_hinh'
					WHERE `quangcao`.`id` ='$_GET[id]' LIMIT 1 ;";
					//thongbao($chuoi);
					//echo $chuoi."<hr>";exit();
			mysql_query($chuoi);
		}
		else
		{
			thongbao("Tên file đã bị trùng\\nBạn hãy đổi tên hình");
		}
	}
	else
	{
		thongbao("Đuôi file upload không hợp lệ\\nCác đuôi file hợp lệ là : $chuoi_ten_hinh_hop_le");
	}
?>