<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7"> <![endif]-->
<!--[if IE 8 ]><html class="ie8"> <![endif]-->
<!--[if IE 9 ]><html class="ie9"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html> <!--<![endif]-->
<head>

	<title>MySCms</title>
	
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width" />
	
	
	<link rel="stylesheet" href="/css/normalize.css" />
	<!-- <link type="text/css" rel="stylesheet" href="css/bootstrap.css" media="all" /> -->
	<link rel="stylesheet" href="/css/style.css" />
	
</head>
<!-- ==== B O D Y ==== -->
<body>	
<!-- H E A D E R -->

<?php
/*echo '<br/>DOCUMENT_ROOT = '.$_SERVER['DOCUMENT_ROOT'];
echo '<br/>HTTP_HOST = '.$_SERVER['HTTP_HOST'];
echo '<br/>SERVER_NAME = '.$_SERVER['SERVER_NAME'];
echo '<br/>FILE = '.__FILE__;
echo '<br/>PHP_SELF = '.$_SERVER['PHP_SELF'];
echo '<br/><br/>REQUEST_URI = '.$_SERVER['REQUEST_URI'];
echo '<br/>PATH_INFO = '.$_SERVER['PATH_INFO'];
echo '<br/>QUERY_STRING = '.$_SERVER['QUERY_STRING'];
 $url2 = parse_url($_SERVER["REQUEST_URI"]);
echo '<pre>';
var_dump($url2); 
var_dump($_GET['rout']); 
echo '</pre>';*/
?>


<header>
	<div class="top_space">
		<div class="top_top"></div>
	</div>
	<nav class="top_nav">
		<?php
			$class='tlink';
			$thisurl = parse_url($_SERVER["REQUEST_URI"]);

			foreach($menu as $m){
				if($m['enable']){
					$h=parse_url($m['href']);
					$h=preg_replace('(\.\./)', '/', $h);
					if($h['query']==$thisurl['query']&&$h['path']==$thisurl['path']){$tag='span';$href='';}
					else{$tag='a';$href='href="'.$m['href'].'"';}

					echo '<'.$tag.' class="'.$class.'" '.$href.'>'.$m['name'].'</'.$tag.'>';
				}
			}
		?>
	</nav>	
</header>


<!-- end header -->
<div class="container">
<!-- C O N T E N T -->