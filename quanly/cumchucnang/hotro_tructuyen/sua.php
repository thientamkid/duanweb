<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from hotro_tructuyen where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$dia_chi=str_replace("<br />","",$tv_2['dia_chi']);
?>
<center>
	<form action="" method="post">
		<table id="er" width="968px" style="text-align:left;margin-top:6px">
			<tr>
				<td>
					Sữa nick yahoo
					<a href="?thamso=quan_ly_ho_tro_truc_tuyen&trang=<?php echo $_GET['trang']; ?>" style="display:inline-block;margin-left:815px;color:#0b55c4;outline:0" hidefocus="true">Đóng</a>
				</td>
			</tr>
			<tr>
				<td>
					<table id="er_1" style="margin:6px 6px 6px 6px" width="600px">
						<tr>
							<td width="120px"><b>Tên nick :</b></td>
							<td><input style="width:300px" name="nick_yahoo" value="<?php echo $tv_2['ten_nick'];?>"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="sua_nick_yahoo" value="sua_nick_yahoo">
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