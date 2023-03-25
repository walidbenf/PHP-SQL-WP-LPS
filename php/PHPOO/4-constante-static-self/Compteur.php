<?php

class Compteur{

    public static $nbInstanceClass = 0; // appartient à la classe
    public $nbInstanceObjet = 0; // appartient à la objet

    public function __construct(){

        ++self::$nbInstanceClass;// self::$nbInstanceClass + 1
        ++$this->$nbInstanceObjet;// $this->$nbInstanceObjet + 1
    }
}

//---------------------------------------------------------------------------//

$c1 = new Compteur();//$nbInstanceClass à 1 - $nbInstanceObjet à 1
$c2 = new Compteur();//$nbInstanceClass à 2 - $nbInstanceObjet à 2
$c3 = new Compteur();//$nbInstanceClass à 3 - $nbInstanceObjet à 3
$c4 = new Compteur();//$nbInstanceClass à 4 - $nbInstanceObjet à 4
$c5 = new Compteur();//$nbInstanceClass à 5 - $nbInstanceObjet à 5

echo 'Nombre de fois que la classe a instancié : '. Compteur::$nbInstanceClass.'<hr>';
echo 'Nombre de fois que l\'objet a instancié : '. $c5->$nbInstanceObjet.'<hr>';

//---------------------------------------------------------------------------//
// la classe a produit 5 objets et chaque objet a été produit 1 fois !

/* Exemple :
    Une dame à 5 enfants, donc elle est maman 5 fois ! chacun de ses enfant est né une seule fois.
    Ici, la classe serait la mère qui a eu 5 enfant et chaque objet serait les enfants nés une fois chacun
*/

