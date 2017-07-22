<?php
if(isset($_GET['act'])){
	$act = $_GET['act'];
}else{
	$act = "";
}

switch($act)
{
	case "danh-muc":
		include ("controllers/news/list.php");
		break;
	case "chi-tiet":
		include ("controllers/news/detailnews.php");
		break;
	case "list":
		include ("controllers/news/showlist.php");
		break;
	
}

?>