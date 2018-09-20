<?php

namespace gregdamp\Model;

use PDO;

require('./Model/User.php');

class UserRepository extends Repository {

	public function addUser()
    {
        $db = $this->dbConnect();
        
        $reqInsert = 'INSERT INTO user';
        $reqCol = '(pseudo, password, email)';
        $reqValues = ' VALUES(:pseudo, :password, :email)';
        
        $req = $db->prepare($reqInsert . $reqCol . $reqValues);
        
        $req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_STR);
        $req->bindParam(':password', $_SESSION['password'], \PDO::PARAM_STR);
        $req->bindParam(':email', $_SESSION['email'], \PDO::PARAM_STR);
        
        $req->execute();
        
        header('Location: /gregdamp/index.php');
        
    }

	public function connectUser()
	{
		$db = $this->dbConnect();
        
        $reqSelect = "SELECT idUser, isAdmin FROM user WHERE pseudo=:pseudo AND password=:password";        

        $req = $db->prepare($reqSelect);
        
        $req->bindParam(':pseudo', $_SESSION['pseudo'], \PDO::PARAM_STR);
        $req->bindParam(':password', $_SESSION['password'], \PDO::PARAM_STR);
        
        $req->execute();

        $data = $req->fetch();
        if($data['idUser'] == "")
        {	
        	unset($_SESSION['pseudo']);
        	header('Location: /gregdamp/index.php');
        }
        $_SESSION['isAdmin']=$data['isAdmin'];
        $_SESSION['idUser']=$data['idUser'];

        header('Location: /gregdamp/index.php');
	}

	function findAll()
	{
        $db = $this->dbConnect();

        
        $req = $db->query('SELECT * FROM user');     
        $req->execute();
                
        $userList = [];
        
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) 
        {
            
            $user = new User($data['idUser'], $data['pseudo'], $data['password'], $data['email'], $data['isAdmin']);
            
            $userList[] = $user;

        }
        
        $req->closeCursor();

		return $userList;
        
	}

  }