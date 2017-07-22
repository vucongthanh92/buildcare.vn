<?php

$db = new Models_MWeblink;
if(isset($_POST['addnew']))
{
	if($_FILES['images']['name'] != "")
	{
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Partners/",$error);
	}else{ $hinh = "";}
	
	$data = array
	(
		'title_vn' 		=> varPost('title_vn'),
		'images'		=> $hinh,
		'parentid'		=> varPost('parentid','0'),
		'sort'			=> varPost('sort'),
		'link'			=> varPost('link'),
		'ticlock'		=> varPost('ticlock','0'),
		'home'		    => varPost('home','0'),
	);

	if($db-> addWeblink($data) == 0)
	{
		$data['error'] = ERROR_ADD;
	}else{
		redirect(BASE_URL_ADMIN."weblink/list");
		return;
	}
}else{
	$data = '';
}

loadview('weblink/add_view',$data);

?>