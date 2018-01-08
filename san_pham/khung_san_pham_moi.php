<?php
	chong_pha_hoai();
	//echo "vao day <hr>";
	$tv="select * from san_pham order by id desc limit 0,3";
	$tv_1=mysql_query($tv);

?>
<div class="khung_abc__td">
	<span>Hàng mới</span>
</div>
<div class="khung_abc__nd">
	<center>
		<div class="cao_3_px"></div>
		<div class="cao_3_px"></div>
		<div class="spm">
			<?php
				while($tv_2=mysql_fetch_array($tv_1))
				{
					$gia_1=number_format($tv_2['gia'],0,".",".");
					$link_hinh="hinhanh_flash/san_pham/$tv_2[hinh_anh]";
					$link_chi_tiet="?thamso=chitiet_sanpham&id=$tv_2[id]";
					?>
						<div class="o">
							<div class="cao_3_px"></div>
							<a href="<?php echo $link_chi_tiet; ?>"><img src="<?php echo $link_hinh; ?>"></a><div class="cao_3_px"></div>
							<a href="<?php echo $link_chi_tiet; ?>"><?php echo $tv_2['ten']; ?></a><br>
							<span><?php echo $gia_1; ?> VNĐ</span>
						</div>
						<div class="cao_3_px"></div>
					<?php
				}
			?>
		</div>
	</center>
</div>