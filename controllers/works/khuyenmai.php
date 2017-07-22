<?php

	$db = new Models_MWorks;

	$mcatelog = new Models_MCatworks;

	$mpicture = new Models_MPicture;

	$pg = new Paging;



	$where = "  ticlock = '0' ";



	/*paging*/

	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);

	$numrow = 28;

	$div = 10;

	$total = $db->countdata($where);

	$start = $p * $numrow;

	$select = "*";

	$orderby = "sort asc,Id desc";

	$limit = "$start,$numrow";	



	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	

	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."du-an.html");

	$sp['map_title'] =  $map_title . $arrowmap . '<a href="/du-an.html">Dự án</a>';


	$sp["adv"] = $mflash->getOneflashLocation(5);
	$sp['support'] = $title;
	$sp['cat']['title_vn']  = 'Dự án';

	loadview("works/list_view",$sp);

?>