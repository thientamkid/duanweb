<?php
	chong_pha_hoai();
	$tv="select * from thanh_vien where ky_danh='$_POST[ky_danh]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	if($_POST['ky_danh']!="")
	{
		if(mysql_num_rows($tv_1)!=0)
		{
			$tinnhan="
				<b>Mật khẩu của bạn :</b> $tv_2[mat_khau]
			";
			$to      = $tv_2['email'];// lay ten email
			$subject = 'Lấy lại mật khẩu';
			$message = $tinnhan;
			$headers = 'Content-type: text/html;charset=utf-8';
			mail($to, $subject, $message, $headers);
			//echo $tinnhan;
			//thongbao("dung lai");
			thongbao("Đã gửi mật khẩu vào email của bạn");
		}
		else
		{
			thongbao("Không có ký danh này , mời bạn nhập lại");
		}
	}
	else
	{
		thongbao("Không được bỏ trống ký danh");
	}
?>
<?php

?>