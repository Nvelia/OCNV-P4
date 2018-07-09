<?php 

require_once('model/Manager.php');

class MessageManager extends Manager {

  	public function addMessage(Message $message){
  		$req = $this->db->prepare('INSERT INTO messages(topic, message, sender, messageDate, messageRead) VALUES(:topic, :message, :sender, NOW(), false)');
  		$req->bindValue(':topic', $message->getTopic(), PDO::PARAM_STR);
  		$req->bindValue(':message', $message->getMessage(), PDO::PARAM_STR);	
      $req->bindValue(':sender', $message->getSender(), PDO::PARAM_STR);    	
  		$req->execute();

  		$message->hydrate([
  			'id' => $this->db->lastInsertID(),
  		]);
  	}

  	public function getMessage($id){
	      	$req = $this->db->prepare('SELECT id, topic, message, sender, messageDate, messageRead FROM messages WHERE id = :id');
	      	$req->execute([':id' => $id]);
	    	  $data = $req->fetch(PDO::FETCH_ASSOC);

	    	  return new Message($data);
  	}
    
    public function count(){
      return $this->db->query('SELECT COUNT(*) FROM messages WHERE messageRead = "0"')->fetchColumn();
    }

    public function getLastMessage(){
      $req = $this->db->query('SELECT * FROM messages ORDER BY id DESC LIMIT 1');
      $data = $req->fetch(PDO::FETCH_ASSOC);

      if($data){
        return new Message($data);
      }
    }

  	public function getMessagesList(){
  		$messagesList = [];

  		$req = $this->db->query('SELECT id, topic, message, sender, messageDate, messageRead FROM messages ORDER BY id DESC');


  		while($data = $req->fetch(PDO::FETCH_ASSOC)){
  			$messagesList[] = new Message($data);
  		}
  		return $messagesList;
  	}
  	
    public function updateMessageRead($id){
        $req = $this->db->prepare('UPDATE messages SET messageRead = true WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function deleteMessage($id){
        $this->db->exec('DELETE FROM messages WHERE id ='. $id);
    }
}