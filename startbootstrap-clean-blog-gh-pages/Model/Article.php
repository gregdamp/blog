<?php

namespace gregdamp\Model;

class Article
{
	private $id;
  private $title;
  private $description;
  private $publishedDate;
  private $idUser;
  private $pseudoUser;
        
      public function __construct($id, $title, $description, $publishedDate, $idUser, $pseudoUser) {
        $this->setId($id);
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPublishedDate($publishedDate);
        $this->setIdUser($idUser);
        $this->setPseudoUser($pseudoUser);
    }
        
    /*
    // Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        // On récupère le nom du setter correspondant à l'attribut.
        $method = 'set'.ucfirst($key);

        // Si le setter correspondant existe.
        if (method_exists($this, $method))
        {
          // On appelle le setter.
          $this->$method($value);
        }
      }
    }
    */

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}
    
    public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

  public function getPublishedDate() {
    return $this->publishedDate;
  }

  public function setPublishedDate($publishedDate) {
    $this->publishedDate = $publishedDate;
  }

  public function getIdUser() {
    return $this->idUser;
  }

  public function setIdUser($idUser) {
    $this->idUser = $idUser;
  }

  public function getPseudoUser() {
    return $this->pseudoUser;
  }

  public function setPseudoUser($pseudoUser) {
    $this->pseudoUser = $pseudoUser;
  }
}
