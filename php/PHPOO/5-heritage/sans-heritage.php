<?php

Class A{

  public function direBonjour() {
    return 'Bonjour';

  }
}

class B{//La classe B n'hérite pas de la classe A !

public $maVariable;

public function __construct(){

  $this->$maVariable =new A; //Je crée un objet A que je déplace dans ma propriété '$maVariable' de mon objet B.
}

}
 ?>
