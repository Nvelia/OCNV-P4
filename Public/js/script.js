var loginOpened = false;
var mailOpened = false;
var formOpened = false;

function createLoginWindow(){
	var loginWindow = document.getElementById('loginWindow');
	var login = document.getElementById('login');
	if(loginOpened === false){
		loginOpened = true;
		login.style.color = "#151515";
		login.style.background = "#E7E7E7";
		login.style.border = "none";
		loginWindow.style.display = "block";
		loginWindow.classList.add('special');
	}
	else if(loginOpened === true){
		loginOpened = false;
		login.style.color = "#E7E7E7";
		login.style.background = "#444";
		loginWindow.style.display = "none";
	}
}

function createMailWindow(){
	if(mailOpened === false){
		mailOpened = true;
		this.nextElementSibling.style.display = "block";
	}
	else if(mailOpened === true){
		mailOpened = false;
		this.nextElementSibling.style.display = "none";
	}
}

function mailWindow(){
	if(mailOpened === false){
		mailOpened = true;
		this.parentElement.style.display = "block";
	}
	else if(mailOpened === true){
		mailOpened = false;
		this.parentElement.style.display = "none";
	}
}

function linkOnRow(){
	var phpPostId = this.id;
	window.location.href = 'index.php?action=home&page=comments&id='+phpPostId;
}

function deleteCommentary(){
	var phpCommentaryAuthor = this.value;
	var phpCommentaryId = this.id;
	var phpPostId = this.name;
	c = confirm("Souhaitez vous supprimer ce commentaire écrit par "+phpCommentaryAuthor+"?");
	if(c){
		window.location.href = 'index.php?action=home&page=comments&function=delete&comId='+phpCommentaryId+'&id='+phpPostId;
	}
}

function deleteComPanel(){
	var phpCommentaryAuthor = this.value;
	var phpCommentaryId = this.id;
	c = confirm("Souhaitez vous supprimer ce commentaire écrit par "+phpCommentaryAuthor+"?");
	if(c){
		window.location.href = 'index.php?action=panel&page=comments&function=delete&comId='+phpCommentaryId;
	}
}

function deletePost(){
	var phpPostId = this.id;
	c = confirm("Souhaitez vous supprimer ce billet?");
	if(c){
		window.location.href = 'index.php?action=panel&page=posts&function=delete&id='+phpPostId;
	}
}

function reportCom(){
	var phpCommentaryAuthor = this.value;
	var phpCommentaryId = this.id;
	var phpPostId = this.name;
	c = confirm("Souhaitez vous signaler ce commentaire écrit par "+phpCommentaryAuthor+"?");
	if(c){
		window.location.href = 'index.php?action=home&page=comments&function=report&comId='+phpCommentaryId+'&id='+phpPostId;
	}
}



function deleteReports(){
	var phpComId = this.id;
	c = confirm("Souhaitez vous supprimer les signalements de ce commentaire?");
	if(c){
		window.location.href = 'index.php?action=panel&page=comments&function=deleteReports&id='+phpComId;
	}

}

function delMail(){
	var phpMailId = this.id;
	c = confirm("Souhaitez vous supprimer cet email?");
	if(c){
		window.location.href = 'index.php?action=panel&page=mailbox&function=delete&id='+phpMailId;
	}
}

function displayForm(){
	var formComment = document.getElementById('formComment');
	formComment.style.display = "block";
	window.scrollTo(0,document.body.scrollHeight);
}

$('#login').on('click', createLoginWindow);
$('.closeLogin').on('click', createLoginWindow);
$('.nameMail').on('click', createMailWindow);
$('.closeMail').on('click', mailWindow);
$('.deleteCom').on('click', deleteCommentary);
$('.deleteComPanel').on('click', deleteComPanel);
$('.deletePost').on('click', deletePost);
$('.report').on('click', reportCom);
$('.deleteReport').on('click', deleteReports);
$('.clickableRow').on('click', linkOnRow);
$('.addComment').on('click', displayForm);
$('.mailDelete').on('click', delMail);
$('.deleteMessage').on('click', delMail);
$('.answerCom').on('click', createFormWindow);

function createFormWindow(){
	if(formOpened === false){
		formOpened = true;
		this.nextElementSibling.style.display = "block";
	}
	else if(formOpened === true){
		formOpened = false;
		this.nextElementSibling.style.display = "none";
	}
}

function activeLinks(){
	var url_string = window.location.href;
	var url = new URL(url_string);
	var page = url.searchParams.get('page');
	var menuLinks = document.getElementById('linksMenu').children;
	switch(page){
		case home:
			menuLinks.classList.remove('active');
			this.classList.add('active');
			break;
		case posts:
			menuLinks.classList.remove('active');
			this.classList.add('active');
			break;
		case comments:
			menuLinks.classList.remove('active');
			this.classList.add('active');
			break;
		case mailbox:
			menuLinks.classList.remove('active');
			this.classList.add('active');
			break;
		case settings:
			menuLinks.classList.remove('active');
			this.classList.add('active');
			break;
	}
}