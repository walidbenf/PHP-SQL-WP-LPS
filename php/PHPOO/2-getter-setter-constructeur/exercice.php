<?php

/**
 * Exercice :
 * 
 * Créer une classe Membre, avec les propriétés pseudo et mdp (qui doivent être en 'private')
 * 
 * et faite en sorte que le pseudo doit être inférieur à 15 caractère et supérieur a 0... ET que ce soit un string <!DOCTYPE html>
 * 
 * => objetif : afficher le pseudo et le mdp
 */

 class Membre{

    private $pseudo;
    private $mdp;

    public function setPseudo($p){

        if(strlen($p) < 15 && strlen($p) > 0){

            if(is_string( $p ) ){

                $this->pseudo = $p;
            }
        }
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setMdp($m){

        $this->mdp = $m;
    }

    public function getMdp(){
        return $this->mdp; 
    }
 }
//---------------------------------------------------------------------//

 $personne1 = new Membre();
// var_dump($personne1);

$personne1->setPseudo('polo'); 

echo '<br>Pseudo : '.$personne1->getPseudo(). '<br>'; 

$personne1->setMdp('momo');

echo '<br> Mot de passe : '.$personne1->getMdp(). '<br>';

