<?php 
	if(file_exists($model='./models/'.$_GET['rout'].'Model.php')){
		include($model);
	}else{
		echo 'none';
	}

	$art=$articles[$_GET['id']];

?>

<h1>СТАТЬЯ <?php echo $art['title'];?></h1>