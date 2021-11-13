<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/accueil.css">
    <title>Creation Article</title>
    <?php
     $id = 0;
     $check = true;
     if (isset($_POST['creer'])) {
        if (empty($_POST['titre'])) {
            $check = false;
        } else 
        if (empty($_POST['article'])) {
            $check = false;
        }
        if($check) {
            require_once('connect.php');
            $req = 'INSERT INTO sujet (idsujet,idredacteur,titresujet,textesujet,datesujet) VALUES(?,?,?,?,NOW())';
            $insert = $objPdo->prepare($req);
            $insert->execute(array($id,(int)$_SESSION['idredacteur'],$_POST['titre'],$_POST['article']));
            header("Location: article.php");
        }
    }
    ?>
</head>
<body>
    <nav class="main-head">
         <h1><a href="#"><span>G</span>raoully-<span>B</span>log</a></h1>

         <ul>
             <li><a href="accueil.php">Accueil</a></li>

             <li><a href="article.php"> Blog    </a></li>

             <li><a href="identification.php">  S'inscrire      </a></li>

             <li><a href="contact.php">  Contact </a></li>

         </ul>

    </nav>
        <?php echo $_SESSION['pseudo'] . " " . $_SESSION['idredacteur']; ?>
    <div class="formulaire">
        <h2 class="title_creerArticle">Créer votre article</h2>
        <form action="creationArticle.php" method="post">
            <div class="champs_creerArticle">
                <input type="text" name="titre" id="titre" placeholder ="Titre" size = "25"> <br/>
                <textarea name="article" id="article" cols="100" rows="20" placeholder = "Votre texte"></textarea>
                <style>
                    textarea { resize: none;
                        }
                </style>
                <input type="submit" name="creer" value="Creer">
            </div>
        </form>
    </div>

</body>
</html>