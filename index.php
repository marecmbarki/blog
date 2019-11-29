<?php

session_start();

require('controller/controller.php');


if (isset($_GET['action'])) {
    if($_GET['action'] == 'createPost') {
        if(!empty($_POST['name']) && !empty($_POST['message'])) {
            if (isset($_SESSION['login'])) {
                $adminControl->createPost($_SESSION['login']);
            }
        } else {
            $_SESSION['error'] = 'createPost';
            $userControl->displayError();
        }
    } elseif ($_GET['action'] == 'displayPost') {
        if (isset($_GET['id'])) {
            if(!empty($_POST['nameUpdated']) &&  !empty($_POST['messageUpdated'])) {
                $adminControl->postUpdate($_POST['nameUpdated'], $_POST['messageUpdated'], $_GET['id']);
            } else {
                $userControl->readPost($_GET['id']);
            }
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (!empty($_POST['author']) && !empty($_POST['comment'])) {
            $userControl->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        } else {
            $_SESSION['error'] = 'addComment';
            $userControl->displayError();
        }
    } elseif ($_GET['action'] == 'editArticle') {
        if (isset($_GET['id'])) {
            $adminControl->getUpdatePage($_GET['id']);
        }
    } elseif ($_GET['action'] == 'deleteArticle') {
        if (isset($_GET['id'])) {
            $adminControl->postDelete($_GET['id']);
        }
    } elseif ($_GET['action'] == 'deleteComment') {
        if (isset($_GET['id'], $_GET['postId'])) {
            $adminControl->deleteComment($_GET['postId'], $_GET['id']);
        }
    } elseif ($_GET['action'] == 'registerView') {
        $userControl->registerView();
    } elseif ($_GET['action'] == 'addUser') {
        if(!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['verifyPassword'])) {
            if ($_POST['password'] == $_POST['verifyPassword']) {
                $adminControl->addUser($_POST['login'], $_POST['password']);
            } else {
                $_SESSION['error'] = 'addUserVerify';
                $userControl->displayError();
            }
        } else {
            $_SESSION['error'] = 'addUser';
            $userControl->displayError();
        }
    } elseif ($_GET['action'] == 'logView') {
        $userControl->getLogView();
    } elseif ($_GET['action'] == 'adminChecking') {
        if(!empty($_POST['login']) && !empty($_POST['password'])) {
            $adminControl->getAdminInfos($_POST['login']);
        } else {
            $_SESSION['error'] = 'adminChecking';
            $userControl->displayError();
        }
    } elseif($_GET['action'] == 'admin') {
        if (isset($_SESSION['login'])) {
            $adminControl->displayAdminSpace();
        }
    } elseif ($_GET['action'] == 'reportComment') {
        if(isset($_GET['postId'], $_GET['id'])) {
            $userControl->reportComment($_GET['postId'], $_GET['id']);
        }
    }
} else {
    $userControl->listPosts();
}