<div class="breadcrumbs"><div class="grid"><?php echo $data['map_title'] ?></div></div>
<div class="grid_contact">
<div class="col-md-6">
	<?php echo stripslashes($data['lienhe']['content_'.lang]);?>
    <div style="clear:both;margin-top:10px; text-align:center; overflow:hidden;">
		<?php echo stripslashes($data['googlemap']['content_'.lang]);?>
    </div>
</div>

<div class="col-md-6">
<?Php if($data['error']==1) { ?>
<div class="alert alert-danger"><?=$data['mesage'] ?></div>
<? } ?>
<form action="/lien-he.html" name="formlienhe" class="formlienhe" method="post">
	<label><?=HOTEN?>: </label>
	<input name="hoten" class="form-control" value="<?=$data['hoten'] ?>" type="text" placeholder="<?=HOTEN?>"/>
    <label><?=DIACHI?>: </label>
    <input name="diachi" value="<?=$data['add']?>" type="text" placeholder="<?=DIACHI?>" class="form-control"/>
    <label>Email : </label>
    <input name="email" value="<?=$data['email'] ?>" type="text" placeholder="Email"  class="form-control" />
    <label><?=DIENTHOAI?>: </label>
	<input name="dienthoai" value="<?=$data['tell']?>" type="text" placeholder="<?=DIENTHOAI?>" class="form-control"/>
    <label><?=NOIDUNG?>: </label>
    <textarea name="noidung" class="form-control" style="height:auto" rows="3" id="noidung"><?=NOIDUNG?></textarea>
    <div class="clear"></div>
   <input type="submit" name="btngui" id="btngui" value="<?=GUILIENHE?>" class="btn btn-primary clear" />				
</form>											
</div>
<div class="space_10"></div>

</div>
</div>
