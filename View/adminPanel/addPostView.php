<?php ob_start(); ?>
<a href="javascript:history.go(-1)" class="previousPage">&laquo; Liste des billets</a>
<div class="addPost">
	<h4>Ajouter un billet</h4>

	<form action="" method="post">
		<p>
		    <label for="title">Titre du billet: </label>
		    <input type="input" name="title" required/>
		    <br/>
		    <label for="content">Message:</label> <br/> 
		    <br>
		    <textarea required name="content" rows="10" cols="100">
		    </textarea> 
		    <br>
		    <input type="submit" name="send" value="Mettre en ligne" />
		</p>
	</form>
</div>

<?php
$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>