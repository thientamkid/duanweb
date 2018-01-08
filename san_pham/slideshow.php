<?php
	chong_pha_hoai();
	$tv="select * from slideshow order by id";
	$tv_1=mysql_query($tv);
	$a_tv_1=mysql_query($tv);
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#photos').galleryView({
			panel_width: 638,
			panel_height: 300,
			frame_width: 100,
			frame_height: 100
		});
	});
</script>
<style>
	a.a_ooo
	{
		font-size:25px;
	}
</style>
<div style="margin-left:5px;">
	<div id="photos" class="galleryview">
	  <?php
	  	while($tv_2=mysql_fetch_array($tv_1))
		{
			$link_hinh="hinhanh_flash/slideshow/$tv_2[anh_lon]";
			?>
				<div class="panel">

				     <a href="<?php echo $tv_2['lien_ket']; ?>"><img src="<?php echo $link_hinh; ?>" /></a>
				    <div class="panel-overlay">
				      <a href="<?php echo $tv_2['lien_ket']; ?>" class="a_ooo" ><?php echo $tv_2['ten']; ?></a><br>
				      <?php echo $tv_2['mo_ta_ngan']; ?>
				    </div>

				</div>
			<?php
		}
	  ?>
	  <ul class="filmstrip">
	  	<?php
		  	while($a_tv_2=mysql_fetch_array($a_tv_1))
			{
				$link_hinh="hinhanh_flash/slideshow/anh_nho/$a_tv_2[anh_nho]";
				?>
					<li><img src="<?php echo $link_hinh; ?>" /></li>
				<?php
			}
		  ?>
	  </ul>
	</div>
</div>
