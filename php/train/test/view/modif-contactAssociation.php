<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier</title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<form method="POST" action="">
		<label for="marque">conducteur :</label><br>
		<input type="text" name="marque" id="marque" value="<?= $association->id_conducteur ?>"><br>

		<label for="modele">vehicule :</label><br>
		<input type="text" name="modele" id="modele" value="<?= $association->id_vehicule ?>"><br>

		<input type="submit" value="Ajouter">
	</form>
</body>
</html>
