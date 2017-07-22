<div class="breadcrumbs">
<div class="grid"><?php echo $data['map_title'];?></div></div>

<div class="grid">
<?php
if(!empty($data['pro_1'])){
	foreach($data['pro_1'] as $item){
?>
    <div class="item-prod">
         <div class="images">
            <a href="<?=BASE_URL."san-pham/".$item['alias'].".html";?>"><img class="listpro_img" src="<?=PATH_IMG_PRODUCT.$item['images'];?>" /></a>
         </div>
         <h2><a href="<?=BASE_URL."san-pham/".$item['alias'].".html";?>.html"><?=$item['title_'.lang];?></a></h2>
         <div class="listprod_mota"><?=$item['description_'.lang];?></div>
         <div class="listprod_xemtiep"><?=XEMTIEP?></div>
    </div>
<?php }} ?>
<?php 
if($data['page'] != "") {
	echo '<div class="clear"></div>';
	echo "<div class='pagging'>".$data['page']."</div>";
}
?>
</div>