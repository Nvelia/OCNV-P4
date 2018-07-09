<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Jean Forteroche website</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="public/css/frontStyle.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script src="public/js/tinymce/js/tinymce/tinymce.min.js?apiKey=k0j2dfi7hv1ko2ru0gzvryyfmxzjh364amlg2e5ahmmm3wok"></script>
        <script>tinymce.init({selector:'textarea', language: 'fr_FR'});</script>
    </head>
        
    <body>
        <nav class="menuBar">
            <ul>
                <li><a href="?action=home">Accueil</a></li>
                <li><a href="#">Mes ouvrages</a></li>
                <li><a href="#">A propos</a></li>
            </ul>
            <img src="public/images/jf.png">
            <a href="#" id="login" class="login"> 
                <?php if(isset($_SESSION['nickname'])){ 
                    echo "<i class=\"fas fa-arrow-circle-right\"></i> Bonjour " . $_SESSION['nickname'];
                } else{?>
                    Connexion <?php } ?> 
                </a>
        </nav>
        <div class="header">
            <img src="public/images/jfheader.jpg" alt="photo_de_l'auteur" />
        </div>

        <?php require('loginView.php');
        echo $pageContent; ?>
        <!-- <?= $content ?> -->
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.3.js"   integrity="sha256-1XMpEtA4eKXNNpXcJ1pmMPs8JV+nwLdEqwiJeCQEkyc="   crossorigin="anonymous"></script>
        <script type="text/javascript" src="public/js/script.js"></script>
        <script type="text/javascript" 
                id="cookieinfo"
                src="//cookieinfoscript.com/js/cookieinfo.min.js"
                data-message="Ce site utilise les cookies pour améliorer votre expérience utilisateur. En visitant ce site vous acceptez l'utilisation de ces derniers." 
                data-fg="#E7E7E7" 
                data-bg="#444" 
                data-linkmsg="Plus d'infos" 
                data-moreinfo="https://fr.wikipedia.org/wiki/Cookie_(informatique)" 
                data-divlinkbg="#E7E7E7">
        </script>

    </body>
</html>
