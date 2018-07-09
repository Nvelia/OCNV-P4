<?php 

spl_autoload_register('chargerClasse');

function homePage($cPage, $perPage){
	$db = new Manager;
	$manager = new MembersManager($db);
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);
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

	if(isset($_SESSION['nickname']) && ($_SESSION['nickname'] === "Jean")){
		require('view/frontPage/loggedPostsHomeView.php');
	}
	else{
		require('view/frontPage/postsHomeView.php');
	}	
}

function commentsPage(){
	$db = new Manager;
	$manager = new MembersManager($db);
	$postManager = new PostsManager($db);
	$commentManager = new CommentsManager($db);

	if(isset($_POST['author'], $_POST['comment'])){
		if(!$_POST['author'] == "" && !$_POST['comment'] == ""){
			if(isset($_POST['idCom'])){
				$idCom = $_POST['idCom'];
			}
			else{
				$idCom = 0; 
			}
			$idPost = $_GET['id'];
			$author = htmlspecialchars($_POST['author']);
			$content = $_POST['comment'];
			$comment = new Comment(['idPost' => $idPost, 'idCom' => $idCom, 'author' => $author, 'content' => $content]);
			$commentManager->addComment($comment);
			echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Commentaire publié.</span>";
		}
		else{
			echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Tous les champs ne sont pas remplis.</span>";
		}
	}
	if(isset($_SESSION['nickname']) && ($_SESSION['nickname'] === "Jean")){
		require('view/frontPage/loggedCommentsView.php');
	}
	else{
		require('view/frontPage/commentsView.php');
	}
}

function deleteCom(){
	if(isset($_SESSION['nickname']) && ($_SESSION['nickname'] === "Jean")){
		$db = new Manager;
		$commentManager = new CommentsManager($db);
		$idCom = $_GET['comId'];
		$idPost = $_GET['id'];
		$commentManager->deleteComment($idCom);
		echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Commentaire supprimé.</span>";
	}
	else{
		echo "<span class=\"settingsMsg\"><i class=\"fas fa-exclamation-triangle\"></i> Vous n'avez pas l'autorisation d'effectuer cette action.</span>";
	}
}

function reportCom(){
	$idPost = $_GET['id'];
	$db = new Manager;
	$commentManager = new CommentsManager($db);
	$postManager = new PostsManager($db);
	$comId = $_GET['comId'];
	$cookieName = 'reportCom'.$comId;

	if(isset($_COOKIE[$cookieName])){
		echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Vous avez déjà signalé ce commentaire.</span>";
	}
	else{
		setcookie($cookieName, 'exist', time() + (86400 * 30));
		$commentManager->updateReports($_GET['comId']);
		echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Commentaire signalé.</span>";
	}
}

function sendMessage(){
	$db = new Manager;
	$messageManager = new MessageManager($db);
	
	if(isset($_POST['topic'], $_POST['sender'], $_POST['message'])){
		if(!$_POST['topic'] == "" && !$_POST['sender'] == "" && !$_POST['message'] == ""){
			$topic = htmlspecialchars($_POST['topic']);
			$sender = htmlspecialchars($_POST['sender']);
			$messageContent = $_POST['message'];
			$message = new Message(['topic' => $topic, 'message' => $messageContent, 'sender' => $sender]);
			$messageManager->addMessage($message); ?>
			<script type="text/javascript">
				window.location.href = 'index.php';
				alert('Message envoyé');
			</script> <?php
		}
		else{
			echo "<span class=\"settingsMsg short\"><i class=\"fas fa-exclamation-triangle\"></i> Tous les champs ne sont pas remplis.</span>";
		}
	}
	require('view/frontPage/addMessageView.php');
}

function login(){
	$db = new Manager;
	$manager = new MembersManager($db);

	if(isset($_COOKIE['nickname']) && isset($_COOKIE['hashedPwd'])){
		$nick = $_COOKIE['nickname'];
		$pwd = $_COOKIE['hashedPwd'];
		$user = $manager->getMember('Jean');
		$hashedPwd = $user->getPassword();
		if($pwd === $hashedPwd){
			$_SESSION['nickname'] = $nick;
		}
	}

	if (isset($_POST['nick'], $_POST['pwd'])){
	    $nick = htmlspecialchars($_POST['nick']);
	    $pwd = htmlspecialchars($_POST['pwd']);

		if($manager->nameAndPwdVerif($nick, $pwd)){
		    $_SESSION['nickname'] = $nick;
		    $user = $manager->getMember($_SESSION['nickname']);
		    $hashedPwd = $user->getPassword();

		    if(isset($_POST['autolog'])){		    
		    	setcookie('nickname', $nick, time() + (86400 * 30));
		    	setcookie('hashedPwd', $hashedPwd, time() + (86400 * 30));
		    }
		    header('Location: index.php');
		}
		else { 
		?>
			<script type="text/javascript">
				alert('Mauvais identifiant ou mot de passe');
				window.location.href = 'index.php';
			</script> <?php
		}
	}
}

function logout(){
	$_SESSION = array();
	session_destroy();
	setcookie('nickname', '');
	setcookie('hashedPwd', '');
	header('Location: index.php');
}

login();