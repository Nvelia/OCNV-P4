<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Panneau d'Administration</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="public/css/panelStyle.css" rel="stylesheet" /> 
        <script src="public/js/tinymce/js/tinymce/tinymce.min.js?apiKey=k0j2dfi7hv1ko2ru0gzvryyfmxzjh364amlg2e5ahmmm3wok"></script>
        <script>tinymce.init({selector:'textarea', language: 'fr_FR'});</script>
    </head>
        
    <body>
        <?php 
            $messageManager = new MessageManager($db);
            $unreadMessage = $messageManager->count();
            $numberMessage = $unreadMessage;
        ?>
        <header>
            <p>Panneau d'administration</p>
            <ul>
                <li>Bienvenue <?= $_SESSION['nickname'] ?></li>
                <li><a href="index.php"><i class="fas fa-home"></i> Site</a></li>
                <li><a href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i> Deconnexion</a></li>
            </ul>
        </header>
        <div id="container">
            <nav class="panelMenu">
                <ul>
                    <li><a href="?action=panel&amp;page=home" class="active linksMenu"><i class="fas fa-user-tie"></i> Accueil</a></li>
                    <li><a href="?action=panel&amp;page=posts" class="linksMenu"><i class="fas fa-file"></i> Billets</a></li>
                    <li><a href="?action=panel&amp;page=comments" class="linksMenu"><i class="fas fa-comment"></i> Commentaires</a></li>
                    <li><a href="?action=panel&amp;page=mailbox" class="linksMenu"><i class="fas fa-envelope"></i> Messagerie (<?= $numberMessage ?>)</a></li>
                    <li><a href="?action=panel&amp;page=settings" class="linksMenu"><i class="fas fa-cogs"></i> Préférences</a></li>
                </ul>
            </nav>
            <aside id="leftCol"></aside>
            <section>
                <?php if(isset($pageContent)){
                    echo $pageContent;
                }?>
            </section>
        </div>

        <!-- <?= $content ?> -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
    </body>
</html>