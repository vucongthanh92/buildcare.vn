<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'] ?></div></div>
    <div class="grid_detailnews">
       <?=stripcslashes($data['newstu']['content_vn']); ?>
       <div class="space_10">
    </div>

    <div class="title-g"><span><?=BAIVIETKHAC?></span></div>
	<?php
        if(!empty($data['othernews'])){
        foreach($data['othernews'] as $item){
    ?>
        <div class="item-news">
           <div class="images">
              <a href="<?=BASE_URL.'/bai-viet/'.$item['alias'].".html" ?>"><img src="<?=PATH_IMG_NEWS.$item['images'] ?>" /></a>
           </div>
           <h2><a href="<?=BASE_URL.'/bai-viet/'.$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
           <div class="desc"><?=limit_text($item['description_'.lang],300);?></div>
           <a href="<?=BASE_URL.'/bai-viet/'.$item['alias'].".html" ?>" class="view-more"><?=CHITIET?></a>
        </div>
    <?php }} ?>
    <div style="clear:both"></div>
</div>