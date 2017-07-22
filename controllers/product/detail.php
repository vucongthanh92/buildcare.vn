<?php



if(isset($_GET['id']))

{

	$val = varGet("id");
	$db = new Models_MProduct;
	$pg = new Paging;
 	$id = $db ->getalias($val);
	$sp['idpro'] = $id;
	$sp['prod'] = $db->getOneProduct($id);
	$numrow = 5;
	$div = 10;
	$p = str_replace('p','',isset($_GET['p'])?varGetPost('p'):0);
	$start = $p * $numrow;
	$db->countView($id);
	/*lay thong tin san pham*/

	/*san pham cung loai*/

	if($sp['prod']['idcat']>0){
		$select = "*";
		$orderby = "sort asc";
		$where = "  Id != '$id' AND idcat = ".$sp['prod']['idcat']." AND ticlock= '0'";
		$limit = "$start,$numrow";	
		$sp['map_title'] = $map_title.$arrowmap;
		$mcat = new Models_MCatelog;
		$sp['spcl'] = $db->listdata("*",$where,"sort ASC, Id DESC",10);
		$sp['cat'] =$info_cat = $mcat->getOneCatelog($sp['prod']['idcat']);

	}
	if($info_cat['parentid'] !=0){

		$subcat = $mcatelog ->getOneCatelog($info_cat['parentid']);

		if($subcat['parentid'] != 0){

			$subcat2 = $mcatelog ->getOneCatelog($subcat['parentid']);

			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$subcat2['alias'].'.html" title="'.$subcat2['title_'.lang].'">'.$subcat2['title_'.lang].'</a>' 

				. $arrowmap . '<a href = "'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>'

				. $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';

		}else{

			$sp['title_pro'] = $subcat['title_'.lang]; 

			$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$subcat['alias'].'.html" title="'.$subcat['title_'.lang].'">'.$subcat['title_'.lang].'</a>' 

				. $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';

		}

	}else{

		$sp['map_title'] =  $map_title . $arrowmap . '<a href = "'.$info_cat['alias'].'.html" title="'.$info_cat['title_'.lang].'">'.$info_cat['title_'.lang].'</a>';

	}
	$sp["adv"] = $mflash->getOneflashLocation(8);
	loadview("product/detail_view",$sp);

}

?>