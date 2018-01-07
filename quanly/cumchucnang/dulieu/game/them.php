<?php
	chong_pha_hoai();
	//echo "them <hr>";
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
			<td>Thêm game</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post" enctype="multipart/form-data">
					<table style="margin:6px 6px 6px 6px;width:954px" id="er_1">
						<tr>
							<td width="120px">
								<b>Tiêu đề :</b>
							</td>
							<td>
								<input style="width:400px" name="tieu_de">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Hình ảnh :</b>
							</td>
							<td>
								<input type="file" name="hinh_anh">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Loại :</b>
							</td>
							<td>
								<?php
									if(!isset($_SESSION[$ten_danh_dau."__loai_swf"]))
									{
									}
									else
									{
										if($_SESSION[$ten_danh_dau."__loai_swf"]=="link_flash")
										{
											$b="selected";
										}
										if($_SESSION[$ten_danh_dau."__loai_swf"]=="object_flash")
										{
											$c="selected";
										}
									}
								?>
								<select name="loai_swf">
									<option value="upload" <?php echo $a; ?>>Upload</option>
									<option value="link_flash" <?php echo $b; ?>>Link flash</option>
									<option value="object_flash" <?php echo $c; ?>>Object flash</option>
								</select>
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Flash :</b>
							</td>
							<td>
								<input type="file" name="flash">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Link flash :</b>
							</td>
							<td>
								<input style="width:400px" name="link_flash">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Object flash :</b>
							</td>
							<td>
								<textarea style="width:400px;height:65px;border:1px solid #cccccc" name="object_flash"></textarea>
								<br>
								<span style="font-size:12px">Nhúng code từ web khác</span>
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Rộng :</b>
							</td>
							<td>
								<input style="width:400px" name="rong" value="300px">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Cao :</b>
							</td>
							<td>
								<input style="width:400px" name="cao" value="200px">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<input type="hidden" name="them_game" value="them_game">
									<div style="width:220px;height:35px;margin:6px 0px 6px 0px;overflow:hidden">
										<input type="image" src="../hinhanh_flash/dungchung/them_du_lieu.gif" style="border:0px solid red">
									</div>
								</center>
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