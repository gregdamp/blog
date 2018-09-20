<?php

use \gregdamp\Model\CommentRepository;

require('./Model/CommentRepository.php');

function addComment() {
    
    $commentRepository = new CommentRepository();
    $commentRepository->addComment();
    
}

function deleteComment() {

	$_SESSION['idComment'] = $_GET['id'];
    $commentRepository = new CommentRepository();
    $commentRepository->deleteComment();
}

function updateComment() {
    
    $commentRepository = new CommentRepository();
    $commentRepository->updateComment();

}

function warningComment() {
    
    $commentRepository = new CommentRepository();
    $commentRepository->warningComment();

}

function validComment() {
    
    $commentRepository = new CommentRepository();
    $commentRepository->validComment();

}