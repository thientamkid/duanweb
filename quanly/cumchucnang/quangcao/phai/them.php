<?php
	chong_pha_hoai();
?>
<?php
	function kiem_tra_menu_con($id)
	{
		$tv="select count(*) from menu where thuoc_menu='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]!=0)
		{
			return "co";
		}
		else
		{
			return "khong";
		}
	}
	function hop_option_de_quy($id,$so,$ten_danh_dau)
	{
		$so++;
		$kt="";
		for($i=1;$i<=$so;$i++)
		{
			$kt=$kt."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='$id' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			if($tv_2['id']==$_SESSION[$ten_danh_dau."cap_do"]){$selected="selected";}else{$selected="";}
			echo "<option value=\"$tv_2[id]\" $selected>";
				echo $kt;
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],$so,$ten_danh_dau);
			}
		}
	}
	function hop_option($ten_danh_dau)
	{
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='' order by id";
		$tv_1=mysql_query($tv);
		echo "<select name=\"cap_do\">";
		while($tv_2=mysql_fetch_array($tv_1))
		{
			if($tv_2['id']==$_SESSION[$ten_danh_dau."cap_do"]){$selected="selected";}else{$selected="";}
			echo "<option value=\"$tv_2[id]\" $selected>";
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],0,$ten_danh_dau);
			}
		}
		echo "</select>";
	}
?>
<center>
	<table style="width:968px;text-align:left;margin-top:6px" id="er">
		<tr>
			<td>Thêm quãng cáo bên phải</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post" enctype="multipart/form-data">
					<table style="margin:6px 6px 6px 6px;width:954px" id="er_1">
						<tr>
							<td width="120px">
								<b>Liên kết :</b>
							</td>
							<td>
								<input style="width:400px" name="lien_ket">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Hình ảnh / Flash :</b>
							</td>
							<td>
								<input type="file" name="hinh_anh">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Rộng :</b>
							</td>
							<td>
								<input style="width:400px" name="rong">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Cao :</b>
							</td>
							<td>
								<input style="width:400px" name="cao">
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td colspan="">
								<input type="hidden" name="them_quang_cao_phai" value="them_quang_cao_phai">
								<div style="width:220px;height:35px;margin:6px 6px 6px 6px;overflow:hidden">
									<input type="image" src="../hinhanh_flash/dungchung/them_du_lieu.gif" style="border:0px solid red">
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