<?php
/*créer un fichier fonction.php : et créer une fonction calcul() qui va recevoir 2 arguments (fruit , poids)et qui va retourner une phrase :

	"Les .... coutent .... € pour un poids de .... grammes"

    pommes, bananes, cerises, poires
*/
function calcul( $fruit, $poids ){

    switch( $fruit ){

        case 'cerises' : $prix_kg = 5; break;
        case 'pommes' : $prix_kg = 1.5; break;
        case 'bananes' : $prix_kg = 2; break;
        case 'peches' : $prix_kg = 3.5; break;

        default : return 'Fruit inexistant <br>'; break;
    }
    $result = round( ($poids*$prix_kg/1000), 2 );

    return "Les $fruit coutent $result € pour un poids de $poids grammes<br>";
}

echo calcul('melon', 123);
echo calcul('pommes', 13);
echo calcul('peches', 45);

?>
