<?php
$db = new Models_MWeblink;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array
	(
		'title_vn' 		=> varPost('title_vn'),
		'title_en' 		=> varPost('title_en'),
		'style' 		=> varPost('style'),
		'color' 		=> varPost('color'),
		'parentid'		=> varPost('parentid','0'),
		'sort'			=> varPost('sort'),
		'link'			=> varPost('link'),
		'ticlock'		=> varPost('ticlock','0'),
		'home'		    => varPost('home','0'),
	);
	//upload img
	if($_FILES['images']['name'] != ""){
		$tenhinh = strtoseo(varPost('title_vn')).time();
		$cimg = new uploadImg;
		$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Partners/",$error);
		if($hinh!="") $data['images'] = $hinh;
	}
	$db -> editWeblink($data,$id);
	redirect(BASE_URL_ADMIN."weblink/list");
	return;
}

$data['info'] = $db -> getOneWeblink($id);
loadview("weblink/edit_view",$data);
?>