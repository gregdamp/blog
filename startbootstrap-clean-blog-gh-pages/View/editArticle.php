<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>

</head>
    
<body>
    
    <h1>Édition d'un post</h1>
    
    <?php foreach($articleList as $article) { ?>
    
    <form action="./index.php?action=updateArticle&id=<?= $article->getId(); ?>" method="post">
          <div>
            <label for="title">Titre : </label>
            <input id="title" name="title" type="text" placeholder="Titre" required data-validation-required-message="Merci de donner un titre." value="<?= $article->getTitle(); ?>">
          </div>

          <div>  
            <label for="description">Description : </label>
            <textarea id="description" name="description" rows="4" cols="50"><?= $article->getDescription(); ?></textarea> 
          </div>

          <div>
            <select name="author" size="1">
              <?php foreach($userList as $user) {
            echo '<option value=' . $user->getIdUser() . '>' . $user->getPseudo() . '</option>';

        }
        ?>
            </select>
          </div>

          <div>
                <button type="submit" id="send">Envoyer</button>
          </div>
    </form>
    
    <?php } ?>
    
</body>
</html>  