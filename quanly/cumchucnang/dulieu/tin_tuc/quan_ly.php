<?php
	chong_pha_hoai();
	//echo "chao <hr>";
?>
<style type="text/css">
	a.sua_xoa:link { font-size: 16px; text-decoration: none;  color: #FF00FF; font-weight: bold}
	a.sua_xoa:visited { font-size: 16px; color: #FF00FF; text-decoration: none; font-weight: bold}
	a.sua_xoa:hover { font-size: 16px; text-decoration: underline; color: #FF8C00; font-weight: bold; font-style: normal; }

	a.thua__link_1:link { font-size: 14px; text-decoration: none;  color: #0b55c4; }
	a.thua__link_1:visited { font-size: 14px; color: #0b55c4; text-decoration: none; }
	a.thua__link_1:hover { font-size: 14px; text-decoration: none; color: #084095;  font-style: normal; }

</style>
<script type="text/javascript">
	function chuyen_avc(value)
	{
		//alert("chao");
		var link="?thamso=quan_ly_san_pham&id="+value;
		window.location=link;
	}
</script>
<?php
	if($_GET['tu_khoa']!="")
	{
		$phamang=explode(" ",trim($_GET['tu_khoa']));
		$phamang=xoa_phan_tu_mang_rong($phamang);
		$ntc="";
		for($fff=0;$fff<count($phamang)-1;$fff++)
		{
			$ntc=$ntc."ten like '%$phamang[$fff]%' or ";
		}
		$sooo=count($phamang)-1;
		$ntc=$ntc."ten like '%$phamang[$sooo]%'";
		$chuoi_or=$ntc;
		$chuoi_or=" where ( $chuoi_or )";
	}
	else
	{
		$chuoi_or="";
	}
	function xuat_link($st)
	{
		//if($_GET['trang']==""){$_GET['trang']=1;}
		?>
			<style>
				a.pt3
				{
					color:black;
					text-decoration: none;
					font-weight:bold;
				}
				a.pt3:hover
				{
					color:red;
					text-decoration: none;
					font-weight:bold;
				}
			</style>
		<?php
		echo "<center>";
		if($_GET['trang']!="")
		{
			if(ereg("&trang=",$_SERVER['REQUEST_URI']))
			{
				$_SERVER['REQUEST_URI']=str_replace("&trang=","",$_SERVER['REQUEST_URI']);
				$_SERVER['REQUEST_URI']=substr($_SERVER['REQUEST_URI'],0,-strlen($_GET['trang']));
				$lpt=$_SERVER['REQUEST_URI']."&trang=";
			}
			else
			{
				$lpt=$_SERVER['REQUEST_URI']."&trang=";
			}
		}
		else
		{
			$_SERVER['REQUEST_URI']=str_replace("&trang=","",$_SERVER['REQUEST_URI']);
			$lpt=$_SERVER['REQUEST_URI']."&trang=";
		}
		if($_GET['trang']!="" and $_GET['trang']!="1")
		{
			if($_GET['trang']=="" or $_GET['trang']==1)
			{
				$k=1;
			}
			else
			{
				$k=$_GET['trang']-1;
			}
			$link_t=$lpt.$k;
			$link_d=$lpt."1";
			echo '<a href="'.$link_d.'" style="margin-right:10px" class="pt3">Đầu</a>';
			echo '<a href="'.$link_t.'" style="margin-right:10px" class="pt3">Trước</a>';
		}
		if($_GET['trang']==""){$a=1;}else{$a=$_GET['trang'];}
		$b_1=$_GET['trang']-5;$n_1=$b_1;
		if($b_1<1){$b_1=1;}
		$b_2=$_GET['trang']+5;
		if($b_2>=$st){$n_2=$b_2;$b_2=$st;}
		//echo $b_1."<hr>";
		if($n_1<0){$v=(-1)*$n_1;$b_2=$b_2+$v;}
		if($n_2>=$st){$v_2=$n_2-$st;$b_1=$b_1-$v_2;}
		if($b_1>1){echo ' ... ';}
		for($i=$b_1;$i<=$b_2;$i++)
		{
			$lpt_1=$lpt.$i;
			if($i>0 && $i<=$st)
			{
				if($i!=$a)
				{
					?>
						<a href="<?php echo $lpt_1; ?>" class="pt3"><?php echo $i;?> </a>
					<?php
				}
				else
				{
					echo "<b style=\"color:red\">$i</b>";
				}
			}
		}
		if($b_2<$st){echo ' ... ';}
		if($_GET['trang']!=$st && $st!=1)
		{
			if($_GET['trang']==$st)
			{
				$k=$st;
			}
			else
			{
				$k=$_GET['trang']+1;
				if($_GET['trang']==""){$k=2;}
			}
			$link_s=$lpt.$k;
			$link_cuoi=$lpt.$st;
			echo '<a href="'.$link_s.'" style="margin-left:10px" class="pt3">Sau</a>';
			echo '<a href="'.$link_cuoi.'" style="margin-left:10px" class="pt3">Cuối</a>';
		}
		echo "</center>";
	}
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
	function hop_option_de_quy($id,$so)
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
			if($_GET['id']==$tv_2['id'])
			{
				$sl="selected";
			}
			else
			{
				$sl="";
			}
			echo "<option value=\"$tv_2[id]\" $sl>";
				echo $kt;
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],$so);
			}
		}
	}
	function hop_option()
	{
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='' order by id";
		$tv_1=mysql_query($tv);
		echo "<select name=\"cap_do\" onchange=\"chuyen_avc(this.value)\">";
		echo "<option value=\"\">Tất cả</option>";
		while($tv_2=mysql_fetch_array($tv_1))
		{
			if($_GET['id']==$tv_2['id'])
			{
				$sl="selected";
			}
			else
			{
				$sl="";
			}
			echo "<option value=\"$tv_2[id]\" $sl>";
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],0);
			}
		}
		echo "</select>";
	}
	function chuoi_id_menu_con($id_cha,$chuoi)
	{
		$tv="select * from menu where thuoc_menu='$id_cha' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$chuoi=$chuoi.$tv_2['id'].",";
			$r="select count(*) from menu where thuoc_menu='$id_cha'";
			$r_1=mysql_query($r);
			$r_2=mysql_fetch_row($r_1);
			if($r_2[0]!=0)
			{
				$chuoi=chuoi_id_menu_con($tv_2['id'],$chuoi);
			}
		}
		return $chuoi;
	}
	function mang_id_menu_con($id_menu)
	{
		if($id_menu!="")
		{
			$chuoi=$id_menu.",";
		}
		else
		{
			$chuoi="";
		}
		$chuoi_id_menu_con=chuoi_id_menu_con($id_menu,$chuoi);
		$mang=explode(",",$chuoi_id_menu_con);
		unset($mang[count($mang)-1]);
		return $mang;
	}
	function dem_bcd($id)
	{
		$tv="select count(*) from san_pham where thuoc_menu='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		return $tv_2[0];
	}
