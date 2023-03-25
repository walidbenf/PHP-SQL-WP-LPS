<?php

class Ecole{

    public $nom = 'PoleS';
    public $cp = 75;
    public function __clone(){ // Un clone peut se faire en l'absence de cette methode. Elle s'execute en cas de clone demandé et s'applique sur l'objet cloné ! ( et non celui qui sert au clonage)

        $this->cp = 93;

    }
}

//---------------------------------------------------------------------------------//
$ecole1 = new Ecole();

var_dump($ecole1); echo '<hr>'; // objet[1]

$ecole1->cp = 45;

var_dump($ecole1);echo '<hr>';

$ecole2 = new Ecole();
var_dump($ecole2);echo '<hr>'; // objet[2]

$ecole3 = $ecole1; // transmision de la référence [1]

var_dump($ecole3);echo '<hr>'; // objet[2]
// Lorsque je modifie $ecole1 cel prend effet sur $ecole3 et vice-versa, $ecole1 et $ecole3 sont des références qui point vers le même objet[1]. ils représentent le même objet !

$ecole3->cp = 28;

    echo 'Ecole1 ->'.$ecole1->cp.'<br>'; 
    echo 'Ecole3 ->'.$ecole3->cp.'<hr>'; 

//---------------------------------------------------------------------------------//
$ecole4 = clone $ecole2; // cole crée un objet et récupère les informatins de $ecole2 ( le cp passe à 93)
var_dump($ecole4); echo '<hr>';

    echo 'Ecole1 ->'.$ecole1->cp.'<br>'; // 28
    echo 'Ecole2 ->'.$ecole2->cp.'<br>'; // 75
    echo 'Ecole3 ->'.$ecole3->cp.'<br>'; // 28
    echo 'Ecole4 ->'.$ecole4->cp.'<br>'; // 93
