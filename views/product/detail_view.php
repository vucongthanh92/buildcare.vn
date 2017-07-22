<script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery-1.9.1.min.js"></script>
<div class="breadcrumbs" style="border-top:solid 1px #ddd;">
     <div class="grid"><?=$data['map_title'];?></div>
</div>

<form id="form_prod" action="<?=BASE_URL."payment/addcart.html";?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="idpro" value="<?=$data['prod']['Id'];?>" />
<script>
     $(document).ready(function(e) {
         $("#addcart").click(function()
		 {
			 $("#form_prod").submit();
		 })
     });
</script>
<div class="grid_detailpro">
  <div class="box-images"><img src="<?=PATH_IMG_PRODUCT.$data['prod']['images'];?>" /></div>
  <div class="desc-info">
       <h1><?=$data['prod']['title_'.lang];?></h1>
       <p class="price"><?=PRICE?>: <span><?php if($data['prod']['sale_price']>0) echo bsVndDot($data['prod']['sale_price'])." VNĐ"; 
	      else echo MN_LIENHE;?>
       <span></p>
       <div class="detail_mota"><?=stripcslashes($data['prod']['description_'.lang]);?></div>
       <div id="addcart" class="addcart"><?=ADDCART?></div>
  </div>
  
  <div class="detail">
     <div class="tib"><span><?=THONGTINCHITIET?></span></div>
     <div class="contentsp"><?=stripcslashes($data['prod']['content_'.lang]);?></div>
  </div>
  <div class="space_10"></div>
  <div class="title-g"><span><?=SANPHAMCUNGLOAI?></span></div>
  <div class="prod_cungloai">
	  <?php
        if(!empty($data['spcl'])){
        foreach($data['spcl'] as $item){
      ?>
         <div class="item-prod">
            <div class="images"><a href="/san-pham/<?php echo $item['alias'] ?>.html">
              <img src="<?Php echo PATH_IMG_PRODUCT.$item['images'] ?>" /></a>
            </div>
            <h2><a href="<?=BASE_URL."san-pham/".$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></h2>
         </div>
      <?php }} ?>
      <div style="clear:both"></div>
  </div>
</div>
</form>