<?php

class DatabaseConnect {
    public function dbConnect() {
        try
        {
            //Connexion a la database
            $db = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', 'root', 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $db;
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
}

require('model/comments/comment_manager.php');
require('model/blog/blog_manager.php');
require('model/admin/admin_manager.php');