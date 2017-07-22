<?php include('submenu2.php'); ?>
<div class="main_area">
    <div class="breakcrumb">
    <table border="0">
    <tbody>
    <tr>
    <td width="25">
    <img alt=""  src="<?=ADMIN_PATH_IMG ?>icon-48-pro.png" style="width:23px; height: 23px">
    </td>
    <td> Quản lý phản hồi  </td>
    </tr>
    </tbody>
    </table>
    </div>
</div>
<div class="content">

<form action='<?=BASE_URL_ADMIN;?>comment/del' method='post' name="rowsForm" id="rowsForm">

<div class="list_button">
     <a href='<?=BASE_URL_ADMIN;?>comment/add' class="button" ><img src='<?=ADMIN_PATH_IMG;?>icon-16-plus.png'><?=G_ADD;?></a>
</div>

<table class="view">
	<tr>
		<th><input type="checkbox" name="Check_ctr" id='Check_ctr' value="yes" onClick="Check(document.rowsForm.check_list)"></th>
		<th>Id</th>
		<th>Họ Tên</th>
        <th>Công Việc</th>
        <th>Hình Ảnh</th>
        <th>Email</th>
		<th>Ngày Đăng</th>
		<th>Khóa</th>
		<th colspan='2'>Hành Động</th>
	</tr>
	<?php if(empty($data['info'])){ //neu khong co du lieu ?>
	<tr>
		<td colspan='8' class='emptydata'><?=G_EMPTYDATA;?></td>
	</tr>
	<?php
	}
	else //neu co du lieu xuat du lieu ra
	{
		foreach($data['info'] as $item)
		{
		?>
		<tr>
			<td align = 'center'><input type="checkbox" id = 'check_list' name="check_list[]" value="<?php echo $item['Id'];?>"><br></td>
			<td><?php echo $item['Id']; ?></td>
			<td><?php echo $item['hoten'];?></td>
            <td><?php echo $item['congviec'];?></td>
            <td><img width="50" src="<?=BASE_URL."data/Phanhoi/".$item['images'];?>" /></td>
            <td><?php echo $item['email'];?></td>
			<td><?php echo date("d-m-Y",$item['date']);?></td>
			<td align = 'center'>
           <?php 
			if($item['ticlock'] == "1"){
				echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_COMMENT."\",\"ticlock\",\"".$item['Id']."\",\"0\",\""
				.BASE_URL_ADMIN."\");' title='Bỏ khóa'><img src='".ADMIN_PATH_IMG."icon-16-remove.png'></a></div>";
			}
			else{
				echo "<div id='".$item['Id']."'><a href='javascript:ticlockactive(\"".TBL_COMMENT."\",\"ticlock\",\"".$item['Id']."\",\"1\",\""
				.BASE_URL_ADMIN."\");' title = 'Khóa tin'><img src = '".ADMIN_PATH_IMG."icon-16-tick.png'></a></div>"; 
			}
			?>
			</td>
            
			<td align='center'><a href='<?=BASE_URL_ADMIN;?>comment/edit/<?=$item['Id'];?>' title='Sửa'><img src='<?=ADMIN_PATH_IMG;?>b_edit.png'>
            </a></td>
			<td align='center'><a href='<?=BASE_URL_ADMIN."comment/del/".$item['Id'];?>' title='Xóa' onclick='javascript:thongbao("
			<?=JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>");'><img src='<?=ADMIN_PATH_IMG;?>b_drop.png'></a></td>
		</tr>
		<?php }} ?>
</table>
<?php 
if(isset($data['page']) && $data['page'] != "")
{
	echo "<hr/>Trang: ";
	echo $data['page'];
}
?>
<div class="list_button">
<a href = 'javascript:CheckAll(document.rowsForm.check_list)' class="button" >Check all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href = 'javascript:UnCheckAll(document.rowsForm.check_list)' class="button" >Uncheck all</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmDelete('<?php echo JSM_DO_YOU_REALLY_WANT_TO_DELETE;?>',document.rowsForm.check_list)" class="button" >Delete</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="javascript:confirmSave('<?php echo JSM_DO_YOU_REALLY_WANT_TO_SAVE;?>','<?php echo BASE_URL_ADMIN;?>comment/save')" class="button" >Save</a>
</div>
</form>
</div>