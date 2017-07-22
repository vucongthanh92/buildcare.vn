<?php
$db = new Models_MNews;

if(isset($_POST['addnew']))
{	
	if($_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo(varPost('title_vn'))."-".time();
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/News/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/News/",$error);
		}
	}else{ $hinh = "";}
	
	$data = array
	(
		'title_vn' 		     => addslashes(varPost('title_vn')),
		'title_en' 		     => varPost('title_en'),
		'meta_description' 	 => varPost('meta_description'),
		'meta_keyword' 		 => varPost('meta_keyword'),
		'description_vn'     => addslashes(varPost('description_vn','',1)),
		'description_en'     => varPost('description_en','',1),
		'content_vn'	     => addslashes(varPost('content_vn','',1)),
		'content_en'	     => varPost('content_en','',1),
		'date' 		         => time(),
		'idcat' 		     => varPost('idcat'),
		'images'		     => $hinh,
		'sort'			     => varPost('sort'),
		'ticlock'		     => varPost('ticlock','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost('title_vn'));
	}else{
		$data['alias'] = varPost('alias');
	}
	
	if($db-> addNews($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		$idcat = $_POST['idcat'];
		if($idcat>0) {
			redirect(BASE_URL_ADMIN."news/list/".$idcat);
		}else {
			redirect(BASE_URL_ADMIN."news/list");
		}
		return;
	}
}else{
	$data = '';
}

loadview('news/add_view',$data);
?>