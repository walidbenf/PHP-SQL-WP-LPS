<?php

class Etudiant{

    private $prenom;

    public function __construct($arg){
        // __construct : methode appelée automatiquement lors d'une instanciation de la classe ('new Etudiant'). On ne peut pas déclarer 2 constructeurs en PHP.

        echo "Instanciation, nous avons reçu l'information suivante : $arg!";

        $this->setPrenom($arg); // il est préférable de passer par le setteur, comme ça, on passe les contoles.
    }

    public function setPrenom($arg){

        $this->prenom = $arg;
    }
    public function getPrenom(){
        return $this->prenom;
    }
}

//------------------------------------------------------------------------------------------//

$etudiant1 = new Etudiant('Mehdi'); // __construct() est appelée automatiquement , on met un argument après le nom de la classe qui atterit directement dans le constructeur

//$etudiant1->__construct();// le constructeur peutpeut tout de même etre appelé comme une methode 'classique'. 

echo '<br>Prenom : '. $etudiant->getPrenom();


