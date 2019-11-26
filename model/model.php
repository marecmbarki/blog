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

function getComments($postId) {
    $db = dbConnect();
    $req = $db->prepare('SELECT author, comment, id, flag FROM comments WHERE postId = ? ORDER BY ID DESC');
    $req->execute(array($postId));
    $comments = $req;

    return $comments;
}

function updatePost($name, $message, $postId) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE blog SET name = ?, message = ? WHERE id = ?');
    $req->execute(array($name, $message, $postId));
}

function getDeletePost($postId) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM blog WHERE id = ?');
    $req->execute(array($postId));
}

function getDeleteComments($postId) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE postId = ?');
    $req->execute(array($postId));
}

function getDeleteComment($postId, $commentId) {
    $db = dbConnect();
    $req = $db->prepare('DELETE FROM comments WHERE postId = ? AND id = ?');
    $req->execute(array($postId, $commentId));
}

function newAdmin($login, $password) {
    $db = dbConnect();
    $req = $db->prepare('INSERT INTO admin(login, password) VALUES(?, ?)');
    $req->execute(array($login, $password));
}

function checkAdmin($login) {
    $db = dbConnect();
    $req = $db->prepare('SELECT login, password, id FROM admin WHERE login = ?');
    $req->execute(array($login));
    $admin = $req->fetch();
    
    return $admin;
}

function reportAComment($postId, $id) {
    $db = dbConnect();
    $req = $db->prepare('UPDATE comments SET flag = 1 WHERE postId = ? AND id = ?');
    $req->execute(array($postId, $id));
}

function getReportedComments() {
    $db = dbConnect();
    $req = $db->query('SELECT id, author, comment, flag, postId FROM comments WHERE flag = 1 ORDER BY ID DESC');
    $reportedComments = $req;

    return $reportedComments;
}