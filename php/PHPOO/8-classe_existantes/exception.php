<?php
// Exception : version procédural et tendance Orienté Objet
// L'avantage des exceptions, c'est de centraliser un traitement à effectuer dans le catch en cas d'erreur.

function recherche ($tab, $element){

    if(!is_array($tab)){

        Throw new Exception('Vous devez envoyez un Array !');
        // Throw : permet de nous envoyer dans le bloc catch et d'arrêter l'execution du code.
    }
    if(sizeof($tab)<= 0){

        Throw new Exception('Vous devez envoyez un Array avec du contenu !');
        // Throw : permet de nous envoyer dans le bloc catch et d'arrêter l'execution du code.
    }
    $position = array_search($element, $tab);
    return $position;
}

//------------------------------------------------------//
$tab = array();
$liste = array('orange', 'pomme', 'fraise');

try{// bloc d'essai ( on essaie d'effectuer les instruction suivante dans le try)

    echo recherche( $liste, 'pomme'). '<br>';
    echo recherche( $tab, 'pomme'). '<br>';
    echo recherche( 'tableau', 'pomme'). '<br>';
    echo "Traitement php...";
}
catch(Exception $e){// bloc de capture. On va attraper les exceptions 'Exception' s'il y en a une qui est relevée.
    // $e représente l' "Exception" car en renseignant le 'Throw', je n'ai pas pu mettre le nom d'une variable puisque l'exception est stoppée pour arriver dans le catch.

    echo "Message d'erreur : " .$e->getMessage().'<br>';
    echo "Traitement conforme dans le cas où l'argument ne soit pas un array, ou que l'argument soit un Array vide. <br>";

    echo "Information : ".$e->getCode().'<br>';
    echo "Message : ".$e->getMessage().'<br>';
    echo "Fichier : ".$e->getFile().'<br>';
    echo "Ligne : ".$e->getLine().'<br>';

}

//------------------------------------------------------------//

// Exception : est une classe prédéfinie
//  Une 'Exception' est une erreur que l'on peut attraper grace à try/catch
// Throw : permet d'arrêter l'éxecution du 'try' et de rentrer dans le 'catch'
// try/catch : permet d'avoir 2 blocs d'instructions distinctes.

//------------------------------------------------------------//
echo '<hr><hr>';

try{

    $bdd = new PDO('mysql:host=localhost;dbname=test', 'root','');
    // Tentative de connexion à la bdd.

    echo 'Connexion réussie !'; // si la connexion est réussi, alors cette instruction sera exécutée.
}

catch(PDOException $e){// on attrape les exceptions PDOException

    echo 'la connexion à la BDD a échoué !';

}

print '<pre>';
    print_r(get_class_methods($e));
print '</pre>';