<?php

session_start(); 
require "../connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){  
       $data = trim($data);  // enlève les espaces
	   $data = stripslashes($data);  // enlève les anti slash
	   $data = htmlspecialchars($data);  //Remplace par les équivalents dans la chaînes string
	   return $data;
	}


	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: connexion.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: connexion.php?error=Password is required");
	    exit();
	}else{
		$req = $objPdo->prepare('SELECT * FROM redacteur WHERE adressemail = ? AND motdepasse = ?;');

            if($req->rowCount() == 1) {
                $row = $req->fetchAll(PDO::FETCH_ASSOC);
                if ($row['adressemail'] === $email && $row['motdepasse'] === $password) {
                    session_start();
                    $_SESSION["idredacteur"] = $row["idredacteur"];
                    $_SESSION["pseudo"] = $row["pseudo"];
                    $_SESSION["nom"] = $row["nom"];
                    $_SESSION["prenom"] = $row["prenom"];
                    echo("Connecté"); 
                    exit();
                }
            } else {
                $req = null;
                header("location: ../connection.php?error=Adresse mail ou mot de passe incorrect !");
                exit();
            }
        }
        $req = null;
	}	

?>