<?php 

require('controller/panelController.php');
require('controller/frontController.php');

try {
	if(isset($_GET['action'])){
		if($_GET['action'] === 'home'){
			if(isset($_GET['page'])){
				if($_GET['page'] === 'login'){
					login();
				}
				elseif($_GET['page'] === 'sendMail'){
					sendMessage();
				}
				elseif($_GET['page'] === 'comments'){
					if(isset($_GET['function']) && ($_GET['function'] === 'delete')){
						if(isset($_SESSION['nickname']) && ($_SESSION['nickname'] === "Jean")){
	                		deleteCom();
	                	}
	                	else{
	                		throw new Exception('Vous n\'avez pas l\'autorisation d\'effectuer cette action. <br/>
	                			<a href="index.php">Retourner sur la page d\'accueil</a>');
	                	}
	                }
	                if(isset($_GET['function']) && ($_GET['function'] === 'report')){
	                	reportCom();
	                }
					if(isset($_GET['id']) && $_GET['id'] > 0){
	                		commentsPage();
					}
					else{
						throw new Exception('Aucun identifiant de billet envoyé. <br/>
	                			<a href="index.php">Retourner sur la page d\'accueil</a>');
					}
				}
			}
			else{
				if(isset($_GET['p'])){
					homePage($_GET['p'],5);
	            }
	            else{
	                homePage(1,5);
	            }
			}
		}
		elseif($_GET['action'] === 'panel'){
			if(isset($_SESSION['nickname']) && ($_SESSION['nickname'] === "Jean")) {
				if (isset($_GET['page'])) {
					if($_GET['page'] === 'home'){
						adminPanel();
					}
	                elseif ($_GET['page'] === 'posts') {
	                   	if (isset($_GET['function'])){
	                   		if($_GET['function'] === 'addpost'){
	                   			addPost();
	                   		}
	                   		elseif($_GET['function'] === 'modify'){
	                   			updatePost();
	                   		}
	                   		elseif($_GET['function'] === 'delete'){
	                   			deletePost();
	                   		}
	                   	}
	                   	else{
	                   		if(isset($_GET['p'])){	            
								postsPage($_GET['p'],5);
	                   		}
	                   		else{
	                   			postsPage(1,5);
	                   		}

	                   	}
	                }
	                elseif ($_GET['page'] === 'comments'){
	                	if(isset($_GET['function']) && ($_GET['function'] === 'reportedComments')){
	                		displayreportedComments();
	                	}
	                	elseif(isset($_GET['function']) && ($_GET['function'] === 'delete')){
	                		deleteComPanel();
	                	}
	                	elseif(isset($_GET['function']) && ($_GET['function'] === 'deleteReports')){
	                		deleteReports();
	                	}
	                	else{
	                		manageComments();
	                	}
	                }
	                elseif ($_GET['page'] === 'mailbox'){
	                	if(isset($_GET['function']) && ($_GET['function'] === 'delete')){
	                		deleteMail();
	                	}
	                	elseif(isset($_GET['function']) && ($_GET['function'] === 'message')){
	                		displayMessage();
	                	}
	                	else{
	                		mailbox();
	                	}
	                }
	                elseif ($_GET['page'] === 'settings') {
	                	settingsPage();
	                }
	            }
	            else{
	            	adminPanel();
	            }
	        }
	        else{
	        	throw new Exception('Vous n\'avez pas l\'autorisation d\'accéder à cette page. <br/>
	                <a href="index.php">Retourner sur la page d\'accueil</a>');
	        }
		}
		elseif($_GET['action'] === 'logout'){
			logout();
		}
	}
	else {
		if(isset($_GET['p']) && $_GET['p'] <= 0){
			homePage(1,5);
	    }
	    else{
	        homePage(1,5);
	    }
	}
}

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}