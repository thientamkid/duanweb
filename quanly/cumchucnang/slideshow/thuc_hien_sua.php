<?php
	chong_pha_hoai();
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	if($_POST['tieu_de']!="")
	{
		$a_ten_hinh=$_FILES['hinh_anh']['name'];
		$a_ten_hinh_1=$_FILES['hinh_anh_1']['name'];
		$ten_hinh=$_FILES['hinh_anh']['name'];
		$ten_hinh_1=$_FILES['hinh_anh_1']['name'];
		if($ten_hinh=="")
		{
			$ten_hinh=$_POST['hinh_anh_hidden'];
			$ten_hinh_khong_trung="co";
		}
		if($ten_hinh_1=="")
		{
			$ten_hinh_1=$_POST['hinh_anh_hidden_1'];
			$ten_hinh_khong_trung_1="co";
		}
		//echo $ten_hinh."<hr>";
		//echo $ten_hinh_1."<hr>";
		$mang_vvv=explode(".",$ten_hinh);
		$mang_vvv_1=explode(".",$ten_hinh_1);
		$duoi_hinh=$mang_vvv[count($mang_vvv)-1];
		$duoi_hinh_1=$mang_vvv_1[count($mang_vvv_1)-1];
		$chuoi_ten_hinh_hop_le="gif,png,bmp,jpg,jpeg,GIF,PNG,BMP,JPG,JPEG";
		$mang_th_hl=explode(",",$chuoi_ten_hinh_hop_le);
		$hinh_hop_le="khong";
		$hinh_hop_le_1="khong";

		for($r=0;$r<count($mang_th_hl);$r++)
		{
			if($duoi_hinh==$mang_th_hl[$r])
			{
				$hinh_hop_le="co";
				break;
			}
		}
		for($r=0;$r<count($mang_th_hl);$r++)
		{
			if($duoi_hinh_1==$mang_th_hl[$r])
			{
				$hinh_hop_le_1="co";
				break;
			}
		}
		//echo $hinh_hop_le."<hr>";
		//echo $hinh_hop_le_1."<hr>";
		if($hinh_hop_le=="co" and $hinh_hop_le_1=="co")
		{
			$tv="select count(*) from slideshow where anh_nho='$a_ten_hinh'";
			$tv_1=mysql_query($tv);
			$tv_2=mysql_fetch_row($tv_1);
			$a_tv="select count(*) from slideshow where anh_lon='$a_ten_hinh_1'";
			$a_tv_1=mysql_query($a_tv);
			$a_tv_2=mysql_fetch_row($a_tv_1);
			if(($tv_2[0]==0 and $a_tv_2[0]==0) or ($ten_hinh_khong_trung=="co" and $ten_hinh_khong_trung_1=="co"))
			{
				$duong_dan_upload="../hinhanh_flash/slideshow/anh_nho/".$ten_hinh;
				move_uploaded_file($_FILES['hinh_anh']['tmp_name'],$duong_dan_upload);
				$duong_dan_upload_1="../hinhanh_flash/slideshow/".$ten_hinh_1;
				move_uploaded_file($_FILES['hinh_anh_1']['tmp_name'],$duong_dan_upload_1);
				//$noi_dung=thay_the_fckeditor($_POST['noidung']);

				$chuoi="UPDATE `slideshow` SET `ten` = '$_POST[tieu_de]',
					`mo_ta_ngan` = '$_POST[mo_ta_ngan]',
					`lien_ket` = '$_POST[lien_ket]',
					`anh_nho` = '$ten_hinh',
					`anh_lon` = '$ten_hinh_1'
 						WHERE `slideshow`.`id` ='$_GET[id]' LIMIT 1 ;";
 						//thongbao($chuoi);
 						//echo $chuoi."<hr>";exit();
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
		thongbao("Không được bỏ trống tiêu đề");
	}
?>