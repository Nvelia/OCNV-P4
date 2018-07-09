<?php

if (empty($_SESSION['nickname'])){ ?>
 	<div id="loginWindow">
        <form action="?action=home&amp;page=login" method="post">
            <p>
                <label for="nick">Identifiant</label> : <input type="text" name="nick" id="nick" /><br />
                <label for="pwd">Mot de passe</label> : <input type="password" name="pwd" id="pwd" /><br />
                <label for="autolog">Connexion Automatique</label> : <input type="checkbox" name="autolog" /><br />
                <button type="submit" class="submit"><span>Se connecter</span></button>
                <button type="button" class="close closeLogin">&times;</button>
            </p>
        </form>
    </div>
 <?php } 
else {?>
    <div id="loginWindow">
        <a href="?action=panel"><i class="fas fa-unlock"></i> Panneau d'administration</a><br/>
        <a href="?action=logout"><i class="fas fa-sign-out-alt"></i> Deconnexion</a>
    </div>
<?php } ?>