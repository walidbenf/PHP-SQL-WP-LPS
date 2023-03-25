<?php
class Homme{

    private $prenom;
    private $nom;

    public function setPrenom($p){ // Par convention, on appel la fonction avec le mot clé 'set'. On dis que l'on va 'setter' un prenom, c'est à dire lui attribuer/affecter une valeur

        if(is_string( $p ) ){

            $this->prenom = $p;
        }

    }
    public function getPrenom(){// Par convention, on appel la fonction avec le mot clé 'get'. On dis que l'on va 'getter' un prenom, c'est à dire pour afficher la valeur de la propriété
        return $this->prenom;
        
    }

    public function setNom($n){

         $this->nom = $n;
    }

    public function getNom(){
        
        return $this->nom;
    }



}

// ---------------------------------------------------------------------------------------------------------------//
$homme1 = new Homme();
var_dump($homme1);

$homme1->setPrenom('Mehdi'); // je modifie l'élément (dans l'objet dans lequel on se trouve) car ma methode public

echo '<br>'.$homme1->getPrenom(). '<br>'; // accède à l'élément dans l'objet car la methode est public

$homme1->setNom('Hamdaoui');

echo '<br>'.$homme1->getNom(). '<br>';

var_dump($homme1);
// ---------------------------------------------------------------------------------------------------------------//
$homme2 = new Homme();

echo '<br>'.$homme2->getPrenom(). '<br>';
echo '<br>'.$homme2->getNom(). '<br>';
// les 2 lignes du dessus n'affichent rien car j'ai réinstancier la class Homme pour créer un nouvel objet $homme2 qui va récupérer les informations initiales stokées dans la classe Homme

var_dump($homme2);
// ---------------------------------------------------------------------------------------------------------------//
/**
 * Pourquoi des getteurs et des setteurs :
 *   PHP est un langage objet qui ne type pas ses variables, il faut donc prévoir autant de setteur et de getteur que de propriété afin de controler l'intégrité des       données 
 *   $this : représente l'objet en cours, ici, à l'intérieur de la classe (objet en cour <=> objet exécute la méthode)
 * 
 *  les getteurs : voir/afficher
 *  les setteurs : attribuer /affecter
 *      => les 2 réunis permettent de controler l'intégrité des données
 *  Mettre les propriétés en 'private' permet déviter qu'elles ne soient modifiées de l'intérieurs de la classe sans controles !
 */
