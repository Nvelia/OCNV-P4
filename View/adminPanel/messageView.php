<?php ob_start();

$getMessage = $messageManager->getMessage($_GET['id']); 
$messageManager->updateMessageRead($_GET['id']);

echo '<a href="javascript:history.go(-1)" class="previousPage">&laquo; Retourner sur la liste des messages</a>
		<div class="messagePage"><h4>Boite de réception</h4>';
$unreadMessage = $messageManager->count();
$numberMessage = $unreadMessage;

if($unreadMessage == 0){
	echo 'Vous n\'avez aucun message non lu';
}
elseif($unreadMessage == 1){
	echo 'Vous avez encore '.$unreadMessage.' message non lu';
}
else{
	echo 'Vous avez encore '.$unreadMessage.' messages non lus';
} ?>


<div class="styleMessage">
	<h4><?= $getMessage->getTopic() ?></h4><button type="button" id="<?= $getMessage->getId() ?>" class="delete deleteMessage"><i class="fas fa-trash-alt"></i> Supprimer</button>
	<p><?= $getMessage->getMessage() ?></p>
	<strong>Envoyé par <?= $getMessage->getSender() ?></strong>
	<em>le <?= $getMessage->getMessageDate() ?> </em>
</div>

<?php
$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>