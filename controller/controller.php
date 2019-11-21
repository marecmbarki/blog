<?php

require('model/model.php');

function createPost() {
    newPost();
    $posts = displayPosts();
        
    require('view/view.php');
}

function listPosts() {
    $posts = displayPosts();

    require('view/view.php');
}

function readPost($id) {
    $post = getPost($id);
    $comments = getComments($id);

    require('view/post_view.php');
}

function addComment($postId, $author, $comment) {
    newComment($postId, $author, $comment);
    $post = getPost($postId);
    $comments = getComments($postId);

    require('view/post_view.php');
}

function login() {
    require('view/login_view.php');
}

function getAdminSpace() {
    require('view/admin_view.php');
}

function getUpdatePage($postId) {
    $post = getPost($postId);

    require('view/update.php');
}

function postUpdate($name, $message, $postId) {    
    updatePost($name, $message, $postId);
    $post = getPost($postId);
    $comments = getComments($postId);
    
    require('view/post_view.php');
}

function postDelete ($postId) {
    getDeletePost($postId);
    getDeleteComments($postId);
    $posts = displayPosts();

    require('view/view.php');
}