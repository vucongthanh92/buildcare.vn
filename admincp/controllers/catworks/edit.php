<?php

$db = new Models_MCatworks;

$id = varGetPost("id");



if(isset($_POST['editnew']))

{	

	$data = array(

		'title_vn' 		=> varPost('title_vn'),

		'title' 		=> varPost('title'),

		'title_en' 		=> varPost('title_en'),

		'parentid'		=> varPost('parentid'),

		'link' 		=> varPost('link'),

		'sort'			=> varPost('sort'),

		'description_vn'		=> varPost('description_vn','',1),

		'meta_description'		=> addslashes(varPost('meta_description','',1)),

		'meta_keyword'		=> addslashes(varPost('meta_keyword','',1)),

		'description_vn'		=> varPost('description_vn','',1),

		'ticlock'		=> varPost('ticlock','0'),

	);

	if(varPost('alias')==""){

		$data['alias'] = strtoseo(varPost('title_vn'));

	}else {$data['alias'] = varPost('alias'); }

	if($_FILES['images']['name'] != ''){

		$tenhinh = strtoseo(varPost('title_vn'))."-".rand_string(3);

		$cimg = new uploadImg;

		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catelog/",$error);

		if($hinh !="") $data['images'] = $hinh;

	}

	

	$db -> editCatelog($data,$id);

	redirect(BASE_URL_ADMIN."catworks/list");

	return;

}



$data['info'] = $db -> getOneCatelog($id);

loadview("catworks/edit_view",$data);

?>