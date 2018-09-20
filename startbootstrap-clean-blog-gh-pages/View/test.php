<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    </head>
    
    <body>

        <?php if (!isset($_SESSION['pseudo'])) { ?>
            <div id="connect">
                <form method="post" action="../index.php?action=connectUser">
                    <fieldset>Pseudo : <input type="text" name="pseudo"/></fieldset>
                    <fieldset>Mot de passe : <input type="password" name="password"/></fieldset>
                    <input type="submit" name="submit" value="Se connecter"/>
                    <a href="./View/addUser.php">S'enregistrer</a>
                </form>
            </div>

        <?php } else { ?> 
            <div id="disconnect">
                <form method="post" action="Controller/disconnection.php">
                    <input type="submit" name="submit" value="Se déconnecter"/>
                </form>
            </div>
        <?php } ?>
        
        <?php if (isset($_SESSION['pseudo'])) { ?><h1>Bonjour <?php echo $_SESSION['pseudo']; ?>  !</h1><?php } ?>
        
        <?php foreach($articleList as $article) {
            echo $article->getTitle() . '<br>' . $article->getDescription() . '<br>' . $article->getPublishedDate() . '<br>' . $article->getPseudoUser() . '<br>';
            if (isset($_SESSION['pseudo'])) {
            echo '<a href="./View/addComment.php?id=' . $article->getId() . '">Ajouter un commentaire</a>'  . '<br>';
                }
            foreach($commentList as $comment) {
                if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() == 0) {
            echo $comment->getDescription() . $comment->getPseudoUser() . '<a href="index.php?action=warningComment&id=' . $comment->getIdComment() . '"><img src="public/img/warning.png"></a>' . '<br>';
                }
                if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() != 0) {
            echo $comment->getDescription() . $comment->getPseudoUser(). '<br>';
                }

            }

            if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
                echo '<a href="index.php?action=deleteArticle&id=' . $article->getId() . '">Supprimer</a>'  . '<br>';
                echo '<a href="index.php?action=editArticle&id=' . $article->getId() . '">Modifier</a>'  . '<br>';
                foreach($commentList as $comment) {
                    if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 0) {
            echo $comment->getDescription() . $comment->getPseudoUser() . '<a href="index.php?action=deleteComment&id=' . $comment->getIdComment() . '"><img src="public/img/rouge.png"></a>
            <a href="index.php?action=updateComment&id=' . $comment->getIdComment() . '"><img src="public/img/vert.png"></a>' . '<br>';
                    }
                    if ($article->getId() == $comment->getIdArticle() && $comment->getIsModerate() == 1 && $comment->getWarning() == 1) {
            echo $comment->getDescription() . $comment->getPseudoUser() . '<img src="public/img/warning.png"><a href="index.php?action=deleteComment&id=' . $comment->getIdComment() . '"><img src="public/img/rouge.png"></a>
            <a href="index.php?action=validComment&id=' . $comment->getIdComment() . '"><img src="public/img/vert.png"></a>' . '<br>';
                    }            
                }
            echo '<br>' . '<br>';    
            }
        }
        
        
        if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true) {
        echo '<a href="./View/addArticle.php">Ajouter</a>';
        }

        ?>
    </body>
</html>
