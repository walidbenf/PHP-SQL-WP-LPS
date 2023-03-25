<?php require_once('inc/header.inc.php'); ?>
<?php

//DECONNEXION :
if( isset($_GET['action']) && $_GET['action'] == 'deconnexion' ){
	//Si il y a une 'action' dans l'URL et que celle-ci est égale à 'deconnexion', alors on détruit la session

	session_destroy();
}
//---------------------------------------------------------------------

if( userConnect() ){ //Si l'internaute est connecté redirection vers le profil

	header('location:profil.php');
	exit();
}

//---------------------------------------------------------------------
if( $_POST ){ //Si on a cliquer sur le bouton submit

	$r = execute_requete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");

	//Si il y a une correspondance d'un pseudo dans la table 'membre', $r renverra '1' ligne de résultat 
	if( $r->rowCount() >= 1 ){

		$membre = $r->fetch(PDO::FETCH_ASSOC);
		debug($membre);

		//Vérification du mon de passe : si le mot de passe est correct, on renseigne des informations dans notre fichier de session
		if( password_verify( $_POST['mdp'], $membre['mdp'] ) ){

			$_SESSION['membre']['id_membre'] = $membre['id_membre'];
			$_SESSION['membre']['pseudo'] = $membre['pseudo'];
			$_SESSION['membre']['mdp'] = $membre['mdp'];
			$_SESSION['membre']['prenom'] = $membre['prenom'];
			$_SESSION['membre']['nom'] = $membre['nom'];
			$_SESSION['membre']['email'] = $membre['email'];
			$_SESSION['membre']['sexe'] = $membre['sexe'];
			$_SESSION['membre']['ville'] = $membre['ville'];
			$_SESSION['membre']['cp'] = $membre['cp'];
			$_SESSION['membre']['adresse'] = $membre['adresse'];
			$_SESSION['membre']['statut'] = $membre['statut'];

			//$content .= '<div class="alert alert-success" role="alert">Connexion OK</div>';

			//Redirection vers la page profil :
			header('location:profil.php');
		}
		else{
			$content .= '<div class="alert alert-danger" role="alert">Erreur mdp</div>';
		}
	}
	else{
		$content .= '<div class="alert alert-danger" role="alert">Erreur pseudo</div>';
	}
}

//__________________________________________________________________________
?>
<h1>CONNEXION</h1>

<?= $content ?>

<form method="post">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="Votre pseudo"><br><br>

	<label for="mdp">Mot de passe</label><br>
	<input type="text" name="mdp" id="mdp" class="form-control" placeholder="Votre mdp"><br><br>

	<input type="submit" class="btn btn-secondary">
</form>

<?php require_once('inc/footer.inc.php'); ?>