<div id="index-box">
<?php loadview('pagefixed/left'); ?>
<div id="box-h-right">
<div class="breadcrumb"><?php echo $data['map_title']; ?></div>
    <div class="usual" id="usual1">
    <?php if(!empty($data['info'])){ ?> 
    <ul>  
    <?php foreach($data['info'] as $item){?>
    <li><a href="#tab<?php echo $item['Id']; ?>" class="selected"><?php echo $item['title_vn'] ?></a></li> 
    <?php } ?>
    </ul> 
     <?php foreach($data['info'] as $item){?>
    <div class="content_tab" id="tab<?php echo $item['Id']; ?>"><?php echo stripcslashes($item['content_vn']); ?></div>
   	<?php } ?>
    <?php }else{ ?>
    <p style="color:#F00; padding:10px; border:solid 1px #eee;">Không có  dữ liệu</p>
    <?php } ?>
    </div>
<div class="space_10"></div>
</div>
</div>
<script>
   jQuery(function(){
		 tab();
   });
function tab() {
		$('.content_tab').hide();
		$('.content_tab:first').show();
		$('#usual1 li:first').addClass('selected');
		$('#usual1 li').click(function(){
		   var  id_content = $(this).find('a').attr("href"); 
		   $('.content_tab').hide();
		   $(id_content).fadeIn();
		   $('#usual1 li').removeClass('selected');
		   $(this).addClass('selected');
		   return false;
		});
}   
</script>