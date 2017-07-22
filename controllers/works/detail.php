<?php
if(isset($_GET['id']))
{
	$val = varGet("id");
	$mcat = new Models_MCatworks;
	$db = new Models_MWorks;
	$mpicture = new Models_MPicture;
	$pg = new Paging;
	
 	$id = $db ->getalias($val);
	$sp['idpro'] = $id;
	$sp['prod'] = $db->getOneProduct($id);
	$numrow = 5;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	$db->countView($id);
	if($sp['prod']['idcat']>0)
	{
		$sp['map_title'] = $map_title.$arrowmap;
		$sp['cat'] =$info_cat = $mcat->getOneCatelog($sp['prod']['idcat']);
	}

	$sp['hinh'] = $mpicture->listdata("*","idpro= '".$id."' AND ticlock= '0'","sort ASC, Id DESC");
	loadview("works/detail_view",$sp);
}

?>