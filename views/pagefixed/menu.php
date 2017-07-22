<div class="header">
<div id="content-size">
<div id="header-logo">
      <div id="logo"><a href="/"><img  src="<?php echo PATH_IMG_FLASH.$data["logo"]['file_vn']?>"></a></div>
        <div class="list_item_top">
        	<div class="div-search">
            <form action="<?php echo BASE_URL; ?>tim-kiem.html" method="get">
            <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" />
            <button type="submit">Tìm kiếm</button>
            </form>
            </div>
            <div class="cart-div">
            <a href="/gio-hang.html">
            	Giỏ Hàng <i class="fa fa-caret-down"></i>
            </a>
            </div>
	  		<div class="hotline-s"> <span>Tư vấn miễn phí</span>
            	<?php echo $data['support']['hotline1']; ?>
            </div>
	  </div>
</div>
<div id="nav-size">
  <div id="nav">
  		<div id="box-menu-doc">
		<div class="box-title"> <span>Danh mục sản phẩm </span></div>
        <div id="menud">
          <ul>
          <?php 
          $mcatelog = new Models_MCatelog();
          $data['catelog']= $mcatelog->listdata('*', 'parentid = "0" and ticlock = "0"  ','sort asc, Id desc');
          if(!empty($data['catelog'])){
              foreach($data['catelog'] as $row){
                $sub  = $mcatelog->listdata('*', 'parentid = "'.$row['Id'].'" and ticlock = "0" ','sort asc, Id desc');
          ?>
             <li><a href="<?php echo "/".$row['alias'] ?>"><?php echo $row['title_vn'] ?></a>
             <?php 
             if(!empty($sub)){ 
                echo ' <ul class="cap2">';
                foreach($sub as $item){
             ?>
                <li><a href="<?php echo "/".$item['alias'] ?>"><?php echo $item['title_vn'] ?></a></li><?php } ?>
            <?php echo '</ul>'; } ?>
          </li>
          <?php }} ?>     
          </ul>
        </div>
        </div>
        

     <div id="nav-menuhome2">
     	<div class="imenu" idhosw='0'><i class="fa fa-bars"></i> Menu  </div>
      	<ul class="imhie">
        <li><a href="/gioi-thieu.html">Giới thiệu</a></li>
        <li><a href="/thiet-ke-noi-that.html">Thiết kê nội thất</a></li>
        <li><a href="/thi-cong-van-phong.html">Thi công văn phòng</a></li>
        <li><a href="/thuong-hieu.html" onClick="return false">Thương hiệu</a>
        <?php 
		if(!empty($data['brand'])){
			echo "<ul>";
			foreach($data['brand'] as $item){
		?>
        <li><a href="/thuong-hieu/<?php echo $item['alias'] ?>">
		<?php 
		if(!empty($item['images'])) echo '<img src="/data/Manufacturer/'.$item['images'].'" width="60" />';
		echo $item['title_vn'] ?></a></li>
        <?php } echo "</ul>"; } ?>
        </li>
        <li><a href="/chu-de/videos.html">Videos</a></li>
        <li ><a href="/lien-he.html"><p>Liên hệ</p></a></li>
     	<li class="promotion"><a href="/khuyen-mai.html" >Khuyến mãi</a></li>
      </ul>
      	 
    </div>
  </div>
</div>

<div class="menu-top">   
<ul>
 <li><a href="/"><span>Trang chủ</span></a></li>
    <li><a href="/gioi-thieu.html"><span>Giới thiệu</span></a></li>
    <li><a href="#" onclick="return false" ><span>DANH MỤC SẢN PHẨM</span></a>
    <ul>
      <?php 
      if(!empty($data['catelog'])){
          foreach($data['catelog'] as $row){
			  $sub  = $mcatelog->listdata('*', 'parentid = "'.$row['Id'].'" and ticlock = "0" ','sort asc, Id desc');
      ?>
         <li><a href="<?php echo "/".$row['alias'].".html" ?>"><?php echo $row['title_vn'] ?></a>
           <?php 
             if(!empty($sub)){ 
                echo ' <ul class="cap2">';
                foreach($sub as $item){
             ?>
                <li><a href="<?php echo "/".$item['alias'] ?>"><?php echo $item['title_vn'] ?></a></li><?php } ?>
            <?php echo '</ul>'; } ?>
          </li>  
      </li>
      <?php }} ?>    
      </ul>
    </li>
    <li><a  href="/thiet-ke-noi-that.html"><span>Thiết kê nội thất</span></a></li>
    <li><a href="/thi-cong-van-phong.html"><span>Thi công văn phòng</span></a></li>
    <li><a href="/khuyen-mai.html"><span>Khuyến mãi</span></a></li>
    <li><a   href="/chu-de/videos.html"><span>Videos</span></a></li>
    <li><a href="/lien-he.html"><span>Liên hệ</span></a></li>
 </ul>
</div>
</div>
</div>
