<?php
	chong_pha_hoai();
	$tv="select * from lien_he where id='2'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
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
	<a href="#">Liên hệ</a>
</div>
<div class="div_ge_nd">
	<?php
		echo $tv_2['gia_tri'];
		echo "<br>";
	?>
	<form action="" method="post">
		<table class="ghk">
			<tr>
				<td width="120px" align="right"><b>Họ và tên : </b></td>
				<td><input name="ho_ten"></td>
			</tr>
			<tr>
				<td align="right"><b>Địa chỉ :</b></td>
				<td><input name="dia_chi"></td>
			</tr>
			<tr>
				<td align="right"><b>Hòm thư :</b></td>
				<td><input name="email"></td>
			</tr>
			<tr>
				<td align="right"><b>Điện thoại :</b></td>
				<td><input name="dien_thoai"></td>
			</tr>
			<tr>
				<td align="right"><b>Nội dung :</b></td>
				<td><textarea name="noi_dung"></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<input type="hidden" name="gui_lien_he__abc" value="gui_lien_he__abc">
					<input type="image" src="hinhanh_flash/dungchung/gui_lien_he.gif" style="border:0px solid red;width:120px;height:20px;_margin-bottom:-3px">
				</td>
			</tr>
		</table>
	</form>
</div>