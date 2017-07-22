<?php
$db = new Models_MManufacturer;
$pg = new Paging;

$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);

//paging
if($_POST['tukhoa']!=""){
	$where = " title_vn like '%".$_POST['tukhoa']."'";
}else {
	$where = "";
}
$numrow = 50;
$div = 30;
$total = $db->countdata($where);
$start = $p * $numrow;

$data['info'] =$db->listdata($where,$start,$numrow);
$data['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL_ADMIN."manufacturer/list");
$data['total'] = $total;
loadview("manufacturer/list_view",$data);

?>