<?php ob_start();

$nbPost = $postManager->count();
$nbPage = ceil($nbPost / $perPage);
$getPosts = $postManager->getPostsList($cPage, $perPage);

foreach($getPosts as $post){
	$numberComments = $commentManager->count($post->getId());
	echo '	<div class="stylePost"><h3>'.$post->getTitle().'</h3>
				<p>'.substr($post->getContent(), 0, 2000);
	if(strlen($post->getContent()) >= 2000){ 
		echo '<br/><a href="index.php?action=home&amp;page=comments&amp;id='.$post->getId().'" class="readMore">Lire la suite...</a>'; 
	}
	echo '	</p>
			<strong>Publié par <span class="nameMail"><i class="far fa-envelope"></i> Jean Forteroche </span>
			<div class="mailWindow"><a href="?action=home&amp;page=sendMail">Envoyer un message</a><button type="button" class="close closeMail">&times;</button></div></strong>
			<em>le '.$post->getPostDate().'</em>'; 
	if($numberComments > 0) { 
		if($numberComments == 1) {
			echo '	<br/><a href="index.php?action=home&amp;page=comments&amp;id='.$post->getId().'" class="com"><i class="far fa-comments"></i>
					Voir le commentaire ('.$numberComments.')</a></div>'; 
		}
		else{
			echo '	<br/><a href="index.php?action=home&amp;page=comments&amp;id='.$post->getId().'" class="com"><i class="fas fa-comments"></i>
					Voir les commentaires ('.$numberComments.')</a></div>';
		}
	} 
	else { 
		echo '	<a href="index.php?action=home&amp;page=comments&amp;id='.$post->getId().'" class="com"><i class="fas fa-comment-slash"></i>
 				Aucun commentaire ('.$numberComments.')</a></div>';}
	} 

echo '<div class="page"><a href="?action=home&amp;p='.($cPage -1).'">&laquo;</a>';
echo 'Page '. $cPage . ' sur '.$nbPage;
echo '<a href="?action=home&amp;p='.($cPage +1).'">&raquo;</a></div>';

$pageContent = ob_get_clean();
require('homeView.php'); ?>