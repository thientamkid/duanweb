<?php
	chong_pha_hoai();
?>
<?php
	function xacdinh_menu_con_option($id)
	{
		$tv="select count(*) from menu where thuoc_menu='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]!=0){return "co";}else{return "khong";}
	}
	function dequy_menu_option($id,$so)
	{
		$so++;
		$c="";
		for($i=1;$i<=$so;$i++)
		{
			$c=$c."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$tv="select * from menu where thuoc_menu='$id' and vitri_menu='doc' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$id=$tv_2['id'];
			if($id==$_GET['menu'])
			{
				$selected="selected";
			}
			else
			{
				$selected="";
			}
			echo "<option value=\"$id\" $selected>";
				echo $c;
				echo $tv_2['ten'];
				$xacdinh_menu_con_option=xacdinh_menu_con_option($id);
				if($xacdinh_menu_con_option=="co")
				{
					dequy_menu_option($id,$so);
				}
				else
				{
				}
			echo "</option>";
		}
	}
?>
<div class="khung_abc__td">
	<span>Tìm kiếm</span>
</div>
<div class="khung_abc__nd">
	<center>
		<form action="" method="get">
			<input type="hidden" name="thamso" value="tim_kiem">
			<div class="cao_3_px"></div>
			<?php
				if($_GET['tu_khoa']=="")
				{
					$tk="Từ khóa tìm kiếm";
				}
				else
				{
					$tk=$_GET['tu_khoa'];
				}
			?>
			<input style="width:130px;" value="<?php echo $tk; ?>" name="tu_khoa" onfocus="if (this.value=='<?php echo $tk; ?>'){this.value=''};this.style.backgroundColor='#fffde8';" onblur="this.style.backgroundColor='#ffffff';">
			<div class="cao_3_px"></div>
			<select style="width:132px;background:#ececec" name="menu">
				<option value="">Tìm toàn bộ menu</option>
				<?php
					$tv="select * from menu where thuoc_menu='' and vitri_menu='doc' order by id";
					$tv_1=mysql_query($tv);
					while($tv_2=mysql_fetch_array($tv_1))
					{
						$id=$tv_2['id'];
						if($id==$_GET['menu'])
						{
							$selected="selected";
						}
						else
						{
							$selected="";
						}
						echo "<option value=\"$id\" $selected>";
							echo $tv_2['ten'];
							$xacdinh_menu_con_option=xacdinh_menu_con_option($id);
							if($xacdinh_menu_con_option=="co")
							{
								dequy_menu_option($id,0);
							}
							else
							{
							}
						echo "</option>";
					}
				?>
			</select>
			<div class="cao_3_px"></div>
			<?php
				if($_GET['gia_dau']=="")
				{
					$gia_dau="Giá từ";
				}
				else
				{
					$gia_dau=$_GET['gia_dau'];
				}
				if($_GET['gia_cuoi']=="")
				{
					$gia_cuoi="đến";
				}
				else
				{
					$gia_cuoi=$_GET['gia_cuoi'];
				}
			?>
			<input style="width:62px;background:#ececec" value="<?php echo $gia_dau; ?>" name="gia_dau" onfocus="if (this.value=='<?php echo $gia_dau; ?>'){this.value=''};">
			<input style="width:62px;background:#ececec" value="<?php echo $gia_cuoi; ?>" name="gia_cuoi" onfocus="if (this.value=='<?php echo $gia_cuoi; ?>'){this.value=''};">
			<div class="cao_3_px"></div>
			<input type="image" src="hinhanh_flash/dungchung/3.png" style="border:0px solid #999999;">
			<div class="cao_3_px"></div>
		</form>
	</center>
</div>