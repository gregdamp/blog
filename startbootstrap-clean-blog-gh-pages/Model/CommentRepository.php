<?php

namespace gregdamp\Model;

use PDO;

require('./Model/Comment.php');

class CommentRepository extends Repository {

	function addComment()
	{
        $db = $this->dbConnect();
        
        $reqInsert = 'INSERT INTO comment';
        $reqCol = '(publishedDate, isModerate, parentId, idUser, idArticle, description, warning)';
        $reqValues = ' VALUES(now(), 0, 0, :idUser, :idArticle, :description, 0)';
        
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);       

        $req->bindParam(':idArticle', $_SESSION['idArticle'], \PDO::PARAM_STR);
        $req->bindParam(':description', $_SESSION['description'], \PDO::PARAM_STR);
        $req->bindParam(':idUser', $_SESSION['idUser'], \PDO::PARAM_STR);

        $req->execute();
        
        header('Location: /gregdamp/index.php');
        
    }

    public function getAllComment() {

    	$db = $this->dbConnect();
        
        $reqSelect = 'SELECT * FROM comment INNER JOIN user ON comment.idUser = user.idUser ORDER BY publishedDate DESC';
        $req = $db->prepare($reqSelect);
        
        $req->execute();


       $commentList = [];
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
            
            $comment = new Comment($data['idComment'], $data['publishedDate'], $data['isModerate'], $data['parentId'], $data['idUser'],  $data['idArticle'], $data['description'], $data['warning'], $data['pseudo']);
            
            $commentList[] = $comment;

        }
        
        $req->closeCursor();

		return $commentList;
    }

    public function deleteComment() {
        
        $db = $this->dbConnect();
        
        $reqDelete = 'DELETE FROM comment';
        $reqWhere = ' WHERE idComment = :id';
        
        $req = $db->prepare($reqDelete . $reqWhere);
        
        $req->bindParam(':id', $_SESSION['idComment'], \PDO::PARAM_STR);

        $req->execute();

        header('Location: /gregdamp/index.php');
    }

    public function updateComment() {
        
        $db = $this->dbConnect();
        
        $sql = "UPDATE comment SET isModerate=1 WHERE idComment=?";

        $stmt = $db->prepare($sql);

        $stmt->execute(array($_SESSION['idComment']));

        header('Location: /gregdamp/index.php');
        
    }

    public function warningComment() {
        
        $db = $this->dbConnect();
        
        $sql = "UPDATE comment SET warning=1 WHERE idComment=?";

        $stmt = $db->prepare($sql);

        $stmt->execute(array($_SESSION['idComment']));

        header('Location: /gregdamp/index.php');
        
    }

    public function validComment() {
        
        $db = $this->dbConnect();
        
        $sql = "UPDATE comment SET warning=2 WHERE idComment=?";

        $stmt = $db->prepare($sql);

        $stmt->execute(array($_SESSION['idComment']));

        header('Location: /gregdamp/index.php');
        
    }

}