<?php
	$mcatelog = new Models_MCatelog;
	$mproduct = new Models_MProduct;
	$db = new Models_MWebsite;
	$row_web = $db->getOneWebsite(1);
	$mod = $_GET['mod'];
	$act = $_GET['act'];
	if($mod=='sanpham'){
		if($act=='danhmuc'){
			$valparent = varGet("id");
			$id = $mcatelog ->getalias($valparent);
			if($id<=0){
				redirect(BASE_URL."404.html");
				exit();
			}
			$info_cat = $mcatelog->getOneCatelog($id);
			
			if($info_cat['title_en']!=""){
				$meta['title'] = $info_cat['title_en'];
			}else{
				$meta['title'] = $info_cat['title_vn'];
			}	
			if($info_cat['meta_keyword']==""){
				$meta['keywork'] = $info_cat['title_vn'];
			}else{
				$meta['keywork'] = $info_cat['meta_keyword'];
			}
			if($info_cat['meta_description']==""){
				$meta['description'] = $info_cat['title_vn'];
			}else{
				$meta['description'] = $info_cat['meta_description'];
			}
		}elseif($act=='chitiet'){
			$val = varGet("id");
			$id = $mproduct ->getalias($val);
			if($id<=0){
				redirect(BASE_URL."404.html");
			}
			$infopro = $mproduct->getOneProduct($id);
			if($infopro['titlepage']==""){
				$meta['title'] = $infopro['title_vn'];
			}else {
				$meta['title'] = $infopro['titlepage'];
			}
			if($infopro['meta_keyword']==""){
				$meta['keywork'] = $infopro['description_vn'];
			}else{
				$meta['keywork'] = $infopro['meta_keyword'];
			}
			if($infopro['meta_description']==""){
				$meta['description'] = $infopro['description_vn'];
			}else{
				$meta['description'] = $infopro['meta_description'];
			}
			
		}elseif($act=='brand'){
			$manu = new Models_MManufacturer;
			$val = varGet("id");
			$id = $manu ->getAlias($val);
			$info = $manu->getOneRows($id); 
			if($info['titlepage']==""){
				$meta['title'] = $info['title_vn'];
			}else {
				$meta['title'] = $info['titlepage'];
			}
			
			$meta['keywork'] = $info['meta_keyword'];
			$meta['description'] = $info['meta_description']; 
			
		}
		
	} elseif($mod=='tin-tuc'){
		if($act=='danh-muc'){
			$mcat = new Models_MCatnews;
			$val = $_GET['id'];
			$id = $mcat->getAlias($val);
			if($id<=0){
				redirect(BASE_URL."404.html");
			}
			$info = $mcat->getOneCatnews($id);
			$meta['title'] = $info['title_vn'];
			$meta['keywork'] = $info['meta_keyword'];
			$meta['description'] =  $info['meta_description'];
			if($id==1) $banner['idcatnew'] = 1; else $banner['idcatnew']= 2;
		}elseif($act=='chi-tiet'){
			$mnews = new Models_MNews;
			$val = $_GET['id'];
			$id = $mnews->getAlias($val);
			if($id<=0){
				redirect(BASE_URL."404.html");
			}
			$infopro = $mnews -> getOneNews($id,"*");
			$meta['title'] = $infopro['title_vn'];
			if($infopro['meta_keyword']==""){
				$meta['keywork'] = $infopro['description_vn'];
			}else{
				$meta['keywork'] = $infopro['meta_keyword'];
			}
			if($infopro['meta_description']==""){
				$meta['description'] = $infopro['description_vn'];
			}else{
				$meta['description'] = $infopro['meta_description'];
			}
			if($infopro['idcat']==1) $banner['idcatnew'] = 1; else $banner['idcatnew']= 2;
		}else if($act=='list'){
			$mcat = new Models_MCatnews;
			$id = (int)varGet('id');
			if($id<=0){
				redirect(BASE_URL."404.html");
			}
			$info = $mcat->getOneCatnews($id);
			$meta['title'] = $info['title_vn'];
			$meta['keywork'] = $info['meta_keyword'];
			$meta['description'] =  $info['meta_description'];
		}
	}elseif($mod=="bai-viet"){
		$id = varGet("id");
		if($id<=0) redirect(BASE_URL."404.html");
		$mpagehtml = new Models_MPageHtml;
		$info = $mpagehtml->getpagehtmlid($id);
		$meta['title'] = $info['title_vn'];
		$meta['keywork'] = limit_text($info['meta_keyword'],455);
		$meta['description'] =   limit_text($info['meta_description'],455);
	}elseif($mod=="lien-he"){
		$meta['title'] = 'Liên hệ với chúng tôi';
		$meta['keywork'] = $row_web['keyword_vn'];
		$meta['description'] =  $row_web['description_vn'];
	}else {
		$meta['title'] = $row_web['title_vn'];
		$meta['keywork'] = $row_web['keyword_vn'];;
		$meta['description'] =  $row_web['description_vn'];
	}
?>