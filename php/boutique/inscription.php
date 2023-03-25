<?php require_once('inc/header.inc.php'); ?>
<?php

if( userConnect() ){ //Si l'internaute est connecté redirection vers le profil

	header('location:profil.php');
	exit();
}

//---------------------------------------------------------------------
if( $_POST ){ //Si on clique sur le bouton 'submit'

	//debug( $_POST );

	//Déclaration d'une variable : 
	$erreur = '';

	if( strlen($_POST['pseudo']) <=3 || strlen($_POST['pseudo']) >=20 ){ //Si le pseudo est inférieur ou égal à 3 OU qu'il est supérieur ou égal à 20

		$erreur .= '<div class="alert alert-danger" role="alert">Erreur taille pseudo</div>';
	}

	//Test si le pseudo est disponible, si le pseudo renvoie au moins 1 résultat, c'est que le pseudo est déjà attribué
	$r = execute_requete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");

	if( $r->rowCount() >=1 ){

		$erreur .= '<div class="alert alert-danger" role="alert">Pseudo indisponible</div>';
	}

	//Boucle sur les saisies afin de les passer dans la fonction addslashes() :
	foreach ($_POST as $key => $value) {
		
		$_POST[$key] = addslashes($value);
	}

	//Cryptage du mot de passe :
	$_POST['mdp'] = password_hash( $_POST['mdp'],PASSWORD_DEFAULT );

	if( empty($erreur) ){ //Si ma variable $erreur est vide

		execute_requete("INSERT INTO membre(pseudo, mdp, prenom, nom, email, sexe, ville, cp, adresse) VALUES('$_POST[pseudo]','$_POST[mdp]','$_POST[prenom]','$_POST[nom]','$_POST[email]','$_POST[sexe]','$_POST[ville]','$_POST[cp]','$_POST[adresse]' ) ");

		echo '<div class="alert alert-success" role="alert">Inscription validée ! <a href="'. URL .'connexion.php">Cliquez ici pour vous connecter</a></div>';
	}
	//Affichage des erreurs:
	$content .= $erreur;
}

//____________________________________________________________________
?>
<h1>INSCRIPTION</h1>

<?= $content ?>

<form method="post">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" name="pseudo" id="pseudo" class="form-control"><br>
	<label for="mdp">Mot de Passe</label><br>
	<input type="text" name="mdp" id="mdp" class="form-control"><br>
	<label for="prenom">Prenom</label><br>
	<input type="text" name="prenom" id="prenom" class="form-control"><br>
	<label for="nom">Nom</label><br>
	<input type="text" name="nom" id="nom" class="form-control"><br>
	<label for="email">Email</label><br>
	<input type="text" name="email" id="email" class="form-control"><br>

	<label for="sexe">Civilite</label><br>
	<input type="radio" name="sexe" id="sexe" value="m" checked>Homme<br>
	<input type="radio" name="sexe" id="sexe" value="f">Femme<br><br>

	<label for="ville">Ville</label><br>
	<input type="text" name="ville" id="ville" class="form-control"><br>
	<label for="cp">Code Postal</label><br>
	<input type="text" name="cp" id="cp" class="form-control"><br>

	<label for="adresse">Adresse</label><br>
	<textarea name="adresse" id="adresse" class="form-control" cols="30" rows="8"></textarea><br>

	<input type="submit" class="btn btn-secondary" value="S'inscrire">
</form>

<?php require_once('inc/footer.inc.php'); ?>