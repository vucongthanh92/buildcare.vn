<?php
$db = new Models_MCatelog;

if(isset($_POST['check_list'])){
	$db -> del_allcheck($_POST['check_list']);
	$link = array(
		'list'	=> "catelog/list",
		'add'	=> "catelog/add"
	);
	loadview("system/del_finish",$link);
}
else{
	$id = varGetPost('id');
	$parent = $db->countdata("parentid='".$id."'");
	if($parent<=0){
		$db -> del_onecheck($id);

	}
	redirect(BASE_URL_ADMIN."catelog/list");
}
?>