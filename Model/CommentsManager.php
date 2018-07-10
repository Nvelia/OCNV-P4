<?php 

require_once('model/Manager.php');

class CommentsManager extends Manager {

	public function addComment(Comment $comment){
  		$req = $this->db->prepare('INSERT INTO comments(idPost, idCom, content, author, commentDate, reports) VALUES(:idPost, :idCom, :content, :author, NOW(), 0)');
      $req->bindValue(':idPost', $comment->getIdPost(), PDO::PARAM_INT);
      $req->bindValue(':idCom', $comment->getIdCom(), PDO::PARAM_INT);
  		$req->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);
  		$req->bindValue(':author', $comment->getAuthor(), PDO::PARAM_STR);		  	
  		$req->execute();

  		$comment->hydrate([
  			'id' => $this->db->lastInsertID(),
  		]);
  	}

  	public function getComment($id){
	      	$req = $this->db->prepare('SELECT * FROM comments WHERE id = :id');
	      	$req->execute([':id' => $id]);
	    	  $data = $req->fetch(PDO::FETCH_ASSOC);

	    	  return new Comment($data);
  	}

  	public function count($id){
  		return $this->db->query('SELECT COUNT(*) FROM comments WHERE idPost ='. $id)->fetchColumn();
  	}

    public function countReports(){
        return $this->db->query('SELECT SUM(reports) FROM comments WHERE reports >= 1')->fetchColumn();
    }

    public function getLastComment(){
      $req = $this->db->query('SELECT * FROM comments ORDER BY id DESC LIMIT 1');
      $data = $req->fetch(PDO::FETCH_ASSOC);

      if($data){
          return new Comment($data);
      } 
    }

  	public function getCommentsList($idPost){
  		$commentsList = [];

  		$req = $this->db->query('SELECT id, idPost, content, author, commentDate, reports FROM comments WHERE idPost ='. $idPost .' AND idCom = 0 ORDER BY id DESC');


  		while($data = $req->fetch(PDO::FETCH_ASSOC)){
  			$commentsList[] = new Comment($data);
  		}
  		return $commentsList;
  	}

    public function getComCommentsList($idCom){
      $commentsList = [];

      $req = $this->db->query('SELECT id, content, author, commentDate, reports FROM comments WHERE idCom ='. $idCom .' ORDER BY id DESC');


      while($data = $req->fetch(PDO::FETCH_ASSOC)){
        $commentsList[] = new Comment($data);
      }
      return $commentsList;
    }

    public function getAllComments(){
        $commentsList = [];
        $req = $this->db->query('SELECT * FROM comments ORDER BY reports DESC');

        while($data = $req->fetch(PDO::FETCH_ASSOC)){
          $commentsList[] = new Comment($data);
        }

        return $commentsList;

    }
  	
    public function deleteComment($id){
        $this->db->exec('DELETE FROM comments WHERE id ='. $id);
    }

    public function deleteComComment($id){
        $this->db->exec('DELETE FROM comments WHERE idCom='. $id);
    }

    public function deleteReports($id){
        $req = $this->db->prepare('UPDATE comments SET reports = 0 WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }

    public function clearComments($idPost){
      $this->db->exec('DELETE * FROM comments WHERE idPost ='.$idPost);
    }

    public function updateReports($id){
        $req = $this->db->prepare('UPDATE comments SET reports = reports + 1 WHERE id = :id');
        $req->bindValue(':id', $id);
        $req->execute();
    }

}