?>
<?php
	$sd=10;
	$so_gioi_han=$sd;
	if($_GET['trang']=="")
	{
		$vtbd=0;
	}
	else
	{
		$vtbd=($_GET['trang']-1)*$sd;
	}
	$id=$_GET['id'];
	$mang_id_menu_con=mang_id_menu_con($id);
	$tsd_sql=0;
	$chuoi="";
	//print_r($mang_id_menu_con);echo "<hr>";
	for($i=0;$i<count($mang_id_menu_con);$i++)
	{
		$id=$mang_id_menu_con[$i];
		$so=dem_bcd($id);
		$chuoi=$chuoi." ( select * from san_pham where thuoc_menu='$id' order by id desc limit 0,$so ) union ";
		$tsd_sql=$tsd_sql + $so;
	}
	$chuoi=substr($chuoi,0,-6);
	$b_tv="select count(*) from tin_tuc $chuoi_or";
	$b_tv_1=mysql_query($b_tv);
	$b_tv_2=mysql_fetch_array($b_tv_1);
	$st=ceil($b_tv_2[0]/$so_gioi_han);
	$chuoi="select * from tin_tuc $chuoi_or order by id desc limit $vtbd,$so_gioi_han";
	//echo $chuoi."<hr>";
	$tv_1=mysql_query($chuoi);
?>
<center>
<form action="">
	<input type="hidden" name="thamso" value="quan_ly_tin_tuc">
	<table width="968px" style="text-align:left">
		<tr>
			<td width="220px">
				<?php
					if($_GET['tu_khoa']!="")
					{
						$tu_khoa=$_GET['tu_khoa'];
					}
					else
					{
						$tu_khoa="Từ khóa tìm kiếm";
					}
				?>
				<input name="tu_khoa" style="width:200px" value="<?php echo $tu_khoa; ?>" value="<?php echo $tu_khoa; ?>" name="tu_khoa" onfocus="if (this.value=='<?php echo $tu_khoa; ?>'){this.value=''};this.style.backgroundColor='#fffde8';" onblur="this.style.backgroundColor='#ffffff';">
			</td>
			<td>
				<div style="width:83px;height:20px;overflow:hidden">
					<input type="image" src="../hinhanh_flash/dungchung/3.png" style="border:0px solid red">
				</div>
			</td>
		</tr>
	</table>
</form>
<table width="968px" style="text-align:left;margin-top:6px" id="er">
	<tr>
		<td width="100px" align="center">Hình ảnh</td>
		<td width="290px">Tiêu đề</td>
		<td width="355px">Nội dung</td>
		<td width="100px" align="center">Sữa</td>
		<td width="100px" align="center">Xóa</td>
	</tr>
	<?php
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$link_hinh="../hinhanh_flash/tin_tuc/$tv_2[hinh_anh]";
			$noi_dung_ngan=cat_chuoi_789(thay_the_fckeditor($tv_2['noi_dung']),0,150);
			$link_sua="?thamso=sua_tin_tuc&id=$tv_2[id]&tu_khoa=$_GET[tu_khoa]&trang=$_GET[trang]";
			$link_xoa="?thamso=xoa_tin_tuc&id=$tv_2[id]";
			?>
				<tr>
					<td align="center">
						<a href="<?php echo $link_sua; ?>">
							<img src="<?php echo $link_hinh;?>" width="87px" height="100px" style="margin:6px 0px 6px 0px">
						</a>
					</td>
					<td ><a href="<?php echo $link_sua; ?>" class="thua__link_1"><?php echo $tv_2['ten']; ?></a></td>
					<td><?php echo $noi_dung_ngan; ?></td>
					<td align="center"><a href="<?php echo $link_sua; ?>" class="sua_xoa">Sữa</a></td>
					<td align="center"><a href="<?php echo $link_xoa; ?>" class="sua_xoa">Xóa</a></td>
				</tr>
			<?php
		}
	?>
	<tr>
		<td colspan="5">
			<?php
				xuat_link($st);
			?>
		</td>
	</tr>

</table>
</center>
<script type="text/javascript">
	table_css_2("er");
</script>