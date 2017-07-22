<?php
  require("header.php");
  require("controllers/pagefixed/pagefixed.php");
  $favicon = $mflash->getOneflashLocation(9);
?>

<!doctype html>
<html>
	<head>
    <title><?php echo htmlspecialchars($meta['title']);?></title>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($favicon['file_vn'] !=""){ ?>
    <link rel="shortcut icon" href="<?php echo PATH_IMG_FLASH.$favicon['file_vn'];?>" type="image/x-icon" />
    <?php  } ?>
    <base href = "<?=BASE_URL;?>" />
    <meta name = "keywords" content = "<?=strip_tags($meta['keywork']);?>" />
    <meta name = "description" content = "<?=strip_tags($meta['description']);?>" />
    <meta name = "abstract" content = "<?=strip_tags($meta['description']);?>" />
    
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>style.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap950px.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap770px.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap650px.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap480px.css" />
    <link rel= "stylesheet" type = "text/css" href = "<?php echo BASE_URL.USER_PATH_CSS;?>bootstrap350px.css" />
    
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>jquery.hc-sticky.min.js"></script>
    <script type="text/javascript" src="<?=BASE_URL.USER_PATH_JS;?>website.js"></script>
    <?=stripcslashes($row_web['googleanalytics']); ?>
    
    <script language="javascript">
		function setLang(str)
		{
		   document.frmLang.lang.value=str;
		   document.frmLang.submit();
		}
	</script>	
    
</head>
<body>
	<div id="baseurljs" style="display:none"><?php echo BASE_URL; ?></div>
	<?php loadview('pagefixed/banner',$banner);?>
	<?php include 'main.php';?> 
	<?php loadview('pagefixed/footer',$footer)?>
</body>
</html>