<?php
	$db = new Models_MWorks;
	$mcatelog = new Models_MCatworks;
	$pg = new Paging;

	$val = varGet("id");
	$id = $mcatelog ->getalias($val);
	$sp['cat']= $info_cat = $mcatelog->getOneCatelog($id);
	$subid =  $mcatelog->getSubId($id);
	if($subid != ""){
		$subid = substr($subid,0,-1);
		 $where = " idcat in ($id,$subid) and ticlock = '0' ";
	}else{
		$where = " ticlock ='0' and idcat = '$id'  ";
	}
	/*paging*/
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 12;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort asc, Id desc";
	$limit = "$start,$numrow";	

	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$info_cat['alias']);
	
	$sp['support'] = $title;

	loadview("works/list_view",$sp);

?>