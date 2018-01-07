<?php
	chong_pha_hoai();
	//thongbao("vao day");
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	$ten_hinh=$_FILES['hinh_anh']['name'];
	$mang_vvv=explode(".",$ten_hinh);
	$duoi_hinh=$mang_vvv[count($mang_vvv)-1];
	$chuoi_ten_hinh_hop_le="gif,png,bmp,jpg,jpeg,GIF,PNG,BMP,JPG,JPEG,swf,SWF";
	$mang_th_hl=explode(",",$chuoi_ten_hinh_hop_le);
	$hinh_hop_le="khong";
	if($ten_hinh!="")
	{
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
			if($tv_2[0]==0)
			{
				$duong_dan_upload="../hinhanh_flash/quangcao/".$ten_hinh;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_upload);
				$noi_dung=thay_the_fckeditor($_POST['noidung']);
				$chuoi="INSERT INTO `quangcao` ( `id` , `vitri_quangcao` , `cao` ,`rong`, `ten_file`,`link`)
					VALUES (
					NULL , 'phai', '$_POST[cao]','$_POST[rong]', '$ten_hinh','$_POST[lien_ket]'
					);";
				mysql_query($chuoi);
			}
			else
			{
				thongbao("Tên file đã bị trùng\\nBạn hãy đổi tên file");
			}
		}
		else
		{
			thongbao("Đuôi hình upload không hợp lệ\\nCác đuôi file hợp lệ là : $chuoi_ten_hinh_hop_le");
		}
	}
	else
	{
		thongbao("Bạn phải upload cả hình ảnh / flash");
	}
?>