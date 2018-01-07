<?php
	chong_pha_hoai();
	//thongbao("vao day");
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	if($_POST['tieu_de']!="")
	{
		$ten_hinh=$_FILES['hinh_anh']['name'];
		$mang_vvv=explode(".",$ten_hinh);
		$duoi_hinh=$mang_vvv[count($mang_vvv)-1];
		$chuoi_ten_hinh_hop_le="gif,png,bmp,jpg,jpeg,GIF,PNG,BMP,JPG,JPEG";
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
				$tv="select count(*) from tin_tuc where hinh_anh='$ten_hinh'";
				$tv_1=mysql_query($tv);
				$tv_2=mysql_fetch_row($tv_1);
				if($tv_2[0]==0)
				{
					$duong_dan_upload="../hinhanh_flash/tin_tuc/".$ten_hinh;
					move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_upload);
					$noi_dung=thay_the_fckeditor($_POST['noidung']);
					$chuoi="INSERT INTO `tin_tuc` ( `id` , `ten` , `noi_dung` , `hinh_anh`)
						VALUES (
						NULL , '$_POST[tieu_de]', '$noi_dung', '$ten_hinh'
						);";
					mysql_query($chuoi);
				}
				else
				{
					thongbao("Tên hình đã bị trùng\\nBạn hãy đổi tên hình");
				}
			}
			else
			{
				thongbao("Đuôi hình upload không hợp lệ\\nCác đuôi file hợp lệ là : $chuoi_ten_hinh_hop_le");
			}
		}
		else
		{
			thongbao("Bạn phải upload cả hình ảnh");
		}
	}
	else
	{
		thongbao("Không được bỏ trống tiêu đề");
	}
?>