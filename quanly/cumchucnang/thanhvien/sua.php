<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from thanh_vien where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$dia_chi=str_replace("<br />","",$tv_2['dia_chi']);
?>
<center>
	<form action="" method="post">
		<table id="er" width="968px" style="text-align:left;margin-top:6px">
			<tr>
				<td>
					Sữa thành viên
					<a href="?thamso=quanly_thanhvien&tu_khoa=<?php echo $_GET['tu_khoa']; ?>&trang=<?php echo $_GET['trang']; ?>" style="display:inline-block;margin-left:815px;color:#0b55c4;outline:0" hidefocus="true">Đóng</a>
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
							<td><input  style="width:300px" name="mat_khau" value="<?php echo $tv_2['mat_khau'];?>"></td>
						</tr>
						<tr>
							<td><b>Email :</b></td>
							<td><input style="width:300px" name="email" value="<?php echo $tv_2['email'];?>"></td>
						</tr>
						<tr>
							<td><b>Điện thoại :</b></td>
							<td><input style="width:300px" name="dien_thoai" value="<?php echo $tv_2['dien_thoai'];?>"></td>
						</tr>
						<tr>
							<td><b>Địa chỉ :</b></td>
							<td>
								<textarea style="width:400px;height:65px" name="dia_chi"><?php echo $dia_chi;?></textarea>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_thanh_vien" value="sua_thanh_vien">
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