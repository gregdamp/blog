<?php ob_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
</head>
    
<body>

    <form action="../index.php?action=addComment&id=<?php echo $_GET['id']; ?>" method="post">
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