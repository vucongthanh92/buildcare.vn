<?php
$id = varGet("id");
$mpagehtml = new Models_MPageHtml;
$pagehtml['info'] = $mpagehtml->getpagehtmlid($id);
$pagehtml['map_title'] =  $map_title.$arrowmap.'<a href="/'.strtoseo($pagehtml['info']['title_vn']).'-'.$pagehtml['info']['Id'].'.html">'.$pagehtml['info']['title_vn'].'</a>';
$pagehtml["adv"] = $mflash->getOneflashLocation(7);
loadview("pagehtml/detail_view",$pagehtml);
?>