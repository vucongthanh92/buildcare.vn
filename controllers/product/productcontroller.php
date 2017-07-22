<?php
if(isset($_GET['act']))
	$act = $_GET['act'];
else 
	$act = "";
switch($act)
{
	case 'timkiem':				include('controllers/product/search.php');break;
	case 'chitiet':				include('controllers/product/detail.php');break;
	case 'danhmuc':				include('controllers/product/list.php');break;
	case 'brand':				include('controllers/product/brand.php');break;
	case 'other':				include('controllers/product/other.php');break;
	case 'khuyenmai':			include('controllers/product/khuyenmai.php');break;
}
?>