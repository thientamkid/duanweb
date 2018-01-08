<?php
	chong_pha_hoai();
?>
<?php
	function link_script()
	{
		$tv="select * from bang_thong_so where ma_so='1'";
		$tv_1=mysql_query($tv);
		$tv_2=mysql_fetch_array($tv_1);
		return $tv_2['gia_tri'];
	}
	$loai_link_script=link_script();
	//echo $loai_link_script."<hr>";
	switch($loai_link_script)
	{
		case "tooltip":
			echo '<link href="giaodien/unitip/css/unitip.css" rel="stylesheet" type="text/css" />';
			echo "\n";
			echo '<script type="text/javascript" src="giaodien/unitip/js/unitip.js"></script>';
		break;
		case "abc":

		break;

	}
?>