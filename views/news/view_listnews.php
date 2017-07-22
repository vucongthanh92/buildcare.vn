<div class="page-title-wrap">
<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'] ?></div></div>
<div class="grid_news">
<?php
if(!empty($data['info'])){
	foreach($data['info'] as $item){
?>
    <div class="item-news">
    <div class="images">
    <a href="<?php echo '/bai-viet/'.$item['alias'].".html" ?>">
    <img src="<?php echo PATH_IMG_NEWS.$item['images'] ?>" />
    </a>
    </div>
    <h2><a href="<?php echo '/bai-viet/'.$item['alias'].".html" ?>"><?php echo $item['title_'.lang]; ?></a></h2>
    <div class="desc"><?php echo limit_text($item['description_'.lang],300); ?></div>
    <a href="<?php echo '/bai-viet/'.$item['alias'].".html" ?>" class="view-more"><?=CHITIET?></a>
    </div>
<?php }} ?>
<div style="clear:both"></div>
<?php 
if($data['page'] != "") {

	echo '<div class="clear"></div>';
	echo "<div class = 'pagging'>". $data['page']."</div>";

}
?>
</div>
</div>

