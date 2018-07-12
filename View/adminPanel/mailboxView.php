<?php ob_start();

echo '<div class="mailBox"><h4>Boite de réception</h4>';
$unreadMessage = $messageManager->count();
$numberMessage = $unreadMessage;

if($unreadMessage == 0){
	echo 'Vous n\'avez aucun message non lu';
}
elseif($unreadMessage == 1){
	echo 'Vous avez '.$unreadMessage.' message non lu';
}
else{
	echo 'Vous avez '.$unreadMessage.' messages non lus';
} ?>

<table class="mailTable">
	<tr>
		<th></th>
		<th>Expediteur</th>
		<th>Titre</th>
		<th>Contenu</th>
		<th>Date</th>
	</tr>

<?php
$getMessages = $messageManager->getMessagesList($cPage, $perPage);
foreach($getMessages as $message){
		echo '	<tr><td><button type="button" id="'.$message->getId().'" class="delete mailDelete">&times;</button></td>	
				<td>'.$message->getSender().'</td>
				<td><a href="index.php?action=panel&amp;page=mailbox&amp;function=message&amp;id='.$message->getId().'">'. $message->getTopic().'</a></td>
				<td><a href="index.php?action=panel&amp;page=mailbox&amp;function=message&amp;id='.$message->getId().'">'.substr($message->getMessage(), 0, 110).'</a></td>
				<td>'. $message->getMessageDate().'</td>	
				</tr>';
	} echo '</table></div>';

if($nbPage > 1){
	echo '<div class="pagePres"><a href="index.php?action=panel&amp;page=mailbox&amp;p='.($cPage -1).'">&laquo;</a>';
	echo 'Page '. $cPage . ' sur '.$nbPage;
	echo '<a href="index.php?action=panel&amp;page=mailbox&amp;p='.($cPage +1).'">&raquo;</a></div>';
}

$pageContent = ob_get_clean();
require('adminPanelView.php'); ?>
