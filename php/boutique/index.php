<?php require_once('inc/header.inc.php'); ?>
<?php
//Affichage sur la page d'accueil :
$r = execute_requete(" SELECT DISTINCT (categorie) FROM article ");

$content .= '<div class="row" >';
	//Affichage des catégories :
	$content .= '<div class="col-3">';
		$content .= '<div class="list-group-item">';
		
			while( $categorie = $r->fetch(PDO::FETCH_ASSOC) ){

				$content .= "<a href='?categorie=$categorie[categorie]' class='list-group-item' >
								$categorie[categorie]
							</a>";
			}
		$content .= '</div>';
	$content .= '</div>';

	//Affichage des articles correspondant à la catégorie selectionnée
	$content .= '<div class="col-8 offset-1">';
		$content .= '<div class="row">';

			if( isset($_GET['categorie']) ){

				$r = execute_requete("SELECT * FROM article WHERE categorie='$_GET[categorie]' ");
			
				while ($article = $r->fetch(PDO::FETCH_ASSOC)) {

				    // debug($article);
				    $content .= '<div class="col-4">';
				       $content .= '<div class="thumbnail" style="border:1px #eee solid;">';

				            $content .= '<a href="fiche_produit.php?id_article='.$article['id_article'].'"> <img src="'.$article['photo'].'" width="100"></a>';             

				            $content .= '<div class="caption">';
				            
				                $content .= '<p>'.$article['titre'].'</p>';
				                $content .= '<p>'.$article['prix'].'</p>';
				                $content .= '<a href="fiche_produit.php?id_article='.$article['id_article'].'">Voir la fiche produit</a>'; 

				            $content .='</div>';
				        $content .='</div>';
				    $content .='</div>';
                }
			}
		$content .= '</div">';
	$content .= '</div>';
$content .= '</div>';

//_________________________________________________________________________________
?>

<h1>Bienvenu sur mon site boutique</h1>
	
<?= $content ?>

<?php require_once('inc/footer.inc.php'); ?>