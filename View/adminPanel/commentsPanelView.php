<?php ob_start(); 
$numberReports = $commentManager->countReports();
?>

<form action="" method="post" class="customSelect">
	<fieldset>
		<legend>Voir les commentaires de: </legend>
		<SELECT name="postName" size="1" class="select">
			<?php 
			$getPosts = $postManager->getAllPosts();
			foreach($getPosts as $post){ 
				if(isset($id) && $id == $post->getId()){
					echo '<option value="'.$post->getId().'" selected>'. $post->getTitle() .'</option>'	;
				}
				else{
					echo '<option value="'.$post->getId().'">'. $post->getTitle() .'</option>'	;
				}
			}?>	
		</SELECT>
		<input type="submit" name="viewComments" value="voir">
		<a href="?action=panel&amp;page=comments&amp;function=reportedComments" class="reportedComments">Voir les signalements (<?php 
			if($numberReports >=1){ 
				echo $numberReports; 
			} else{ 
				echo '0';
			} ?>)</a>
	</fieldset>
</form>

<div class="commentList">

<?php
if(isset($id)){
	$getComments = $commentManager->getCommentsList($id);
	foreach($getComments as $comment){
		echo '	<div class="comment">
				<strong>'.$comment->getAuthor().'</strong><br/><em>Le '.$comment->getCommentDate().'</em>
				<p>'.$comment->getContent().'</p>';
				if($comment->getReports() == 1){
					echo '<button type="button" class="deleteReport" id="'.$comment->getId().'"><i class="fas fa-exclamation-triangle"></i> '.$comment->getReports().' Signalement <i class="fas fa-eraser"></i></button>';
				}
				elseif($comment->getReports() >= 1){
					echo '<button type="button" class="deleteReport" id="'.$comment->getId().'"><i class="fas fa-exclamation-triangle"></i> '.$comment->getReports().' Signalements <i class="fas fa-eraser"></i></button>';
				}
				echo '<button type="button" id="'.$comment->getId().'" value="'.$comment->getAuthor().'" class="deleteComPanel"><i class="fas fa-trash-alt"></i> Supprimer</button></div>';
	}
}
?> </div> <?php
$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>