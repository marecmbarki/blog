<?php
class AdminManager extends DatabaseConnect {
    
    public function newAdmin($login, $password) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO admin(login, password) VALUES(?, ?)');
        $req->execute(array($login, $password));
    }
    
    public function checkAdmin($login) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT login, password, id FROM admin WHERE login = ?');
        $req->execute(array($login));
        $admin = $req->fetch();
        
        return $admin;
    }
}