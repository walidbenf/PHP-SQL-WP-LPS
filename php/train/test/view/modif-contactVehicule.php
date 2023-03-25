<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier</title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<form method="POST" action="">
		<label for="marque">marque :</label><br>
		<input type="text" name="marque" id="marque" value="<?= $vehicule->marque ?>"><br>

		<label for="modele">modele :</label><br>
		<input type="text" name="modele" id="modele" value="<?= $vehicule->modele ?>"><br>

		<label for="couleur">couleur :</label><br>
		<input type="text" name="couleur" id="couleur" value="<?= $vehicule->couleur ?>"><br>

		<label for="immatriculation">immatriculation :</label><br>
		<input type="text" name="immatriculation" id="immatriculation" value="<?= $vehicule->immatriculation ?>"><br>

		<input type="submit" value="Ajouter">
	</form>
</body>
</html>
