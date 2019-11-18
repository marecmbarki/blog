<?php

require('controller.php');

if (isset($_GET['action'])) {
    if($_GET['action'] == 'createPost') {
        if(isset($_POST['name'], $_POST['message'])) {
            createPost();
        }
    } elseif ($_GET['action'] == 'displayPost') {
        if (isset($_GET['id'])) {
            readPost($_GET['id']);
        }
    } elseif ($_GET['action'] == 'addComment') {
        if (isset($_POST['author'], $_POST['comment'])) {
            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        }
    }
} else {
    listPosts();
}