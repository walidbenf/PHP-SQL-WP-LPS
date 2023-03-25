<?php require_once('../inc/header.inc.php'); ?>
<?php
//Restreindre l'accès à cette page lorsque l'on n'est pas admin
if( !adminConnect() ){

    header('location:../index.php');
    exit();
}
//-------------------------------------------------------------------------
//Affichage des commandes (sous forme de tableau): afficher id_commande, id_membre, montant, date, etat, pseudo, adresse, ville, cp
//L'id_commande doit etre cliquable (lien a) pour voir le detail de la commande
$content .= '<h1>Listing des commandes</h1>';

$info_commande = execute_requete(" SELECT c.*, m.pseudo, m.adresse, m.ville, m.cp FROM membre m, commande c WHERE m.id_membre = c.id_membre ");

$content .= "Nombre de commande(s) : " . $info_commande->rowCount();

$content .= "<table border='1' cellpadding='5'>";
$content .= '<tr>';
for ($i=0; $i < $info_commande->columnCount() ; $i++) {

    $colonne = $info_commande->getColumnMeta($i);

    $content .= "<th>$colonne[name]</th>";
}
$content .= '</tr>';

$chiffre_affaire = 0;

while( $ligne = $info_commande->fetch(PDO::FETCH_ASSOC) ){
    //debug($ligne);

    $chiffre_affaire += $ligne['montant'];

    $content .= '<tr>';
    foreach ($ligne as $key => $value) {

        if( $key == 'id_commande' ){

            $content .= '<td>
									<a href="?suivi='. $ligne['id_commande'] .'"> Voir la commande '. $ligne['id_commande'] .'</a>
								</td>';
        }
        else{
            $content .= "<td>$value</td>";
        }
    }
    $content .= '</tr>';
}
$content .= "</table>";

$content .= "<p>CA de la boutique : $chiffre_affaire € </p>";


//-------------------------------------------------------------------------
//Affichage suivi commande SI on a cliqué sur l'id_commande (sous forme de tableau)
if(isset($_GET['suivi'])){
    $info_de_ma_commande=execute_requete("SELECT * FROM details_commande WHERE id_commande= $_GET ['suivi']");
    debug($info_de_ma_commande);

    $content .= '<h1>Voici les détails de la commande '. $_GET['suivi'] .'</h1>';
    $content .= '<table border="3" cellpadding="5"  style="border-color:red">';

    $content .='<tr>';
    for($i=0;$i < $info_de_ma_commande->columnCount();$i++) {

        $colonne= $info_de_ma_commande->getColumnMeta($i);
        $content .= "<th>$colonne[name]</th>";

    }
    $content .= '</tr>';
    while($ligne = $info_de_ma_commande->fetch(PDO::FETCH_ASSOC)){
        $content .='<tr>';
        foreach($ligne as $key=>$value){

            $content .="<td>$value</td>";
        }
        $content .='</tr>';
    }


}


?>

<?= $content ?>

<?php require_once('../inc/footer.inc.php'); ?>
