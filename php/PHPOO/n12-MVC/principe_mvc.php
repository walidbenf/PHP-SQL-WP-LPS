<?php
/*
Structure MVC : séparation des couches et des langages

	M : Model => echange avec la BDD (Requête SQL)
	V : View => affichage et présentation des données (HTML/CSS)
	C : Controller => traitements (PHP)

exemple : 
	- Dans le Model : je fais ma requête SQL qui va aller récupérer tous les produits de la BDD
	- Dans le Controller : je fais des traitements PHP et je décide d'afficher uniquement des produits 10 par 10
    - Dans la View : je présente les données, avec un affichage HTML/CSS qui sortent du traitement (Controller) issue de la requête SQL (Model)

Un seule et unique d'entrée : index.php

            Les FrontController (FC)
    
    Model                            Model
    
    BackController1 (BC)             BackController1 (BC) 

    View                             View 

exemple : Si un internaute clic sur le lien, il déclenche une action dans la 'view' qui va relancer le FrontController qui va choisir le BackController et qui communiquera le 'model' à la 'view' correspondante.

//------------------------------------------------------------------------------------------//
Avantages : 
    -Clarté de l'architecture :
        si le SGBD doit changer, on ouvrira juste les fichiers models que le developpeur utilisera.
        si le design doit changer, l'intégrateur ne risque pas de créer des conflits dans les traitement du codes.
    -Favorisé le travail collaboratif !

Inconvénients :
    -Nombre de fichier (trop complexe pour des petites applications, le temps accordé à l'architecture serait pas rentable sur de petits projets)

//------------------------------------------------------------------------------------------//

Schématisation de l'arborescence :

    Models/
        -membre
            -- fonction.inc.php

    Views/
        -membre
            -- connexion.html
            -- inscription.html
            -- profil.html
        -404.html
        -haut-site.html
        -menu.html
        -bas-site.html
        -style.css

    Controllers/
        -membre
            --connexion.php
            --inscription.php
            --profil.php

*/