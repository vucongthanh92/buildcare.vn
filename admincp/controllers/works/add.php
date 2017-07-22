<?php

$db = new Models_MWorks;
$mpicture = new Models_MPicture;
   if(isset($_POST['addnew']))
   {
		if($_FILES['images']['name'] != ''){
			$tenhinh = strtoseo(varPost('title_vn'));
			$cimg = new uploadImg;
			$hinh = $cimg -> Upload_NoReSize($_FILES['images'],$tenhinh,"../data/Works/",$error);
		}else{
			$hinh = '';
		}
		
		$data = array
		(
			'title_vn' 			  => addslashes(varPost('title_vn')),
			'title_en' 			  => addslashes(varPost('title_en')),
			'description_vn'	  => addslashes(varPost('description_vn','')),
			'description_en'	  => addslashes(varPost('description_en','')),
			'content_vn'		  => addslashes(varPost('content_vn','')),
			'content_en'		  => addslashes(varPost('content_en','')),
			'idcat' 			  => varPost('idcat'),
			'images'			  => $hinh,
			'sort'				  => varPost('sort'),
			'date'				  => time(),
			'hot'				  => varPost('hot','0'),
			'ticlock'			  => varPost('ticlock','0'),
			'meta_description'	  => addslashes(varPost('meta_description','',1)),
			'meta_keyword'		  => addslashes(varPost('meta_keyword','',1)),
		);
	
		if(varPost('alias')==""){
			$data['alias'] = strtoseo(varPost('title_vn'));
	
		}else {$data['alias'] = varPost('alias'); }

		$id = $db-> addProduct($data);
		if($_FILES['images1']['name'] != ''){
			$tenhinh1 = strtoseo(varPost('title_vn'))."-01";
			$cimg = new uploadImg;
			$hinh1 = $cimg -> Upload_NoReSize($_FILES['images1'],$tenhinh1,"../data/Works/",$error);
			if($hinh1 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh1,'ticlock'=>'0'));
		}
		if($_FILES['images2']['name'] != ''){
			$tenhinh2 = strtoseo(varPost('title_vn'))."-02";
			$cimg = new uploadImg;
			$hinh2 = $cimg -> Upload_NoReSize($_FILES['images2'],$tenhinh2,"../data/Works/",$error);
			if($hinh2 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh2,'ticlock'=>'0'));
		}
		if($_FILES['images3']['name'] != ''){
			$tenhinh3 = strtoseo(varPost('title_vn'))."-03";
			$cimg = new uploadImg;
			$hinh3 = $cimg -> Upload_NoReSize($_FILES['images3'],$tenhinh3,"../data/Works/",$error);
			if($hinh3 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh3,'ticlock'=>'0'));
		}
	
		if($_FILES['images4']['name'] != ''){
			$tenhinh4 = strtoseo(varPost('title_vn'))."-04";
			$cimg = new uploadImg;
			$hinh4 = $cimg -> Upload_NoReSize($_FILES['images4'],$tenhinh4,"../data/Works/",$error);
			if($hinh4 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh4,'ticlock'=>'0'));
		}
	
		if($_FILES['images5']['name'] != ''){
			$tenhinh5 = strtoseo(varPost('title_vn'))."-05";
			$cimg = new uploadImg;
			$hinh5 = $cimg -> Upload_NoReSize($_FILES['images5'],$tenhinh5,"../data/Works/",$error);
			if($hinh5 != "") $mpicture->addNew(array('idpro'=>$id,'images'=>$hinh5,'ticlock'=>'0'));
		}
		$idcat = $_POST['idcat'];

		if($idcat>0){
			redirect(BASE_URL_ADMIN. "works/list/".$idcat);
			return;
		}else{
			redirect(BASE_URL_ADMIN. "works/list");
			return;
		}

}else{


	$data = "";

}
loadview('works/add_view',$data);

?>