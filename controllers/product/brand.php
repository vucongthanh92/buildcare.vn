<?php
	
	$db = new Models_MProduct;
	$manu = new Models_MManufacturer;
	$pg = new Paging;
	$mcatelog = new Models_MCatelog;
	$mpayment = new Models_MPayment;
	
	$val = varGet("id");
	$id = $manu ->getAlias($val);
	$sp['info'] =$info = $manu->getOneRows($id); 
	$where = "ticlock ='0' and idmanufacturer = '".$id."' ";

	/*paging*/
	$p = str_replace('/p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 28;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;

	$select = "*";

	$orderby = "sort asc, price desc,Id desc";
	$limit = "$start,$numrow";	
	
	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);
	
	$link = BASE_URL."thuong-hieu/".$info['alias'];
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,$link);

	$sp['map_title'] =  $map_title . $arrowmap . '<a href = "/thuong-hieu/'.$info['alias'].'" title="'.$info['title_vn'].'">'.$info['title_vn'].'</a>';
		
	
	loadview("product/view_brand",$sp);

?>