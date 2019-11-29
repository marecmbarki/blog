<?php

session_start();

require('controller/controller.php');

if (isset($_GET['action'])) {
    if($_GET['action'] == 'createPost') {
        if(!empty($_POST['name']) && !empty($_POST['message'])) {
            if (isset($_SESSION['login'])) {
                createPost($_SESSION['login']);
            }
        } else {
            $_SESSION['error'] = 'createPost';
            displayError();
        }
    } elseif ($_GET['action'] == 'displayPost') {
        if (isset($_GET['id'])) {
            if(!empty($_POST['nameUpdated']) &&  !empty($_POST['messageUpdated'])) {
                postUpdate($_POST['nameUpdated'], $_POST['messageUpdated'], $_GET['id']);
            } else {
                readPost($_GET['id']);
            }
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        } else {
            $_SESSION['error'] = 'addComment';
            displayError();
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
    } elseif ($_GET['action'] == 'registerView') {
        registerView();
    } elseif ($_GET['action'] == 'addUser') {
        if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['verifyPassword'])) {
            if ($_POST['password'] == $_POST['verifyPassword']) {
                addUser($_POST['login'], $_POST['password']);
            } else {
                $_SESSION['error'] = 'addUserVerify';
                displayError();
            }
        } else {
            $_SESSION['error'] = 'addUser';
            displayError();
        }
    } elseif ($_GET['action'] == 'logView') {
        getLogView();
    } elseif ($_GET['action'] == 'adminChecking') {
        if(!empty($_POST['login']) && !empty($_POST['password'])) {
            getAdminInfos($_POST['login']);
        } else {
            $_SESSION['error'] = 'adminChecking';
            displayError();
        }
    } elseif($_GET['action'] == 'admin') {
        if (isset($_SESSION['login'])) {
            displayAdminSpace();
        }
    } elseif ($_GET['action'] == 'reportComment') {
        if(isset($_GET['postId'], $_GET['id'])) {
            reportComment($_GET['postId'], $_GET['id']);
        }
    }
} else {
    listPosts();
}