<?php
function getArticles() {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM sujet ORDER BY idsujet DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    
}
function getArticle($id) {
    require('connect.php');
    $req = $objPdo->prepare('SELECT * FROM sujet WHERE idsujet = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else {
        header('Location: index.php');
    }

    }
