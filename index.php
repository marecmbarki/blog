<?php

session_start();

require('controller/controller.php');

if (isset($_GET['action'])) {
    if($_GET['action'] == 'createPost') {
        if(isset($_POST['name'], $_POST['message'])) {
            if (isset($_SESSION['login'])) {
                createPost();
            }
        }
    } elseif ($_GET['action'] == 'displayPost') {
        if (isset($_GET['id'])) {
            if(isset($_POST['nameUpdated'], $_POST['messageUpdated'])) {
                postUpdate($_POST['nameUpdated'], $_POST['messageUpdated'], $_GET['id']);
            } else {
                readPost($_GET['id']);
            }
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['author'], $_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        }
    } elseif ($_GET['action'] == 'editArticle') {
        if (isset($_GET['id'])) {
            getUpdatePage($_GET['id']);
        }
    } elseif ($_GET['action'] == 'deleteArticle') {
        if (isset($_GET['id'])) {
            postDelete($_GET['id']);
        }
    } elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id'], $_GET['postId'])) {
            deleteComment($_GET['postId'], $_GET['id']);
        }
    } elseif ($_GET['action'] == 'logView') {
        getLogView();
    } elseif ($_GET['action'] == 'adminChecking') {
        if(isset($_POST['login'], $_POST['password'])) {
            getAdminInfos();
        }
    } elseif($_GET['action'] == 'admin') {
        if (isset($_SESSION['login'])) {
            displayAdminSpace();
        }
    } elseif ($_GET['action'] == 'reportComment') {
        if(isset($_GET['postId'])) {
            reportComment($_GET['postId']);
        }
    }
} else {
    listPosts();
}