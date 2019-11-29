<?php

class AdminControl {
    public function createPost($login) {
        $blogManager = new BlogManager();
        $blogManager->newPost();
        $adminManager = new AdminManager();
        $admin = $adminManager->checkAdmin($login);
        $posts = $blogManager->displayPosts();
        $commentManager = new CommentManager();
        $reportedComments = $commentManager->getReportedComments();
    
        require('view/admin_view.php');
    }

    public function getUpdatePage($postId) {
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($postId);
    
        require('view/update.php');
    }

    public function postUpdate($name, $message, $postId) {    
        $blogManager = new BlogManager();
        $blogManager->updatePost($name, $message, $postId);
        $post = $blogManager->getPost($postId);
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($postId);
        
        require('view/post_view.php');
    }

    public function postDelete ($postId) {
        $blogManager = new BlogManager();
        $blogManager->getDeletePost($postId);
        $commentManager = new CommentManager();
        $commentManager->getDeleteComments($postId);
        $reportedComments = $commentManager->getReportedComments();
        $posts = $blogManager->displayPosts();
    
        require('view/admin_view.php');
    }

    public function deleteComments($postId) {
        $commentManager = new CommentManager();
        $commentManager->getDeleteComments($postId);
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($postId);
        $comments = $commentManager->getComments($postId);
    
        require('view/post_view.php');
    }

    public function deleteComment($postId, $commentId) {
        $commentManager = new CommentManager();
        $commentManager->getDeleteComment($postId, $commentId);
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($postId);
        $comments = $commentManager->getComments($postId);
    
        require('view/post_view.php');
    }

    public function addUser($login, $password) {
        $password = sha1($password);
        $adminManager = new AdminManager();
        $adminManager->newAdmin($login, $password);
        $admin = $adminManager->checkAdmin($login);
        
        require('view/adminCheck_view.php');
    }

    public function getAdminInfos($login) {
        $adminManager = new AdminManager();
        $admin = $adminManager->checkAdmin($login);
        
        require('view/adminCheck_view.php');
    }

    public function displayAdminSpace() {
        $blogManager = new BlogManager();
        $posts = $blogManager->displayPosts();
        $commentManager = new CommentManager();
        $reportedComments = $commentManager->getReportedComments();
        require('view/admin_view.php');
    }
}