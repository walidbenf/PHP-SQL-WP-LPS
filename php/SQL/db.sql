-- Afficher les numéros des livres qui n'ont pas été rendus :
	-- resultat : 100, 105

SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;

-- => La valeur NULL se teste avec le mot clé 'IS' ! (à la palce du '=')

-- -----------------------------------------------------------------------
-- REQUETES IMBRIQUEES : (sur plusieurs tables)

-- Afficher les abonnés ayant emprunté un livre le 07-12-2016
	-- resultat: guillaume, Benoit

SELECT prenom FROM abonne WHERE id_abonne IN ( SELECT id_abonne FROM emprunt WHERE date_sortie = '2016-12-07' );

-- Afficher les titres des livres qui n'ont pas été rendus
	-- resultat : Une vie, les trois mousquetaires

SELECT titre FROM livre WHERE id_livre IN ( SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- Afficher les abonnés N'AYANT pas rendu les livres : 
	-- Resultat : Benoit, Cholé

SELECT prenom FROM abonne WHERE id_abonne IN ( SELECT id_abonne FROM emprunt WHERE date_rendu IS NULL );

-- Afficher le nombre de livres que Guillaume a emprunté à la bibliothèque
	-- => resultat : 2

SELECT COUNT(*) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='Guillaume');

-- Afficher les prénoms des abonnés ayant déjà emprunté un livre d'Alphonse Daudet:
	-- => Resultat :'Laura'

SELECT prenom FROM abonne WHERE id_abonne IN( 
	SELECT id_abonne FROM emprunt WHERE id_livre IN( 
		SELECT id_livre FROM livre WHERE auteur='Alphonse Daudet') );

-- Afficher les numéros et les titres des livres que Chloé a emprunté à la bibliothèque:
	-- => Resultat : 100, 105 ('une vie', 'les trois mousquetaires')
          
SELECT titre, id_livre FROM livre WHERE id_livre IN( SELECT id_livre FROM emprunt WHERE id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom='Chloe') );

-- Afficher les titres des livres que chloé n'a pas encore emprunté à la bibliothèque:
	-- => 'Bel-ami', 'Le père Goriot', 'Le petit chose', 'La Reine Margot'

SELECT titre FROM livre WHERE id_livre NOT IN( SELECT id_livre FROM emprunt WHERE id_abonne IN( SELECT id_abonne FROM abonne WHERE prenom='Chloé' ) );

-- Afficher les titres des livres que chloé n'a pas encore rendu à la bibliothèque:
	-- => Resultat : 'Les trois mousquetaires'

SELECT titre FROM livre WHERE id_livre IN( SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN(SELECT id_abonne FROM abonne WHERE prenom="Chloé") );

-- Qui a emprunté le plus de livre à la bibliothèque : (Benoit)
SELECT prenom FROM abonne WHERE id_abonne = ( SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_abonne) DESC LIMIT 0,1 );

-- ----------------------------------------------------------------------
-- JOINTURES : 
-- Différence entre jointure et requêtes imbriquées :
-- Les deux permettent de faire des relations entres les différentes tables afin d'avoir des colonnes associées pour ne former qu'un seul résultat.

-- Une jointure sera possible DANS TOUS LES CAS !
-- Des requêtes imbriquées ne seront possibles SEULEMENT dans le cas où le résultat est issue d'une même table.


-- Afficher les dates de sorties et de rendues pour l'abonne guillaume : 
	-- Guillaume | 2011-12-17 | 2011-12-18
	-- Guillaume | 2011-12-19 | 2011-12-28

SELECT date_sortie, date_rendu FROM emprunt WHERE id_abonne = ( SELECT id_abonne FROM abonne WHERE prenom='Guillaume' );


SELECT abonne.prenom, emprunt.date_sortie, emprunt.date_rendu
FROM abonne, emprunt
WHERE abonne.id_abonne = emprunt.id_abonne
AND abonne.prenom = 'Guillaume';


SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne
AND a.prenom = 'Guillaume';


-- exercice : Nous aimerions connaitre les mouvements des livres (date de sortie et de rendu) écrit par « Alphonse Daudet » : (2 solutions)
-- +-------------+------------+
-- | date_sortie | date_rendu |
-- +-------------+------------+
-- | 2014-12-19  | 2014-12-22 |
-- +-------------+------------+
SELECT e.date_sortie, e.date_rendu
FROM emprunt e, livre l
WHERE e.id_livre = l.id_livre
AND l.auteur = 'Alphonse Daudet';

