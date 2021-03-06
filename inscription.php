<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/identification.css">
    <title>Inscription</title>
    <?php 
       $messageErreur ="";
       $Ok_inscri = true;
       $id = 0;
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
                require_once ('connect.php');
                $req = 'INSERT INTO redacteur (idredacteur,nom,prenom,adressemail,motdepasse,pseudo) VALUES(?,?,?,?,?,?)';
                $insert = $objPdo->prepare($req);
                $insert->execute(array($id,$_POST['pseudo'],$_POST['prenom'],$_POST['nom'],$_POST['mail_inscri'],$_POST['password_inscri']));
            }
        }       
    ?>

</head>
<body>

    <nav class="main-head">  
        <h1><a href="#"><span>G</span>raoully-<span>B</span>log</a></h1>

        <ul>
            <li><a href="accueil.php">Accueil</a></li>

            <li><a href="blog.php"> Blog    </a></li>

            <li><a href="inscription.php">  S'inscrire      </a></li>

            <li><a href="contact.php">  Contact </a></li>

        </ul>

    </nav>

    <div class = "formulaire">
      <div class="inscription">
        <h2 class="title">Inscription</h2>

        <form action="inscription.php" method="POST" name ='inscription' >
            <div class="champs_inscri">    
              <div class="saisie"><input type="text" name="pseudo" id="pseudo" placeholder = "Pseudo" size = 25> </div> </br>
              <div class="saisie"><input type="text" name="prenom" id="prenom" placeholder = "Pr??nom" size = 25> </div> </br>
              <div class="saisie"><input type="text" name="nom" id="nom" placeholder = "Nom" size = 25> </div> </br>
              <div class="saisie"><input type="text" name="mail_inscri" id="mail_inscri" placeholder = "Email" size = 25> </div> </br>
              <div class="saisie"><input type="password" name="password_inscri" id="password_inscri" placeholder = "Password" size = 25> </div> </br>
            </div>  

            <div class = "boutons">
              <input type="submit" name="inscription" value="S'inscrire">
            </div>
        </form>

      </div>

      <footer class = "main-foot">
        <p class = "part">En partenariat avec <a href="https://www.univ-lorraine.fr/" target="_blank">Univ-Lorraine</a> !</p>
        <p class="rights">??2021 Graoully-Blog. All Rights Reserved.</p>
    </footer>
</body>
</html>


