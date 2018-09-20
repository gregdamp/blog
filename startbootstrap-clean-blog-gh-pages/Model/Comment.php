<?php

namespace gregdamp\Model;

class Comment
{
	private $idComment;
	private $publishedDate;
	private $isModerate;
	private $parentId;
	private $idUser;
	private $idArticle;
	private $description;
	private $warning;
	private $pseudoUser;

	public function __construct($idComment, $publishedDate, $isModerate, $parentId, $idUser, $idArticle, $description, $warning, $pseudoUser) {
        $this->setIdComment($idComment);
        $this->setPublishedDate($publishedDate);
        $this->setIsModerate($isModerate);
        $this->setParentId($parentId);
        $this->setIdUser($idUser);
        $this->setIdArticle($idArticle);
        $this->setDescription($description);
        $this->setWarning($warning);
        $this->setPseudoUser($pseudoUser);
        
    }
       
  public function getIdComment() {
    return $this->idComment;
    }

  public function setIdComment($idComment) {
    $this->idComment = $idComment;
    }

  public function getPublishedDate() {
		return $this->publishedDate;
	}

  public function setPublishedDate($publishedDate) {
		$this->publishedDate = $publishedDate;
	}
    
  public function getIsModerate() {
		return $this->isModerate;
	}

  public function setIsModerate($isModerate) {
		$this->isModerate = $isModerate;
	}

  public function getParentId() {
    return $this->parentId;
    }

  public function setParentId($parentId) {
    	  $this->parentId = $parentId;
    }

  public function getIdUser() {
    return $this->idUser;
    }

  public function setIdUser($idUser) {
    $this->idUser = $idUser;
    }

  public function getIdArticle() {
    return $this->idArticle;
    }

  public function setIdArticle($idArticle) {
    $this->idArticle = $idArticle;
    }

  public function getDescription() {
    return $this->description;
    }

  public function setDescription($description) {
    $this->description = $description;
    }

  public function getWarning() {
    return $this->warning;
    }

  public function setWarning($warning) {
    $this->warning = $warning;
    }

  public function getPseudoUser() {
    return $this->pseudoUser;
  }

  public function setPseudoUser($pseudoUser) {
    $this->pseudoUser = $pseudoUser;
  }
}