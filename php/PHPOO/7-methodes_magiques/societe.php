<?php
// Les methodes magiques s"executent automatiquement !

class Societe{

    public $adresse;
    public $ville;
    public $cp;

    public function __construct(){}

    public function __set($nom, $valeur){// Se déclenche uniquement en cas de tentive d'affectation sur propriété inexistante.

        echo "La propriété $nom n'existe pas, la valeur $valeur n'a donc pas été affectée ! <br>";

    }
    public function __get($nom){//Se déclenche uniquement en cas de tentive d'affichage sur propriété inexistante.

        echo "La propriété $nom n'existe pas,on ne peut pas l'afficher ! <br>";

    }
    public function __call($nom, $argument){//Se déclenche uniquement en cas de tentive d'execution sur methode qui n'existe pas.

        echo "Tentative d'executer la methode $nom mais elle n'existe pas.<br> Les arguments étaient :" . implode('-', $argument).'<br>';

    }
}

//---------------------------------------------------------------------------------------------------//
$societe1 = new Societe();

/* Si je n'est pas mis de fonction (__set, __get, __call) :

$societe1->villes = 'Paris'; //test de la methode __set() - lorsque l'on tente d'affecter une valeur à une propriété inexistante, ça fonctionne et ajoute donc la propriété et ça valeur à l'objet ( en l'absence de la methode __set() ).

var_dump($societe1);

echo $societe1->titre; // erreur  undefined, la propriété n'existe pas !

$societe1->methode(); // erreur  fatal, la propriété n'existe pas !
*/

//---------------------------------------------------------------------------------------------------//
$societe1->pays = 'France'; // déclenchement de la methode __set() au lieu de la creation d'une nouvelle propriété

$societe1->ville = 'Paris'; // la propriété existe, donc pas de déclenchement de la methode __set()

// var_dump($societe1);

//---------------------------------------------------------------------------------------------------//
echo $societe1->titre; // déclenchement de la methode __get() au lieu d'une erreur undefined

//---------------------------------------------------------------------------------------------------//
echo $societe1->methode1(1,2,3); // déclenchement de la methode __call() au lieu d'avoir une fatal error
