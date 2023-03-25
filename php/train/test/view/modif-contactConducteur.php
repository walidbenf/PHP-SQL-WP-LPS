<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier</title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<form method="POST" action="">
		<label for="prenom">Prenom :</label><br>
		<input type="text" name="prenom" id="prenom" value="<?= $contact->prenom ?>" required><br>

		<label for="nom">Nom :</label><br>
		<input type="text" name="nom" id="nom" value="<?= $contact->nom ?>" required><br>

		<input type="submit" value="Ajouter">
	</form>
</body>
</html>
