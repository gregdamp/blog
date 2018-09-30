<?php

use blog\startbootstrap\Model\ArticleRepository;
use blog\startbootstrap\Model\UserRepository;
use blog\startbootstrap\Model\CommentRepository;

require('./Model/ArticleRepository.php');

function listArticle() {

    $articleRepository = new ArticleRepository();
    $articleList = $articleRepository->findAll();

    $commentRepository = new CommentRepository();
    $commentList = $commentRepository->getAllComment();

    require('./View/home.php');
    
}

function getArticle() {

    $articleRepository = new ArticleRepository();
    $article = $articleRepository->getArticle($_SESSION['idArticle']);

    $commentRepository = new CommentRepository();
    $commentList = $commentRepository->getCommentByArticle($_SESSION['idArticle']);

    require('./View/post.php');

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
    
    require('./View/editArticleForm.php');
}

function updateArticle() {
    
    $articleRepository = new ArticleRepository();
    $articleRepository->updateArticle();

}
