<?php include("config.php"); ?>

<?php include("/templates/header.php"); ?>

<?php echo $_GET['rout'].' and '.$_GET['id']; ?>



<?php
	if($_GET['rout']){
		if(file_exists($page='./views/'.$_GET['rout'].'/'.($_GET['view']?$_GET['view']:is_numeric($_GET['id'])?'single':'index').'.php')){
			include($page);
		}else{
			echo 'none';
		}
	}else{
		include('./views/home/index.php');
	}

http://mysite/index.php?rout=aboutme
?>
	
	
<?php include("/templates/footer.php"); ?>

