<?php
	chong_pha_hoai();
?>
<?php
	function xacdinh_menu_con_doc($id)
	{
		$tv="select count(*) from menu where thuoc_menu='$id'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		if($tv_2[0]!=0){return "co";}else{return "khong";}
	}
	function dequy_menu_doc($id)
	{
		$tv="select * from menu where thuoc_menu='$id' and vitri_menu='doc' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			$id=$tv_2['id'];
			$link_menu="?thamso=xuat_san_pham&id=$id";
			echo "<li>";
				echo "<a href=\"$link_menu\">";
					echo $tv_2['ten'];
				echo "</a>";
				$xacdinh_menu_con_doc=xacdinh_menu_con_doc($id);
				if($xacdinh_menu_con_doc=="co")
				{
					echo "<ul>";
						dequy_menu_doc($id);
					echo "</ul>";
				}
				else
				{
				}
			echo "</li>";
		}
	}
?>
	<div class="khung_abc__td">
		<span>Danh mục</span>
	</div>
	<div class="menu_doc" id="menu_doc">
		<ul>
			<?php
				$tv="select * from menu where thuoc_menu='' and vitri_menu='doc' order by id";
				$tv_1=mysql_query($tv);
				while($tv_2=mysql_fetch_array($tv_1))
				{
					$id=$tv_2['id'];
					$link_menu="?thamso=xuat_san_pham&id=$id";
					echo "<li>";
						echo "<a href=\"$link_menu\">";
							echo $tv_2['ten'];
						echo "</a>";
						$xacdinh_menu_con_doc=xacdinh_menu_con_doc($id);
						if($xacdinh_menu_con_doc=="co")
						{
							echo "<ul>";
								dequy_menu_doc($id);
							echo "</ul>";
						}
						else
						{
						}
					echo "</li>";
				}
			?>
		</ul>
	</div>
<script type="text/javascript">
	menu_doc();
</script>