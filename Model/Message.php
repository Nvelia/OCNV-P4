<?php 

class Message {
	protected $id;
	protected $topic;
	protected $message;
	protected $sender;
	protected $messageDate;
	protected $messageRead;

	public function __construct(array $data){
    	$this->hydrate($data);
  	}

 	public function hydrate(array $data){
    	foreach ($data as $key => $value)
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

	public function getTopic(){
		return $this->topic;
	}

	public function getMessage(){
		return $this->message;
	}

	public function getSender(){
		return $this->sender;
	}

	public function getMessageDate(){
		return $this->messageDate;
	}

	public function getMessageRead(){
		return $this->messageRead;
	}

	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}

	public function setTopic($topic){
		if(is_string($topic)){
			$this->topic = $topic;
		}
	}

	public function setMessage($message){
		if(is_string($message)){
			$this->message = $message;
		}
	}

	public function setSender($sender){
		if(is_string($sender)){
			$this->sender = $sender;
		}
	}

	public function setMessageDate($messageDate){
		$newDate = date("d/m/Y à H\hi", strtotime($messageDate));
		$this->messageDate = $newDate;
	}

	public function setMessageRead($messageRead){
		if(is_bool($messageRead)){
			$this->messageRead = $messageRead;
		}
	}
}
