<?php 

class Post {
	protected $id;
	protected $title;
	protected $content;
	protected $postDate;
	protected $postDateEdit;

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

	public function getTitle(){
		return $this->title;
	}

	public function getContent(){
		return $this->content;
	}

	public function getPostDate(){
		return $this->postDate;
	}

	public function getPostDateEdit(){
		return $this->postDateEdit;
	}

	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}

	public function setTitle($title){
		if(is_string($title)){
			$this->title = $title;
		}
	}

	public function setContent($content){
		if(is_string($content)){
			$this->content = $content;
		}
	}

	public function setpostDate($postDate){
		$newDate = date("d/m/Y à H\hi", strtotime($postDate));
		$this->postDate = $newDate;
	}
 	
 	public function setpostDateEdit($postDateEdit){
 		$newDate = date("d/m/Y à H\hi", strtotime($postDateEdit));
		$this->postDateEdit = $newDate;
	}

}
