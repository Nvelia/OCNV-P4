<?php ob_start(); ?>

<a href="index.php" class="previousPage">&laquo; Liste des billets</a>
<div class="addMessage">

<form action="" method="post" class="formMessage">
	<fieldset>
		<legend>Envoyer un message</legend>
		<p>
		    <label for="topic">Sujet du Message: </label>
		    <input type="input" name="topic" required />
		    <br/>
		    <label for="sender">Votre nom: </label>
		    <input type="input" name="sender" required/>
		    <br/>
		    <label for="message">Message</label> <br/> 
		    <br>
		    <textarea name="message" rows="10" cols="100" required>
		    </textarea> 
		    <br>
		    <input type="submit" name="send" value="Envoyer" />
		</p>
	</fieldset>
</form>

<?php
$pageContent = ob_get_clean();
require('homeView.php'); ?>