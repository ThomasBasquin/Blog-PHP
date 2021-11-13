<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<div class="connexion">
        <h2 class="title">Connexion</h2>

        <form action="function/login.php" method="POST" name ='val' >
          <div class="champs">    
            <div class="saisie"><input type="text" name="email" id="email" placeholder = "Email ou pseudo" size = 25> </div> </br>
            <div class="saisie"><input type="password" name="password" id="password" placeholder = "Password" size = 25> </div> </br>
          </div>  

          <div class = "boutons connexion_button">
            <input type="submit" name="connexion" value="connexion">
          </div>
        </form>
      </div>
    </div>
</body>
</html>
