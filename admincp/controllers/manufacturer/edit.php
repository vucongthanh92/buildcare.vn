<?php
$db = new Models_MManufacturer;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'title_vn' 		=> varPost('title_vn'),
		'description_vn' 		=> varPost('description_vn'),
		'meta_keyword' 		=> varPost('meta_keyword'),
		'titlepage' 		=> varPost('titlepage'),
		'meta_description' 		=> varPost('meta_description'),
		'sort' 		=> varPost('sort'),
		'ticlock'		=> varPost('ticlock','0'),
		'parentid'		=> varPost('parentid','0'),
	);
	
	if(varPost('alias')==""){
		$data['alias'] = strtoseo(varPost("title_vn")); 
	}else {
		$data['alias'] = varPost("alias"); 
	}
	if($_FILES['images']['name'] != ''){
		$tenhinh = strtoseo(varPost('title_vn'));
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Manufacturer/",$error);
		if($hinh !="") $data['images'] = $hinh;
	}
	
	$db -> editManufacturer($data,$id);
	redirect(BASE_URL_ADMIN."manufacturer/list");
	return;
}

$data['info'] = $db -> getOneManufacturer($id);
loadview("manufacturer/edit_view",$data);
?>