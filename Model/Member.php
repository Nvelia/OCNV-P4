<?php

class Member {

	protected $id;
	protected $name;
	protected $password;

	public function __construct(array $donnees){
    	$this->hydrate($donnees);
  	}

 	public function hydrate(array $donnees){
    	foreach ($donnees as $key => $value)
    	{
      		$method = 'set'.ucfirst($key);
       		if (method_exists($this, $method)){
        		$this->$method($value);
      		}
    	}
  	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getPassword(){
		return $this->password;
	}


	protected function hashPassword($pass){
		return password_hash($pass, PASSWORD_DEFAULT);
	}


	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}

	public function setName($name){
		if(is_string($name)){
			$this->name = $name;
		}
	}

	public function setPassword($pwd){
		if(strlen($pwd) < 20){
			$pwdHashed = $this->hashPassword($pwd);
			if(is_string($pwdHashed)){
				$this->password = $pwdHashed;
			}
		}
		else{
			if(is_string($pwd)){
				$this->password = $pwd;
			}
		}
	}
}