<?php
class dbcrud{

	public function Connect(){
		$connection  = new PDO("mysql:host=localhost;dbname=dbcrud","root","");
		return $connection;
	}
}