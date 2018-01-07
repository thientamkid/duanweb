<?php
	chong_pha_hoai();
	//echo "chao <hr>";
?>
<center>
	<table width="968px" id="er" style="margin-top:6px;text-align:left">
		<tr>
			<td>
				Thêm menu ngang
			</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post">
					<table width="500px" id="er_1" style="margin:6px 6px 6px 6px;">
						<tr>
							<td><b>Tên menu :</b></td>
							<td><input size="40" name="ten"></td>
						</tr>
						<tr>
							<td><b>Liên kết :</b></td>
							<td><input size="40" name="lien_ket"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="them_menu_ngang" value="them_menu_ngang">
								<input type="image" src="../hinhanh_flash/dungchung/them.gif" style="border:0px solid red;_margin-bottom:-4px">
							</td>
						</tr>
					</table>
				</form>
				<style type="text/css">
					a.ah { text-decoration: none;  color: #666666; font-weight: bold}
					a.ah:hover { text-decoration: none; color:#a70001; font-weight: bold; font-style: normal; }

				</style>
				<br>
				<div style="margin-left:6px;font-size:14px;text-align:left">
					<b style="color:black">Xem thêm</b> : <a href="?thamso=mot_so_menu_ngang_duoc_ho_tro" target="_blank" class="ah">Một số menu ngang được hỗ trợ</a>

				</div>
				<br>

			</td>
		</tr>
	</table>
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>