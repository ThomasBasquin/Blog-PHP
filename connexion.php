
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <?php
    require('connect.php');
    
    if(isset($_POST['connexion'])) {
      $req =('SELECT * FROM redacteur WHERE  adressemail = ? AND motdepasse = ?;');
      $insert = $objPdo->prepare($req);
      $insert->execute(array($_POST['email'],$_POST['password']));
        if($insert->rowCount() > 0) {
          $redacteur = $insert->fetchAll(PDO::FETCH_ASSOC);
          session_start();
          $_SESSION["idredacteur"] = $redacteur[0]["idredacteur"];
          $_SESSION["pseudo"] = $redacteur[0]["pseudo"];
          $_SESSION["nom"] = $redacteur[0]["nom"];
          $_SESSION["prenom"] = $redacteur[0]["prenom"];
        } else {
            $req = null;
            header("location: ../connection.php?error=noresultfound");
            exit();

        }
    }
    ?>
</head>
<body>
<div class="connexion">
        <h2 class="title">Connexion</h2>

        <form action="connexion.php" method="POST" name ='val' >
          <div class="champs">    
            <div class="saisie"><input type="text" name="email" id="email" placeholder = "Email ou pseudo" size = 25> </div> </br>
            <div class="saisie"><input type="password" name="password" id="password" placeholder = "Password" size = 25> </div> </br>
           
            <?php echo $_SESSION['pseudo']; ?>
          </div>  

          <div class = "boutons connexion_button">
            <input type="submit" name="connexion" value="connexion">
          </div>
        </form>
      </div>
    </div>
</body>
</html>
