<?php

class UserControl {
    public function listPosts() {
        $blogManager = new BlogManager();
        $posts = $blogManager->displayPosts();
    
        require('view/frontend/view.php');
    }

    public function readPost($id) {
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($id);
        $commentManager = new CommentManager();
        $comments = $commentManager->getComments($id);
    
        require('view/frontend/post_view.php');
    }

    public function addComment($postId, $author, $comment) {
        $commentManager = new CommentManager();
        $commentManager->newComment($postId, $author, $comment);
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($postId);
        $comments = $commentManager->getComments($postId);
        
        require('view/frontend/post_view.php');
    }

    public function registerView() {
        require('view/frontend/register_view.php');
    }


    public function getLogView() {
        require('view/frontend/log_view.php');
    }

    public function reportComment($postId, $id) {
        $commentManager = new CommentManager();
        $commentManager->reportAComment($postId, $id);
        $blogManager = new BlogManager();
        $post = $blogManager->getPost($postId);
        $comments = $commentManager->getComments($postId);
    
        require('view/frontend/post_view.php');
    }

    public function displayError() {
        require('view/frontend/error_view.php');
    }
}