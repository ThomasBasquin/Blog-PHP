<?php 
require_once('functions.php');
$articles = getArticles();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Blog</title>
</head>
<body>
        <h1>Articles :</h1>
        <?php foreach($articles as $article):?>
            <h2><?= $article->titresujet?></h2>
            <p><?=$article->textesujet ?></p>
            <a href="article.php?idsujet<?php echo $article->idsujet ?>">Lire la suite</a>
        <?php endforeach;?>
</body>
</html> 