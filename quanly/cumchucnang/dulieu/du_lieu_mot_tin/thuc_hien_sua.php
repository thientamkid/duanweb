<?php
	chong_pha_hoai();
?>
<?php
	//$_SESSION[$ten_danh_dau."cap_do"]=$_POST['cap_do'];
	if($_POST['tieu_de']!="" and $_POST['ten_menu']!="")
	{
		$noi_dung=thay_the_fckeditor($_POST['noidung']);
		$chuoi="UPDATE `du_lieu_mot_tin` SET `ten` = '$_POST[tieu_de]',
			`noi_dung` = '$noi_dung',`ten_menu`='$_POST[ten_menu]'
				WHERE `du_lieu_mot_tin`.`id` ='$_GET[id]' LIMIT 1 ;";
				//thongbao($chuoi);
				//echo $chuoi."<hr>";exit();
		mysql_query($chuoi);



	}
	else
	{
		thongbao("Không được bỏ trống tên menu và tiêu đề");
	}
?>