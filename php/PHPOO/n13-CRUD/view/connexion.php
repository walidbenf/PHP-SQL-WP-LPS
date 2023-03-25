<?php
require "inc/header.inc.php"; //incude du header pour toutes les pages et éviter des tonnes de lignes de codes
$content= "";
//DECONNEXION :
if( isset($_GET['action']) && $_GET['action'] == 'deconnexion' ){
	//Si il y a une 'action' dans l'URL et que celle-ci est égale à 'deconnexion', alors on détruit la session

	session_destroy();
}
//---------------------------------------------------------------------

if( userConnect() ){ //Si l'internaute est connecté redirection vers le profil

	header('location:../');
	exit();
}

//---------------------------------------------------------------------
if( $_POST ){ //Si on a cliquer sur le bouton submit

	$r = execute_requete("SELECT * FROM membre WHERE user = '$_POST[user]' ");

	//Si il y a une correspondance d'un pseudo dans la table 'membre', $r renverra '1' ligne de résultat
	if( $r->rowCount() >= 1 ){

		$membre = $r->fetch(PDO::FETCH_ASSOC);
		debug($membre);

		//Vérification du mon de passe : si le mot de passe est correct, on renseigne des informations dans notre fichier de session
		if( $_POST['password'] == $membre['password'] ){

			$_SESSION['membre']['id_membre'] = $membre['id_membre'];
			$_SESSION['membre']['user'] = $membre['user'];
			$_SESSION['membre']['password'] = $membre['password'];

			//$content .= '<div class="alert alert-success" role="alert">Connexion OK</div>';

			//Redirection vers la page profil :
			header('location:../');
			ob_end_flush();
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

<?= $content ?>
<style>
body {
	background:white;
}

</style>
<center>
	<!--Formulaire de connexion  -->
<form method="post">
	<label for="pseudo">Pseudo</label><br>
	<input type="text" name="user" id="user" class="form-control" placeholder="Votre pseudo"><br><br>

	<label for="password">Mot de passe</label><br>
	<input type=password name="password" id="password" class="form-control" placeholder="Votre mdp"><br><br>

	<input type="submit" class="btn btn-secondary">
</form>
<br>
<br>
<br>
<?php require "inc/footer.inc.php"; //incude du footer pour toutes les pages et éviter des tonnes de lignes de codes?>
</center>
