<?php
	chong_pha_hoai();
?>
<?php
$sl_hang=0;
for($i=0;$i<count($_SESSION[$ten_danh_dau.'id_giohang']);$i++)
{
	$sl_sp=$_SESSION[$ten_danh_dau.'soluong_giohang'][$i];
	$sl_hang=$sl_hang+$sl_sp;
}
?>
<style>
span.g8
{
	font-size:11px;font-weight:bold;color:#4362d3;font-family: Arial, Helvetica, sans-serif;
}
a.link_2:link { font-size: 16px; text-decoration: none;  color: red; font-weight: bold;}
a.link_2:visited { font-size: 16px; color: red; text-decoration: none; font-weight: bold;}
a.link_2:hover { font-size: 16px; text-decoration: underline; color:red; font-weight: bold; font-style: normal; }

.style1 {font-size: 12px}
.style2 {color: #FFFFFF}
</style>
<div class="khung_abc__td">
	<span>Giỏ hàng</span>
</div>
<div class="khung_abc__nd">
  <div style="margin-left:18px">
		<span class="g8 style1">
			Bạn đang có		</span>
		<span style="font-family: Arial, Helvetica, sans-serif;font-size:11px;font-weight:bold;color:red">
			<?php echo $sl_hang; ?>		</span>
		<span class="g8 style2">
		sản phẩm trong giỏ hàng</span><br>
		<div class="cao_3_px"></div>
		<div class="cao_3_px"></div>
	  <a href="?thamso=xem_gio_hang" class="link_2 style1">Xem giỏ hàng </a>  </div>
</div>