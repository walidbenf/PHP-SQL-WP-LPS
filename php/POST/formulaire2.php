<?php
if($_POST){
    echo "J'habite au " . $_POST['adress']. " à ".$_POST['ville'] . " dans le ".$_POST['cp']. '<br>';
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
    <label for="adress">Adress</label> <br>
    <input type="text" id="adress" name="adress"> <br> <br>
    <label for="ville">Ville</label> <br>
    <input type="text" id="ville" name="ville"> <br> <br>
    <label for="cp">Code Postal</label> <br>
    <input type="number" id="cp" name="cp"> <br> <br>

    <!-- NE SURTOUT PAS OUBLIER L'ATTRIBUT 'name' DANS LES INPUTS D'UN FORMULAIRE !!!
    => c'est ce qui permet de récupérer les valeurs via la superglobale : $_POST -->


    <input type="submit">
</form>
</body>
</html>
