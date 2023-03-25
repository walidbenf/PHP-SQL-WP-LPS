<?php

function inclusionAutomatique($nomDeLaClass){

    include_once($nomDeLaClass . '.php');

    echo 'On passe dans inclusionAutomatique ! <br>';
    echo "require($nomDeLaClass.php); <br>";
}

//------------------------------------------------------------//

spl_autoload_register('inclusionAutomatique');

//------------------------------------------------------------//
// spl_autoload_register() : permet d'executer une fonction lorsque l'interrupteur voit passer un 'new' dans le code.
// Le nom à coté du 'new' est récupéré et transmis automatiquement à la fonction
// Attention !! Pour que l'autoload fonction, il est Indispensable de respecter une convention de nommage sur les fichiers !