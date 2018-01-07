<?php
	chong_pha_hoai();
	//thongbao("vao day");
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	$_SESSION[$ten_danh_dau."__loai_swf"]=$_POST['loai_swf'];
	if($_POST['tieu_de']!="")
	{
		$ten_hinh=$_FILES['hinh_anh']['name'];
		$ten_file_flash=$_FILES['flash']['name'];
		if(ereg(".php",$ten_hinh))
		{
			thongbao("Hình upload lên không được có ký tự '.php'\\nHãy đổi tên hình");
			trangtruoc();
			exit();
		}
		if(ereg("#",$ten_hinh))
		{
			thongbao("Hình upload lên không được có ký tự '#'\\nHãy đổi tên hình");
			trangtruoc();
			exit();
		}
		if(ereg("?",$ten_hinh))
		{
			thongbao("Hình upload lên không được có ký tự '?'\\nHãy đổi tên hình");
			trangtruoc();
			exit();
		}
		if(ereg(".php",$ten_file_flash))
		{
			thongbao("Flash upload lên không được có ký tự '.php'\\nHãy đổi tên flash");
			trangtruoc();
			exit();
		}
		if(ereg("#",$ten_file_flash))
		{
			thongbao("Flash upload lên không được có ký tự '#'\\nHãy đổi tên flash");
			trangtruoc();
			exit();
		}
		if(ereg("?",$ten_file_flash))
		{
			thongbao("Flash upload lên không được có ký tự '?'\\nHãy đổi tên flash");
			trangtruoc();
			exit();
		}
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
				$tv="select count(*) from game where hinh_anh='$ten_hinh'";
				$tv_1=mysql_query($tv);
				$tv_2=mysql_fetch_row($tv_1);
				if($tv_2[0]==0)
				{
					if($ten_file_flash!="")
					{
						$m_fff=explode(".",$ten_file_flash);
						$duoi_flash=$m_fff[count($m_fff)-1];
						if($duoi_flash!="swf")
						{
							thongbao("Đuôi file flash không hợp lệ , đuôi hợp lệ là 'swf'\\nHãy đổi đuôi file flash");
							trangtruoc();
							exit();
						}
						$a_tv="select count(*) from game where file_flash='$ten_file_flash'";
						$a_tv_1=mysql_query($a_tv);
						$a_tv_2=mysql_fetch_row($a_tv_1);
						if($a_tv_2[0]!=0)
						{
							thongbao("Tên file flash đã bị trùng\\nBạn hãy đổi tên file flash");
							trangtruoc();
							exit();
						}
					}
					$duong_dan_upload="../hinhanh_flash/game/".$ten_hinh;
					move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_upload);
					$duong_dan_upload_flash="../hinhanh_flash/flash_game/".$ten_file_flash;
					move_uploaded_file($_FILES['flash']['tmp_name'],$duong_dan_upload_flash);
					//$noi_dung=thay_the_fckeditor($_POST['noidung']);
					$chuoi="INSERT INTO `game` ( `id` , `ten` ,`hinh_anh`,`file_flash`,`link_flash`,`object_flash`,`rong`,`cao`,`loai`)
						VALUES (
						NULL , '$_POST[tieu_de]', '$ten_hinh','$ten_file_flash','$_POST[link_flash]','$_POST[object_flash]','$_POST[rong]','$_POST[cao]','$_POST[loai_swf]'
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