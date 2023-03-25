<?php

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="admin.php">
    <label for="email">Email</label><br>
    <input type="email" name="email" id="email" class="form-control"><br>

    <label for="mdp">Mot de Passe</label><br>
    <input type="password" name="mdp" id="mdp" class="form-control"><br>
    <input type="submit" class="btn btn-secondary" value="S'inscrire">
</form>
</body>
</html>
<?php
 echo $_SERVER['HTTP_HOST'];
 ?>
