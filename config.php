<?php

$menu=[
	['id'=>1,'name'=>'главная','href'=>'/','enable'=>true],
	['id'=>2,'name'=>'записи','href'=>'/articles/','enable'=>1],
	['id'=>3,'name'=>'обо мне','href'=>'/aboutme/','enable'=>1],
	['id'=>4,'name'=>'1/','href'=>'/articles/1/','enable'=>0],
	['id'=>5,'name'=>'2','href'=>'/articles/2','enable'=>0],
	['id'=>6,'name'=>'/index.php?rout=articles&id=4',
		'href'=>'/index.php?rout=articles&id=4','enable'=>0],
	['id'=>7,'name'=>'/index.php?rout=articles&title=title_by-title',
		'href'=>'/index.php?rout=articles&title=title_by-title','enable'=>0],
	['id'=>7,'name'=>'галерея',
		'href'=>'/gallery/','enable'=>1]
]



?>