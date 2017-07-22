<?php
$db = new Models_MComment;
$id = varGetPost("id");

if(isset($_POST['editnew']))
{
	$data = array(
		'hoten' 		  => varPost('hoten'),
		'email' 		  => varPost('email'),
		'congviec' 		  => varPost('congviec'),
		'content_vn'	  => addslashes(varPost('content_vn','',1)),
		'ticlock'		  => varPost('ticlock','0'),
	);
	
	if(isset($_FILES['images']['name']) && $_FILES['images']['name'] != "")
	{
		$tenhinh = time();
		$cimg = new uploadImg;
		if(DONGDAU==1) {
			$hinh = $cimg -> Upload_dongdau($_FILES['images'],$tenhinh,"../data/Phanhoi/",$error);
		}else{
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Phanhoi/",$error);;
		}
		if($hinh != "") $data['images'] = $hinh;
	}
	
	$db -> editNew($data,$id);
	redirect(BASE_URL_ADMIN."comment/list");
	return;
}else{
	$data = '';
}

$data['info'] = $db -> getOneNew($id);
loadview("comment/edit_view",$data);
?>