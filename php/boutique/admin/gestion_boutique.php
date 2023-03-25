<?php require_once('../inc/header.inc.php'); ?>
<?php

if( !adminConnect() ){ //Si l'admin n'est pas connecté, on le redirige vers la page de connexion
	
	header('location:../connexion.php');
	exit();
}
//------------------------------------------------------------------------
?>
<!-- Pour gérer l'affichage -->
<a href="?action=affichage">Affichage des articles</a><br>
<!-- Pour gérer l'ajout d'un article -->
<a href="?action=ajout">Ajouter un article</a><hr>

<?php
//------------------------------------------------------------------------
//Action : suppression
if( isset($_GET['action']) && $_GET['action'] == 'suppression' ){

	$r = execute_requete("SELECT * FROM article WHERE id_article ='$_GET[id_article]' ");
	//Ici, je récupère les infos de l'article à supprimer

	$article_a_supprimer = $r->fetch(PDO::FETCH_ASSOC);
	//Ici, la methode fetch permet de pouvoir exploiter les données récupérées

	//debug($article_a_supprimer);

	$chemin = str_replace('http://localhost', $_SERVER['DOCUMENT_ROOT'], $article_a_supprimer );
	//Ici, on remplace 'http://localhost' par $_SERVER['DOCUMENT_ROOT'] (=>C:/xampp/htdocs) dans $article_a_supprimer

	$chemin_photo_a_supprimer = $chemin['photo'];

	if( !empty($chemin_photo_a_supprimer) && file_exists($chemin_photo_a_supprimer) ){ //Si le chemin de la photo à supprimer n'est pas vide ET que le fichier existe
		
		unlink($chemin_photo_a_supprimer);
		//unlink() : permet de supprimer un fichier
	}

	execute_requete("DELETE FROM article WHERE id_article='$_GET[id_article]' ");

	//redirection avec l'affichage des produits
	header('location:gestion_boutique.php?action=affichage');
}

