<?php
class BlogManager extends DatabaseConnect {
    
    public function displayPosts() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT name, message, id, DATE_FORMAT(date, \'%d/%m/%Y %Hh%i\') AS date FROM blog ORDER BY ID DESC LIMIT 0, 10');
        
        return $req;
    }
    
    public function newPost() {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO blog (name, message) VALUES(?, ?)');
    
        $req->execute(array($_POST['name'], $_POST['message']));
    }

    public function getPost($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT name, message, DATE_FORMAT(date, \'%d/%m/%Y %Hh%i\') AS date FROM blog WHERE id = ?');
        $req->execute(array($id));
        $post = $req->fetch();
    
        return $post;
    }

    public function updatePost($name, $message, $postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE blog SET name = ?, message = ? WHERE id = ?');
        $req->execute(array($name, $message, $postId));
    }

    public function getDeletePost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM blog WHERE id = ?');
        $req->execute(array($postId));
    }
}