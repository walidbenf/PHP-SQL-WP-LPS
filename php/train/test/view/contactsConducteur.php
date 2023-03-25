<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Conducteur</title>
		<link rel="stylesheet" type="text/css" href="view/css/style.css">
	</head>
	<body>
		<div><a href="conducteur.php?op=new">Ajouter un nouvaux Conducteur</a></div>
		<table class="contacts">
			<thead>
				<tr>
					<th>id_conducteur</th>
					<th>Prenom</th>
					<th>Nom</th>
					<th colspan="2">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($contacts as $contact) :  ?>
					<tr>
						<td>
							<a href="conducteur.php?op=show&id=<?php echo $contact->id_conducteur; ?>">
								<?php echo htmlentities($contact->id_conducteur);  ?>
							</a>
						</td>
						<td><?php echo htmlentities($contact->prenom);  ?></td>

						<td>
							<?php echo htmlentities($contact->nom);  ?>

							<td>
							<a href="conducteur.php?op=update&id=<?php echo $contact->id_conducteur; ?>">
								modifier
							</a>

						</td>

						<td>
							<a href="conducteur.php?op=delete&id=<?php echo $contact->id_conducteur; ?>">
								supprimer
							</a>

						</td>

					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>
