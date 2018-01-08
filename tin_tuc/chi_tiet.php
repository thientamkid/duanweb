<?php
	chong_pha_hoai();
	$tv="select * from tin_tuc where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
?>
<div class="div_ge_td">
	<a href="#"><?php echo $tv_2['ten']; ?></a>
</div>
<div class="div_ge_nd">
	<?php echo $tv_2['noi_dung']; ?>
</div>