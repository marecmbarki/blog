<?php

require('model/model.php');

function createPost() {
    $admin = getAdmin();
    newPost();
    $posts = displayPosts();
    
    require('view/admin_view.php');
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

function deleteComments($postId) {
    getDeleteComments($postId);
    $post = getPost($postId);
    $comments = getComments($postId);

    require('view/post_view.php');
}

function deleteComment($postId, $commentId) {
    getDeleteComment($postId, $commentId);
    $post = getPost($postId);
    $comments = getComments($postId);

    require('view/post_view.php');
}

function getLogView() {
    require('view/log_view.php');
}

function getAdminInfos() {
    $admin = getAdmin();

    require('view/adminCheck_view.php');
}

function displayAdminSpace() {
    $admin = getAdmin();
    $posts = displayPosts();

    require('view/admin_view.php');
}