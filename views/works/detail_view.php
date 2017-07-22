<script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery-1.9.1.min.js"></script>

<div class="breadcrumbs">
     <div class="grid"><a href="<?=BASE_URL?>"><?=MN_HOME?></a> >
          <a href="<?=BASE_URL."du-an.html"?>"><?=DUAN?></a>
     </div>
</div>

<div class="detail_duan">

     <!--phần danh sách ảnh dự án-->
     <div class="duan_list_images">
		 <?php
            if(!empty($data['hinh'])){
                foreach($data['hinh'] as $item){
         ?>
            <img class="duan_hinhanh" src="<?=BASE_URL.PATH_IMG_WORKS.$item['images'];?>" />
         <?php }} ?>
     </div>
     <script>
	     $(document).ready(function(e) {
             $(".duan_hinhanh").click(function()
			 {
				 var url = $(this).attr("src");
				 $("#duan_detail_hinhanh").attr("src",url);
			 })
         });
	 </script>
     <!---------------------------->
     
     <div class="duan_detail_images">
        <?php if(!empty($data['hinh'][0]['images'])){ ?>
           <img id="duan_detail_hinhanh" src="<?php echo PATH_IMG_WORKS.$data['hinh'][0]['images'] ?>" />
        <?php } ?>
     </div>
     
     <div class="duan_content">
          <div class="duan_content_title"><span><?=$data['prod']['title_'.lang]?></span></div>
          <?=stripcslashes($data['prod']['content_'.lang]);?>
     </div>
     <div style="clear:both"></div>
</div>
