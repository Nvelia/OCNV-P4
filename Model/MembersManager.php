<?php 

require_once('model/Manager.php');

class MembersManager extends Manager{

	public function add(Member $member){
		$req = $this->db->prepare('INSERT INTO members(name, password) VALUES(:name, :password)');
		$req->bindValue(':name', $member->getName(), PDO::PARAM_STR);
		$req->bindValue(':password', $member->getPassword(), PDO::PARAM_STR);		  	
		$req->execute();

		$member->hydrate([
			'id' => $this->db->lastInsertID(),
		]);
	}

  	public function nameAndPwdVerif($name, $pwd){
  		$req = $this->db->prepare('SELECT id, password FROM members WHERE name = :nick');
		$req->execute(array(
    				'nick' => $name));
		$result = $req->fetch();

		$isPasswordCorrect = password_verify($pwd, $result['password']);
		return (bool) $isPasswordCorrect;
  	}

	public function existingMember($name){      
	    $req = $this->db->prepare('SELECT * FROM members WHERE name = :name');
	    $req->execute([':name' => $name]);
	    
	    return (bool) $req->fetchColumn();
	  }


  	public function getMember($name){
	      	$req = $this->db->prepare('SELECT id, name, password FROM members WHERE name = :name');
	      	$req->execute([':name' => $name]);
	    	$data = $req->fetch(PDO::FETCH_ASSOC);

	    	return new Member($data);
  	}

  	public function updatePwd(Member $member){
  		$req = $this->db->prepare('UPDATE members SET password = :password WHERE id = :id');
  		$req->bindValue(':password', $member->getPassword());
  		$req->bindValue(':id', $member->getId());
  		$req->execute();
  	}
}