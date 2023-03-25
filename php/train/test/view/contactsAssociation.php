<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Vehicule</title>
		<link rel="stylesheet" type="text/css" href="view/css/style.css">
	</head>
	<body>
		<div><a href="vehicule.php?veh=new">Ajouter une association</a></div>
		<table class="contacts">
			<thead>
				<tr>
          <th>id_association</th>
					<th>conducteur</th>
					<th>vehicule</th>
					<th colspan="2">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($associations as $association) :  ?>
					<tr>
						<td>
							<a href="vehicule.php?veh=show&id=<?php echo $association->id_association; ?>">
								<?php echo htmlentities($association->id_association);  ?>
                            </a>
                        </td>
                        <td><?php echo htmlentities($association->id_vehicule);  ?></td>
                        <td><?php echo htmlentities($association->id_conducteur);  ?></td>

												<td>
													<a href="vehicule.php?veh=update&id=<?php echo $association->id_association; ?>">
														modifier
													</a>

												</td>
						<td>
							<a href="vehicule.php?veh=delete&id=<?php echo $association->id_association; ?>">
								supprimer
							</a>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</body>
</html>
