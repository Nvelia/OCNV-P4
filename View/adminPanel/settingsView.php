<?php  ob_start(); ?>
<div class="settings">
	<strong>Modifier le mot de passe</strong>

	<form action="" method="post">
	    <p>
	        <label for="oldPwd">Ancien mot de passe</label> : <input type="password" name="oldPwd" id="oldPwd" required /><br />
	        <label for="newPwd">Nouveau mot de passe</label> : <input type="password" name="newPwd" id="newPwd" placeholder="6 à 20 caractères requis" required /><br />
	        <label for="pwdChk">Retaper le mot de passe</label> : <input type="password" name="pwdChk" id="pwdChk" required /><br />
	        <input type="submit" value="Modifier" class="submitSettings"/>
	    </p>
	</form>
</div>
<?php $pageContent = ob_get_clean(); 
require('adminPanelView.php'); ?>