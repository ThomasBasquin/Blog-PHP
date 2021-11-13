<?php session_start();
include('functions.php');
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('location: allArticle.php');
    } else {
        extract($_GET);
        $id = strip_tags($id);
        $article = getSingleArticle($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->titresujet?></title>
</head>
    <h1><?= $article->titresujet?></h1>
    <p><?=$article->textesujet ?></p>
<body>
    
</body>
</html>