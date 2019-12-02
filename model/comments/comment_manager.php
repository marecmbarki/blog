<?php
class CommentManager extends DatabaseConnect {
    
    
    
    public function getComments($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT author, comment, id, flag FROM comments WHERE postId = ? ORDER BY ID DESC');
        $req->execute(array($postId));
        $comments = $req;
    
        return $comments;
    }
    
    public function newComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO comments(postId, author, comment) VALUES(?, ?, ?)');
        $req->execute(array($postId, $author, $comment));
    }
    
    public function getDeleteComments($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE postId = ?');
        $req->execute(array($postId));
    }

    public function getDeleteComment($postId, $commentId) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE postId = ? AND id = ?');
        $req->execute(array($postId, $commentId));
    }

    public function reportAComment($postId, $id) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET flag = 1 WHERE postId = ? AND id = ?');
        $req->execute(array($postId, $id));
    }

    public function getReportedComments() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment, flag, postId FROM comments WHERE flag = 1 ORDER BY ID DESC');
        $reportedComments = $req;
    
        return $reportedComments;
    }
}