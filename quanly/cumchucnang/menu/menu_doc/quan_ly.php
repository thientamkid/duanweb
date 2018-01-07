<?php
	chong_pha_hoai();
	//echo "chao <hr>";
?>
<style type="text/css">
	a.sua_xoa:link { font-size: 16px; text-decoration: none;  color: #FF00FF; font-weight: bold}
	a.sua_xoa:visited { font-size: 16px; color: #FF00FF; text-decoration: none; font-weight: bold}
	a.sua_xoa:hover { font-size: 16px; text-decoration: underline; color: #FF8C00; font-weight: bold; font-style: normal; }

	a.a_vvv:link { font-size: 14px; text-decoration: none;  color: #0b55c4; }
	a.a_vvv:visited { font-size: 14px; color: #0b55c4; text-decoration: none; }
	a.a_vvv:hover { font-size: 14px; text-decoration: none; color: #084095;  font-style: normal; }

</style>
<?php
	$sd=20;
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
	function cap_menu($id_menu,$so_tang=1)
	{
		$tv="select * from menu where id='$id_menu'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		if($tv_2['thuoc_menu']=="")
		{
			return $so_tang;
		}
		else
		{
			//echo "haha <hr><hr>";
			$tv__abc="select * from menu where id='$tv_2[thuoc_menu]'";
			$tv_1__abc=mysql_query($tv__abc);
			$tv_2__abc=mysql_fetch_array($tv_1__abc);
			$so_tang++;
			//echo $tv_2__abc['id_cap1']."<hr><hr>";
			return cap_menu($tv_2__abc['id'],$so_tang);
		}
	}
	//echo cap_menu(31);echo "<hr>";
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
	function chuoi_union_menu_de_quy($id,$chuoi_union)
	{
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='$id' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$chuoi_union=$chuoi_union."( select * from menu where id='$tv_2[id]' ) union ";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				$chuoi_union=chuoi_union_menu_de_quy($tv_2['id'],$chuoi_union);
			}
		}
		return $chuoi_union;
	}
	$chuoi_union="";
	$tv="select * from menu where vitri_menu='doc' and thuoc_menu='' order by id";
	$tv_1=mysql_query($tv);
	while($tv_2=mysql_fetch_array($tv_1))
	{
		$chuoi_union=$chuoi_union."( select * from menu where id='$tv_2[id]' ) union ";
		$ktmnc=kiem_tra_menu_con($tv_2['id']);
		if($ktmnc=="co")
		{
			$chuoi_union=chuoi_union_menu_de_quy($tv_2['id'],$chuoi_union);
		}
	}
	$chuoi_union=substr($chuoi_union,0,-6);

	if($_GET['trang']=="")
	{
		$vtbd=0;
	}
	else
	{
		$vtbd=($_GET['trang']-1)*$sd;
	}
	$chuoi_union=$chuoi_union." limit $vtbd,$sd";
	//echo $chuoi_union."<hr>";
	$tv_1=mysql_query($chuoi_union);
	/*tinh so trang*/
	$a_tv="select count(*) from menu where vitri_menu='doc'";
	$a_tv_1=mysql_query($a_tv);
	$a_tv_2=mysql_fetch_row($a_tv_1);
	$st=ceil($a_tv_2[0]/$sd);
?>
<center>
	<table style="margin-top:6px;text-align:left" id="er">
		<tr>
			<td width="758px">Tên menu</td>
			<td width="100px" align="center">Sữa</td>
			<td width="100px" align="center">Xóa</td>
		</tr>
		<?php
			while($tv_2=mysql_fetch_array($tv_1))
			{
				$link_sua="?thamso=sua_menu_doc&id=$tv_2[id]&trang=$_GET[trang]";
				$link_xoa="?thamso=xoa_menu_doc&id=$tv_2[id]";
				$cap_menu=cap_menu($tv_2['id']);
				$chuoi_kt="";
				for($j=1;$j<$cap_menu;$j++)
				{
					$chuoi_kt=$chuoi_kt."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				?>
					<tr>
						<td ><a href="<?php echo $link_sua; ?>" class="a_vvv"><?php echo $chuoi_kt;echo $tv_2['ten']; ?></a></td>
						<td  align="center"><a href="<?php echo $link_sua; ?>" class="sua_xoa">Sữa</a></td>
						<td  align="center"><a href="<?php echo $link_xoa; ?>" class="sua_xoa">Xóa</a></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="3">
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