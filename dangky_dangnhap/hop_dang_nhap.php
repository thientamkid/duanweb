<?php
	chong_pha_hoai();
?>
<div class="khung_abc__td">
	<span>Đăng nhập</span>
</div>
<div class="khung_abc__nd">
	<div class="cao_3_px"></div>
	<?php
		if($xacdinh_dangnhap!="co")
		{
	?>
			<form action="" method="post">
				<center>
					<input style="width:130px;" value="Tên đăng nhập" name="ky_danh" onfocus="if (this.value=='Tên đăng nhập'){this.value=''};this.style.backgroundColor='#fffde8';" onblur="this.style.backgroundColor='#ffffff';">
					<div class="cao_3_px"></div>
					<input type="password" style="width:130px;" value="matkhau" name="mat_khau" onfocus="if (this.value=='matkhau'){this.value=''};this.style.backgroundColor='#fffde8';" onblur="this.style.backgroundColor='#ffffff';">
					<div class="cao_3_px"></div>
				</center>
				<div style="margin-left:18px">
					<input type="hidden" name="thuchien_dangnhap__bcd" value="thuchien_dangnhap__bcd">
					<input type="image" src="hinhanh_flash/dungchung/dang_nhap.jpg" style="border:0px solid red">
					<br>
					<a href="?thamso=dang_ky" class="link_1">Đăng ký</a>
					<br>
					<a href="?thamso=quen_mat_khau" class="link_1">Quên mật khẩu</a>
				</div>
			</form>
	<?php
		}
		else
		{
			//echo "da dang nhap";
			?>
			<style>
				div.gnm_18
				{
					margin-left:10px;
					color:red;
				}
				div.gnm_18 span
				{
					color:blue;
					font-weight:bold;
					font-size:18px
				}
				div.gnm_18 a
				{
					color:red
				}
				div.gnm_18 a:hover
				{
					text-decoration: underline;
				}
			</style>
			<div class="gnm_18">
				Chào <span><?php echo $_SESSION[$ten_danh_dau.'ky_danh__abc'];?></span><br>
				<div class="cao_3_px"></div>
				<a href="?thamso=sua_thong_tin_ca_nhan">Sữa thông tin cá nhân</a><br>
				<a href="?thamso=thoat">Thoát</a><br>
			</div>
			<?php
		}
	?>
	<div class="cao_3_px"></div>
</div>