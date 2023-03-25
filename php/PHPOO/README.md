# Intro
3 moyens de créer un site web:
	- from scratch (quand on part de zéro)
	- cms
	- framework

-------------------------------------------------
Orienté objet : 
	Inconvénients :
		- Techniquement, on ne peut rien faire de plus avec l'Orienté Objet q'avec le procédural
		- En général, l'approche OO est moins intuitive que l'approche procédural
		=> En effet, il est plus facile de décomposer un problème séquentiellement ligne par ligne qu'avec une intéraction entre les objets (permet une meilleur évolution vers les autres langages: c++, java, c#...)
		- Légère perte de performance, car on passe par des méthodes (get et set) au lieu de travailler directement sur la variable ou la structure.

	Avantages :
		- Modulariser afin d'avoir un code évolutif. Si on a une série de if/else à changer à droite à gauche, en procédural il faudrait aller dans tous les fichiers dans lequel on doit faire des modifications alors qu'avec l'OO, on aura juste à modifier le module correspondant.
		- Encourage le travail collaboratif (pas besoin d'ouvrir toutes les pages, l'UML permet d'écrire le comportement de l'application et les intéractions entre objets)
		- Masquer la complexité grâce au principe d'encapsulation.
			=> En effet, il est plus simple de lire:
				panier->affichage() plutot qu'une série de if/else et de boucle
		- Possibilité de documenter son code.
		- Ré-utiliser le code, ne pas repartir de zéro. Effectuer un code type pouvant etre repris sur d'autres objets.
		- Faciliter la maintenance et les mises à jour.
			=> tout se passe dans la classe en question.
		- Assouplir le code, factorisation du code : meilleur conceptualisation.
			=> les pages seront moins chargées.
		- Plus d'options dans le langage (encapsulation, heritage, exception, interface,...)

-------------------------------------------------------------
Vocabulaire :

	variable = propriété (= attribut)
	fonction = methode
	objet = instance

	Une variable : permet de contenir une information
	Un array : permet de contenir plusieurs informations
	Une classe : permet de contenir: des propriétés et des méthodes comportant des traitements
	L'objet qui permet d'atteindre les éléments contenus dans la classe

		Class : (= plan, modele)
			Une classe est un regroupement d'informations (propriétés, valeurs, méthodes) relatives à un sujet global !
		Objet : (= application du plan)
			Un objet permet d'atteindre/d'accéder aux informations contenues dans la classe !

	Exemple: Class Voiture
				Objet = 'objet voiture'
					propriétés : $couleur, $taille, etc.
					méthodes : demarrer(), rouler(), etc.

-----------------------------------------------------------
3 bonnes questions à se poser quand on développe: 
	- Mon projet est-il compréhensible pour les autres dev ?
	- Mon projet est-il réutilisable par un autre dev ou est-ce qu'il devra réécrire toutes les classes ?
	- Mon projet prévoit-il des évolutions futures ?
