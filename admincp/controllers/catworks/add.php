<?php

$db = new Models_MCatworks;



if(isset($_POST['addnew'])){

	

	if($_FILES['images']['name'] != ''){

		$tenhinh = strtoseo(varPost('title_vn'))."-".rand_string(3);

		$cimg = new uploadImg;

		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Catelog/",$error);

	}else{

		$hinh = '';

	}

	

	$data = array(

		'title_vn' 		=> varPost('title_vn'),

		'title' 		=> varPost('title'),

		'icon' 		=> $icon,

		'link' 		=> varPost('link'),

		'title_en' 		=> varPost('title_en'),

		'parentid'		=> varPost('parentid'),

		'images'			=> $hinh,

		'description_vn'		=> varPost('description_vn','',1),

		'meta_description'		=> addslashes(varPost('meta_description','',1)),

		'meta_keyword'		=> addslashes(varPost('meta_keyword','',1)),

		'sort'			=> varPost('sort'),

		'ticlock'		=> varPost('ticlock','0'),

	);

	

	if(stripcslashes(varPost('alias'))==""){

		$data['alias'] = strtoseo(varPost('title_vn'));

	}else {$data['alias'] = varPost('alias'); }



	if($db-> addCatelog($data) == 0){

		$data['error'] = ERROR_ADD;

	}else{

		redirect(BASE_URL_ADMIN."catworks/list");

		return;

	}

}else{

	$data = '';

}



loadview('catworks/add_view',$data);

?>