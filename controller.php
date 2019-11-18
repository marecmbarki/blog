<?php

require('model.php');

function createPost() {
    newPost();
    $posts = displayPosts();
        
    require('view.php');
}

function listPosts() {
    $posts = displayPosts();

    require('view.php');
}

function readPost($id) {
    $post = getPost($id);
    $comments = getComments($id);

    require('edit_view.php');
}

function addComment($postId, $author, $comment)
{
    newComment($postId, $author, $comment);
    $post = getPost($postId);
    $comments = getComments($postId);

    require('edit_view.php');
}