<?php

$db = new Models_MWorks;
$mpicture = new Models_MPicture;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{		
	$data = array
	(
		'title_vn' 			  => addslashes(varPost('title_vn')),
		'title_en' 			  => addslashes(varPost('title_en')),
		'description_vn'	  => addslashes(varPost('description_vn','')),
		'description_en'	  => addslashes(varPost('description_en','')),
		'content_vn'		  => addslashes(varPost('content_vn','')),
		'content_en'		  => addslashes(varPost('content_en','')),
		'idcat' 			  => varPost('idcat'),
		'sort'				  => varPost('sort'),
		'hot'				  => varPost('hot','0'),
		'ticlock'			  => varPost('ticlock','0'),
		'meta_description'	  => (varPost('meta_description','',1)),
		'meta_keyword'		  => (varPost('meta_keyword','',1)),

	);

	if(isset($_FILES['images']['name']) && $_FILES['images']['name'] != "")

	{
		 	$tenhinh = strtoseo(varPost('title_vn'));
			$cimg = new uploadImg;
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Works/",$error);
			if($hinh !="") $data['images'] = $hinh;
	}
	if(varPost('alias')==""){

		$data['alias'] = strtoseo(varPost('title_vn'));

	}else {$data['alias'] = varPost('alias'); }

	$db -> editProduct($data,$id);

	//lay id cat cu

	$idcat = $_POST['idcat'];

	if($idcat>0){

		redirect(BASE_URL_ADMIN. "works/list/".$idcat);

			return;

	}else{

		redirect(BASE_URL_ADMIN. "works/list");

			return;

	}



}

$data['listimages'] = $mpicture -> listdata('idpro= "'.$id.'"',0,1000);

$data['info'] = $db -> getOneProduct($id);





loadview("works/edit_view",$data);

?>

