<?php
	$db = new Models_MWebsite;
	$mnews = new Models_MNews;
    $mcat = new Models_MCatnews;
	$row_web = $db->getOneWebsite(1);
	$mod = $_GET['mod'];
	$act = $_GET['act'];

	if($_GET['mod']=="tin-tuc")
	{
		if($_GET['act']=="danh-muc")
		{
			$val = varGet('id');
			$id = $mcat->getAlias($val);
			$idcat = $id;
		}
		else if($_GET['act']=="chi-tiet")
		{
			$val = varGet("id");
			$id = $mnews->getAlias($val);
			$danhmuc = $mnews -> getOneNews($id,"*");
			$idcat = $danhmuc['idcat']; 
		}
	}
?>

<div class="slidebar"> 
    <div class="grid">
        <!--phần logo trên banner-->
        <div class="site-logo"> 
             <a href="<?=BASE_URL;?>"><img id="logo_img" src="<?=PATH_IMG_FLASH.$data['logo']['file_vn'];?>" alt=""> </a>
             <div id="slogan"><?=$row_web['slogan_'.lang];?></div>
             <div id="slogan_img"><img src="<?=PATH_IMG_FLASH.$data['slogan']['file_vn'];?>" alt=""></div>
        </div>
        <!------------------------->
        
        <div class="topbar">
            <div class="text-right">
                <form method="post" action="" name="frmLang">
                   <div class="lang_box" onclick="javascript:setLang('vn')">
                      <img title="Vietnamese" src="public/template/images/vn.png"> <div>Vietnamese</div>
                   </div>
                   <div class="lang_box" onclick="javascript:setLang('en')">
                      <img title="English" src="public/template/images/en.png"> <div>English</div>
                   </div>
                   <input type="hidden" value="vi" name="lang">
                </form>
            </div>
            
            <div class="hotline_top">Hotline: <?=$row_web['hotline']?></div>
        </div>
        
        <!--thanh tìm kiếm-->
        <div class="div_search">
            <div class="gh-search" id="gh-search">
            <div class="gh-search-input-wrapper">
                 <button class="gh-search-submit" id="gh-search-submit" type="submit">
                        <span class="gh-text-replace">Search </span>
                 </button>
                 <input type="text" placeholder="Search " name="q" class="gh-search-input" id="gh-search-input">
            </div>   
            </div>
        </div>
        <!------------------>
        <div style="clear:both"></div>
    </div>
</div>
    
<!--phần menu trên top-->
    <div class="header-right-wrap"> 
    <nav id="site-navigation" class="main-navigation">
    <ul class="wpc-menu">
        <li <?php if($mod == "") echo 'class="selected"'; ?>><a href="<?=BASE_URL?>"><?=MN_HOME?></a></li>
        <li><a href="<?=BASE_URL."san-pham.html"?>"><?=MN_PRODUCT?></a>
			<?php
			    $sql="select * from mn_catelog where ticlock='0' and parentid='0'";
				$ds=mysql_query($sql) or die(mysql_error());
                if(!empty($ds)){
                echo '<ul class="dropdown-menu">';
                while($item = mysql_fetch_assoc($ds)){
            ?>
            <li><a href="<?=BASE_URL.$item['alias'].".html";?>"><?=$item['title_'.lang];?></a></li>
            <?php }echo '</ul>'; } ?>
        </li>
        
        <?php
		    $sql2="select * from mn_catnews where home='1' and ticlock='0'";
			$ds2=mysql_query($sql2) or die(mysql_error());
			while($row2=mysql_fetch_assoc($ds2)) {
		?>
        <li><a href="<?=BASE_URL."chu-de/".$row2['alias'].".html";?>"><?=$row2['title_'.lang]?></a></li>
        <?php } ?>
        <li><a href="<?=BASE_URL."du-an.html"?>"><?=DUAN?></a></li>
        <li><a href="<?=BASE_URL."lien-he.html"?>"><?=MN_LIENHE?></a></li>
    </ul>
    <div class="clear"></div>
    </nav>
    <!------------------------->
</div>