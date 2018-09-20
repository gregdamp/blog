<?php ob_start(); ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>

</head>
    
<body>

    <form action="../index.php?action=addUser" method="post">
          <div>
            <label for="pseudo">Pseudo : </label>
            <input id="pseudo" name="pseudo" type="text" placeholder="Pseudo" required data-validation-required-message="Merci de donner un pseudo.">
          </div>

          <div>  
            <label for="password">Password : </label>
            <input id="password" name="password" type="password" palceholder="Password" required data-validation-required-message="Merci de donner un password.">
          </div>

          <div>
          	<label for="email">Email : </label>
          	<input id=email" name="email" type="text" placeholder="text" required data-validation-required-message="Merci de donner un email.">

          <div>
                <button type="submit" id="send">Envoyer</button>
          </div>
    </form>
    
</body>
</html>  
