<?php

function dbConnect() {
    try
    {
        //Connexion a la database
        $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root', 
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
}

function newPost() {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO blog (name, message) VALUES(?, ?)');

    $req->execute(array($_POST['name'], $_POST['message']));
}

function displayPosts() {
    $db = dbConnect();
    $req = $db->query('SELECT name, message, id FROM blog ORDER BY ID DESC LIMIT 0, 10');
    
    return $req;
}

function getPost($id) {
    $db = dbConnect();
    $req = $db->prepare('SELECT name, message FROM blog WHERE id = ?');
    $req->execute(array($id));
    $post = $req->fetch();

    return $post;
}

function newComment($postId, $author, $comment) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO comments(postId, author, comment) VALUES(?, ?, ?)');
    $req->execute(array($postId, $author, $comment));
}