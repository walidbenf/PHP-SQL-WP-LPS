<?php
include("fonction.inc.php");

$fruits= array('cerises','pommes','bananes','peches');
$poids = array(100,500,1000,2000,5000);

$valeur=$fruits[0];
$valeur2= $poids[1];

print_r($valeur);
echo '<br>';
print_r($valeur2);
echo '<br>';
echo calcul($valeur,$valeur2);
echo '<br>';

foreach($poids as $value){
    echo calcul($valeur,$value);
}
echo '<br> <br> <br>';

foreach($poids as $value){
    foreach($fruits as $valuee){
        echo calcul($valuee,$value);
    }
}

echo '<br> <br> <br>';
echo '<table border="black"><tr>';
foreach($poids as $value){
    foreach($fruits as $valuee){
        echo '<td>'.calcul($valuee,$value). '</td>';
    }
}
echo '</table></tr>';
