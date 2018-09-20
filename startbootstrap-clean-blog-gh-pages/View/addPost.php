<?php ob_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
</head>
    
<body>

    <form action="index.php?action=addArticle" method="post">
          <div>
            <label for="title">Titre : </label>
            <input id="title" name="title" type="text" placeholder="Titre" required data-validation-required-message="Merci de donner un titre.">
          </div>

          <div>  
            <label for="description">Description : </label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea> 
          </div>

          <div>
                <button type="submit" id="send">Envoyer</button>
          </div>
    </form>
    
</body>
</html>  