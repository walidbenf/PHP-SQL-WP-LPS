<?php

session_start();

if(isset($_GET['action']) && $_GET['action'] == 'vider'){

    unset($_SESSION['panier']);
}

//-----------------------------------------------------------//


if(isset($_GET['action']) && $_GET['action'] == 'create' || isset($_SESSIOn['panier'])){ // si le panier existe ou qu'il est en cours de création

    $_SESSION['panier'] = array(12, 45, 78);

    echo 'Produit présents dans le panier : ' . implode($_SESSION['panier'], ' - '). '<br>';

    echo '<a href="?action=vider">Vider le panier</a>';
}
else{ // Sinon le panier n'existe pas

    echo '<a href="?action=create">Créer le panier</a>';

}

//-----------------------------------------------------------//

// erreur volontaire : le morceau de code suivant est inscrit à la fin du fichier (au lieu du début), du coup quand une personne clic sur le lien vider la page se recharge, le code se reli ligne par ligne, le panier est toujours remplie jusqu'au moment où l'on passe sur les lignes ci-dessous qui vide le panier (au final il est bien vide). Cependant l'affichage est sorti avant et lorsque l'affichage est sorti le panier était toujours remplie, du coup le retour sur la page web est "éronné", on y voit les produits du panier alors qu'on a un panier vide. Pas besoin de recliquez une 2e fois sur le lien vider pour s'en convaincre, il suffit de cliquez sur l'url et faire entrée (f6+entrée). Pour éviter ce problème, il faudrait placer le bout de code gérant le unset plus haut et c'est là qu'intervient l'architecture MVC, il s'agit d'un concept, d'une méthodologie à suivre.