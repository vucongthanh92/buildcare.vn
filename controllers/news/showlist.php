<?php
	$id = (int)varGet('id');
	$mcat = new Models_MCatNews;
	$db = new Models_MNews;
	$pg = new Paging;

	$where = " ticlock ='0' and idcat = '$id'  ";
	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 5; 
	$div = 8;
	$start = $p * $numrow;
	$select = "Id, title_vn,content_vn, description_vn,images,alias";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	
	
	$infonews['cat'] = $info_cat = $mcat->getOneCatnews($id);

	$infonews['map_title'] =  $map_title . $arrowmap .'<a href="#" onclick="return false" >'.$info_cat['title_vn'].'</a>';
	
	
	loadview("news/view_show",$infonews);

?>