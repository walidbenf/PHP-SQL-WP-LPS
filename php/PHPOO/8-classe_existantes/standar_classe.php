<?php

$tableau = array('orange', 'fraise', 'fruit');

$objet1 = (object) $tableau; // transformation (cast)

var_dump($objet1);

echo '<hr>';
// Un objet fait partis de la STdClass (classes standar php) lorsque celui-ci est 'orphelin' et n'a pas été instancié par un 'new' d'une classe particulière

$objet2 = new StdClass();

$objet2->titre = 'PoleS';

var_dump($objet2);

    echo '<br>'. $objet2->titre;