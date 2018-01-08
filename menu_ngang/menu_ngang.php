<?php
	chong_pha_hoai();
?>
<?php
	function rem_890()
	{
		$tv="select count(*) from menu where vitri_menu='ngang'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_row($tv_1);
		return $tv_2[0];
	}
	$rem_89=rem_890();
	//$rem_89=2;
	//thongbao($rem_89);
	$tv="select * from menu where vitri_menu='ngang' order by id";
	$tv_1=mysql_query($tv);
?>
<center>
  <div style="width:990px;background:#6767f8;height:32px">
		<table style="margin:-1px 0px -1px 0px;background:#6767f8" cellpadding="0" cellspacing="0" width:990px height:30px>
			<tr>
				<td>
					<div class="menu_ngang_abc" id="menu_ngang_abc">
						<ul>
							<?php
								$i_42=1;
								while($tv_2=mysql_fetch_array($tv_1))
								{
									//thongbao($i);
									//thongbao($rem_89);

									if($i_42==$rem_89)
									{
										//thongbao("vao day");
										echo "<li><a href=\"$tv_2[lien_ket]\" style=\"border:0px solid #676767\">$tv_2[ten]</a></li>";
									}
									else
									{
										//thongbao("vao day 1");
										echo "<li><a href=\"$tv_2[lien_ket]\" >$tv_2[ten]</a></li>";
									}
									$i_42++;
								}
							?>
						</ul>
					</div>
				</td>
			</tr>
		</table>
	</div>
</center>


