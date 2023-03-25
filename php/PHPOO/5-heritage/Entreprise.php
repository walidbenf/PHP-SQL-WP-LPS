<?php
class Plombier{
   public function getSpecialite(){
       return 'Tuyaux, robinets, compteurs, etc. <br>';
   }
   public function getHoraires(){
       return '8h00, / 19h00 <br>';
   }
}

class Electricien{
   public function getSpecialite(){
       return 'Pose de cables, Tableaux électriques,  etc. <br>';
   }
   public function getHoraires(){
       return '10h00, / 17h00 <br>';
   }
}

class Entreprise {//La classe Entreprise n'hérite pas d'une autre classe

  public $numero = 0;

  public function appelEmploye($employe){

    $this->numero++;
    $this->{"monEmploye" . $this->numero } = new $employe;
    //1er Appel : je déclare la variable $this->monEmploye1 = new Plombier;

    return $this->{"monEmploye" . $this->numero};
  }

}
$entreprise = new Entreprise();
$entreprise->appelEmploye('Plombier');

//var_dump($entreprise);

echo $entreprise->numero . '<br />';
echo $entreprise->monEmploye1->getSpecialite() . '<br />';
//Habituellement nous mettons qu'une seule flèche, mais là, maVariable contient un objet (issue de la classe A), donc une autre flèche est possible. On peut donc y appeler les méthodes de l'objet concerné

$entreprise->appelEmploye('Electricien');

echo $entreprise->numero . '<br />';
echo $entreprise->monEmploye2->getSpecialite() . '<br />';
?>
