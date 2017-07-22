<?php
	$mproduct = new Models_MProduct;
	$mflash = new Models_MFlash;
	$mnews = new Models_MNews;
	$works = new Models_MWorks;
	
	$duan = $works -> listdata('*', 'ticlock = "0" AND home = "1"','sort ASC',4);
	$news_noibat = $mnews -> listdata('*','ticlock = "0" and idcat="31" and home="1" ','sort asc, Id desc','4');
?>

<div class="wap-left">
   <!--phần tin tức cột left-->
   <div class="title-left"><?=KIENTHUCCHUYENNGANH?></div>
   <div class="box-left">
   <?php
       if(!empty($news_noibat)){
       foreach($news_noibat as $item){
   ?>
   <div class="newsleft_box">
        <a href="/du-an/<?php echo $item['alias'] ?>">
           <img class="newsleft_box_img" src="<?=BASE_URL."data/News/".$item['images'] ?>" alt="<?=$item['title_'.lang];?>">
           <div class="newsleft_box_title"><?=$item['title_'.lang];?></div>
           <div style="clear:both"></div>
        </a>
   </div>
   <?php }} ?>
   </div>
   <!------------------------->

   <!--phần dự án cột left-->
   <div class="title-left"><div><span><?=DUANTHAMKHAO?></span></div></div>
   <div class="duan_left">
   <?php
       if(!empty($duan)){
       foreach($duan as $item){
   ?>
       <a href="<?=BASE_URL."du-an/".$item['alias'];?>"><img class="duan_left_img" src="<?=BASE_URL."data/Works/".$item['images'];?>" /></a>
   <?php }} ?>
   </div>
   <!------------------------->

</div>