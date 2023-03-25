<?php
trait TPanier{

    public $nbProduit = 1;
    public function affichageProduit(){

        return 'affichage des produits <br>';
    }
}

//----------------------------------------------------------------//
trait TMembre{

    public function affichageMembre(){

        return 'affichage des membres <br>';
    }
}

//----------------------------------------------------------------//
class Site{

    use TPanier, TMembre; // utilisation des traits
}

//----------------------------------------------------------------//
$site = new Site();

echo $site->affichageProduit(). '<br>';
echo $site->nbProduit. '<br>';
echo $site->affichageMembre(). '<br>';

//----------------------------------------------------------------//
/*
les traits ont été inventés pour repousser les limites de l'héritage.
Une classe ne peut herité que d'une seule classe à la fois.
En revanche, elle peut importer (donc hériter) de plusieurs 'traits'.
Il est utile d'utiliser les traits quand l'une de vos classea besoin d'une methode 'x' de la classe A, 'y' de la classe B est 'z' de la classe C.

Un trait n'est pas instaciable. Un trait est un regroupement de methode et de propriété pouvant etre importées au sein d'une classe
*/

//----------------------------------------------------------------//
trait A{
    
    public function a(){return 'a';}
}

trait B{
    
    use A;
    public function b(){return 'a';}
}

class Test{
    
    use B;
}

$test = new Test();
echo $test->a(). '<br>';
echo $test->b(). '<br>';

//----------------------------------------------------------------//
trait Montrait{

    public function DireBonjour(){

        echo 'Hello';
    }
}
class MaClass{

    use MonTrait;
    public function DireBonjour(){
        echo 'Bonjour ! <br>';
    }
}

$objet = new MaClass();
$objet->DireBonjour(); // affiche 'Bonjour !'
// Si une classe déclare une methode et qu'elle utilise un trait possédant cette même methode, alors la methode déclarée dans la classe courante l'emportera sur la methode déclarée dans le trait.

//----------------------------------------------------------------//
trait Z{

    public function Direbonjour(){

        echo 'Hello !';
    }
}
class MaClass2{

    use Z{
        DireBonjour as DireHello;
    }
}

$objet2 = new MaClass2();
$objet2->DireBonjour();
echo '<br>';
$objet2->DireHello();