<?php 
    if(!isset($_GET['idsujet']) || !is_numeric($_GET['idsujet']))
    header('Location: index.php');
    else {
        extract($_GET);
        $id = strip_tags($id);
        require_once('function.php');
        $article = getArticle($id);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article->titresujet ?></title>
</head>
<body>
    <h1><?= $article->titresujet ?></h1>
    <p><?= $article->textesujet ?></p>
</body>
</html>