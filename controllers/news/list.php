<?php
	$val = varGet('id');
	$mcat = new Models_MCatNews;
	$db = new Models_MNews;
	$pg = new Paging;
	$id = $mcat->getAlias($val);
	

	$where = " ticlock ='0' AND idcat ='$id' ";
	$select = "*";
	//echo $where;
	$total = $db->countdata($where);
	

	//paging
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 8; 
	$div = 8;
	$start = $p * $numrow;

	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	
	
	$infonews['info'] = $db->listdata($select,$where,$orderby,$limit);
	$infonews['cat'] = $info_cat = $mcat->getOneCatnews($id);
	
	$infonews['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL."chu-de/".$info_cat['alias'].".html");
	$infonews['map_title']=$map_title.$arrowmap.'<a href="'.BASE_URL.'chu-de/'.$info_cat['alias'].'.html">'.$info_cat['title_'.lang].'</a>';
	
	if($id==1){
		$infonews["adv"] = $mflash->getOneflashLocation(1);
	}else{
		$infonews["adv"] = $mflash->getOneflashLocation(6);
	}
	loadview("news/view_listnews",$infonews);

?>