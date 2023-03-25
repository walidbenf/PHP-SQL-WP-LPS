<?php
// surcharge (override) : une surchage me permet de prendre le comportement de ma fonction d'origine et d'y ajouter un traitement complémentaire.

class A{

    public function calcul(){

        return 10;
    }
}

//-------------------------------------------------------------------//
class B extends A{

    public function calcul(){ // redéfinition 

        $n = parent::calcul();
        // On n'utilise pas $this->calul() sinon, la fonction sera récursive et la methode s'appellera en boucle !
        //  'parent' fonctionne donc pour appeler une methode d'une classe parent lors d'une surcharge !! (afin d'eviter qu'elle ne s'appelle elle même avec $this->calcul() )
        // self::calcul() ne fonctionnerait pas non plus, car on essayerait d'appeler quelque chose de la classe courante ( alors qu'ici, on a besoin de la classe parente)
        if( $n <= 100){

            return "$n est inférieur ou égale à 100 !";
        }
        else{

            return "$n est supérieur à 100 !";
        }
    }
    public  function autreCalcul(){

        $nb = parent::calcul(); // Il est possible d'atteindre une methode de mon parent, même s'il n'y a pas de surcharge.
    }
}

//-------------------------------------------------------------------//
$objetB = new B();

echo $objetB->calcul();
// Afficher : "10 est inférieur ou égale à 100 !" - J'ai redéclaré la methode calcul() dans la classe enfant (B), cela s'appel une surcharge, je modifie légèrement le comportement initial contenu dans le parent (A) via son enfant (B)

//-------------------------------------------------------------------//
/*
Une Surcharge : permet de prendre en compte le comportement de la methode herité afin d'en bénéfcier, tout en apportant un traitement complémentaire.

Différence entre 'self::' et 'parent::'

    Lorsque l'on utilise 'self::' on demande d'utiliser ce qui est dans la classe courante ou que l'on a hérité sans l'avoir redéfinie dans notre classe et il faut que cela à la classe.

    Quand on utilise 'parent::' on demande d'utiliser les élément de la classe dont on a hérité.
*/