<?php
//--------------------------------------------------------------
//fonction debug() : permet d'effectuer un print_r "amélioré""

function debug( $arg ){

	echo '<div style="background:#fda500; padding: 5px; z-index:1000;">';

		$trace = debug_backtrace(); //fonction prédéfinie de php qui retourne un array contenant des infos

		echo 'Debug demandé dans le fichier : '. $trace[0]['file'] . ' à la ligne ' . $trace[0]['line'];

		print '<pre>';
			print_r( $arg );
		print '</pre>';
	echo '</div>';
}

//--------------------------------------------------------------
//fonction execute_requete() : permet d'effectuer une requête
function execute_requete( $req ){

	global $pdo;

	$pdostatement = $pdo->query( $req );

	return $pdostatement;
}

//--------------------------------------------------------------
//fonction userConnect() : si l'internaute est connecté
function userConnect(){

	//Si la session n'existe pas, ca signifie que l'on ne s'est pas connecté, on retourne false
	if( !isset( $_SESSION['membre']) ){

		return false;
	}
	else{ //sinon on retourne true
		return true;
	}
}

//--------------------------------------------------------------
//fonction adminConnect() : si l'internaute est connecté ET qu'il est admin
function adminConnect(){

	//si l'internaute est connecté ET qu'il est admin donc qui a un statut égal à 1
	if( userConnect() && $_SESSION['membre']['user'] == 'walid' ){

		return true;
	}
	else{
		return false;
	}
}
?>