//------------------------------------------------------------------------
if( !empty($_POST) ){ //Si le formulaire a été validé et qu'il y a des infos dedans

	foreach ($_POST as $key => $value) {
		
		$_POST[$key] = htmlentities( addslashes($value) );
	}
	//----------------------------------------------------
	if( isset($_GET['action']) && $_GET['action'] == 'modification' ){

		$photo_bdd = $_POST['photo_actuelle'];
	}

	//----------------------------------------------------
	//debug( $_FILES );
	//debug( $_SERVER );

	if( !empty($_FILES['photo']['name']) ){

		//Ici, on renommme la photo :
		$nom_photo = $_POST['reference'] . '_' . $_FILES['photo']['name'];

		//chemin pour accéder à la photo en BDD :
		$photo_bdd = URL . "photo/$nom_photo";

		//Ou est ce qu'on veut stocker notre photo:
		$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . "/formationPierrefitte/PHP/boutique/photo/$nom_photo";

		copy( $_FILES['photo']['tmp_name'], $photo_dossier );
		//copy( arg1, arg2 ) fonction prédéfinies de php où l'arg1 = chemin du fichier sourceet l'arg2 = chemin de destination
	}

	//----------------------------------------------------
	if( isset($_GET['action']) && $_GET['action'] == 'modification' ){
	//Si il existe une 'action' dans mon URL ET que cette 'action' est égale à 'modification'

		execute_requete(" UPDATE article SET 
			reference = '$_POST[reference]', 
			categorie = '$_POST[categorie]',
		 	titre = '$_POST[titre]', 
		 	description = '$_POST[description]',
			couleur = '$_POST[couleur]', 
			taille = '$_POST[taille]', 
			sexe = '$_POST[sexe]', 
			photo = '$photo_bdd', 
			prix = '$_POST[prix]', 
			stock = '$_POST[stock]' 
			WHERE id_article='$_GET[id_article]' ");

		header('location:gestion_boutique.php?action=affichage');
	}
	else{
		execute_requete(" INSERT INTO article(reference, categorie, titre, description, couleur, taille, sexe, photo, prix, stock) VALUES('$_POST[reference]', '$_POST[categorie]', '$_POST[titre]', '$_POST[description]', '$_POST[couleur]', '$_POST[taille]', '$_POST[sexe]', '$photo_bdd', '$_POST[prix]', '$_POST[stock]' ) ");

		header('location:gestion_boutique.php?action=affichage');
	}
}

//------------------------------------------------------------------------
//Affichage des articles :
if( isset($_GET['action']) && $_GET['action'] == 'affichage' ){
//Si il existe une action dans l'URL ET que cette action est égale à 'affichage'

	$r = execute_requete("SELECT * FROM article");

	$content .= '<h2>Liste des articles</h2>';
	$content .= '<p>Nombre d\'articles dans la boutique : ' . $r->rowCount() . '</p>';

	$content .= '<table border="1" cellpadding="5">';
		$content .= '<tr>';
			for ($i=0; $i < $r->columnCount() ; $i++) { 
				
				$colonne = $r->getColumnMeta($i);

				$content .= "<th>$colonne[name]</th>";
			}
			$content .= "<th>Modification</th>";
			$content .= "<th>Suppression</th>";
		$content .= '</tr>';

		while ($ligne = $r->fetch(PDO::FETCH_ASSOC) ) {
		
			$content .= '<tr>';	
				foreach ($ligne as $key => $value) {
					
					if( $key == 'photo'){

						$content .= '<td><img src="'. $value .'" width="80"></td>';
					}
					else{

						$content .= "<td>$value</td>";
					}
				}
				$content .= '<td><a href="?action=modification&id_article='.$ligne['id_article'].'">modif</a></td>';

				$content .= '<td><a href="?action=suppression&id_article='.$ligne['id_article'].'" onClick="return( confirm(\'En êtes vous sur ?\') )">suppr</a></td>';

			$content .= '</tr>';			
		}
	$content .= '</table>';
}

//------------------------------------------------------------------------
if( isset($_GET['action']) && ( $_GET['action'] == 'ajout' || $_GET['action'] == 'modification' ) ) :
	//Si on a une 'action' dans l'URL ET que cette 'action' est égale soit à 'modification' OU à 'ajout'

	if( isset($_GET['id_article']) ){ //Si l'id_article est présent dans l'URL
		
		$r = execute_requete(" SELECT * FROM article WHERE id_article='$_GET[id_article]' ");

		$article_actuel = $r->fetch(PDO::FETCH_ASSOC);
		//debug( $article_actuel);
	}

	$reference = ( isset($article_actuel['reference']) ) ? $article_actuel['reference'] : '';

	$categorie = ( isset($article_actuel['categorie']) ) ? $article_actuel['categorie'] : '';

	$titre = ( isset($article_actuel['titre']) ) ? $article_actuel['titre'] : '';

	$description = ( isset($article_actuel['description']) ) ? $article_actuel['description'] : '';

	$couleur = ( isset($article_actuel['couleur']) ) ? $article_actuel['couleur'] : '';

	$prix = ( isset($article_actuel['prix']) ) ? $article_actuel['prix'] : '';

	$stock = ( isset($article_actuel['stock']) ) ? $article_actuel['stock'] : '';


	$taille_s = (isset($article_actuel['taille']) && $article_actuel['taille'] == 'S') ? 'selected' : ''; 
	$taille_m = (isset($article_actuel['taille']) && $article_actuel['taille'] == 'M') ? 'selected' : ''; 
	$taille_l = (isset($article_actuel['taille']) && $article_actuel['taille'] == 'L') ? 'selected' : ''; 
	$taille_xl = (isset($article_actuel['taille']) && $article_actuel['taille'] == 'XL') ? 'selected' : ''; 

	$sexe_f = (isset($article_actuel['sexe']) && $article_actuel['sexe'] == 'f') ? 'checked' : ''; 
	$sexe_m = (isset($article_actuel['sexe']) && $article_actuel['sexe'] == 'm') ? 'checked' : ''; 

//------------------------------------------------------------------------
?>
<form method="post" enctype="multipart/form-data">
<!-- enctype="multipart/form-data" : INDISPENSABLE lorsque l'on veut uploader un fichier -->
	<label for="reference">Reference</label><br>
	<input type="text" class="form-control" name="reference" value="<?= $reference ?>" id="reference" ><br>

	<label for="categorie">Categorie</label><br>
	<input type="text" class="form-control" name="categorie" value="<?= $categorie ?>" id="categorie" ><br>

	<label for="titre">Titre</label><br>
	<input type="text" class="form-control" name="titre" value="<?= $titre ?>" id="titre" ><br>
	
	<label for="description">Description</label><br>
	<input type="text" class="form-control" name="description" value="<?= $description ?>" id="description" ><br>

	<label for="couleur">Couleur</label><br>
	<input type="text" class="form-control" name="couleur" value="<?= $couleur ?>" id="couleur" ><br>

	<label for="taille">Taille</label><br>
	<select name="taille" id="taille">
		<option value="S" <?= $taille_s ?> >S</option>
		<option value="M" <?= $taille_m ?> >M</option>
		<option value="L" <?= $taille_l ?> >L</option>
		<option value="XL" <?= $taille_xl ?> >XL</option>
	</select><br><br>

	<label for="sexe">Sexe</label><br>
	<input type="radio" id="sexe" name="sexe" value="f" checked <?= $sexe_f ?> >Femme<br>
	<input type="radio" id="sexe" name="sexe" value="m" <?= $sexe_m ?> >Homme<br><br>

	<label for="photo">Photo</label><br>
	<input type="file" name="photo"  id="photo"><br>

	<?php

		if( isset($article_actuel) ){

			echo '<i>Vous pouvez uploader une nouvelle photo</i>';

			echo '<img src="'. $article_actuel['photo'] .'" width="80" >';

			echo '<input type="hidden" name="photo_actuelle" value="'. $article_actuel['photo'] .'"><br><br>';
		}
	?>

	<label for="prix">Prix</label><br>
	<input type="text" class="form-control" name="prix" value="<?= $prix ?>" id="prix" ><br>

	<label for="stock">Stock</label><br>
	<input type="text" class="form-control" name="stock" value="<?= $stock ?>" id="stock" ><br>

	<input type="submit" class="btn btn-secondary" value="<?php echo ucfirst( $_GET['action'] ); ?>">
</form>

<?php endif ; ?>

<?= $content ?>

<?php require_once('../inc/footer.inc.php'); ?>