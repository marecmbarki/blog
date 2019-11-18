<?php

require('controller.php');

if(isset($_POST['name'], $_POST['message'])) {
    createPost();
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'addComment' && isset($_POST['author'], $_POST['comment'])) {
        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
    }
} elseif (isset($_GET['id'])) {
    readPost($_GET['id']);
} else {
    listPosts();
}