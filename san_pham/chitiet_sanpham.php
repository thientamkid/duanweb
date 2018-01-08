<?php
	chong_pha_hoai();
	//echo "san pham ngoai trang chu";
	$tv="select * from san_pham where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	if($tv_2['gia']==0)
	{
		$gia="Liên hệ";
	}
	else
	{
		$gia=$tv_2['gia'];
		$gia_1=number_format($gia,0,".",".");
	}
	$link_hinh="hinhanh_flash/san_pham/".$tv_2['hinh_anh'];
?>
<style>
	a.link_3:link { font-size: 18px; text-decoration: none;  color: blue; }
	a.link_3:visited { font-size: 18px; color: blue; text-decoration: none; }
	a.link_3:hover { font-size: 18px; text-decoration: underline; color:#ff9900;  font-style: normal; }

</style>
<div class="div_ge_td">
	<a href="#"><?php echo $tv_2['ten']; ?></a>
</div>
<div class="div_ge_nd">
<?php
		echo "<table width=\"638px\" cellspacing=\"2\" cellpadding=\"0\" style=\"background:#dad8d8\">
			<tr >
				<td width=\"216px\" align=\"center\" valign=\"top\">
					<a href=\"#\">
						<img src=\"hinhanh_flash/san_pham/$tv_2[hinh_anh]\" border=\"0\" width=\"150px\" height=\"170px\">
					</a>
				</td>
				<td width=\"422px\" valign=\"top\" align=\"left\">

					<a href=\"#\" class=\"link_3\">
						$tv_2[ten]
					</a>
					<br><br>
					<b>Giá bán :</b>
					<span style=\"font-weight:bold;color:#a42e2e\">
						$gia_1 VNĐ
					</span>
					<br>
					<div style=\"width:5px;height:5px\"></div>
					<form action=\"\">
						<input type=\"hidden\" name=\"thamso\" value=\"xem_gio_hang\">
						<input type=\"hidden\" name=\"id_sp\" value=\"$tv_2[id]\">
						<b>Số lượng : </b><input value=\"1\" size=\"5\" name=\"so_luong\">
						<br>
						<input type=\"image\" src=\"hinhanh_flash/dungchung/them_vao_gio.jpg\" style=\"margin:3px 0px 3px 0px;border:0px solid red\">
					</form>
				</td>
			</tr>
			</table>
			<div style=\"height:1px;overflow : hidden ; \"></div>
			<table width=\"100%\" style=\"border:1px solid #999999;background:#ececec\">
				<tr>
					<td colspan=\"2\">
						$tv_2[noi_dung]
					</td>
				</tr>
			</table>";
?>

</div>

