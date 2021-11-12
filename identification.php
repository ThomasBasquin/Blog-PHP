<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/identification.css">
    <title>Identification</title>
    <?php 
       $messageErreur ="";
       $Ok_inscri = true;
        if(isset($_POST['inscription'])) {
            if(empty($_POST['pseudo'])) {
                $messageErreur = $messageErreur + "Saisir un pseudo";
                $Ok_inscri = false;
            }
            if(empty($_POST['prenom'])) {
                $messageErreur = $messageErreur + "Saisir un prenom";
                $Ok_inscri = false;
            }
            if(empty($_POST['nom'])) {
                $messageErreur = $messageErreur + "Saisir un nom";
                $Ok_inscri = false;
            }
            if(!filter_var($_POST['mail_inscri'],FILTER_VALIDATE_EMAIL)) {
                $messageErreur = $messageErreur + "Veuillez saisir un email correcte";
                $Ok_inscri = false;
            }
            if (empty($_POST['password_inscri'])) {
                $messageErreur = $messageErreur + "Saisir un mot de passe";
                $Ok_inscri = false;
            }
            if(!ctype_alnum($_POST['password_inscri'])) {
                $messageErreur = $messageErreur + "Saisir un mot de passe avec uniquement des caractere et des nombres";
                $Ok_inscri = false;
            }
            if(!strlen($_POST['password_inscri'])>6) {
                $messageErreur = $messageErreur + "Saisir un mot de passe avec minimum 6 caracteres";
                $Ok_inscri = false;
            }
            if (!preg_match('`[A-Z]`',$_POST['password_inscri'])) {
                $messageErreur = $messageErreur + "Saisir aumoins une majuscule dans le mot de passe";
                $Ok_inscri = false;
            }
            if(!preg_match('`[a-z]`',$_POST['password_inscri'])) {
                $messageErreur = $messageErreur + "Saisir aumoins une minuscule dans le mot de passe";
                $Ok_inscri = false;
            }
            if(!preg_match('`[0-9]`',$_POST['password_inscri'])) {
                $messageErreur = $messageErreur + "Saisir aumoins un chiffre dans le mot de passe";
                $Ok_inscri = false;
            }
            if ($Ok_inscri) {
                require_once 'connect.php';
                $req = 'INSERT INTO redacteur (idredacteur,nom,prenom,adressemail,motdepasse,pseudo) VALUES(?,?,?,?,?,?)';
                $insert = $objPdo->prepare($req);
                $insert->execute(array($id,$_POST['pseudo'],$_POST['prenom'],$_POST['nom'],$_POST['mel'],$_POST['mdp']));
            }
        }       
    ?>
    <?php
      require_once 'connect.php';
      session_start();
        
      if(isset($_POST['connexion'])) {
          $email = $_POST['mail_connex'];
          $password = $_POST['password_connex'];

          $check = $objPdo->prepare('SELECT adressemail,motdepasse, pseudo FROM redacteur WHERE adressemail = ?');
          $check->execute(array($email));
          $data = $check->fetch();
          $row = $check->rowCount();

          if($rows == 1) {
            if($data['motdepasse'] == $password) {
              $_SESSION['user'] = $data['pseudo'];
              header("Location: index.php");
            }
          }
      } 
    ?>

</head>
<body>
<header class="header" id="header">
      <nav class="nav container">
        <a href="index.php" class="nav_logo">Graoully Blog</a>

        <!-- <div class="nav_menu">
          <ul class="nav_list">
            <li class="nav_item">
              <a href="./index.html" class="nav_link">
                <span class="nav_icon">Accueuil</span> 
              </a>
            </li>
            <li class="nav_item active">
              <a href="#about" class="nav_link active">
                <span class="nav_icon">Sujet</span> 
              </a>
            </li>
            <li class="nav_item">
              <a href="#skills" class="nav_link">
                <span class="nav_icon">Inscription</span>
              </a>
            </li>
          </ul>
        </div> -->
      </nav>
    </header>

    <div class = "formulaire">
      <div class="inscription">
        <h2 class="title">Inscription</h2>

        <form action="identification.php" method="POST" name ='identification' >
            <div class="champs">    
              <div class="ligne"><label for="pseudo">Pseudo </label><input type="text" name="pseudo" id="pseudo" placeholder = "Neopreda" size = 25> </div> </br>
              <div class="ligne"><label for="prenom">Prénom </label><input type="text" name="prenom" id="prenom" placeholder = "Noé" size = 25> </div> </br>
              <div class="ligne"><label for="nom">Nom </label><input type="text" name="nom" id="nom" placeholder = "Harrison" size = 25> </div> </br>
              <div class="ligne"><label for="mel">Email </label><input type="text" name="mel" id="mail_inscri" placeholder = "NoeHarrison@gmail.com" size = 25> </div> </br>
              <div class="ligne"><label for="mdp">Mot de passe </label><input type="password" name="password_inscri" id="mdp" size = 25> </div> </br>
            </div>  

            <div class = "boutons">
              <input type="submit" name="inscription" value="S'inscrire">
            </div>
        </form>

      </div>

      <div class="connexion">
        <h2 class="title">Connexion</h2>

        <form action="identification.php" method="POST" name ='val' >
          <div class="champs">    
            <div class="ligne"><label for="mel">Email ou pseudo </label><input type="text" name="mel" id="mail_connex" placeholder = "NoeHarrison@gmail.com" size = 25> </div> </br>
            <div class="ligne"><label for="mdp">Mot de passe </label><input type="password" name="password_connex" id="mdp" size = 25> </div> </br>
          </div>  

          <div class = "boutons">
            <input type="submit" name="connexion" value="connexion">
          </div>
        </form>
      </div>
    </div>
</body>
</html>


