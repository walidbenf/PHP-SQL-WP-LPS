<?php
/*
1.	Faire en sorte de ne pas avoir d'objet Vehicule. // abstract

2. 	Obligation pour la Renault et la Peugeot de posséder la même méthode demarrer() qu'un Véhicule de base . // extends + final

3.	Obligation pour la Renault de déclarer un carburant diesel et pour la Peugeot de déclarer un carburant essence (exemple: return 'diesel'; -ou- return 'essence';). // abstract

4.	La Renault doit effectuer 30 tests de + qu'un véhicule de base. // redefinition + surcharge

5.	La Peugeot doit effectuer 70 tests de + qu'un véhicule de base. // redefinition + surcharge

6.	Effectuer les affichages nécessaire. // echo

*/

abstract  class Vehicule{

    final public function demarrer(){

        return 'Je démarre';
    }

    abstract public function carburant();

    public function nombreTestObligatoire(){

        return 100;
    }
}

//------------------------------------------------------------------//
class Peugeot extends Vehicule{

    public function carburant(){

        return 'essence';
    }

    public function nombreTestObligatoire(){

        return parent::nombreTestObligatoire() + 70;
    }

}

//------------------------------------------------------------------//

class Renault extends Vehicule{

    public function carburant(){

        return 'diesel';
    }
    public function nombreTestObligatoire(){

        return parent::nombreTestObligatoire() + 30;
    }
    
}

//------------------------------------------------------------------//
$peugeot = new Peugeot();
echo 'Peugeot : '.$peugeot->demarrer() . '<br>';
echo 'Peugeot : '.$peugeot->carburant() . '<br>';
echo 'Peugeot : '.$peugeot->nombreTestObligatoire() . '<br><br>';

$renault = new Renault();
echo 'Renault : '.$renault->demarrer() . '<br>';
echo 'Renault : '.$renault->carburant() . '<br>';
echo 'Renault : '.$renault->nombreTestObligatoire() . '<br>';
