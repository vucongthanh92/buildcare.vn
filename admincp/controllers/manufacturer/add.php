<?php
$db = new Models_MManufacturer;

if(isset($_POST['addnew'])){
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Manufacturer/",$error);
	}else{
		$hinh = '';
	}
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'description_vn' 		=> varPost('description_vn'),
		'meta_keyword' 		=> varPost('meta_keyword'),
		'titlepage' 		=> varPost('titlepage'),
		'meta_description' 		=> varPost('meta_description'),
		'images' 		=> $hinh,
		'sort' 		=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'parentid'		=> varPost('parentid','0'),
	);
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost("title_vn")); 
	}else {
		$data['alias'] = varPost("alias"); 
	}


	if($db-> addManufacturer($data) == 0){
		$data['error'] = ERROR_ADD;
	}else{
		//them thanh cong
		redirect(BASE_URL_ADMIN."manufacturer/list");
		return;
	}
}else{
	$data = '';
}

loadview('manufacturer/add_view',$data);
?>