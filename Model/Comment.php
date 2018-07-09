<?php 

class Comment {
	protected $id;
	protected $idPost;
	protected $idCom;
	protected $content;
	protected $author;
	protected $commentDate;
	protected $reports;

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

  	public function getIdPost(){
		return $this->idPost;
	}

  	public function getIdCom(){
		return $this->idCom;
	}

	public function getContent(){
		return $this->content;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function getCommentDate(){
		return $this->commentDate;
	}

	public function getReports(){
		return $this->reports;
	}

	public function setId($id){
		$id = (int) $id;
		if($id > 0){
			$this->id = $id;
		}
	}

	public function setIdPost($idPost){
		$idPost = (int) $idPost;
		if($idPost > 0){
			$this->idPost = $idPost;
		}
	}

	public function setIdCom($idCom){
		$idCom = (int) $idCom;
		if($idCom >= 0){
			$this->idCom = $idCom;
		}
	}

	public function setContent($content){
		if(is_string($content)){
			$this->content = $content;
		}
	}

	public function setAuthor($author){
		if(is_string($author)){
			$this->author = $author;
		}
	}
 	
 	public function setCommentDate($commentDate){
 		$newDate = date("d/m/Y à H\hi", strtotime($commentDate));
		$this->commentDate = $newDate;
	}

	public function setReports($reports){
		$reports= (int) $reports;
		if($reports >= 0){
			$this->reports = $reports;
		}
	}

}	