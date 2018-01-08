<?php
	chong_pha_hoai();
?>
<style>
	table.ghk input
	{
		width:300px
	}
	table.ghk textarea
	{
		height:75px;
		width:400px;
		margin-bottom:-1px
	}
</style>
<div class="div_ge_td">
	<a href="#">Lấy lại mật khẩu</a>
</div>
<div class="div_ge_nd">
	<form action="" method="post">
		<table class="ghk">
			<tr>
				<td width="120px" align="right"><b>Ký danh của bạn : </b></td>
				<td><input name="ky_danh"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="lay_lai_mat_khau" value="lay_lai_mat_khau">
					<input type="image" src="hinhanh_flash/dungchung/gui.gif" style="width:60px;height:20px;border:0px solid red">
				</td>
			</tr>
		</table>
	</form>
</div>