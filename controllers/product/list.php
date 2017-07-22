<?php

	$db = new Models_MProduct;
	$mcatelog = new Models_MCatelog;
	$mpicture = new Models_MPicture;
	$pg = new Paging;
	$val = varGet("id");
	$id = $mcatelog ->getalias($val);
	$sp['cat']= $info_cat = $mcatelog->getOneCatelog($id);
	$subid = getSubCatlogId($id);
	
	if($subid != ""){
		$subid = substr($subid,0,-1);
		$where = " idcat in ($id,$subid) and ticlock = '0' ";
	}
	else{
		$where = " ticlock ='0' and idcat = '$id'  ";
	}

	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$numrow = 25;
	$div = 10;
	$total = $db->countdata($where);
	$start = $p * $numrow;
	$select = "*";
	$orderby = "sort asc, Id desc,price desc";
	$limit = "$start,$numrow";	

	$sp['total_pro_1'] = $db->countdata($where);
	$sp['pro_1'] = $db->listdata($select,$where,$orderby,$limit);	
	$sp['page']=$pg->divPage($total,$p,$div,$numrow,BASE_URL.$info_cat['alias'].".html");


	/* tieu de*/
	if($info_cat['parentid'] !=0){
		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);
		if($subcat['parentid'] != 0)
		{
			$subcat2=$mcatelog->getOneCatelog($subcat['parentid']);
			$sp['map_title']=$map_title.$arrowmap.'<a href="'.$subcat2['alias'].'.html" title="'.$subcat2['title_'.lang].'">'.$subcat2['title_'.lang]
			.'</a>'.$arrowmap.'<a href="'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>'.$arrowmap
			.'<a href="'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';	
		}
		else{
			$sp['map_title']=$map_title.$arrowmap.'<a href="'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang]
			.'</a>'.$arrowmap.'<a href="'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';
		}
	}
	else{
		$sp['map_title']=$map_title.$arrowmap.'<a href="'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang]
		.'</a>';
	}	

	$sp['support'] = $title;
	$sp["adv"] = $mflash->getOneflashLocation(8);
	loadview("product/list_view",$sp);

?>