<?php
print '<pre>';
print_r($_POST);
print '</pre>';

if($_POST){
    echo calcul($_POST['fruit'], $_POST['poids']);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
<h1>Formulaire 1</h1>
<form method="post" action="">
    
    <label for="fruits">Fruits</label> <br>
    <select name="fruits" id="fruits">
        <option value="cerise">cerise</option>
        <option value="pomme">pomme</option>
        <option value="banane">banane</option>
    </select>

   

    <input type="submit">
</form>
</body>
</html>
