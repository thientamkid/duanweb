<?php
	chong_pha_hoai();
	//echo "chao <hr>";
?>

<?php
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
	function hop_option_de_quy($id,$so)
	{
		$so++;
		$kt="";
		for($i=1;$i<=$so;$i++)
		{
			$kt=$kt."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='$id' order by id";
		$tv_1=mysql_query($tv);
		while($tv_2=mysql_fetch_array($tv_1))
		{
			echo "<option value=\"$tv_2[id]\">";
				echo $kt;
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],$so);
			}
		}
	}
	function hop_option()
	{
		$tv="select * from menu where vitri_menu='doc' and thuoc_menu='' order by id";
		$tv_1=mysql_query($tv);
		echo "<select name=\"cap_do\">";
		echo "<option value=\"\">Cấp đầu</option>";
		while($tv_2=mysql_fetch_array($tv_1))
		{
			echo "<option value=\"$tv_2[id]\">";
				echo $tv_2['ten'];
			echo "</option>";
			$ktmnc=kiem_tra_menu_con($tv_2['id']);
			if($ktmnc=="co")
			{
				hop_option_de_quy($tv_2['id'],0);
			}
		}
		echo "</select>";
	}
?>
<center>
	<table width="968px" id="er" style="margin-top:6px;text-align:left">
		<tr>
			<td>
				Thêm menu dọc
			</td>
		</tr>
		<tr>
			<td>
				<form action="" method="post">
					<table width="500px" id="er_1" style="margin:6px 6px 6px 6px;">
						<tr>
							<td width="100px"><b>Cấp độ :</b></td>
							<td>
								<?php
									hop_option();
								?>
							</td>
						</tr>
						<tr>
							<td><b>Tên menu :</b></td>
							<td><input size="40" name="ten"></td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<input type="hidden" name="them_menu_doc" value="them_menu_doc">
								<input type="image" src="../hinhanh_flash/dungchung/them.gif" style="border:0px solid red;_margin-bottom:-4px">
							</td>
						</tr>
					</table>
				</form>
			</td>
		</tr>
	</table>
</center>
<script type="text/javascript">
	table_css_1("er");
	table_css("er_1");
</script>