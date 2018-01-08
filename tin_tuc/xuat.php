<?php
	chong_pha_hoai();
?>
<?php
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
?>
<?php
	$sd=14;
	function vtbd($sd)
	{
		if($_GET['trang']=="" or $_GET['trang']==1){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$sd;}
		return $vtbd;
	}
	$vtbd=vtbd($sd);
	$a_tv="select count(*) from tin_tuc";
	$a_tv_1=mysql_query($a_tv);
	$a_tv_2=mysql_fetch_row($a_tv_1);
	$st=ceil($a_tv_2[0]/$sd);
	$tv="select * from tin_tuc order by id desc limit $vtbd,$sd";
	$tv_1=mysql_query($tv);
?>
<style>
	table.tb_trong_tt
	{
		border-collapse: collapse;
		border:1px solid #999999
	}
	table.xuat_tin_tuc
	{
		width:618px;
		text-align:left;

		margin:3px 0px 3px 0px
	}
	table.xuat_tin_tuc td
	{

	}
	table.xuat_tin_tuc img
	{
		width:130px;
		height:100px
	}
	table.xuat_tin_tuc a
	{
		color:#00008B;
		font-weight:bold;
	}
	table.xuat_tin_tuc a:hover
	{
		text-decoration: none;
		color:red

	}
	table.xuat_tin_tuc span
	{
		font-size:14px
	}
</style>
<div class="div_ge_td">
	<a href="#">Tin tức</a>
</div>
<div class="div_ge_nd">
	<center>
		<table class="xuat_tin_tuc">
			<?php
				while($tv_2=mysql_fetch_array($tv_1))
				{
					$noi_dung_ngan=cat_chuoi_789($tv_2['noi_dung'],0,250);
					$link_hinh="hinhanh_flash/tin_tuc/$tv_2[hinh_anh]";
					$link_chi_tiet="?thamso=chitiet_tintuc&id=$tv_2[id]";
					?>
						<tr>
							<td>
								<table class="tb_trong_tt">
									<tr>
										<td width="140px" align="center" valign="top">
											<a href="<?php echo $link_chi_tiet; ?>">
												<img src="<?php echo $link_hinh; ?>" >
											</a>
										</td>
										<td width="478px" valign="top">
											<a href="<?php echo $link_chi_tiet; ?>"><?php echo $tv_2['ten']; ?></a><br>
											<span><?php echo $noi_dung_ngan; ?></span>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					<?php
				}
			?>
			<tr>
				<td colspan="2">
					<?php  xuat_link($st);?>
				</td>
			</tr>
		</table>
	</center>
</div>