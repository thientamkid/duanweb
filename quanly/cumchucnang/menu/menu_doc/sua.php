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
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_menu_doc" value="sua_menu_doc">
								<div style="height:20px;overflow:hidden">
									<input type="image" src="../hinhanh_flash/dungchung/sua.gif" style="border:0px solid red;">
									<a href="?thamso=quan_ly_menu_doc&trang=<?php echo $_GET['trang']; ?>">
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
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>