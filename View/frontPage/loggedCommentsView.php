<?php ob_start();

$getComments = $commentManager->getCommentsList($_GET['id']);
$getPost = $postManager->getPost($_GET['id']);
?>

<a href="index.php" class="previousPage">&laquo; Retourner sur la liste des billets</a>
<div class="stylePost">
	<h3><?= $getPost->getTitle() ?></h3>
	<p><?= $getPost->getContent() ?></p>
	<strong>Publié par Jean Forteroche</strong>
	<em>le <?= $getPost->getPostDate() ?> </em>
</div>


<div class="commentList">
	<h3>Commentaires</h3>
	<?php
	
	foreach($getComments as $comment){
		echo '	<div class="comment">
					<strong>'.$comment->getAuthor().'</strong><br/>
					<em>Le '.$comment->getCommentDate().'</em>
					<p>'.$comment->getContent().'</p>
					<button type="button" id="'.$comment->getId().'" name="'.$_GET['id'].'" value="'.$comment->getAuthor().'" class="deleteCom">&times;</button>
					<button class="answerCom">Répondre</button>
						<div class="formComComment">
							<form action="" method="post">
								<label for="nom">Nom: </label>
								<input type="input" name="author" id="author" />
								<label for="comment">Commentaire: </label><br />
								<textarea id="comment" name="comment"></textarea>
								<input type="hidden" id="idCom" name="idCom" value="'.$comment->getId().'" />	
								<input type="submit" value="Envoyer" name="send" />
							</form>
						</div>
				</div>'; 
						
		$getComComments = $commentManager->getComCommentsList($comment->getId());
		foreach($getComComments as $comComment){
			echo '	<div class="comComment">
						<strong>'.$comComment->getAuthor().'</strong><br/>
						<em>Le '.$comComment->getCommentDate().'</em>
						<p>'.$comComment->getContent().'</p>
						<button type="button" id="'.$comComment->getId().'" name="'.$_GET['id'].'" value="'.$comComment->getAuthor().'" class="deleteCom">&times;</button>
						<button class="answerCom">Répondre</button>
						<div class="formComComment">
							<form action="" method="post">
								<label for="nom">Nom: </label>
								<input type="input" name="author" id="author" />
								<label for="comment">Commentaire: </label><br />
								<textarea id="comment" name="comment"></textarea>
								<input type="hidden" id="idCom" name="idCom" value="'.$comment->getId().'" />	
								<input type="submit" value="Envoyer" name="send" />
							</form>
						</div>
					</div>';
		}
	}
?>
	<br/>
	<button class="button addComment"><i class="far fa-plus-square"></i> Ajouter un commentaire</button>
</div>

<div id="formComment">
	<form action="" method="post">
		<label for="nom">Nom: </label>
			<input type="input" name="author" id="author" />
		<label for="comment">Commentaire: </label><br />
			<textarea id="comment" name="comment"></textarea>
		<input type="submit" value="Envoyer" name="send" />
	</form>
</div>

<?php $pageContent = ob_get_clean();
require('homeView.php'); ?>