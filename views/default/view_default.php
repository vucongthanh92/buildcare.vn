<?php
	$site = new Models_MWebsite;
	$row_web = $site->getOneWebsite(1);
?>
<link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>owl.carousel.css" />
<link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>owl.theme.css" />
<script type="text/javascript" src="<?php echo BASE_URL.USER_PATH_JS;?>owl.carousel.js"></script>

<!--phần slide và quảng cáo-->
<div class="slide-box">
     <div id="owl-slide" class="owl-carousel" >
          <?php
             if(!empty($data['slide'])){
               foreach($data['slide'] as $item){
          ?>
             <div class="item" ><a href="<?=$item['link'];?>"><img src="<?=PATH_IMG_FLASH.$item['file_vn'];?>"></a></div>
          <?php }} ?>
     </div>
     
     <div class="box_quangcao">
		 <?php
            if(!empty($data['quangcao'])){
            foreach($data['quangcao'] as $item2){
         ?>
            <div class="quangcao_item" ><a href="<?=$item2['link'];?>"><img src="<?=PATH_IMG_FLASH.$item2['file_vn'];?>"></a></div>
         <?php }} ?>
     </div>
</div>
<!--------------------------->

<!--phần main trang chủ-->
<div class="defaul_main">
<div class="defaul_main_left">
    <!--phần tin tức trang chủ-->
    <div class="defaul_label"><?=VECHUNGTOI?></div>
    <div class="default_tintuc">
    <?php
    if(!empty($data['vechungtoi'])){
        foreach($data['vechungtoi'] as $item){
    ?>
    <div class="default_news_box">
        <a href="/du-an/<?php echo $item['alias'] ?>">
        <img class="default_news_images" src="<?=BASE_URL."data/News/".$item['images'] ?>" alt="<?=$item['title_'.lang];?>">
        <div class="default_news_info">
            <div class="default_news_title"><?=$item['title_'.lang];?></div>
            <div class="default_news_mota"><?=$item['description_'.lang];?></div>
        </div>
        <div style="clear:both"></div>
        </a>
    </div>
    <?php }} ?>
    </div>
    <!--------------------------->
    
    <!--phần sản phẩm trang chủ-->
    <div class="bx_prod_main">
	<?php if(!empty($data['prodhot'])){ ?>
    <div class="defaul_label"><?=SANPHAMNOIBAT?></div>
    <div class="customNavigation">
        <a class="btn prev"></a>
        <a class="btn next"></a>
    </div>
    <div id="owl-slide2" class="owl-carousel" >
		 <?php foreach($data['prodhot'] as $item) { ?>
         <div class="item2">
              <div class="images2">
                   <a href="/san-pham/<?=$item['alias'];?>.html"><img src="<?=PATH_IMG_PRODUCT.$item['images']?>" /></a>
              </div>
              <h2 class="defaul_sanpham_title"><a href="/san-pham/<?=$item['alias'];?>.html"><?=$item['title_'.lang];?></a></h2>
              <div class="defaul_sanpham_mota"><?=$item['description_'.lang];?></div>
              <div class="defaul_sanpham_xemtiep"><input type="button" name="xemtiep" id="btn_xemtiep" value="<?=XEMTIEP?>" /></div>
         </div>
         <?php } ?>
    </div>
    <?php } ?>
    </div>
    <!-------------------------->
</div>

<?php loadview('pagefixed/left',$left);?>
<div style="clear:both"></div>
</div>
<!---------------------->



<!--phần đối tác trang chủ-->
<div class="bx-df-partner">
     <div class="defaul_label"><?=DOITAC?></div>
     <div class="customNavigation">
        <a class="btn prev2"></a>
        <a class="btn next2"></a>
     </div>
     <div id="owl-partner" class="owl-pratner" >
          <?php
             if(!empty($data['partner'])){
             foreach($data['partner'] as $item){
          ?>
             <div class="items" ><a href="<?php echo $item['link']; ?>"><img src="<?php echo PATH_IMG_PARTNERS.$item['images']; ?>"></a></div>
          <?php }} ?>
     </div>
</div>

