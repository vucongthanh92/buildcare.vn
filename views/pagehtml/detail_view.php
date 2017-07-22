<div class="page-title-wrap " <?php if($data['adv']['file_vn']!=""){ ?>style="background-image:url(<?php echo PATH_IMG_FLASH.$data['adv']['file_vn'] ?>); color:#fff" <?php } ?>><div class="grid"><h1 class="page-entry-title "><?php echo $data['info']['title_vn'] ?></h1></div></div>
<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'] ?></div></div>
<div class="grid">
<?php echo stripcslashes($data['info']['content_vn']); ?>
</div>