SELECT date_sortie, date_rendu FROM emprunt WHERE id_livre IN( 
	SELECT id_livre FROM livre WHERE auteur = 'Alphonse Daudet');
    
-- ----------------------------------------------------------------
-- exercice: Qui a emprunté le livre "Une Vie" sur l'année 2016' ? : (2 solutions)
-- +-----------+
-- | prenom    |
-- +-----------+
-- | guillaume |
-- | chloe     |
-- +-----------+

SELECT prenom FROM abonne WHERE id_abonne IN( 
	SELECT id_abonne FROM emprunt WHERE date_sortie LIKE '2016%' AND id_livre IN(
		SELECT id_livre FROM livre WHERE titre = 'Une vie') );

SELECT a.prenom
FROM abonne a, livre l, emprunt e
WHERE a.id_abonne = e.id_abonne
AND l.id_livre = e.id_livre
AND l.titre = 'Une vie'
AND e.date_sortie LIKE '2016%';


------------------------------------------------------------------
-- exercice : Nous aimerions connaitre le nombre de livre(s) emprunté(s) par chaque abonné. :
-- +-----------+----------------------+
-- | prenom    | nb de livre emprunte |
-- +-----------+----------------------+
-- | guillaume |                    2 |
-- | benoit    |                    3 |
-- | chloe     |                    2 |
-- | laura     |                    1 |
-- +-----------+----------------------+
SELECT abonne.prenom, COUNT(*) AS 'Nombre de livre empruntés'
FROM abonne, emprunt
WHERE abonne.id_abonne = emprunt.id_abonne
GROUP BY abonne.id_abonne;


-- ------------------------------------------------------------
-- exercice : Nous aimerions connaitre le nombre de livre(s) a rendre pour chaque abonné. :
-- +--------+----------------------+
-- | prenom | nb de livre a rendre |
-- +--------+----------------------+
-- | Benoit |                    1 |
-- | Chloe  |                    1 |
-- +--------+----------------------+

SELECT ab.prenom, COUNT(*) AS 'nombre de livre à rendre'
FROM abonne ab, emprunt em
WHERE ab.id_abonne = em.id_abonne
AND em.date_rendu IS NULL
GROUP BY ab.prenom;


-- ----------------------------------------------------------------
-- exercice : Qui a emprunté Quoi ? et Quand ? (Titre des livres emprunté, à quel date, et savoir par qui).
-- +-----------+-------------+-------------------------+
-- | prenom    | date_sortie | titre                   |
-- +-----------+-------------+-------------------------+
-- | guillaume | 2011-12-17  | Une vie                 |
-- | guillaume | 2011-12-19  | La Reine Margot         |
-- | benoit    | 2011-12-18  | Bel-Ami                 |
-- | benoit    | 2012-03-20  | Les Trois Mousquetaires |
-- | benoit    | 2012-06-15  | Une vie                 |
-- | chloe     | 2011-12-19  | Une vie                 |
-- | chloe     | 2012-06-13  | Les Trois Mousquetaires |
-- | laura     | 2011-12-19  | Le Petit chose          |
-- +-----------+-------------+-------------------------+

SELECT a.prenom, l.titre, e.date_sortie
FROM abonne a, livre l, emprunt e
WHERE a.id_abonne = e.id_abonne
AND l.id_livre = e.id_livre;


-- -------------------------------------------------------------
-- exercice/exemple : Afficher les prenoms des abonnés avec les no des livres quils ont emprunté.
-- +-----------+----------+
-- | prenom    | id_livre |
-- +-----------+----------+
-- | guillaume |      100 |
-- | guillaume |      104 |
-- | benoit    |      101 |
-- | benoit    |      105 |
-- | benoit    |      100 |
-- | chloe     |      100 |
-- | chloe     |      105 |
-- | laura     |      103 |
-- +-----------+----------+

SELECT a.prenom, e.id_livre
FROM abonne a, emprunt e
WHERE a.id_abonne = e.id_abonne;

SELECT a.adresse, c.cp,v.ville,
FROM  membre a, membre c, membre v
WHERE a.id_membre = ;










