<?php include('submenu_duan.php'); ?>

<div class="main_area">

    <div class="breakcrumb">

    <table border="0">

    <tbody>

    <tr>

    <td width="25">

    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-image.png" style="width:23px; height: 23px">

    </td>

    <td> Quản lý nội dung / Đối tác /  sửa</td>

    </tr>

    </tbody>

    </table>

    </div>

</div>

         



<div class="content">

<div class="content_i">



<form action = '<?php echo BASE_URL_ADMIN;?>weblink/edit/<?php echo $data['info']['Id']?>' method = 'post' enctype = "multipart/form-data">

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

		<td class = 'title_td'>Link</td>

		<td><input type = 'text' name = 'link' size = '50' value = '<?php echo $data['info']['link'];?>'></td>

	</tr>

<?php

}

?>
	<tr>

		<td class = 'title_td'><?php echo IMAGES;?></td>

		<td><input type = 'file' name = 'images' size = "50"></td>

	</tr>

	

	<tr>

		<td class = 'title_td'><?php echo SORT;?></td>

		<td><input type = 'text' name = 'sort' size = '10' value = '<?php echo $data['info']['sort'] ?>'></td>

	</tr>
	<tr>

		<td class = 'title_td'><?php echo TICLOCK;?></td>

		<td><input type = 'checkbox' name = 'ticlock' value = '1' <?php if($data['info']['ticlock'] == 1) echo 'Checked';?>></td>

	</tr>

	<tr>

    	<th></th>

		<th align = 'center'>

			<input type = 'submit' value = '<?php echo G_BUTTON_EDIT;?>' name = 'editnew' class="button">&nbsp;&nbsp;&nbsp;&nbsp;

			<input type = 'reset' value = '<?php echo G_BUTTON_RESET;?>' class="button">

		</th>

	</tr>	

</table>

</form>

</div>

</div>