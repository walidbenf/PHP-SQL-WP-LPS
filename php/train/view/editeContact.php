<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo htmlentities($title); ?></title>
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
    <form action="" method="post">
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom" value="<?= $contact->prenom ?>"><br><br>

        <label for= "nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="<?= $contact->nom ?>"><br><br>


        <input type="submit" value="Edite">

    </form>
</body>
</html>
