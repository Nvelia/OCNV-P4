<?php ob_start(); ?>
<div class="panelHome">
	<div class="blocPanelHome">
		<h4>Dernier Billet Publié</h4><br />
		<?php 
		$lastPost = $postManager->getLastPost();
		if(!empty($lastPost)){
			echo 	'Titre du billet: '. $lastPost->getTitle().'<br/>
					Contenu:<br/>'.substr($lastPost->getContent(), 0, 350);
					if(strlen($lastPost->getContent()) >= 350){
						echo '<br/><a href="index.php?action=home&amp;page=comments&amp;id='.$lastPost->getId().'" class="readMore">Lire la suite...</a>';
					}
		}
		else{
			echo 'Aucun Billet.';
		}
		?>
	</div>

	<div class="blocPanelHome">
		<h4>Dernier Commentaire Publié</h4><br />
		<?php 	
		$lastComment = $commentManager->getLastComment();
		if(!empty($lastComment)){
			$lastPostComment = $postManager->getPost($lastComment->getIdPost());
			echo 	'De: '. $lastComment->getAuthor().'<br/>
					Billet: '.$lastPostComment->getTitle().'<br/>
					Contenu:<br/>'.substr($lastComment->getContent(), 0, 250).'<br/>'; 
					if(strlen($lastComment->getContent()) >= 250){ 
						echo '<br/><a href="index.php?action=home&amp;page=comments&amp;id='.$lastPost->getId().'" class="readMore">Lire la suite...</a>'; 
					}
		}
		else{
			echo 'Aucun commentaire.';
		}
		?>
	</div>

	<div class="blocPanelHome">
		<h4>Dernier Message Reçu</h4><br />
		<?php  
		$lastMessage = $messageManager->getLastMessage();
		if(!empty($lastMessage)){
			echo 	'Expediteur: '. $lastMessage->getSender().'<br/>
					Sujet: '.$lastMessage->getTopic().'<br/>
					Message: '.$lastMessage->getMessage();
		}
		else{
			echo 'Aucun message.';
		}
		?>
	</div>
</div>
<?php
$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>