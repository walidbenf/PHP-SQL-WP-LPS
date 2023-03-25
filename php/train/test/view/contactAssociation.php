<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $association->id_conducteur; ?></title>
	<link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
	<h1><?php echo $association->id_conducteur; ?></h1>

	<div>
		<span>Conducteur :</span>
		<?php echo $association->id_conducteur; ?>
	</div>
	<div>
		<span>Vehicule :</span>
		<?php echo $association->id_association; ?>
	</div>

<hr><hr>

		<?php foreach($association as $indice => $valeur): ?>
			<div><span><?= ucfirst($indice) ?></span> - <span><?= $valeur ?></span></div>
		<?php endforeach; ?>

</body>
</html>
