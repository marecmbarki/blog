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