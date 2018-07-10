<?php ob_start(); ?>

<form action="index.php?action=panel&amp;page=posts&amp;function=addpost" method="post">
    <p>
        <input type="submit" name="submit" value="Ajouter un billet" class="adminAddPost"/>
    </p>
</form>
<div class="postContent">
	<h4><strong>Liste des billets: </strong></h4>
	<table>
		<tr>
			<th>Titre</th>
			<th>Contenu</th>
			<th>Date</th>
			<th></th>
			<th></th>
		</tr>
	<?php 
	$getPosts = $postManager->getPostsList($cPage, $perPage);

	foreach($getPosts as $post){
		echo 	'<tr><td>'.$post->getTitle().'</td>
				<td><a href="index.php?action=home&page=comments&id='.$post->getId().'">'. substr($post->getContent(), 0, 120).'</a></td>
				<td>'. substr($post->getPostDate(), 0, 10).'</td>
				<td><a href="?action=panel&amp;function=modify&amp;page=posts&amp;id='.$post->getId().'" class="modifyLink">Modifier</a></td>
				<td><button type="button" id="'.$post->getId().'" class="delete deletePost">&times;</button></td>
				</tr>';
	}
echo '</table></div>';

echo '<div class="pagePres"><a href="index.php?action=panel&amp;page=posts&amp;p='.($cPage -1).'">&laquo;</a>';
echo 'Page '. $cPage . ' sur '.$nbPage;
echo '<a href="index.php?action=panel&amp;page=posts&amp;p='.($cPage +1).'">&raquo;</a></div>';

$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>