<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Clean Blog - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Jean Forteroche</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"> 
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/aurore-boreale.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <?php
                echo '<h1>' . $article->getTitle() . '</h1>';
              ?>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <?php

          echo '<div class="post-preview">';
            echo '<h2 class="post-title">';
                 echo $article->getTitle();
            echo '</h2>';
            echo '<p class="post-subtitle">';
               echo $article->getDescription();
            echo '</p>';
            echo '<p class="post-meta">';
            echo 'Publié par ' . $article->getPseudoUser();
            echo ' le ' . $article->getPublishedDate() . '</p>';
            echo '</div>';
            echo '<br>' . '<br>';

            if (isset($_SESSION['pseudo'])) {
              echo '<a href="./View/addCommentForm.php?id=' . $article->getId() . '">Ajouter un commentaire</a>'  . '<br>';
            }

            foreach($commentList as $comment) {
                if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() == 0) {
                echo '<span class="commentdescription"><q class="quote">' . $comment->getDescription() . '</q></span>' . ' de ' . '<span class="usercomment">' . $comment->getPseudoUser() . '</span>' . '<a href="index.php?action=warningComment&id=' . $comment->getIdComment() . '"><img src="img/warning.png"></a>' . '<br>';
                }

                if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() != 0) {
                echo '<span class="commentdescription"><q class="quote">' . $comment->getDescription() . '</q></span>' . ' de ' . '<span class="usercomment">' . $comment->getPseudoUser() . '</span>' . '<br>';
                }

            }

            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
                echo '<a href="index.php?action=deleteArticle&id=' . $article->getId() . '">Supprimer</a>'  . '<br>';
                echo '<a href="index.php?action=editArticle&id=' . $article->getId() . '">Modifier</a>'  . '<br>';
                foreach($commentList as $comment) {
                    if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 0) {
            echo $comment->getDescription() . ' de ' . $comment->getPseudoUser() . '<a href="index.php?action=deleteComment&id=' . $comment->getIdComment() . '"><img src="img/rouge.png"></a>
            <a href="index.php?action=updateComment&id=' . $comment->getIdComment() . '"><img src="img/vert.png"></a>' . '<br>';
                    }
                    if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() == 1) {
            echo $comment->getDescription() . ' de ' . $comment->getPseudoUser() . '<img src="img/warning.png"><a href="index.php?action=deleteComment&id=' . $comment->getIdComment() . '"><img src="img/rouge.png"></a>
            <a href="index.php?action=validComment&id=' . $comment->getIdComment() . '"><img src="img/vert.png"></a>' . '<br>';
                    }            
                }
            echo '<br>' . '<br>';    
            }
        echo '<hr>';    
        

        
        
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
        echo '<a href="./View/addArticleForm.php">Ajouter</a>';
        }

        ?>
          </div>
        </div>
      </div>
    </article>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
