<?php
class AdminManager {
    
    public function newAdmin($login, $password) {
        $db = dbConnect();
        $req = $db->prepare('INSERT INTO admin(login, password) VALUES(?, ?)');
        $req->execute(array($login, $password));
    }
    
    public function checkAdmin($login) {
        $db = dbConnect();
        $req = $db->prepare('SELECT login, password, id FROM admin WHERE login = ?');
        $req->execute(array($login));
        $admin = $req->fetch();
        
        return $admin;
    }
}