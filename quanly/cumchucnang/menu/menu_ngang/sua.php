<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from menu where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<center>
	<table width="968px" id="er" style="margin-top:6px;text-align:left">
		<tr>
			<td>
				Sữa menu dọc
			</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post">
					<table width="500px" id="er_1" style="margin:6px 6px 6px 6px;">
						<tr>
							<td><b>Tên menu :</b></td>
							<td><input size="40" name="ten" value="<?php echo $tv_2['ten'];?>"></td>
						</tr>
						<tr>
							<td><b>Liên kết :</b></td>
							<td><input size="40" name="lien_ket" value="<?php echo $tv_2['lien_ket'];?>"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_menu_ngang" value="sua_menu_ngang">
								<div style="height:20px;overflow:hidden">
									<input type="image" src="../hinhanh_flash/dungchung/sua.gif" style="border:0px solid red;">
									<a href="?thamso=quan_ly_menu_ngang&trang=<?php echo $_GET['trang']; ?>">
										<img src="../hinhanh_flash/dungchung/lui_ve.gif" style="border:0px solid red;margin-left:30px">
									</a>
								</div>
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
	<style type="text/css">
		a.ah { text-decoration: none;  color: #666666; font-weight: bold}
		a.ah:hover { text-decoration: none; color:#a70001; font-weight: bold; font-style: normal; }

	</style>
	<br>
	<div style="margin-left:6px;font-size:14px;text-align:left">
		<b style="color:black">Xem thêm</b> : <a href="?thamso=mot_so_menu_ngang_duoc_ho_tro" target="_blank" class="ah">Một số menu ngang được hỗ trợ</a>

	</div>
	<br>
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>