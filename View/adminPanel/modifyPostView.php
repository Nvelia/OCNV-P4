<?php ob_start(); ?>

<a href="index.php?action=panel&page=posts" class="previousPage">&laquo; Page Précédente</a>
<div class="addPost">
	<h4>Ajouter un billet</h4>

	<form action="" method="post">
		<p>
		    <label for="title">Titre du billet: </label>
		    <input type="input" name="title" value="<?= $getPost->getTitle(); ?>" required/>
		    <br/>
		    <label for="content">Message</label> <br/> 
		    <br>
		    <textarea name="content" rows="10" cols="100">
		    	<?= $getPost->getContent(); ?>
		    </textarea> 
		    <br>
		    <input type="submit" name="resend" value="Mettre à jour" />
		</p>
	</form>
</div>
<?php
$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>