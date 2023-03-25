<?php

/*
---------------------
|    Vehicule		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence()	|
---------------------

---------------------
|    Pompe   		|
---------------------
|	$litresEssence	|
---------------------
|setlitresEssence() |
|getlitresEssence()	|
|donnerEssence()	|
---------------------
*/


class Vehicule{

    private $litresEssence;

    public function setlitresEssence($L){

       if(is_int($L)){
            $this->litresEssences = $L;
       }
    }

    public function getlitresEssence(){

        return $this->litresEssences;
    }
}

//--------------------------------------------------------------------------------//

class Pompe{

    private $litresEssence;

    public function setlitresEssence($p){

        $this->litresEssences = $p;
    }

    public function getlitresEssence(){

        return $this->litresEssences;
    }

    public function donnerEssence(Vehicule $v){ // Onexige que l'argument soit de type 'Vehicule'

        $this->setlitresEssence( $this->getlitresEssence() - ( 50 -$v->getlitresEssence() ) );
        //$v représente le vehicule reçu, $this représente le vehicule à partir de laquelle la methode est appelée
        // 800 - (50 - 5) <=> 800 - 45 = 755

        // 10. Faire en sorte que le véhicule ne puisse pas contenir plus de 50L d'essence (limite reservoir).
        $v->setlitresEssence( $v->getlitresEssence() + ( 50 - $v->getlitresEssence() ) );
        // 5 + ( 50 - 5) <=> 5 + 45 = 50
    }
}

//--------------------------------------------------------------------------------//

// 1. Création d'un véhicule 1
$vehicule1 = new Vehicule();

// 2. Attribuer un nombre de litres d'essence au vehicule 1 : 5
$vehicule1->setlitresEssence(5);

// 3. Afficher le nombre de litres d'essence du vehicule 1
echo "Le vehicule 1 possède : ".$vehicule1->getlitresEssence()." litres d'essence <br>";

// 4. Création d'une pompe
$pompe1 = new Pompe();

// 5. Attribuer un nombre de litres d'essence à la pompe : 800
$pompe1->setlitresEssence(800);

// 6. Afficher le nombre de litres d'essence de la pompe
echo "Le pompe 1 possède : ".$pompe1->getlitresEssence()." litres d'essence <br>";

// 7. la pompe donne de l'essence en faisant le plein (50L) à la voiture1
$pompe1->donnerEssence($vehicule1);

// 8. Afficher le nombre de litres d'essence pour la voiture1 après ravitaillement
echo "Après ravitaillement, le vehicule 1 possède ".$vehicule1->getlitresEssence()." litres d'essence <br>";

// 9. Afficher nombre de litres d'essence restant pour la pompe
echo "Après ravitaillement, le pompe possède ".$pompe1->getlitresEssence()." litres d'essence <br><hr>";

//--------------------------------------------------------------------------------//

$vehicule2 = new Vehicule();

$vehicule2->setlitresEssence(30);

echo "Le vehicule 2 possède : ".$vehicule2->getlitresEssence()." litres d'essence <br>";

$pompe1->donnerEssence( $vehicule2);

echo "Après ravitaillement, le vehicule 2 possède ".$vehicule2->getlitresEssence()." litres d'essence <br>";

echo "Après ravitaillement, le pompe possède ".$pompe1->getlitresEssence()." litres d'essence <br>";
