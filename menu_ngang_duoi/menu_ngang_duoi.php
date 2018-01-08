<?php
	chong_pha_hoai();
	$tv="select * from menu where vitri_menu='ngang' order by id";
	$tv_1=mysql_query($tv);
?>

<div class="menu_ngang_duoi">
	<div class="cao_3_px"></div>
	<div class="cao_3_px"></div>
	<div style="float:right">
		<?php
			while($tv_2=mysql_fetch_array($tv_1))
			{
				echo "<a href=\"$tv_2[lien_ket]\" style=\"border:0px solid #676767\">$tv_2[ten]</a>";
			}
		?>
	</div>
</div>
