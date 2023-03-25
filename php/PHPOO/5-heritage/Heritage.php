<?php

class Membre {
  public $id = 10;
  public $pseudo;
  public $mdp;


  public function __construct() {//fonction __construct() fonction qui s'exécute automatiquement

    echo "Internaute !<br>";

  }
  public function inscription() {
    return "Je m'inscris !<br>";
  }
  public function seConnecter() {
    return "Je me connecte !<br>";
  }
}
  class Admin extends Membre { //extends = heritage (comme include), ici on a copier/coller du code contenu dans la classe membre

    public function accesBackOffice() {
      return 'Acces BackOffice !<br>';
    }
  }



$admin1 = new Admin(); //je crée un objet admin qui herite de la class Membre (qui affiche la fonction construct)
//var_dump($admin1);

echo $admin1->seConnecter();//j'accéde à la méthode par l'objet $admin1
echo $admin1->accesBackOffice();
echo $admin1->id . '<hr>';// j'accéde à la propriété par l'objet $admin1

$membre1 = new Membre();

echo $membre1->seConnecter();//j'accéde à la méthode par l'objet $admin1
echo $membre1->id . '<hr>';// j'accéde à la propriété par l'objet $admin1
echo $membre1->accesBackOffice(); //ERROR, la méthode accesBackOffice() n'est pas dans la classe membre et je n'ai pas d'héritage de ma classe admin donc je ne peux pas acéder à cette méthode.

//LORS D'UN HERITAGE, ON HERITE DE TOUT !(même de ce qui est 'private')

 ?>
