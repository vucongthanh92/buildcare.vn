<?php
$db = new Models_Mwebsite;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		"title_vn"          =>  varPost('title_vn'),
		"slogan_vn"         =>  varPost('slogan_vn'),
		"slogan_en"         =>  varPost('slogan_en'),
		"hotline"           =>  varPost('hotline'),
		'description_vn'	=>  addslashes(varPost('description_vn','',1)),
		'keyword_vn'	    =>  addslashes(varPost('keyword_vn','',1)),
		'message'	        =>  addslashes(varPost('message','',1)),
		'email'	            =>  addslashes(varPost('email','',1)),
		'googleanalytics'	=>  $_POST['google'],
		'enable'			=>  varPost('enable'),
		'stamp'				=>  varPost('stamp'),
	);
	$db -> editwebsite($data,$id);
	redirect(BASE_URL_ADMIN."website/edit/1");
	return;
}

$data['info'] = $db -> getOnewebsite($id);
loadview("website/edit_view",$data);
?>