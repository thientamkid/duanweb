<?php
	chong_pha_hoai();
	//echo "san pham <hr>";
	$tu_khoa=$_GET['tu_khoa'];
?>
<style>
div.abcd__pt
{
	width:638px;
	border: 1px solid #999999;
	border-top: 0px solid #999999;
	background:#ececec;
	margin-left:5px
}
</style>
<?php
	function chuoi_id_menu_con($id_cha,$chuoi)
	{
		$tv="select * from menu where thuoc_menu='$id_cha' and vitri_menu='doc' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$chuoi=$chuoi.$tv_2['id'].",";
			$r="select count(*) from menu where thuoc_menu='$id_cha' and vitri_menu='doc'";
			$r_1=mysql_query($r);
			$r_2=mysql_fetch_row($r_1);
			if($r_2[0]!=0)
			{
				$chuoi=chuoi_id_menu_con($tv_2['id'],$chuoi);
			}
		}
		return $chuoi;
	}
	//echo chuoi_id_menu_con('','');
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

	//print_r($mang);echo "<hr>";
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
	function vtbd($sd)
	{
		if($_GET['trang']=="" or $_GET['trang']==1){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$sd;}
		return $vtbd;
	}
	function dem_bcd($id,$chuoi_or,$gia_dau,$gia_cuoi)
	{
		$tv="select count(*) from san_pham where thuoc_menu='$id' and ( $chuoi_or ) and gia>=$gia_dau and gia<=$gia_cuoi";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		return $tv_2[0];
	}
?>
<?php
	$phamang=explode(" ",trim($tu_khoa));
	$phamang=xoa_phan_tu_mang_rong($phamang);
	$ntc="";
	for($fff=0;$fff<count($phamang)-1;$fff++)
	{
		$ntc=$ntc."ten like '%$phamang[$fff]%' or ";
	}
	$sooo=count($phamang)-1;
	$ntc=$ntc."ten like '%$phamang[$sooo]%'";
	$chuoi_or=$ntc;
	//echo $chuoi_or."<hr>";

	$sd=6;
	$so_dl_1_hang=3;
	$so_gioi_han=$sd*$so_dl_1_hang;
	$vtbd=vtbd($so_gioi_han);
	$id=$_GET['id'];
	//$st=ceil($tsd_sql/$so_gioi_han);
	$chuoi=$chuoi." limit $vtbd,$so_gioi_han";
	//echo $chuoi."<hr>";
	if($_GET['gia_dau']=="Giá từ"){$_GET['gia_dau']=0;}
	if($_GET['gia_dau']==""){$_GET['gia_dau']=0;}
	if($_GET['gia_cuoi']=="đến"){$_GET['gia_cuoi']=99999999999;}
	if($_GET['gia_cuoi']==""){$_GET['gia_cuoi']=99999999999;}
	$gia_dau=$_GET['gia_dau'];
	$gia_cuoi=$_GET['gia_cuoi'];
	$chuoi="";
	$mang_id_menu_con=mang_id_menu_con($_GET['menu']);
	$tsd_sql=0;
	for($i=0;$i<count($mang_id_menu_con);$i++)
	{
		$id=$mang_id_menu_con[$i];
		$so=dem_bcd($id,$chuoi_or,$gia_dau,$gia_cuoi);
		$chuoi=$chuoi." ( select * from san_pham where thuoc_menu='$id' and ( $chuoi_or ) and gia>=$gia_dau and gia<=$gia_cuoi order by id desc limit 0,$so ) union ";
		$tsd_sql=$tsd_sql + $so;
	}
	$chuoi=substr($chuoi,0,-6);
	$chuoi=$chuoi." limit $vtbd,$so_gioi_han";
	//echo $chuoi."<hr>";
	$b_tv="select count(*) from san_pham";
	$b_tv_1=mysql_query($b_tv);
	$b_tv_2=mysql_fetch_array($b_tv_1);
	$st=ceil($tsd_sql/$so_gioi_han);
	//$chuoi="select * from san_pham order by id desc limit $vtbd,$so_gioi_han";
	$tv_1=mysql_query($chuoi);
?>
<?php
	function osp_abc($td,$link_hinh,$gia,$link_chi_tiet,$id_sp)
	{
	 	?>
			<td>
				<div>
					<a href="<?php echo $link_chi_tiet; ?>" >
						<img src="<?php echo $link_hinh; ?>">
					</a>
					<br>
					<a href="<?php echo $link_chi_tiet; ?>" class="td"><?php echo $td;?></a>
					<br>
					<span class="gia_ban">
						<?php echo $gia; ?> VNĐ
					</span>
					<br>
					<form action="">
						<input type="hidden" name="thamso" value="xem_gio_hang">
						<input type="hidden" name="id_sp" value="<?php echo $id_sp; ?>">
						Số lượng : <input size="5" value="1" name="so_luong">
						<br>
						<input type="image" src="hinhanh_flash/dungchung/them_vao_gio.jpg" style="margin:3px 0px 3px 0px;border:0px solid red">
					</form>
				</div>
			</td>
	 	<?php
	}
?>
<div class="div_ge_td">
	<a href="#"><?php echo $tu_khoa; ?></a>
</div>
<div class="div_ge_nd">
	<?php
		if($tu_khoa!="")
		{
	?>
			<center>
				<table class="dan_san_pham" id="dan_san_pham_abc">
					<?php
						$tma="hinhanh_flash/san_pham/";
						$r=1;
						while($tv_2=mysql_fetch_array($tv_1))
						{
							if($r==1)
							{
								echo "<tr>";
							}
							$link_hinh=$tma."$tv_2[hinh_anh]";
							$id_sp=$tv_2['id'];
							if($tv_2['gia']==0)
							{
								$gia="Liên hệ";
							}
							else
							{
								$gia=$tv_2['gia'];
								$gia_1=number_format($gia,0,".",".");
							}
							$link_chi_tiet="?thamso=chitiet_sanpham&id=$tv_2[id]";

							osp_abc($tv_2['ten'],$link_hinh,$gia_1,$link_chi_tiet,$id_sp);
							if($r==$so_dl_1_hang)
							{
								$r=1;
								echo "</tr>";
							}
							else
							{
								$r++;
							}

						}
					?>
				</table>
			</center>
</div>
<div class="abcd__pt">
	<?php xuat_link($st);?>
</div>
	<?php
		}
		else
		{
			echo "Không được bỏ trống từ khóa";
		}
	?>


<script type="text/javascript">
	setTimeout(function()
	{
		dan_san_pham__abc();
	},500);
</script>