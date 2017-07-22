<?php include('submenu.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý Shop / Thương hiệu / Sửa </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>manufacturer/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">
<table>

<?php
foreach($config_lang as $klang => $vlang)
{
?>
	<tr>
		<td class = 'title_td'><?php echo TITLE;?> (<?php echo $vlang;?>)</td>
		<td><input type = 'text' name = 'title_<?php echo $vlang;?>' size = '50' value = '<?php echo $data['info']['title_'.$vlang];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Alias</td>
		<td><input type = 'text' name = 'alias' size = '50' value = '<?php echo $data['info']['alias'];?>'></td>
	</tr>
     <tr>
		<td class = 'title_td'>Mô tả(<?=$vlang ?>)</td>
		<td><textarea name="description_vn" id="editor1" style="width:450px; height:100px;"> <?php echo stripcslashes($data['info']["description_".$vlang]); ?></textarea></td>
	</tr>
<?php
}
?>
<?php if($data['info']['images'] != ""){?>
	<tr>
		<td>&nbsp;</td>
		<td>
			<div id = "images">
			<img src = "<?=BASE_URL ?>data/Manufacturer/<?=$data['info']['images']?>"  height = "50">
			<a href = "javascript: delFlash('<?php echo TBL_MANUFACTURER?>','images',<?php echo $data['info']['Id']?>,'<?php echo $data['info']['images5'];?>','images','<?=BASE_URL_ADMIN?>')"><img src = "<?php echo ADMIN_PATH_IMG;?>b_drop.png"></a>
			</div>
		</td>
	</tr>
	<?php } ?>
   <tr>
		<td class = 'title_td'><?php echo IMAGES;?></td>
		<td><input type = 'file' name = 'images' size = "50"></td>
	</tr>
	<tr>
		<td class = 'title_td'>Title Page</td>
		<td><input type = 'text' name = 'titlepage' size = '50' value = '<?php echo $data['info']['titlepage'];?>'></td>
	</tr>
         <tr>
		<td class = 'title_td'>Meta Keyword</td>
		<td>
        <textarea name="meta_keyword" class="arekeyword"><?=stripcslashes($data['info']['meta_keyword']) ?></textarea>
        </td>
	</tr>
	<tr>
		<td class = 'title_td'>Meta Description</td>
		<td>
        <textarea name="meta_description" class="aredescription"><?=stripcslashes($data['info']['meta_description']) ?></textarea>
        </td>
	</tr>
    <tr>
		<td class = 'title_td'><?php echo SORT;?></td>
		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'];?>'></td>
	</tr>
	<tr>
		<td class = 'title_td'><?php echo TICLOCK;?></td>
		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>
	</tr>
	<tr>
    	<td></td>
		<th align = 'center'>
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
		</th>
	</tr>	
</table>
</form>
</div>
</div>
<script type="text/javascript">
if (typeof CKEDITOR == 'undefined') {
	document.write('CKEditor');
}else {
	var editorContent = CKEDITOR.replace('editor1'); 
	editorContent.config.width = 690;
	editorContent.config.height = 200;
	CKFinder.setupCKEditor( editorContent,'<?php echo BASE_URL ?>public/ck/ckfinder/');
}
</script>