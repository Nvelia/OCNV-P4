<?php ob_start(); 

echo '<a href="index.php?action=panel&amp;page=comments" class="previousPage">&laquo; Retourner sur la page des commentaires</a>
		<div class="commentsReported"><h4>Commentaires signalés</h4>'; ?>

<div class="commentListReported">
<?php

$getComments = $commentManager->getAllComments();
foreach($getComments as $comment){
	if($comment->getReports() >= 1){
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