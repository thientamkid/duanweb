<?php
	chong_pha_hoai();
	//echo "chao <hr>";
?>
<style type="text/css">
	a.sua_xoa:link { font-size: 16px; text-decoration: none;  color: #FF00FF; font-weight: bold}
	a.sua_xoa:visited { font-size: 16px; color: #FF00FF; text-decoration: none; font-weight: bold}
	a.sua_xoa:hover { font-size: 16px; text-decoration: underline; color: #FF8C00; font-weight: bold; font-style: normal; }

	a.thua__link_1:link { font-size: 16px; text-decoration: none;  color: #0b55c4; }
	a.thua__link_1:visited { font-size: 16px; color: #0b55c4; text-decoration: none; }
	a.thua__link_1:hover { font-size: 16px; text-decoration: none; color: #084095;  font-style: normal; }


</style>
<?php
	if($_GET['tu_khoa']!="")
	{
		$phamang=explode(" ",trim($_GET['tu_khoa']));
		$phamang=xoa_phan_tu_mang_rong($phamang);
		$ntc="";
		for($fff=0;$fff<count($phamang)-1;$fff++)
		{
			$ntc=$ntc."ky_danh like '%$phamang[$fff]%' or ";
		}
		$sooo=count($phamang)-1;
		$ntc=$ntc."ky_danh like '%$phamang[$sooo]%'";
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
?>
<?php
	$sd=20;
	$b_tv="select count(*) from thanh_vien $chuoi_or";
	$b_tv_1=mysql_query($b_tv);
	$b_tv_2=mysql_fetch_row($b_tv_1);
	$st=ceil($b_tv_2[0]/$sd);
	if($_GET['trang']==""){$vtbd=0;}else{$vtbd=($_GET['trang']-1)*$sd;}
	$tv="select * from thanh_vien $chuoi_or order by id desc limit $vtbd,$sd";
	$tv_1=mysql_query($tv);
?>
<center>
	<form action="">
		<input type="hidden" name="thamso" value="quanly_thanhvien">
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
							$tu_khoa="Nhập ký danh cần tìm";
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
	<table width="968px" id="er" style="text-align:left;margin:6px 0px 6px 0px;font-size:16px;color:#666666">
		<tr>
			<td width="155px">Ký danh</td>
			<td width="155px">Mật khẩu</td>
			<td width="250px">Email</td>
			<td width="200px">Điện thoại</td>
			<td width="100px" align="center">Sữa</td>
			<td width="100px" align="center">Xóa</td>
		</tr>
		<?php
			while($tv_2=mysql_fetch_array($tv_1))
			{
					$link_sua="?thamso=sua_thanh_vien&tu_khoa=$_GET[tu_khoa]&id=$tv_2[id]&trang=$_GET[trang]";
					$link_xoa="?thamso=xoa_thanh_vien&id=$tv_2[id]&trang=$_GET[trang]";
				?>
					<tr>
						<td ><a href="<?php echo $link_sua; ?>" class="thua__link_1"><?php echo $tv_2['ky_danh']; ?></a></td>
						<td ><?php echo $tv_2['mat_khau']; ?></td>
						<td ><?php echo $tv_2['email']; ?></td>
						<td ><?php echo $tv_2['dien_thoai']; ?></td>
						<td width="100px" align="center"><a href="<?php echo $link_sua; ?>" class="sua_xoa">Sữa</a></td>
						<td width="100px" align="center"><a href="<?php echo $link_xoa; ?>" class="sua_xoa">Xóa</a></td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="6">
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