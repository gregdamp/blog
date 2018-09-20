<?php

namespace gregdamp\Model;

class User
{
  private $idUser;
  private $pseudo;
  private $password;
  private $email;
  private $isAdmin;

        
      public function __construct($idUser, $pseudo, $password, $email, $isAdmin) {
        $this->setIdUser($idUser);
        $this->setPseudo($pseudo);
        $this->setPassword($password);
        $this->setEmail($email);
        $this->setIsAdmin($isAdmin);
        
    }
        

  public function getIdUser() {
    return $this->idUser;
  }

  public function setIdUser($idUser) {
    $this->idUser = $idUser;
  }

	public function getPseudo() {
		return $this->pseudo;
	}

	public function setPseudo($pseudo) {
		$this->pseudo = $pseudo;
	}
    
    public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getIsAdmin() {
    return $this->isAdmin;
  }

  public function setIsAdmin($isAdmin) {
    $this->isAdmin = $isAdmin;
  }
}