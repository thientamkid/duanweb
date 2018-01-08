<?php
	chong_pha_hoai();
	$tv="select * from lien_he where id='1'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<?php
	if($_POST['ho_ten']!="" and $_POST['noi_dung']!="")
	{
		$_POST['noi_dung']=nl2br($_POST['noi_dung']);
		$tinnhan="
		Họ tên : $_POST[ho_ten]<br>
		Email : $_POST[email]<br>
		Địa chỉ : $_POST[dia_chi]<br>
		Điện thoại : $_POST[dien_thoai]<br>

		<center><h1 style=\"color:red\">Nội dung</h1></center>
		$_POST[noi_dung]
		";
		$to      = $tv_2['gia_tri'];// lay ten email lien he
		$subject = 'Khách hàng gửi mail';
		$message = $tinnhan;
		$headers = 'Content-type: text/html;charset=utf-8';

		mail($to, $subject, $message, $headers);
		//thongbao($to);
		//echo $tinnhan;
		//thongbao("dung lai");
		thongbao("Cám ơn bạn đã gửi liên hệ đến với chúng tôi");
	}
	else
	{
		thongbao("Không được bỏ trống họ tên , nội dung");
	}
?>