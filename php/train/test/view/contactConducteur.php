<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $contact->prenom; ?></title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<h1><?php echo $contact->prenom; ?></h1>

	<div>
		<span>Prenom :</span>
		<?php echo $contact->prenom; ?>
	</div>
	<div>
		<span>Nom :</span>
		<?php echo $contact->nom; ?>
	</div>

<hr><hr>

		<?php foreach($contact as $indice => $valeur): ?>
			<div><span><?= ucfirst($indice) ?></span> - <span><?= $valeur ?></span></div>
		<?php endforeach; ?>

</body>
</html>