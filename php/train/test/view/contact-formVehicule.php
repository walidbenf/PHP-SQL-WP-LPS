<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo htmlentities($title); ?></title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
    <!-- Ici on met en place le formulaire pour l'enregistrement de nouveau vehicule dans notre flotte déjà existante-->
	<form method="POST" action="">
		<label for="marque">marque :</label><br>
		<input type="text" name="marque" id="marque" value="<?= $marque ?>"><br>

		<label for="modele">modele :</label><br>
		<input type="text" name="modele" id="modele" value="<?= $modele ?>"><br>

		<label for="couleur">couleur :</label><br>
		<input type="text" name="couleur" id="couleur" value="<?= $couleur ?>"><br>

		<label for="immatriculation">immatriculation :</label><br>
		<input type="text" name="immatriculation" id="immatriculation" value="<?= $immatriculation ?>"><br>


		<input type="submit" value="Ajouter">
	</form>
</body>
</html>