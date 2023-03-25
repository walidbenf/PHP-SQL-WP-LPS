<?php
// Singleton : est un pattern qui permet de donner une solution à plusieur problèmes récurrents

class Singleton{

    public $numero = 20;
    private static $instance = null;

    private function __construct(){} // la classe n'est pas instanciable car le constructeur est privé <!DOCTYPE html>
    
    private function __clone(){} // permet que l'objet ne soit pas clonable

    public static function getInstance(){

        if(is_null(self::$instance)){ // $instance est null (ce qui sera le cas la première fois ), toutes les autres fois, je ne rentre pas dans le 'if' car il y aura désormais  un objet dans $instance

            self::$instance = new Singleton();  // Instancation une seule fois !
        }
        return self::$instance; // Dans tous les cas, ici je retourne un objet$instance
    }
}

//--------------------------------------------------------------------------------------//

//$test = new Singleton(); // ERROR normal car la fonction __construct() est en privée !!

$objet1 = Singleton::getInstance();
var_dump($objet1);
echo '<br>';


$objet2 = Singleton::getInstance();
var_dump($objet2);
echo '<br>';


$objet3 = Singleton::getInstance();
var_dump($objet3);
echo '<br>';

echo $objet1->numero.'<br>'; //20
echo $objet2->numero.'<br>'; //20
echo $objet3->numero.'<br>'; //20

$objet2->numero = 456; // ré-affectation

echo $objet1->numero.'<br>'; //456 tous les représentants de l'objet ont cette valeur puiqu'il s'agit du même objet
echo $objet2->numero.'<br>'; //456
echo $objet3->numero.'<br>'; //456


