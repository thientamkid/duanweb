<?php
	chong_pha_hoai();
	$kd=$_SESSION[$ten_danh_dau.'ky_danh__abc'];
	//echo $kd."<hr>";
	$tv="select * from thanh_vien where ky_danh='$kd'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$dia_chi=str_replace("<br />","",$tv_2['dia_chi']);
?>
<style>
table.i79
{
	border-collapse: collapse;
	border:0px solid #999999;
	text-align:left;
	width:618px;
}
table.i79 td
{
	border:0px solid #999999;
}
table.i79 input
{
	width:300px;
}
table.i79 textarea
{
	width:400px;
	height:75px;
	margin-bottom:-1px
}
</style>
<div class="div_ge_td">
	<a href="#">Sữa thông tin cá nhân</a>
</div>
<div class="div_ge_nd">
	<?php
		if($xacdinh_dangnhap=="co")
		{
	?>
			<center>
				<form action="" method="post">
					<table class="i79">
						<tr>
							<td align="right"><b>Mật khẩu :</b></td>
							<td><input name="mat_khau" type="password" value="<?php echo $tv_2['mat_khau']; ?>"></td>
						</tr>
						<tr>
							<td align="right"><b>Email :</b></td>
							<td><input name="email" value="<?php echo $tv_2['email']; ?>"></td>
						</tr>
						<tr>
							<td align="right"><b>Điện thoại :</b></td>
							<td><input name="dien_thoai" value="<?php echo $tv_2['dien_thoai']; ?>"></td>
						</tr>
						<tr>
							<td align="right"><b>Địa chỉ :</b></td>
							<td>
								<textarea name="dia_chi"><?php echo $dia_chi; ?></textarea>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_thanh_vien" value="sua_thanh_vien">
								<input type="image" src="hinhanh_flash/dungchung/thay_doi.gif" style="width:100px;height:20px;border:0px solid red;margin:2px 0px 2px 0px;_margin:2px 0px -1px 0px">
							</td>
						</tr>
					</table>
				</form>
			</center>
	<?php
		}
		else
		{
			echo "Bạn chưa đăng nhập";
		}
	?>
</div>