<script type = 'text/javascript'>
function checkform(){
	var frm = document.frm1;
	if(frm.idcat.value == 0){
		alert("Vui lòng chọn chủ đề");
		return false;
	}

	if(frm.title_vn.value == "")
	{
		alert("Vui lòng nhận tiêu đề");
		frm.title_vn.focus();
		return false;
	}
}
</script>

<?php include('submenu_duan.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
       <tr>
          <td width="25"><img alt=""  src="<?php  echo  ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px"></td>
          <td> Quản lý nội dung / Dự án / Sửa </td>
       </tr>
    </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<table width="100%">
<tbody>
    <tr>
       <td width="800" valign="top">
       <form name="frm1" action='<?=BASE_URL_ADMIN;?>works/edit/<?php echo $data['info']['Id'];?>' method='post' enctype= "multipart/form-data" 
       onsubmit = "return checkform();">
       <table>
          <?php if($data['info']['images'] != ""){?>
	      <tr>
		     <td>&nbsp;</td>
		     <td><div id="images"><img src="<?=BASE_URL;?>data/Works/<?=$data['info']['images']?>" height="50">
			     <a href="javascript: delFlash('<?=TBL_WORKS ?>','images',<?=$data['info']['Id']?>,'<?=$data['info']['images'];?>','images','
				 <?=BASE_URL_ADMIN?>')"><img src="<?=ADMIN_PATH_IMG;?>b_drop.png"></a>
			     </div>
		     </td>
	      </tr>
	      <?php } ?>
	      <tr>
		     <td class='title_td'><?=IMAGES;?></td>
		     <td><input type='file' name='images' size="50"></td>
          </tr>
          <tr>
    	     <td class = 'title_td'><strong>Alias</strong></td>
		     <td><input type = 'text' name = 'alias' value = '<?php  echo  $data['info']['alias'] ?>' size = '50'> </td>
	      </tr>
          <?php foreach($config_lang as $klang => $vlang){ ?>
          <tr>
    	     <td class='title_td'><strong>Tiêu đề (<?=$vlang?>)</strong></td>
		     <td><input type='text' name='title_<?=$vlang?>' value="<?=stripcslashes($data['info']['title_'.$vlang]);?>" size='90'></td>
	      </tr>
          <tr>
    	     <td class='title_td'><strong>Chi tiết (<?=$vlang?>)</strong></td>
		     <td><textarea name="content_<?=$vlang?>" id="editor_<?=$vlang?>"> <?=stripcslashes($data['info']["content_".$vlang]);?></textarea></td>
	      </tr>
          <?php } ?>
          <tr>
             <td class = 'title_td'> Meta Keyword</td>
             <td><textarea name="meta_keyword" rows="3" style="width:400px"><?=stripcslashes($data['info']['meta_keyword']);?></textarea></td>
          </tr>
          <tr>
             <td class = 'title_td'> Meta Description</td>
             <td>
                 <textarea name="meta_description" rows="3" style="width:400px"><?=stripcslashes($data['info']['meta_description']) ?></textarea>
             </td>
          </tr>
          <tr>
             <td class='title_td'><?=SORT;?></td>
             <td><input type='text' name='sort' size='30' value="<?=$data['info']['sort'];?>"></td>
          </tr>
          <tr>
             <td class = 'title_td'>Khóa</td>
             <td>
            	<select name="ticlock">
                	<option value="1" <?php if($data['info']['ticlock'] == 1) echo "selected";?> >Bật</option>
                    <option value="0" <?php if($data['info']['ticlock'] == 0) echo "selected";?>  >Tắt</option>
            	</select>
             </td>
          </tr>
	      <tr>
    	     <td></td>
		     <th align='center'>
			     <input type='submit' value='<?=G_BUTTON_EDIT;?>' name='editnew' class="button" style="margin-left:250px;">&nbsp;&nbsp;&nbsp;&nbsp;
			     <input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">
		     </th>
	      </tr>	
      </table>
      </form>
</td>

<td valign="top">
<form  action='<?=BASE_URL_ADMIN;?>works/saveimages/<?=$data['info']['Id'];?>' method='post' enctype="multipart/form-data" name="rowsForm" id="rowsForm">
   <div class="list_button">
   <a href='<?=BASE_URL_ADMIN?>works/addimages/<?=$data['info']['Id'] ?>' class="button"><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'> Thêm hình</a>
   </div>
   <table class="right_new view" width="100%" >
	  <tr>
		<th>ID</th>
		<th><?php echo IMAGES; ?></th> 
		<th><?php echo SORT; ?></th>
		<th width="50"><?php echo G_LOCK; ?></th>
		<th colspan = '2'><?php echo G_ACTION; ?></th>
	  </tr>
      <?php
	     if(!empty($data['listimages'])){
		 foreach($data['listimages'] as $item){
	  ?>
      <tr>
		<td align="center";><?=$item['Id']; ?></td>
		<td><img src="<?=BASE_URL.PATH_IMG_WORKS.$item['images'] ?>" width="60" ></td> 
		<td align="center"><input type='text' size='5' name='sort[<?=$item['Id'];?>]' value="<?=$item['sort'];?>" style='text-align:center;' /></td>
		<td align="center">
        <?php 
		if($item['ticlock'] == "1"){
			echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_WORKS."\",\"ticlock\",\"".$item['Id']."\",\"0\",\"".BASE_URL_ADMIN
			."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
		}else{
			echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_WORKS."\",\"ticlock\",\"".$item['Id']."\",\"1\",\"".BASE_URL_ADMIN
			."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
		}?>
        </td>

        <td align='center' width="30"><a href='<?=BASE_URL_ADMIN;?>works/editimages/<?=$item['Id']."/".$data['info']['Id'];?>' title='Sửa'>
        <img src='<?=ADMIN_PATH_IMG;?>b_edit.png'></a></td>
        <td align='center' width="30"><a href='<?=BASE_URL_ADMIN."works/delimages/".$item['Id'].".".$data['info']['Id'];?>' title='Xóa' 
        onclick='javascript:thongbao("<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src='<?=ADMIN_PATH_IMG;?>b_drop.png'></a></td> 
	</tr>
    <?php }}else{ ?>
    <tr>
		<td colspan='7' class='emptydata'><?=G_EMPTYDATA; ?></td>
	</tr>
    <?php } ?>
    </table>
    
    <div class="list_button"><a href="javascript:confirmSave('<?=JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?=BASE_URL_ADMIN;?>works/saveimages/
	<?=$data['info']['Id'] ?>')" class="button"><img class="icon" src="<?=ADMIN_PATH_IMG;?>/b_save.png" title="Cập nhật thứ tự" /> Save</a></a>
</form>
</td>
</tr>
</tbody>
</table>

</div>
</div>

<script type="text/javascript">
if (typeof CKEDITOR == 'undefined') {
	document.write('CKEditor');
}
else 
{
	var editorContent_vn = CKEDITOR.replace('editor_vn'); 
	editorContent_vn.config.width = 650;
	editorContent_vn.config.height = 200;
	CKFinder.setupCKEditor(editorContent_vn,'<?=BASE_URL;?>public/ck/ckfinder/');
	
	var editorContent_en = CKEDITOR.replace('editor_en'); 
	editorContent_en.config.width = 650;
	editorContent_en.config.height = 200;
	CKFinder.setupCKEditor(editorContent_en,'<?=BASE_URL ?>public/ck/ckfinder/');
}
</script>