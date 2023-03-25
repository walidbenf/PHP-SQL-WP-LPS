<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $vehicule->marque; ?></title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<h1><?php echo $vehicule->marque; ?></h1>

	<div>
		<span>marque :</span>
		<?php echo $vehicule->marque; ?>
	</div>
	<div>
		<span>modele :</span>
		<?php echo $vehicule->modele; ?>
    </div>
    <div>
		<span>couleur :</span>
		<?php echo $vehicule->couleur; ?>
    </div>
    <div>
		<span>immatriculation :</span>
		<?php echo $vehicule->immatriculation; ?>
	</div>

<hr><hr>

		<?php foreach($vehicule as $indice => $valeur): ?>
			<div><span><?= ucfirst($indice) ?></span> - <span><?= $valeur ?></span></div>
		<?php endforeach; ?>

</body>
</html>