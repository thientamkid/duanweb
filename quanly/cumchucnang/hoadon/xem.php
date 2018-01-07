<?php
	chong_pha_hoai();
	//echo "chao <hr>";
	$tv="select * from hoa_don where id='$_GET[id]'";
	$tv_1=mysql_query($tv);
	$tv_2=mysql_fetch_array($tv_1);
	$mang_don_hang=explode("______",$tv_2['don_hang']);
	//print_r($mang_don_hang);echo "<hr>";
?>
<style type="text/css">
	a.sua_xoa:link { font-size: 16px; text-decoration: none;  color: #FF00FF; font-weight: bold}
	a.sua_xoa:visited { font-size: 16px; color: #FF00FF; text-decoration: none; font-weight: bold}
	a.sua_xoa:hover { font-size: 16px; text-decoration: underline; color: #FF8C00; font-weight: bold; font-style: normal; }

</style>
<center>
	<div class="tbg">
		<table width="968px" style="text-align:left;margin-top:6px" id="er" class="tbg">
			<tr>
				<td>
					Chi tiết hóa đơn
					<a href="?thamso=quanly_hoadon&trang=<?php echo $_GET['trang']; ?>" style="margin-left:815px;color:#0b55c4;outline:0">Đóng</a>
				</td>
			</tr>
			<tr>
				<td>
					<div class="bao_abc">
					<span style="margin-left:6px">Người mua có ký danh là <b><?php echo $tv_2['ky_danh']; ?></b></span>
					<table  class="tbg" id="tb__1" style="margin:6px 6px 6px 6px">
						<tr>
							<td width="50px" align="center">Stt</td>
							<td width="300px">Tên</td>
							<td width="150px">Giá bán (VNĐ)</td>
							<td width="100px">Số lượng</td>
							<td width="200px">Tổng cộng (VNĐ)</td>
						</tr>
						<?php
							$k=1;
							$tc_1=0;
							for($i=0;$i<count($mang_don_hang)-1;$i++)
							{
								$mang_hoa_don_1=explode("___",$mang_don_hang[$i]);
								$id=$mang_hoa_don_1[0];
								$sl=$mang_hoa_don_1[1];
								$a_tv="select * from san_pham where id='$id'";
								$a_tv_1=mysql_query($a_tv);
								$a_tv_2=mysql_fetch_array($a_tv_1);
								$gia=number_format($a_tv_2['gia'],0,".",".");
								$tc=$a_tv_2['gia']*$sl;
								$tc_dd=number_format($tc,0,".",".");
								$tc_1=$tc_1+$tc;
								?>
									<tr>
										<td align="center"><?php echo $k;?></td>
										<td><?php echo $a_tv_2['ten'];?></td>
										<td><?php echo $gia; ?></td>
										<td><?php echo $sl; ?></td>
										<td><?php echo $tc_dd; ?></td>
									</tr>
								<?php
								$k++;
							}
							$tc_1_dd=number_format($tc_1,0,".",".");
						?>
						<tr>
							<td colspan="4">&nbsp;</td>
							<td><?php echo $tc_1_dd; ?></td>
						</tr>
					</table>
					<table width="600px" id="tc__1" style="margin:0px 6px 6px 6px">
						<tr>
							<td width="120px"><b>Họ tên :</b></td>
							<td><?php echo $tv_2['ho_ten']; ?></td>
						</tr>
						<tr>
							<td><b>Địa chỉ :</b></td>
							<td><?php echo $tv_2['dia_chi']; ?></td>
						</tr>
						<tr>
							<td><b>Email :</b></td>
							<td><?php echo $tv_2['email']; ?></td>
						</tr>
						<tr>
							<td><b>Điện thoại : </b></td>
							<td><?php echo $tv_2['dien_thoai']; ?></td>
						</tr>
						<tr>
							<td valign="top"><b>Nội dung :</b></td>
							<td>
								<?php echo $tv_2['noi_dung']; ?>
							</td>
						</tr>
						<tr>
							<td valign="top">&nbsp;</td>
							<td>
								<a href="?thamso=xoa_hoa_don_1&trang=<?php echo $_GET['trang']; ?>&id=<?php echo $tv_2['id']; ?>" class="sua_xoa">Xóa</a>
							</td>
						</tr>
					</table>
					</div>
				</td>
			</tr>
		</table>
	</div>
</center>
<script type="text/javascript">
	table_css_1("er");
</script>
<script type="text/javascript">
	table_css_2("tb__1");
	table_css("tc__1");
</script>