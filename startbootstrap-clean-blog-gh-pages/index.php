<?php
session_start();

require('./Controller/ArticleController.php');
require('./Controller/UserController.php');
require('./Controller/CommentController.php');


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listArticle') {
            listArticle();
        }

        else if ($_GET['action'] == 'addArticle') {
            
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['description'] = $_POST['description'];
            
            addArticle();
        }
        
        else if ($_GET['action'] == 'deleteArticle') {
            
            $_SESSION['id'] = $_GET['id'];
            
            deleteArticle();
        }
        
        else if ($_GET['action'] == 'editArticle') {
            
            $_SESSION['id'] = $_GET['id'];
            
            editArticle();
        }
        
        else if ($_GET['action'] == 'updateArticle') {
            
            $_SESSION['title'] = $_POST['title'];
            $_SESSION['description'] = $_POST['description'];
            $_SESSION['id'] = $_GET['id'];
            $_SESSION['publishedDate'] = $_POST['publisheDate'];
            $_SESSION['idUser'] = $_POST['author'];
            
            updateArticle();
        }

        else if ($_GET['action'] == 'addUser') {

            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];

            addUser();

        }

        else if ($_GET['action'] == 'connectUser') {

                $_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['password'] = $_POST['password'];

                connectUser();
        
        }

        else if ($_GET['action'] == 'addComment') {

            $_SESSION['idArticle'] = $_GET['id'];
            $_SESSION['description'] = $_POST['description'];

            addComment();
        }

        else if ($_GET['action'] == 'deleteComment') {
            
            $_SESSION['id'] = $_GET['id'];
            
            deleteComment();
        }

        else if ($_GET['action'] == 'updateComment') {

            $_SESSION['idComment'] = $_GET['id'];
            
            updateComment();
        }

        else if ($_GET['action'] == 'warningComment') {

            $_SESSION['idComment'] = $_GET['id'];
            
            WarningComment();
        }

        else if ($_GET['action'] == 'validComment') {

            $_SESSION['idComment'] = $_GET['id'];
            
            ValidComment();
        }
    
    }
    else {
        listArticle();

    }
}

catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}