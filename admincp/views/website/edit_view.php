<?php include('submenu_hethong.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
       <tbody>
          <tr>
             <td width="25">
                 <img alt="" src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">
             </td>
             <td> Hệ thống/ Cấu hình site  </td>
          </tr>
       </tbody>
    </table>
    </div>
</div>

<div class="content">
<div class="content_i">
<form action = '<?php echo BASE_URL_ADMIN;?>website/edit/<?php echo $data['info']['id']?>' method = 'post' enctype = "multipart/form-data">
<table>
<tbody>
<tr>
   <td width="600">
<table>

	<tr>
		<td class = 'title_td'>Tiêu đề </td>
		<td><input type = 'text' name = 'title_vn' size = '60' value = '<?=$data['info']['title_vn'];?>'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Slogan (vn) </td>
		<td><input type='text' name='slogan_vn' size='60' value='<?=$data['info']['slogan_vn'];?>'></td>
	</tr>
    
     <tr>
		<td class = 'title_td'>Slogan (en) </td>
		<td><input type='text' name='slogan_en' size='60' value='<?=$data['info']['slogan_en'];?>'></td>
	</tr>
    
	<tr>
		<td class = 'title_td'>Email</td>
		<td><input type = 'text' name = 'email' size = '50' value = '<?=$data['info']['email'];?>'></td>
	</tr>
    <tr>
		<td class = 'title_td'>Hotline</td>
		<td><input type = 'text' name = 'hotline' size = '50' value = '<?=$data['info']['hotline'];?>'></td>
	</tr>
    
    <tr>
		<td class = 'title_td'>Meta Keyword </td>
		<td><textarea  style="width:400px; height:100px;" name="keyword_vn"><?=$data['info']['keyword_vn'];?></textarea></td>
	</tr>
     <tr>
		<td class = 'title_td'>Meta Description </td>
		<td><textarea  style="width:400px; height:100px;" name="description_vn"><?=$data['info']['description_vn'];?></textarea></td>
	</tr>
     <tr>
		<td class = 'title_td'>Google analytics</td>
		<td><textarea  style="width:400px; height:200px;" name="google"><?=$data['info']['googleanalytics'];?></textarea></td>
	</tr>

	<tr>
   	 <th  align = 'center'>
		<th  align = 'center'>
			<input type = "hidden" >
			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;
			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button" >
		</th>
	</tr>	
</table>
</td>
<td valign="top">


</td>
</tr>
</tbody>
</table>
</form>
</div>
</div>