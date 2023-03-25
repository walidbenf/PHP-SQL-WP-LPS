<?php
print '<pre>';
print_r($_POST);
print '</pre>';

if($_POST){
    echo "Prenom:" . $_POST['prenom'] . '<br>';
    echo "Description:" . $_POST['desc'] . '<br>';
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
    <!-- method:comment vont circuler les données (get ou post)
    action:url de destination-->
    <label for="prenom">Prenom</label> <br>
    <input type="text" id="prenom" name="prenom"> <br> <br>

    <!-- NE SURTOUT PAS OUBLIER L'ATTRIBUT 'name' DANS LES INPUTS D'UN FORMULAIRE !!!
    => c'est ce qui permet de récupérer les valeurs via la superglobale : $_POST -->

    <label for="desc">Description</label> <br>
    <textarea name="desc" id="desc" cols="30" row="10"></textarea> <br>

    <input type="submit">
</form>
</body>
</html>
