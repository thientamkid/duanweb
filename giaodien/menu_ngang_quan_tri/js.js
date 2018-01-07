function menu_ngang_quan_tri()
{
	var lid_mnn=document.getElementById("menu_ngang");
	var li_mnn=lid_mnn.getElementsByTagName("li");
	for(i=0;i<li_mnn.length;i++)
	{
		li_mnn[i].onmouseover=function()
		{
			var ul=this.getElementsByTagName("ul");
			if(ul.length!=0)
			{
				ul[0].style.display="block";
				var li_a_pol=ul[0].getElementsByTagName("li");
				//alert(ul.length);
				for(r=0;r<li_a_pol.length;r++)
				{
					//alert(r);
					var ul_1=li_a_pol[r].getElementsByTagName("ul");
					if(ul_1.length!=0)
					{
						//alert("vao day");
						var li_a_pol_1=li_a_pol[r].getElementsByTagName("a")[0];
						var hhh=li_a_pol_1.innerHTML.replace("2,1.gif","5,1.gif");
						//alert(hhh);
						li_a_pol_1.innerHTML=hhh;
					}
				}
			}

		}
		li_mnn[i].onmouseout=function()
		{
			var ul=this.getElementsByTagName("ul");
			if(ul.length!=0)
			{

				ul[0].style.display="none";
			}
		}
		var ul_pol=li_mnn[i].getElementsByTagName("ul");
		if(ul_pol.length!=0) // co menu con
		{
			var li_a_pol_1=li_mnn[i].getElementsByTagName("a")[0];
			var li_a_pol_1__innerHTML=li_a_pol_1.innerHTML;
			//alert(li_a_pol_1__innerHTML);
			//var b_mnn_abc=getStyle_abc(li_mnn[i],"clear");
			var b_mnn_abc=li_mnn[i].style.clear;
			li_a_pol_1.innerHTML=li_a_pol_1__innerHTML + "<img src='../hinhanh_flash/dungchung/2,1.gif' border='0' class='img_mnn_tx'>";
		}

	}
}
function fix_mnn_qt_ie6()
{
	var ul_mnn_bcd=document.getElementById("menu_ngang");
	ul_mnn_bcd.onmouseover=function()
	{
		//alert("chao");
		var tag_select=document.getElementsByTagName("select");
		for(i=0;i<tag_select.length;i++)
		{
			tag_select[i].style.visibility="hidden";
		}
	}
	ul_mnn_bcd.onmouseout=function()
	{
		//alert("chao");
		var tag_select=document.getElementsByTagName("select");
		for(i=0;i<tag_select.length;i++)
		{
			tag_select[i].style.visibility="visible";
		}
	}
}