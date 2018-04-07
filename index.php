

<?php include("config.php"); 


/* pages */
if(file_exists($page='./models/pagesModel.php')){
		include($page);
		$href = $_GET['rout']?'/'.$_GET['rout'].'/':'/';
		$href .= $_GET['view']?$_GET['view'].'/':is_numeric($_GET['id'])?'single/':'';
		$pages = Pages::db();
		$page = Pages::db($href);
	}
/* menus */

/* model */
if($_GET['rout']){
	if(file_exists($model='./models/'.$_GET['rout'].'Model.php')){
		include($model);
		if(class_exists(Articles)){//временно
			$results = Articles::db();
		}
	}
	if(isset($_GET['id'])&&$model){
		$result = Articles::db((int)$_GET['id']);
	}
}

/* varibale */
$title = ($result['title'])?:($page['title'])?:'oups';
$titleTag = ($result['titleTag'])?:'';



/*  FRONT BEGIN  */

/*  HEADER  */
include("./templates/header.php");

/*   BEGIN CONTENT   */
	if($_GET['rout']){
		if(file_exists($view='./views/'.$_GET['rout'].'/'.($_GET['view']?$_GET['view']:is_numeric($_GET['id'])?'single':'index').'.php')){
			include($view);
		}else{
			echo "404";
		}
	}else{
		include('./views/home/index.php');
	}
/*   END CONTENT   */

/*  FOOTER  */
include("./templates/footer.php"); ?>

