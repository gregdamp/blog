<?php

namespace blog\startbootstrap\Model;

use PDO;

require('./Model/Repository.php');
require('./Model/Article.php');

class ArticleRepository extends Repository {
        
    function findAll()
	{
        $db = $this->dbConnect();

        
        $req = $db->query('SELECT * FROM article INNER JOIN user ON article.idUser = user.idUser ORDER BY publishedDate DESC');     
        $req->execute();
                
        $articleList = [];
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
            
            $article = new Article($data['idArticle'], $data['title'], $data['description'], $data['publishedDate'], $data['idUser'], $data['pseudo']);
            
            $articleList[] = $article;

        }
        
        $req->closeCursor();

		return $articleList;
        
	}

    public function addArticle()
    {
        $db = $this->dbConnect();
        
        $reqInsert = 'INSERT INTO article';
        $reqCol = '(title, description, publishedDate, idUser)';
        $reqValues = ' VALUES(:title, :description, now(), 1)';
        
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        
        $req->bindParam(':title', $_SESSION['title'], \PDO::PARAM_STR);
        $req->bindParam(':description', $_SESSION['description'], \PDO::PARAM_STR);
        //$req->bindParam(':idAuthor', $_SESSION['idAuthor'], \PDO::PARAM_STR);
        
        $req->execute();
        
        header('Location: /blog/startbootstrap/index.php');
        
    }
    
    public function deleteArticle() {
        
        $db = $this->dbConnect();
        
        $reqDelete = 'DELETE FROM article';
        $reqWhere = ' WHERE idArticle = :id';
        
        $req = $db->prepare($reqDelete . $reqWhere);
        
        $req->bindParam(':id', $_SESSION['id'], \PDO::PARAM_STR);

        $req->execute();

        header('Location: /blog/startbootstrap/index.php');
        
    }
    
    public function updateArticle() {
        
        $db = $this->dbConnect();
        
        $sql = "UPDATE article SET title=?, description=?, publishedDate=now(), idUser=? WHERE idArticle=?";

        $stmt = $db->prepare($sql);

        $stmt->execute(array($_SESSION['title'], $_SESSION['description'], $_SESSION['idUser'], $_SESSION['id']));

        header('Location: /blog/startbootstrap/index.php');
        
    }
    
    public function getArticleById($id) {
        
        $db = $this->dbConnect();
        
        $reqSelect = 'SELECT * FROM article INNER JOIN user ON article.idUser = user.idUser';
        $reqWhere = ' WHERE idArticle = :id';
        
        $req = $db->prepare($reqSelect . $reqWhere);
        
        $req->bindParam(':id', $id, \PDO::PARAM_STR);

        $req->execute();
        
        $articleList = [];
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
            
            $article = new Article($data['idArticle'], $data['title'], $data['description'], $data['publishedDate'], $data['idUser'], $data['pseudo']);
            
            $articleList[] = $article;

        }
        
        $req->closeCursor();
        
        return $articleList;
    }
    

}
?>