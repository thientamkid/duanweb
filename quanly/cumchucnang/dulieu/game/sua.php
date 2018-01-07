<?php
	chong_pha_hoai();
	//echo "sua <hr>";
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
<?php
	$tv="select * from game where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$rong=$tv_2['rong'];
	$cao=$tv_2['cao'];
	$link="../hinhanh_flash/flash_game/$tv_2[file_flash]";
	//$noi_dung=str_replace("\d","",$noi_dung);
	//echo $noi_dung;echo"<hr>";
?>
<center>
	<table style="width:968px;text-align:left;margin-top:6px" id="er">
		<tr>
			<td>
				Sữa game
				<?php
					switch($_GET['ts'])
					{
						case"abc":
						break;
						case"index":
							$link_dong="index.php";
						break;
						default:
							$link_dong="?thamso=quan_ly_game&tu_khoa=$_GET[tu_khoa]&trang=$_GET[trang]";
					}
				?>
				<a href="<?php echo $link_dong; ?>" style="display:inline-block;margin-left:840px;color:#0b55c4;outline:0" hidefocus="true">Đóng</a>
			</td>
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
								<input style="width:400px" name="tieu_de" value="<?php echo $tv_2['ten']; ?>">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Hình ảnh :</b>
							</td>
							<td>
								<input type="file" name="hinh_anh">
								<br>
								<input type="hidden" name="hinh_anh_hidden" value="<?php echo $tv_2['hinh_anh'];?>">
								<img src="../hinhanh_flash/game/<?php echo $tv_2['hinh_anh'];?>" width="130px" height="100px" style="margin:6px 6px 6px 6px">

							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Loại :</b>
							</td>
							<td>
								<?php
									if($tv_2['loai']=="link_flash")
									{
										$b="selected";
									}
									if($tv_2['loai']=="object_flash")
									{
										$c="selected";
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

								<input type="hidden" name="flash_hidden" value="<?php echo $tv_2['file_flash'];?>">
								<?php
									if($tv_2['loai']=="upload")
									{
										echo "<br>";
										?>
											<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="<?php echo $rong; ?>" height="<?php echo $cao; ?>">
												<param name="movie" value="<?php echo $link; ?>">
												<param name="quality" value="high">
												<param name="menu" value="true">
												<param name="wmode" value="transparent" />
												<embed wmode="transparent" width="<?php echo $rong; ?>" height="<?php echo $cao; ?>" src="<?php echo $link; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
											</object>
										<?php
									}
								?>
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Link flash :</b>
							</td>
							<td>
								<input style="width:400px" name="link_flash" value="<?php echo $tv_2['link_flash'];?>">
								<?php
									if($tv_2['loai']=="link_flash")
									{
										echo "<br>";
										?>
											<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="<?php echo $rong; ?>" height="<?php echo $cao; ?>">
												<param name="movie" value="<?php echo $tv_2['link_flash']; ?>">
												<param name="quality" value="high">
												<param name="menu" value="true">
												<param name="wmode" value="transparent" />
												<embed wmode="transparent" width="<?php echo $rong; ?>" height="<?php echo $cao; ?>" src="<?php echo $tv_2['link_flash']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
											</object>
										<?php
									}
								?>
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Object flash :</b>
							</td>
							<td>
								<textarea style="width:400px;height:65px;border:1px solid #cccccc" name="object_flash"><?php echo $tv_2['object_flash'];?></textarea>
								<br>
								<span style="font-size:12px">Nhúng code từ web khác</span>
								<?php
									if($tv_2['loai']=="object_flash")
									{
										echo "<br>";
										echo $tv_2['object_flash'];
									}
								?>
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Rộng :</b>
							</td>
							<td>
								<input style="width:400px" name="rong" value="<?php echo $tv_2['rong']; ?>">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Cao :</b>
							</td>
							<td>
								<input style="width:400px" name="cao" value="<?php echo $tv_2['cao']; ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<input type="hidden" name="sua_game" value="sua_game">
									<div style="width:220px;height:35px;margin:6px 0px 6px 0px;overflow:hidden">
										<input type="image" src="../hinhanh_flash/dungchung/sua_du_lieu.gif" style="border:0px solid red">
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