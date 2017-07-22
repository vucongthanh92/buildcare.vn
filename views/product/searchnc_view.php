<div class="page-title-wrap" <?php if($data['adv']['file_vn']!=""){ ?>style="background-image:url(<?php echo PATH_IMG_FLASH.$data['adv']['file_vn'] ?>); color:#fff" <?php } ?>><div class="grid"><h1 class="page-entry-title ">Tìm kiếm từ khóa '<?php  echo $data['q']?>'</h1></div></div>
<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'] ?></div></div>

<div class="grid">
<div class="space_20"></div>
<?php
    if(!empty($data['prod'])){
	foreach($data['prod'] as $item){
?>
    <div class="item-prod">
    <div class="images">
        <a href="<?=BASE_URL."san-pham/".$item['alias'];?>.html">
           <img src="<?=BASE_URL.PATH_IMG_PRODUCT.$item['images'];?>" />
        </a>
    </div>
    <h2><a href="<?=BASE_URL."san-pham/".$item['alias'].".html";?>"><?=$item['title_vn'];?></a></h2>
    <div class="listprod_mota"><?=$item['description_vn'];?></div>
    <a href="<?=BASE_URL."san-pham/".$item['alias'].".html";?>"><div class="listprod_xemtiep">Xem tiếp</div></a>
    </div>
<?php }} ?>
<?php 
if($data['page'] != "") {
	echo '<div class="clear"></div>';
	echo "<div class = 'pagging'>". $data['page']."</div>";
}
?>
</div>