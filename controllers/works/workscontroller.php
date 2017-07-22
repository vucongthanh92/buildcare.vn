<?php

if(isset($_GET['act']))

	$act = $_GET['act'];

else 

	$act = "";

switch($act)

{

	case 'timkiem':				include('controllers/works/search.php');break;

	case 'chitiet':				include('controllers/works/detail.php');break;

	case 'danhmuc':				include('controllers/works/list.php');break;

	case 'khuyenmai':				include('controllers/works/khuyenmai.php');break;

}

?>