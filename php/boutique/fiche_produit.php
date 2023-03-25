<?php require_once('inc/header.inc.php'); ?>
<?php

if( isset($_GET['id_article']) ){ //Si il y a une id_article dans l'URL

	$r = execute_requete("SELECT * FROM article WHERE id_article='$_GET[id_article]' ");
}
else{ //sinon, redirection

	header('location:index.php');
	exit();
}

$article = $r->fetch(PDO::FETCH_ASSOC);
//debug( $article );

$content .= "<a href='index.php'>Retour vers la boutique</a><br>";

$content .= "<a href='index.php?categorie=$article[categorie]'>Retour vers la categorie $article[categorie]</a><br>";

$content .= "<h1>$article[titre]</h1>";

$content .= "<p>$article[categorie]</p>";
$content .= "<p>$article[couleur]</p>";
$content .= "<p>$article[taille]</p>";

$content .= "<p><img src='$article[photo]' width='200'></p>";

$content .= "<p>$article[description]</p>";
$content .= "<p>$article[prix]</p>";

//---------------------------------------------
if( $article['stock'] > 0){ //Si le stock est supérieur à 0

	$content .= "Nombre de produits disponibles : $article[stock]<br>";

	$content .= '<form method="post" action="panier.php">';

		$content .= '<input type="hidden" name="id_article" value="'.$article['id_article'].' ">';

		$content .= '<label for="qte">Quantité</label><br>';
		$content .= '<select name="quantite" id="qte">';

			for ($i=1; $i <= $article['stock'] ; $i++) {
				
				$content .= "<option> $i </option>";
			}
		$content .= '</select><br><br>';

		$content .= '<input type="submit" name="ajout_panier" value="Ajouter au panier" class="btn btn-secondary">';

	$content .= '</form>';

}
else{ //Sinon on indique rupture de stock

	$content .= "<p>Rupture de stock !</p>";
}


?>

<?= $content ?>

<?php require_once('inc/footer.inc.php'); ?>

