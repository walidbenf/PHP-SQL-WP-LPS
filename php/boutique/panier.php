<?php require_once('inc/header.inc.php'); ?>
<?php
if( isset($_POST['ajout_panier']) ){ //Ici, on vérifie l'existance d'un submit de la fiche_produit.php

    $r = execute_requete(" SELECT * FROM article WHERE id_article = '$_POST[id_article]' ");
    //Le post provient de l'input (hidden) dans fiche_produit.php

    $article = $r->fetch(PDO::FETCH_ASSOC);

    //debug($_POST);
    //debug($article);

    ajout_panier( $article['titre'], $article['id_article'], $_POST['quantite'], $article['prix'] );

    //debug($_SESSION);
    //debug($_SESSION['panier']);
}

//--------------------------------------------------------------------
//Validation du panier
if( isset($_POST['payer']) ){ //Lorsque je clique sur 'payer' pour valider mon panier

    //Insertion de la commande :
    execute_requete("INSERT INTO commande(id_membre,montant, date) VALUES( ". $_SESSION['membre']['id_membre'].",". montant_total() .", NOW() ) ");

    $id_commande= $pdo->lastInsertId();

    $content .="<div class='alert alert-success'>Merci pour votre commande, votre n° de commande est le $id_commande</div>";

    //Insertion du détail de la commande :
    for($i=0;$i< count($_SESSION['panier']['id_article']);$i++){
        execute_requete("INSERT INTO details_commande(id_commande,id_article,quantite,prix) VALUES($id_commande, ". $_SESSION['panier']['id_article'][$i] .", ". $_SESSION['panier']['quantite'][$i].",".$_SESSION['panier']['quantite'][$i].") ");

        //Modification du stock en conséquence de la commande:
        execute_requete("UPDATE article SET stock = stock - ".$_SESSION['panier']['quantite'][$i]." WHERE id_article=". $_SESSION['panier']['id_article'][$i] ." ");

    }
    //Vider la session panier
    unset($_SESSION['panier']);

}

//--------------------------------------------------------------------
//Affichage du panier :
$content .= '<table class="table">';
$content .= '<tr>
					<th>Titre</th>
					<th>Quantite</th>
					<th>Prix</th>
					<th>Action</th>
				</tr>';

if( empty($_SESSION['panier']['id_article'] ) ){
    //Si ma session/panier/id_article est vide

    $content .= '<tr><td colspan="4">Votre panier est vide</td></tr>';
}
else{ //Sinon ..

    for ($i=0; $i < count($_SESSION['panier']['id_article']) ; $i++) {

        $content .= '<tr>';
        $content .= '<td>'. $_SESSION['panier']['titre'][$i] .'</td>';
        $content .= '<td>'. $_SESSION['panier']['quantite'][$i] .'</td>';

        $prix_total_article = $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];

        $content .= '<td>' . $prix_total_article . '</td>';

        $content .= '<td>
								<a href="?action=retirer&id_article='. $_SESSION['panier']['id_article'][$i] .'">
									Retirer
								</a>
							</td>';
        $content .= '</tr>';

    }
    $content .= '<th colspan="2">&nbsp;</th><th>'. montant_total() .' €</th>';

    if( userConnect() ){

        $content .= '<form method="post">';
        $content .= '<tr>
							<td clospan="4">
								<input type="submit" value="Payer" name="payer" class="btn btn-secondary">
							</td>
						</tr>
						</form>';
    }
    else{

        $content .= '<tr>
							<td clospan="4">
								Veuillez vous <a href="connexion.php">connecter</a> ou vous <a href="inscription.php">inscrire</a>
							</td>
						</tr>';
    }
    $content .= '<tr>
						<td clospan="4">
							<a href="?action=vider">Vider mon panier</a>
						</td>
					</tr>';
}

$content .= '</table>';
//----------------------------------------------------------------------
//action vider panier :
if( isset($_GET['action']) && $_GET['action'] == 'vider' ){

    unset( $_SESSION['panier'] ); //unset() détruit la variable $_SESSION['panier'], donc ca va vider notre panier
    header('location:panier.php');
}

//----------------------------------------------------------------------
//action retirer un produit :
if( isset($_GET['action']) && $_GET['action'] == 'retirer' ){

    retirer_article_panier( $_GET['id_article'] );
}




?>

<h1>Votre panier</h1>

<?= $content ?>

<?php require_once('inc/footer.inc.php'); ?>
