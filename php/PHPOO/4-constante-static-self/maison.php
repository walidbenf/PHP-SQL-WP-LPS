<?php
class Maison{
    public static $espaceTerrain ='500m²'; // appartient à la classe
    public $couleur = 'blanc'; // appartient à l'objet

    const HAUTEUR = '10m'; // appartient à la classe

    private static $nbPiece = 7; // appartien à la classe
    private $nbPorte = 10; // appartient à l'objet

    public static function getNbPiece(){

        return self::$nbPiece; // Lors d'un self::, il faut mettre le '$' devant la propriété !!!
    }
    public function getNbPorte(){

        return $this->nbPorte;
    }
}

echo "Nombre de piece ".Maison::getNbPiece()."<br>"; // j'appel une methode 'static' de ma classe par ma class

echo "Espace de terrain ".Maison::$espaceTerrain."<br>"; // j'appel une propriété 'static' de ma classe par ma class

$maison1 = new Maison();

echo 'Couleur : '.$maison1->couleur.'<br>'; // j'appel une propriété de mon objet par mon objet

echo 'Nombre de porte : '.$maison1->getNbPorte().'<br>'; // j'appel une methode de mon objet par mon objet 

echo 'HAUTEUR : '.Maison::HAUTEUR.'<br>'; //j'appel une constante de ma classe par ma classe

//------------------------------------------------------------------------------------------------//

//echo $maison->espaceTerrain; // ERROR, on ne peut pas appeler une propriété 'static' par mon objet

//echo Maison::$couleur; // ERROR, on ne peut pas appeler une propriété public 'non static' par ma classe

//echo Maison::getNbPorte(); // ERROR, on ne peut pas appeler une methode public 'non static' par ma classe

//echo $maison1->getNbPiece(); // PAS d'erreur... Mais ça devrait ! Car la methode est 'static' et donc il faudrait appeler par une classe et non pas par l'objet

echo $maison1::$espaceTerrain; // PAS d'erreur... Mais ça devrait ! A BANIR C'EST N'IMPORTE QUOI !!

//------------------------------------------------------------------------------------------------//

/**
 * Opération :
 *      $objet->element d'un objet à l'extérieur de la classe
 *      $this-> element d'un objet à l'intérieur de la classe
 * 
 *      Class::$element d'une classe à l'extérieur de la classe
 *      self::$element d'une classe à l'intérieur de la classe
 * 
 * Question à se poser :
 * 
 *      Est-ce que c'est 'static' ?
 *          Si OUI => self::, Class::
 * 
 *      Est-ce que c'est dans la classe ?
 *         si OUI => self::
 *         si NON => Class::
 * 
 *      Si NON => $objet-> , $this->
 *          Est-ce que c'est dans la classe ?
 *              si OUI => $this->
 *              si NON => $objet->
 * 
 * Précision :
 * 
 *      STATIC : indique qu'un élément appartient à la classe
 *      CONST :  indique qu'un élément appartient à la classe
 * 
 * Différence :
 * 
 *      CONST : la constante ne change pas !
 *      STATIC : la propriété peut changer.
 */
