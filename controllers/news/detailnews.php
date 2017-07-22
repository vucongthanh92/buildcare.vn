<?php
if(isset($_GET['id']))
{	
	$mnews = new Models_MNews;
	$val = varGet("id");
	//$id = substr($val,0,strpos($val, '-'));
	$id = $mnews->getAlias($val);
	$mnews->countView($id);

	$arr['newstu'] = $mnews -> getOneNews($id,"*");
	$idcat = $arr['newstu']['idcat']; 
	$mcat = new Models_MCatNews;
	$info_cat = $mcat->getOneCatnews($idcat);
	$arr['title'] = $info_cat['title_vn'];
	$url = "<a href='/chu-de/".$info_cat['alias'].".html'>".$info_cat["title_".lang]."</a>";
	$arr['othernews'] = $mnews -> listdata("*","Id != '$id' and ticlock ='0' and idcat='".$idcat."'","Id desc",8);
	$arr['map_title'] =$map_title.$arrowmap.$url;
	if($id==1){
		$infonews["adv"] = $mflash->getOneflashLocation(1);
	}else{
		$infonews["adv"] = $mflash->getOneflashLocation(6);
	}
	loadview("news/view_detailnews",$arr);
}
?>