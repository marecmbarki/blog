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
    require('edit_view.php');
}

function addComment($postId, $author, $comment)
{
    newComment($postId, $author, $comment);
    $post = getPost($postId);

    require('edit_view.php');
}