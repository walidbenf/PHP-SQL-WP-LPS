<?php
//Pattern : Iterator
    // pattern : permet de rpoposer une solution commune pour résoudre des problèmes récurrents.
    // Iterator : permet de parcourir des éléments de natures différentes

$fruit = array('p' =>'pomme', 'f'=>'fraise', 'c' => 'cerise');

$it1 = new ArrayIterator($fruit);

print '<pre>';
    print_r(get_class_methods($it1) );
print '</pre>';

$it1->rewind(); // rewind() permet de se placer au début du tableau

while( $it1->valid() ){// valid() permet de verifier s'il y a des informations à parcourir

    echo $it1->key() . '=>' . $it1->current() . '<br>';
    // key() : affiche l'indice
    // current() : affiche la valeur

    $it1->next(); // next() : permet de passé à l'élément suivant
 }

//---------------------------------------------------------------------------//
echo '<hr>';

$it2 = new DirectoryIterator('..');

print '<pre>';
    print_r(get_class_methods($it2));
print '</pre>';

$it2->rewind();

while($it2->valid()){

     echo $it2->key() . '=>' . $it2->current() . '<br>';
    
     $it2->next();
}

//---------------------------------------------------------------------------//
echo '<hr>';

class listing{

    public function getListing($it){

        $it->rewind();

        while($it->valid()){

             echo $it->key() . '=>' . $it->current() . '<br>';
                
             $it->next();
        }

    }
}

//---------------------------------------------------------------------------//
$listing = new Listing();

$listing->getListing($it1);
echo '<hr>';
$listing->getListing($it2);