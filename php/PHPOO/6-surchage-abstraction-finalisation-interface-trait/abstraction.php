<?php
abstract class Joueur{

    public function seconnecter(){
        return $this->EtreMajeur();
    }
    abstract public function EtreMajeur(); // les methodes abstraites n'ont pas de contenu !
    abstract public function Devise();
}

// -----------------------------------------------------------//
class JoueurFr extends Joueur{

    public function EtreMajeur(){// Obligation de redéfinir la methode de ma classe parent sinon on obtient une erreur

        return 18;
    }
    public function Devise(){

        return '€';
    }
}

// -----------------------------------------------------------//
class JoueurUs extends Joueur{

    public function EtreMajeur(){// Obligation de redéfinir la methode de ma classe parent sinon on obtient une erreur

        return 21;
    }
    public function Devise(){

        return '$';
    }
}

// -----------------------------------------------------------//

// $joueur = new Joueur(); // ERROR, une classe abstraite n'est pas instanciable

$joueurFr = new JoueurFr();
echo $joueurFr->seConnecter(). '<hr>';

$joueurUs = new JoueurUs();
echo $joueurUs->seConnecter();

// -----------------------------------------------------------//

/*
    Une classe abstraite  (abstract) n'est pas instanciable !
    les methodes abstraites (abstract) n'ont pas de contenu !
    lorsque l'on herite de methodes abstraites, nous sommes obligés de les redéfinir !
    Pour définir une methode abstraite, il est necessaire que la classe qui contient soit abstraite !!
    Par ailleurs, une classe abstraite peut contenir des methodes 'normales'. 
*/ 