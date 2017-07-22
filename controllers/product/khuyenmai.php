<?php
	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$mpicture = new Models_MPicture;
	$pg = new Paging;

	$where = " ticlock = '0' ";

	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 25;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	

	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."san-pham.html");
	$sp['map_title'] =  $map_title . $arrowmap . '<a href="/san-pham.html">'.MN_PRODUCT.'</a>';
	$sp["adv"] = $mflash->getOneflashLocation(8);
	$sp['support'] = $title;
	loadview("product/list_sp",$sp);
?>