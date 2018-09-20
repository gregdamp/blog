<?php

use \gregdamp\Model\ArticleRepository;
use \gregdamp\Model\UserRepository;
use \gregdamp\Model\CommentRepository;

require('./Model/ArticleRepository.php');

function listArticle()
{
    $articleRepository = new ArticleRepository();
    $articleList = $articleRepository->findAll();

    $commentRepository = new CommentRepository();
    $commentList = $commentRepository->getAllComment();

    require('./index2.php');
    
}

function addArticle() {
    
    $articleRepository = new ArticleRepository();
    $articleRepository->addArticle();
    
}

function deleteArticle() {
    $articleRepository = new ArticleRepository();
    $articleRepository->deleteArticle();
}

function editArticle() {
    
    $articleRepository = new ArticleRepository();
    $articleList = $articleRepository->getArticleById($_GET['id']);

    $userRepository = new UserRepository();
    $userList = $userRepository->findAll();
    
    require('./View/editArticle.php');
}

function updateArticle() {
    
    $articleRepository = new ArticleRepository();
    $articleRepository->updateArticle();

}
