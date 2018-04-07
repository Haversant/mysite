<?php

date_default_timezone_set( 'Europe/Samara' );
	$DN='mysite' ;
/*	$DN='viplist' ;
*/	$DH='localhost';
	$DC='utf8';
	
	$OP = array(
		PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	);
	define( "DUN", "root" );
	define( "DUP", "" );
	define( "DSN", "mysql:host=$DH;dbname=$DN;charset=$DC" );


class DB
{
	public $con=null;
	public $dbitems=null;
	public $data=null;
	
	public function __construct(){
		$this->data=['name'=>'Kolya','sum'=>3];
	}

	public function dbitems(){
		$this->dbitems=
		[
			['name'=>'name','type'=>'varchar(255)'],
			['name'=>'sum','type'=>'int(3)']
		];
	}

	public function open(){
		$this->con = new PDO( DSN, DUN, DUP, $OP );

	}

	public function query($act,$elems){		
		$this->open();
		$sql = $act.' '.$elems.' '.'from '.$this->table();
		if($bindval){
			return;
		}
		$st = $this->con->prepare( $sql );
		$st->execute();

		$list = array();
		while( $row=$st->fetch() ){ $list[] = $row; }

		$this->close();
		return $list;
	}
	public function insert() {
		$this->dbitems();
		$this->open();
		// ПОДГОТОВКА ЗАПРОСА
		$key=array_keys($this->data);
		$sql= 'INSERT INTO '.$this->table().' ( '.implode(", ",$key).' ) VALUES ( ';
		foreach ($this->data as $key => $value) {
			if($i!=0){$sql.=', ';}
			$sql.=':'.$key;
		}
		$sql.= ' ) ';

		$st = $this->con->prepare ( $sql );
		// ПОДГОТОВКА ДАННЫХ (ОПРЕДЕЛЕНИЕ ТИПА)
		$type=array();
		foreach ($this->dbitems as $value) {
			if(preg_match('#char#',$value[type])){$type[$value[name]]='STR';}
			if(preg_match('#int#',$value[type])
				||preg_match('#date#',$value[type])
				||preg_match('#time#',$value[type])){$type[$value[name]]='INT';}
		}
		foreach ($this->data as $key => $value) {
			if($type[$key]=='STR'){
				$st->bindValue( ':'.$key, $value, PDO::PARAM_STR );		
			}
			if($type[$key]=='INT'){
				$st->bindValue( ':'.$key, $value, PDO::PARAM_INT );		
			}
		}
		$st->execute();// ИСПОЛНЕНИЕ
		$this->data['id'] = $this->con->lastInsertId();// ИД
		$this->close();
		return true;
	}
	public function update() {
		$this->dbitems();
		$this->open();
		// ПОДГОТОВКА ЗАПРОСА
		$key=array_keys($this->data);
		$sql= 'UPDATE '.$this->table().' ';
		foreach ($this->data as $key => $value) {
			if($key=='id'){continue;}
			if($i!=0){$sql.=', ';}// no
			$sql.=$key.'=:'.$key;			
		}
		$sql.= ' WHERE '.$this->data->id.'=:'.$this->data->id;
var_dump($sql);
		$st = $this->con->prepare ( $sql );
		// ПОДГОТОВКА ДАННЫХ (ОПРЕДЕЛЕНИЕ ТИПА)
		$type=array();
		foreach ($this->dbitems as $value) {
			if(preg_match('#char#',$value[type])){$type[$value[name]]='STR';}
			if(preg_match('#int#',$value[type])
				||preg_match('#date#',$value[type])
				||preg_match('#time#',$value[type])){$type[$value[name]]='INT';}
		}
		foreach ($this->data as $key => $value) {
			if($type[$key]=='STR'){
				$st->bindValue( ':'.$key, $value, PDO::PARAM_STR );		
			}
			if($type[$key]=='INT'){
				$st->bindValue( ':'.$key, $value, PDO::PARAM_INT );		
			}
		}
		$st->execute();// ИСПОЛНЕНИЕ
		$this->close();
		return true;
	}

	public function close(){
		$this->con = null;
	}
}
class Task extends DB
{
	public function table(){
		return 'task';
	}
}
$T=new Task;
/*$result=$T->query('show','columns');*/
/*$T->insert();*/
$T->update();
$result=$T->query('select','*');



/*
$sql = "show tables";
$sql = "CREATE TABLE elements (
    id SMALLINT NOT NULL PRIMARY KEY,    # номер КЭ
    name varchar(55) NOT NULL,                # номер первой вершины
    pub_date datetime NOT NULL,                # номер второй вершины
    sum INT(7) NOT NULL,                # номер третьей вершины
    props CHAR(12) NOT NULL DEFAULT 'steel');";*/