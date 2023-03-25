<?php require_once('name_space.php');?>
<?php

// Error : on ne peut pas déclarer 2 fonction ou 2 classes avec le même nom !

    // function test(){}
    // function test(){}
    // class test{}
    // class test{}

echo A\ville() . '<br>';
echo A\strlen() . '<hr>';

echo B\ville() . '<br>';
echo B\strlen() . '<hr>';

//----------------------------------------------------------//
/*
Les namespaces permettent de classer mes 'class'
Pratique pour classer les fonctions
Evite à plusieurs développeurs trabaillant sur le même projet de rentrer en collision lors d'un nommage méthode ou d'une classe
*/