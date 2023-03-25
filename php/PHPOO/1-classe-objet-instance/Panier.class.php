<?php
// Une classe permet de produire plusieurs objets. Par convention, une classe sera nommée avec la première lettre en Majuscule <!DOCTYPE html>
class Panier{

    public $nbProduit; // propriété

    public function ajouterArticle(){ // méthode
        // traitement php
        return "L'article a bien été ajouté !";
    }
    protected function retirerArticle(){

        return "L'article a bien été retiré!";
    }
    private function affichageArticle(){

        return "Voici les articles !";
    }
}
//--------------------------------------------------------------------------------------//

$panier1 = new Panier; // new Panier <=> instanciation (permet de déployer l'objet issue de la classe, ici Panier; permet de passer d'une classe à l'objet)

// $panier1 représente l'objet issue de la classe :
var_dump($panier1);
//type(object), nom de la classe, référence de l'objet
$panier1->nbProduit = 5;

echo'<br>Panier1 :'.$panier1->nbProduit.' produits <br>';
// Appel de la propriété public ($nbProduit)

echo '<br>Panier1 : '.$panier1->ajouterArticle().' <br>';
// Appel de la méthode public

// echo '<br>Panier1 : '.$panier1->retirerArticle().' <br>';
// Appel de la methode protected
// ERROR ! l'élément va être accessible uniquement dans la classe ou celà a été déclaré ainsi que dans la classes héritères

// echo '<br>Panier1 : '.$panier1->affichageArticle().' <br>';
// Appel de la méthode private
// ERROR ! l'élément va être accessible uniquement dans la classe ou celà a été déclaré.

//----------------------------------------------------------------------------------------//

$panier2 = new Panier;
var_dump($panier2);

$panier2->nbProduit = 20;

echo'<br>Panier2 :'.$panier2->nbProduit.' produits <br>';

echo'<br>Panier1 :'.$panier1->nbProduit.' produits <br>';

//----------------------------------------------------------------------------------------//

/**
 * Niveau de la visibilité :
 *      -public : accessible de partout
 *      -protected : accessible uniquement dans la classe ou cela a été déclaré ET aussi dans la classes héritières
 *      -private : accessible uniquement dans la classe ou ça a été déclaré
 *      
 *      -new = mot clé permettant d'effectuer une instanciation (et donc créer un objet)
 *      
 *      -Une classe : permet de produire plusieur objets (et donc nous pouvons effectuer plusieurs instanciation)
 * 
 * -> Quand on instancie une classe, la variable stockant l'objet de stock en fait pas l'objet lui même mais un identifiant représentant cet objet (espace mémoire en ram sur le serveur)
*/

