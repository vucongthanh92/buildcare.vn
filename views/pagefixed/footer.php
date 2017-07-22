<?php
   $db = new Models_MWebsite;
   $mflash = new Models_MFlash;
   $mpagehtml = new Models_MPagehtml;
   
   $row_web = $db->getOneWebsite(1);
   $footer = $mpagehtml->getpagehtmlid("1");
?>

<div class="clear"></div>
<div class="footer">
     <div class="ft_grid">
          <a href="<?=BASE_URL;?>"><img id="logo_img" src="<?=BASE_URL."public/template/images/ft_logo.png";?>"></a>
          <div class="ft_info"><?=$footer['content_'.lang];?></div>
          <div class="ft_social">
              <div class="ft_social_label"><?=KETNOIVOICHUNGTOI?></div>
              <div class="ft_social_info"><a href="<?=$_SESSION['facebook']?>">
                  <img class="ft_social_img" src="<?=BASE_URL."public/template/images/icon_fb.png";?>" />
                  <div class="ft_social_title">Facebook</div>
              </a></div>
              <div class="ft_social_info"><a href="<?=$_SESSION['twitter']?>">
                  <img class="ft_social_img" src="<?=BASE_URL."public/template/images/icon_tt.png";?>" />
                  <div class="ft_social_title">Twitter</div>
              </a></div>
              <div class="ft_social_info"><a href="<?=$_SESSION['gplus']?>">
                  <img class="ft_social_img" src="<?=BASE_URL."public/template/images/icon_gp.png";?>" />
                  <div class="ft_social_title">Google+</div>
              </a></div>
              <div class="ft_social_info"><a href="<?=$_SESSION['youtube']?>">
                  <img class="ft_social_img" src="<?=BASE_URL."public/template/images/icon_tube.png";?>" />
                  <div class="ft_social_title">Youtube</div>
              </a></div>
          </div>
          <div style="clear:both"></div>
     </div>
     
     <div class="cpf">
          <div class="cpf_left">Copyright © 2016 Buildcare.com.vn. All rights reserved</div>
          <div class="cpf_right">Design and Deverlopment by <a href="http://www.thietke247.com/">Thietke247.com</a></div>
          <div style="clear:both"></div>
     </div>
</div>


<!--menu bottom mobie-->
<span class="mb_right_hotline">
    <span class="mb_bar">
    <ul>
    <li>
      <span class="bar_dm">Danh mục</span>
    </li>
    <li>
     <a href="tel:<?=$_SESSION['hotline1'];?>"><span><?=$_SESSION['hotline1'];?></span></a>
    </li>
    <li>
      <a href="/"> <span>Trang chủ</span></a>
    </li>
    <li>
     <a href="sms:<?=$_SESSION['hotline1'];?>"> <span id="bar_zopim">Gửi tin nhắn</span></a>
    </li>
    <li>
       <!--đếm số lượng sản phẩm-->
       <?php
	       if(!isset($_SESSION["cart2"])) $soluong=0;
		   else
		   {
			  $soluong=0;
			  foreach($_SESSION['cart2'] as $k=>$v)
			  {
				  $soluong=$soluong+1;
			  }
		   }
	   ?>
       <a href="<?=BASE_URL."gio-hang.html"?>">
       <div id="cart_soluong"><?=$soluong?></div>
       <!------------------------>
       <span id="bar_cart">Giỏ hàng</span></a>
    </li>
    </ul>
    <img class="icon_bottom" style="width:100%;z-index:0;" src="<?=BASE_URL.USER_PATH_IMG;?>mb_bar_bgsk.png">
    </span>
</span>
<div class="overlay-open-menu "></div>
<!----------------------->

<!-----------menu left mobi------------>
<script>
	$(document).ready(function(e) {
	   // Ẩn tất cả .accordion trừ accordion đầu tiên
	   $("#accordiondemo4 .accordion").hide();
	   // Áp dụng sự kiện click vào thẻ h3
	   $("#accordiondemo4 h3").click(function(){
	   // chọn .accordion (do phần tử đi đi ngay sau phần tử h3 nên ta dùng .next())
	   $accordion = $(this).next();
	   // Kiểm tra nếu đang ẩn thì sẽ hiện và ẩn các phần tử khác
	   // Nếu đang hiện thì click vào h3 sẽ ẩn
	   if ($accordion.is(':hidden') === true) {
	   $("#accordiondemo4 .accordion").slideUp();
	   $accordion.slideDown();
		} else {
		$accordion.slideUp();
	  }
	});
	});
</script>
<div class="slidebarmenu">
    <div id="accordiondemo4">
         <div id="menu_accor1" class="iconx"><img src="<?=BASE_URL."public/template/images/icon-x.png";?>"></div>
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL;?>"><?=MN_HOME?></a></h3>
         </div>
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."du-an.html"?>"><?=DUAN?></a></h3>
         </div>
         <!--menu loại sản phẩm-->
         <?php
             $sql="select * from mn_catelog where parentid='0' order by sort asc, Id desc";
             $ds=mysql_query($sql) or die(mysql_error());
             while($ds_row=mysql_fetch_assoc($ds)) {
                 //menu con
                 $idpa = $ds_row['Id'];
                 $sql2="select * from mn_catelog where ticlock='0' and parentid='$idpa' order by sort asc, Id desc";
                 $ds2 = mysql_query($sql2) or die(mysql_error());
                 $row=mysql_num_rows($ds2);
                 if($row==0) $click=0;
                 else $click=1;
         ?>
         <div id="<?php if($_SESSION['id_listprod']==$ds_row['id']) echo "according_show" ?>" class="according_box">
             <h3 <?php if($row>0) echo "style='background-image:url(".BASE_URL."public/template/images/lib-v2.png)'";?> class="according_parent">
             <a onClick="<?php if($click==1) echo "return false";?>" href="<?=BASE_URL.$ds_row['alias'].".html";?>">
                <?=$ds_row['title_'.lang];?>
             </a>
             </h3>
             <div class="accordion">
             <?php
                 $line=mysql_num_rows($ds2);
                 if($line>0) {
                 while($ds_row2=mysql_fetch_assoc($ds2)) {
             ?>
                 <p class="according_child"><a href="<?=BASE_URL.$ds_row2['alias'].".html";?>">
                 <?=$ds_row2['title_'.lang];?></a></p>
             <?php }} ?>
             </div>
         </div>
         <?php } ?>
    </div>
    
    <div id="accordiondemo5">
         <?php
            $sql="select * from mn_catnews where ticlock='0' order by sort asc, Id desc";
            $ds=mysql_query($sql) or die(mysql_error());
            while($item=mysql_fetch_assoc($ds)) {
         ?>
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."chu-de/".$item['alias'].".html";?>"><?=$item['title_'.lang]?></a></h3>
         </div>
         <?php } ?>
         <div class="according_box">
            <h3 class="according_parent"><a href="<?=BASE_URL."lien-he.html";?>"><?=MN_CONTACT?></a></h3>
         </div>
    </div>
    <div style="clear:both;"></div>
</div>
<!------------------------------------------------>