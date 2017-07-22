<?php

$mproduct = new Models_MProduct();
$mcatelog = new Models_MCatelog();
$mflash = new Models_MFlash();
$mnews = new Models_MNews;
$mcatworks = new Models_MCatworks;
$works = new Models_MWorks;
$weblink = new Models_MWeblink;
$pg = new Paging;

$default['slide'] = $mflash->listdata('*','location = "3" AND ticlock = "0"','sort asc, Id desc');
$default['quangcao'] = $mflash->listdata('*','location = "4" AND ticlock = "0"','sort asc, Id desc');

$where = " ticlock ='0' and idcat = '1' AND home='1' ";
$default['vechungtoi'] = $mnews->listdata("*",$where,"sort ASC, Id DESC",8);

$default['sub'] = $mcatworks->listdata("*","parentid= '1'","sort ASC, Id DESC",8);
$sub = $mcatworks->getSubId(5);
if($sub != ""){
	$sub = substr($sub,0,-1);
	 $where = " idcat in (5,$sub) and ticlock = '0' AND home='1' ";
}else{
	$where = " ticlock ='0' and idcat = '5' AND home='1' ";
}

$default['duandangtrienkhai'] = $works->listdata("*",$where,"sort ASC, Id DESC",8);
$default['sub2'] = $mcatworks->listdata("*","parentid= '5'","sort ASC, Id DESC",8);
$default['subcate'] = $mcatelog->listdata("*","parentid= '0'","sort ASC, Id DESC",8);
$default['tintuc'] = $mnews->listdata("*","idcat='30' AND ticlock= '0' AND home= '1'","sort ASC, Id DESC",8);
$default['prodhot'] = $mproduct->listdata("*","ticlock= '0' AND new= '1'","sort ASC, Id DESC",10);
$default['partner'] = $weblink->listdata("*","ticlock= '0'","sort ASC, Id DESC");
$default['support'] = $title;

loadview("default/view_default",$default);

?>