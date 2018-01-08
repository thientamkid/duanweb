<?php
	chong_pha_hoai();
	//echo "san pham ngoai trang chu";
	$tv="select * from san_pham where trang_chu='co' order by id desc limit 0,15";
	$tv_1=mysql_query($tv);
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
	<a href="#">Sản phẩm của chúng tôi</a>
</div>
<div class="div_ge_nd">
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
					if($r==3)
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
<script type="text/javascript">
	setTimeout(function()
	{
		dan_san_pham__abc();
	},500);
</script>
