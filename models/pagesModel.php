<?php 
class Pages{

	function db($href=false){

		$pages=[
			['id'=>1,'title'=>'главная','href'=>'/','titleTag'=>'MySite','enable'=>true],
			['id'=>2,'title'=>'записи','href'=>'/articles/','enable'=>1],
			['id'=>3,'title'=>'запись','href'=>'/articles/single/','enable'=>1],
			['id'=>4,'title'=>'обо мне','href'=>'/aboutme/','enable'=>1],
		];

		if($href){
			foreach($pages as $page){
				if($page['href']==$href){
					return $page;
				}
			}
			
		}else{
			return $pages;
		}

	}
}


?>