<?php
class Animal {
  protected function deplacement() {

    return 'Je me déplace <br>';

  }
  public function manger() {

    return 'Je mange <br>';
  }
}

class Elephant extends Animal {

  public function quiSuisJe() {
    return 'Je suis un éléphant et'. $this->deplacement() . '<br>';
    //On utilise la fonction déplacement () issue de ma classe Animal par héritage et qui est 'protected'. Cette fonction 'protected' est UNIQUEMENT exécutable dans le parent(ici, la classe Animal) OU dans l'enfant (ici, la classe Elephant).
    //Je n'utilise pas "Animal::" mais seulement dans le cas où j'aurais à la redéfinir
  }
}
class Chat extends Animal {

  public function quiSuisJe() {
    return 'Je suis un chat <br>';
  }

  public function manger() {//redéfinition de la méthode, ici, manger()
    return 'Je mange comme un chat <br />';

  }
}

$elephant1 = new Elephant();
//var_dump($elephant1)

echo 'Elephant :' . $elephant1->manger();
echo 'Elephant :' . $elephant1->quiSuisJe();
//echo 'Elephant :' . $elephant1->deplacement(); //ERROR, j'hérite bien de la méthode deplacement() MAIS JE NE PEUX faire appel à elle QUE DANS UNE CLASSe !

$chat1 = new Chat();
//var_dump($elephant1)

echo 'Chat :' . $chat1->manger();
//L'interpréteur cchercher d'abord dans la classe Chat, et SEULEMENT SI la méthode n'existait pas il serait allé chercher la méthode manger() dans la classe donc j'hérite, ici, Animal
?>
