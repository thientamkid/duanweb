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
<?php
	$tv="select * from san_pham where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$noi_dung=thay_the_fckeditor($tv_2['noi_dung']);
	$noi_dung=str_replace('"','\"',$noi_dung);
	$noi_dung=str_replace("\n","",$noi_dung);
	$noi_dung=str_replace("\r","",$noi_dung);
	$noi_dung=str_replace("\t","",$noi_dung);
	//$noi_dung=str_replace("\d","",$noi_dung);
	//echo $noi_dung;echo"<hr>";
?>
<center>
	<table style="width:968px;text-align:left;margin-top:6px" id="er">
		<tr>
			<td>
				Sữa dữ liệu
				<?php
					switch($_GET['ts'])
					{
						case"abc":
						break;
						case"sanpham_trangchu":
							$link_dong="?thamso=sanpham_trangchu&trang=$_GET[trang]";
						break;
						case"index":
							$link_dong="index.php";
						break;
						default:
							$link_dong="?thamso=quan_ly_san_pham&id=$_GET[id_menu]&tu_khoa=$_GET[tu_khoa]&trang=$_GET[trang]";
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
								<img src="../hinhanh_flash/san_pham/<?php echo $tv_2['hinh_anh'];?>" width="150px" height="170px" style="margin:6px 6px 6px 6px">

							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Giá bán :</b>
							</td>
							<td>
								<input style="width:400px" name="gia_ban" value="<?php echo $tv_2['gia']; ?>">
							</td>
						</tr>
						<tr>
							<td width="120px">
								<b>Trang chủ :</b>
							</td>
							<td>
								<?php
									if($tv_2['trang_chu']=="co")
									{
										$sl="selected";
									}
								?>
								<select name="trang_chu">
									<option value="">Không</option>
									<option value="co" <?php echo $sl; ?>>Có</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<b style="color:red">Nội dung</b>
									<script type="text/javascript">
										var oFCKeditor = new FCKeditor('noidung');
										oFCKeditor.BasePath = "fckeditor/";
										oFCKeditor.Width	= 930 ;
										oFCKeditor.Height	= 400 ;
										oFCKeditor.Value="<?php echo $noi_dung; ?>";
										oFCKeditor.Config["EnterMode"]		= "br" ;
										oFCKeditor.Create();
										document.getElementById('xEnter').value = "br" ;
										//document.getElementById("noidung").value=jljl;
									</script>
								</center>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<center>
									<input type="hidden" name="sua_san_pham" value="sua_san_pham">
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