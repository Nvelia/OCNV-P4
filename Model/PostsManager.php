<?php 

require_once('model/Manager.php');

class PostsManager extends Manager {

  	public function addPost(Post $post){
  		$req = $this->db->prepare('INSERT INTO posts(title, content, postDate, postDateEdit) VALUES(:title, :content, NOW(), NOW())');
  		$req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
  		$req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);		  	
  		$req->execute();

  		$post->hydrate([
  			'id' => $this->db->lastInsertID(),
  		]);
  	}

  	public function getPost($id){
	      	$req = $this->db->prepare('SELECT id, title, content, postDate FROM posts WHERE id = :id');
	      	$req->execute([':id' => $id]);
	    	  $data = $req->fetch(PDO::FETCH_ASSOC);

	    	  return new Post($data);
  	}

    public function count(){
        return $this->db->query('SELECT COUNT(*) FROM posts')->fetchColumn();;
    }

  	public function updatePost(Post $post){
	    $req = $this->db->prepare('UPDATE posts SET title = :title, content = :content, postDateEdit = NOW() WHERE id = :id');
	    $req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
	    $req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
	    $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
	    $req->execute();
  	}

    public function getLastPost(){
      $req = $this->db->query('SELECT * FROM posts ORDER BY id DESC LIMIT 1');
      $data = $req->fetch(PDO::FETCH_ASSOC);
      return new Post($data);
    }

    public function getAllPosts(){
      $postsList = [];

      $req = $this->db->query('SELECT id, title, content, postDate FROM posts ORDER BY id DESC');

      while($data = $req->fetch(PDO::FETCH_ASSOC)){
        $postsList[] = new Post($data);
      }
      return $postsList;
    }

  	public function getPostsList($cPage, $perPage){
  		$postsList = [];

  		$req = $this->db->query('SELECT id, title, content, postDate FROM posts ORDER BY id DESC LIMIT '.(($cPage-1)*$perPage).','.$perPage);

  		while($data = $req->fetch(PDO::FETCH_ASSOC)){
  			$postsList[] = new Post($data);
  		}
  		return $postsList;
  	}
  	
    public function deletePost($id){
        $this->db->exec('DELETE FROM posts WHERE id ='. $id);
    }

}