<div class="breadcrumbs">
     <div class="grid"><a href="<?=BASE_URL?>"><?=MN_HOME?></a> >
          <a href="<?=BASE_URL."du-an.html"?>"><?=DUAN?></a>
     </div>
</div>

<div class="grid">
<?php
if(!empty($data['pro_1'])){
	foreach($data['pro_1'] as $item){
?>
    <div class="item-prod">
         <div class="images">
            <a href="<?=BASE_URL."du-an/".$item['alias'];?>"><img class="listpro_img" src="<?=PATH_IMG_WORKS.$item['images'];?>" /></a>
         </div>
         <h2 class="duan_title"><a href="<?=BASE_URL."du-an/".$item['alias'];?>"><?=$item['title_'.lang];?></a></h2>
         <a href="<?=BASE_URL."du-an/".$item['alias'];?>"><div class="listprod_xemtiep"><?=XEMTIEP?></div></a>
    </div>
<?php }} ?>
<?php 
if($data['page'] != "") {
	echo '<div class="clear"></div>';
	echo "<div class = 'pagging'>". $data['page']."</div>";
}
?>
</div>