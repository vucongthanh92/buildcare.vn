<?php
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$pg = new Paging;

	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 24;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort desc, price desc";
	$limit = "$start,$numrow";	
	$where = "ticlock = '0'";
	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPageViet($total,$p,$div,$numrow,BASE_URL."san-pham.html");

	$sp['map_title'] =  $map_title . $arrowmap . '<a href = "/san-pham.html" >Sản phẩm</a>';
	$sp['cat']['title_vn'] = "Sản phẩm";
	$sp['cat']['alias'] = "san-pham";
	$sp['support'] = $title;
	$sp['tinhot'] = $mnews ->listdata('*', 'ticlock = "0" AND NoiBat="1" ','sort asc, Id desc',5);
	$sp['adv'] = $mflash->getOneflashLocation(1);
	loadview("product/list_view",$sp);
?>