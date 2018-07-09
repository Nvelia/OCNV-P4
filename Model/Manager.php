<?php 

class Manager {

	protected $db;

	public function __construct(){
		$this->setDb();
	}

	public function setDb(){
    	$this->db = new \PDO('mysql:host=localhost;dbname=projet4', 'root', '');
  	}
}