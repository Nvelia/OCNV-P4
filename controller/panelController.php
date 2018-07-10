<?php 
session_start();

function chargerClasse($classname)
{
  require 'model/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');


function adminPanel(){
	$db = new Manager;
	$manager = new MembersManager($db);
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);
	$messageManager = new MessageManager($db);
	require('view/adminPanel/homeView.php');
}

function postsPage($cPage, $perPage){
	$db = new Manager;
	$postManager = new PostsManager($db);
	
	$nbPost = $postManager->count();
	$nbPage = ceil($nbPost / $perPage);

	if(isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];
	}
	else{
		if(isset($_GET['p']) && $_GET['p'] >= $nbPage){
			$cPage = $nbPage;
		}
		else{
			$cPage = 1;
		}
	}
	require('view/adminPanel/postsPanelView.php');

}

function addPost(){
	$db = new Manager;
	$postManager = new PostsManager($db);
	if(isset($_POST['title'], $_POST['content'])){
		if(!$_POST['title'] == "" && !$_POST['content'] == ""){
			$title = htmlspecialchars($_POST['title']);
			$content = $_POST['content'];
			$post = new Post(['title' => $title, 'content' => $content]);
			$postManager->addPost($post);
			?> 
			<script type="text/javascript">
				window.location.href = 'index.php?action=panel&page=posts';
				alert('Billet mis en ligne');
			</script> <?php
		}
		else{
			echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> Tous les champs ne sont pas remplis.</span>";
		}
	}
	require('view/adminPanel/addPostView.php');
}

function updatePost(){
	$db = new Manager;
	$postManager = new PostsManager($db);
	$getPost = $postManager->getPost($_GET['id']);
	if(isset($_POST['title'], $_POST['content'])){
		if(!$_POST['title'] == "" && !$_POST['content'] == ""){
			$title = htmlspecialchars($_POST['title']);
			$content = $_POST['content'];
			$id = $_GET['id'];
			$post = new Post(['id' => $id, 'title' => $title, 'content' => $content]);
			$postManager->updatePost($post);
			echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Billet mis à jour.</span>";
		}
		else{
			echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> Tous les champs ne sont pas remplis.</span>";
		}
	}	
	require('view/adminPanel/modifyPostView.php');	
}

function deletePost(){
	$db = new Manager;
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);
	$id = $_GET['id'];
	$postManager->deletePost($id);
	$commentManager->clearComments($id);
	echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Billet supprimé.</span>";
	postsPage(1,5);
}

function deleteComPanel(){
	$db = new Manager;
	$commentManager = new CommentsManager($db);
	$postManager = new PostsManager($db);
	$idCom = $_GET['comId'];
	$commentManager->deleteComment($idCom);
	echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Commentaire supprimé.</span>";
	manageComments();
}

function deleteReports(){
	$db = new Manager;
	$comId = $_GET['id'];
	$commentManager = new CommentsManager($db);
	$commentManager->deleteReports($comId);
	echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> Signalements pour ce commentaire supprimés.</span>";
	require('view/adminPanel/commentsReportedView.php');
}

function manageComments(){
	$db = new Manager;
	$manager = new MembersManager($db);
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);
	if(isset($_POST['postName'])){
		$id = $_POST['postName'];
	}
	elseif(isset($_GET['postId'])){
		$id = $_GET['postId'];
	}
	require('view/adminPanel/commentsPanelView.php');
}

function displayReportedComments(){
	$db = new Manager;
	$manager = new MembersManager($db);
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);
	require('view/adminPanel/commentsReportedView.php');
}

function mailbox($cPage, $perPage){
	$db = new Manager;
	$messageManager = new MessageManager($db);
	$postManager = new PostsManager($db);

	$nbPost = $postManager->count();
	$nbPage = ceil($nbPost / $perPage);

	if(isset($_GET['p']) && $_GET['p'] > 0 && $_GET['p'] <= $nbPage){
		$cPage = $_GET['p'];
	}
	else{
		if(isset($_GET['p']) && $_GET['p'] >= $nbPage){
			$cPage = $nbPage;
		}
		else{
			$cPage = 1;
		}
	}
	
	require('view/adminPanel/mailboxView.php');
}

function displayMessage(){
	$db = new Manager;
	$messageManager = new MessageManager($db);
	require('view/adminPanel/messageView.php');
}

function deleteMail(){
	$db = new Manager;
	$messageManager = new MessageManager($db);
	$id = $_GET['id'];
	$messageManager->deleteMessage($id);
	echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Vous avez supprimé un Email.</span>";
	require('view/adminPanel/mailboxView.php');
}

function settingsPage(){
	$db = new Manager;
	$manager = new MembersManager($db);
	$name = $_SESSION['nickname'];
	if($manager->existingMember($name)){
		$member = $manager->getMember($name);
	}
	if(isset ($_POST['oldPwd'], $_POST['newPwd'], $_POST['pwdChk'])){
		$oldPwd = htmlspecialchars($_POST['oldPwd']);
		$newPwd = htmlspecialchars($_POST['newPwd']);
		$pwdChk = htmlspecialchars($_POST['pwdChk']);

		if($manager->nameAndPwdVerif($name, $oldPwd)){
			if(preg_match("#.{6,20}#", $newPwd)){
				if($newPwd === $pwdChk){
					$member->setPassword($newPwd);
					$manager->updatePwd($member);
					echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Mot de passe modifié avec succès!</span>";
				}
				else{
					echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> La vérification a échoué, les mots de passe ne correspondent pas.</span>";
				}
			}
			else{
				echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> Les conditions ne sont pas remplies: 6 caractères minimum requis.</span>";
			}
		}
		else{
			echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Votre mot de passe actuel est erroné.</span>";
		}   
	}
	require('view/adminPanel/settingsView.php');
}