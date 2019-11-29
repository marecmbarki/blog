<?php

require('model/model.php');
require('model/comment_manager.php');
require('model/blog_manager.php');
require('model/admin_manager.php');

function createPost($login) {
    $blogManager = new BlogManager();
    $blogManager->newPost();
    $adminManager = new AdminManager();
    $admin = $adminManager->checkAdmin($login);
    $posts = $blogManager->displayPosts();
    $commentManager = new CommentManager();
    $reportedComments = $commentManager->getReportedComments();

    require('view/admin_view.php');
}

function listPosts() {
    $blogManager = new BlogManager();
    $posts = $blogManager->displayPosts();

    require('view/view.php');
}

function readPost($id) {
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($id);
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($id);

    require('view/post_view.php');
}

function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    $commentManager->newComment($postId, $author, $comment);
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    
    require('view/post_view.php');
}

function getUpdatePage($postId) {
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($postId);

    require('view/update.php');
}

function postUpdate($name, $message, $postId) {    
    $blogManager = new BlogManager();
    $blogManager->updatePost($name, $message, $postId);
    $post = $blogManager->getPost($postId);
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($postId);
    
    require('view/post_view.php');
}

function postDelete ($postId) {
    $blogManager = new BlogManager();
    $blogManager->getDeletePost($postId);
    $commentManager = new CommentManager();
    $commentManager->getDeleteComments($postId);
    $posts = $blogManager->displayPosts();

    require('view/view.php');
}

function deleteComments($postId) {
    $commentManager = new CommentManager();
    $commentManager->getDeleteComments($postId);
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/post_view.php');
}

function deleteComment($postId, $commentId) {
    $commentManager = new CommentManager();
    $commentManager->getDeleteComment($postId, $commentId);
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/post_view.php');
}

function registerView() {
    require('view/register_view.php');
}

function addUser($login, $password) {
    $password = sha1($password);
    $adminManager = new AdminManager();
    $adminManager->newAdmin($login, $password);
    $admin = $adminManager->checkAdmin($login);
    
    require('view/adminCheck_view.php');
}

function getLogView() {
    require('view/log_view.php');
}

function getAdminInfos($login) {
    $adminManager = new AdminManager();
    $admin = $adminManager->checkAdmin($login);
    
    require('view/adminCheck_view.php');
}

function displayAdminSpace() {
    $blogManager = new BlogManager();
    $posts = $blogManager->displayPosts();
    $commentManager = new CommentManage();
    $reportedComments = $commentManager->getReportedComments();
    require('view/admin_view.php');
}

function reportComment($postId, $id) {
    $commentManager = new CommentManager();
    $commentManager->reportAComment($postId, $id);
    $blogManager = new BlogManager();
    $post = $blogManager->getPost($postId);
    $comments = $commentManager->getComments($postId);

    require('view/post_view.php');
}

function displayError() {
    require('view/error_view.php');
}