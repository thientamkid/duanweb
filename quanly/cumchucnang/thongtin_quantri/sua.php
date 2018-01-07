<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from thongtin_quantri where id='1'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$dia_chi=str_replace("<br />","",$tv_2['dia_chi']);
?>
<center>
	<form action="" method="post">
		<table id="er" width="968px" style="text-align:left;margin-top:6px">
			<tr>
				<td>
					Sữa thông tin admin
				</td>
			</tr>
			<tr>
				<td>
					<table id="er_1" style="margin:6px 6px 6px 6px" width="600px">
						<tr>
							<td width="120px"><b>Ký danh :</b></td>
							<td><input style="width:300px" name="ky_danh" value="<?php echo $tv_2['ky_danh'];?>"></td>
						</tr>
						<tr>
							<td><b>Mật khẩu :</b></td>
							<td><input  style="width:300px" name="mat_khau" value="<?php echo $tv_2['mat_khau'];?>" type="password"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_thong_tin_admin" value="sua_thong_tin_admin">
								<input type="image" src="../hinhanh_flash/dungchung/sua.gif">
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</form>
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>