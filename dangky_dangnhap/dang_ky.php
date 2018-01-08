<?php
	chong_pha_hoai();
?>
<style>
table.i79
{
	border-collapse: collapse;
	border:0px solid #999999;
	margin:0px 0px 5px 0px;
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
	height:75px
}
</style>
<div class="div_ge_td">
	<a href="#">Đăng ký thành viên</a>
</div>
<div class="div_ge_nd">
	<center>
		<?php
			if($xacdinh_dangnhap!="co")
			{
		?>
				<form action="" method="post">
					<table class="i79">
						<tr>
							<td width="120px" align="right"><b>Ký danh :</b></td>
							<td><input name="ho_ten"></td>
						</tr>
						<tr>
							<td align="right"><b>Mật khẩu :</b></td>
							<td><input name="mat_khau" type="password"></td>
						</tr>
						<tr>
							<td align="right"><b>Email :</b></td>
							<td><input name="email"></td>
						</tr>
						<tr>
							<td align="right"><b>Điện thoại :</b></td>
							<td><input name="dien_thoai"></td>
						</tr>
						<tr>
							<td align="right"><b>Địa chỉ :</b></td>
							<td>
								<textarea name="dia_chi"></textarea>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="dang_ky_thanh_vien" value="dang_ky_thanh_vien">
								<input type="image" style="width:80px;border:0px solid red" src="hinhanh_flash/dungchung/dang_ky.gif">
							</td>
						</tr>
					</table>
				</form>
		<?php
			}
			else
			{
				echo "<div style='width:625px;text-align:left'>Bạn đã đăng nhập</div>";
			}
		?>
	</center>
</div>