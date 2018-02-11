<?php 
	if(file_exists($model='./models/'.$_GET['rout'].'Model.php')){
		include($model);
	}else{
		echo 'none';
	}

	$art=$articles[$_GET['id']];

?>

<h1>СТАТЬИ</h1>

<div class="art_menu">

	<?php
			$class='alink';
			$thisurl = parse_url($_SERVER["REQUEST_URI"]);

			foreach($articles as $a){
				if($a['enable']){
					$h=parse_url('/articles/'.$a['id'].'/');
					$h=preg_replace('(\.\./)', '/', $h);
					if($h['query']==$thisurl['query']&&$h['path']==$thisurl['path']){$tag='span';$href='';}
					else{$tag='a';$href='href="/articles/'.$a['id'].'/"';}

					echo '<'.$tag.' class="'.$class.'" '.$href.'>'.$a['title'].'</'.$tag.'>';
				}
			}
		?>


</div>
