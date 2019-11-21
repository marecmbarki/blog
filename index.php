<?php

require('controller/controller.php');

if (isset($_GET['action'])) {
    if($_GET['action'] == 'createPost') {
        if(isset($_POST['name'], $_POST['message'])) {
            createPost();
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
    } elseif ($_GET['action'] == 'login') {
        login();        
    } elseif ($_GET['action'] == 'admin') {
        if (isset($_POST['password'])) {
            if($_POST['password'] == 'p') {
                getAdminSpace();
            } else {
                listPosts();
            }
        }
    } elseif ($_GET['action'] == 'editArticle') {
        if (isset($_GET['id'])) {
            getUpdatePage($_GET['id']);
        }
    }
} else {
    listPosts();
}