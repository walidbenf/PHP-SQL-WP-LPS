<?php

//PDO : Php Data Object
/* --------------------------------------------------------
Exec() : 
	INSERT, UPDATE, DELETE : Exec() est utilisé pour la formulatio de requête ne retournant pas de résultat.
							Exec() renvoie le nombre de lignes affectées par la requête.

	Valeur retour :
		Echec : False (BOOLEAN)
		Succes : 1 (INT). Ce nombre peut bien evidemment etre suépérieur tout dépend du nombre d'enregistrements affectés par la requête.
--------------------------------------------------------
Query() :
	SELECT : Au contraire de Exec(), Query() est utilisé pour la formulation de requête retournant un ou plusieurs résultats.
	Valeur de retour :
		Echec : False (BOOLEAN)
		Succes : PDOStatement (Object)
--------------------------------------------------------
Prepare() -> Execute() : 
	INSERT, UPDATE, DELETE, SELECT : prepare() permet de préparer une requête mais ne l'exécute pas.
									execute() permet d'exécuter une requête préparée.
	Cette méthode est à préconiser si l'on exécute plusieurs fois la même requête et ainsi vouloir éviter le cycle : analyse / interprétation /exécution.
	Valeur de retour: 
		Prepare() renvoie TOUJOURS un PDOStatement (object)
		Execute() :
			Echec : False (BOOLEAN)
			Succes : PDOStatement (object)
--------------------------------------------------------
Toutes ces méthodes peuvent prendre un ou des arguments si nécessaire.
SAUF pour Exec() : $pdo représente mon objet PDO, quand j'execute une requête PDO, il me retourne un objet PDOStatement (qui n'est donc plus l'objet PDO .. !!!)

Permet d'afficher les erreurs et la requête après exécution: 
	Pour Exec() ou Query() :
		print '<pre>';
			print_r( $pdo->errorInfo() ); //sur l'objet PDO
		print '</pre>';
	Pour prepare() puis execute() :
		print_r( $resultat->errorInfo() ); //sur l'objet PDOStatement

Il est interessant d'utiliser Query ou Exec pour les requêtes en dur et d'utiliser prepare + execute pour les requêtes dynamiques (incluant du post , get, etc..)
*/

//------------------------------------------------------------------------//

$pdo = new PDO('mysql:host=localhost;dbname=entreprise_pole_s', 'root','');

print '<pre>';
    print_r(get_class_methods($pdo));
print '</pre>';

//------------------------------------------------------------------------//
echo '<h1>SELECT + Query + fetch() </h1>';

$pdostatement = $pdo->query('SELECT * FROM employes');

// print '<pre>';
//     print_r(get_class_methods($pdostatement));
//     // permet d'afficher les methodes de la classe PDOstatement
// print '</pre>';

// print '<pre>';
//     print_r(get_object_vars($pdostatement));
//     // permet d'afficher les propriétés de la classe PDOstatement
// print '</pre>';

$donnees = $pdostatement->fetch();

foreach ($donnees as $key => $value) {
    echo $key. '=>' . $value . '<br>';
}
// fetch() ressort la premire ligne de résultat et nous effectuons une boucle dessus pour afficher toutes les valeurs de chaque champs sur cette même ligne

//------------------------------------------------------------------------//
echo '<h1>SELECT + Query + fetch() renvoie plusieurs resultat si il est dans une boucles</h1>';

$r = $pdo->query('SELECT * FROM employes');

while ($contenu = $r->fetch()) {
    
    // A chaque tour de boucle, je lis le resultat suivant dans la table suite à ma requête

    echo '<div style="border: 1px solid;">';
        echo $contenu['id_employes']. '<br>';
        echo $contenu['prenom']. '<br>';
        echo $contenu['nom']. '<br>';
        echo $contenu['sexe']. '<br>';
        echo $contenu['service']. '<br>';
        echo $contenu['date_embauche']. '<br>';
        echo $contenu['salaire']. '<br>';
    echo '</div>';
}

//------------------------------------------------------------------------//
echo '<h1>SELECT + Query + fetch() et PDO::FETCH_ASSOC</h1>';

$r = $pdo->query('SELECT * FROM employes');

$donnees = $r->fetchAll(PDO::FETCH_ASSOC);
// fetchAll() retourne toutes les lignes de resultats dans un tableau multidimentionnel ( sans faire de boucle)

//------------------------------------------------------------------------//
echo '<h2>FOREACH</h2>';


foreach ($donnees as $key => $value) {

echo '<div style="border: 1px solid;">';

foreach ($value as $indice => $contenu) {
    
    echo "$indice : $contenu <br>";
    }
echo '</div>';
}

//------------------------------------------------------------------------//
echo '<h2>FOR</h2>';

for ($i=0; $i < count($donnees); $i++) { 
    
    echo '<div style="border: 1px solid;">';
        echo $donnees[$i]['id_employes']. '<br>';
        echo $donnees[$i]['prenom']. '<br>';
        echo $donnees[$i]['nom']. '<br>';
        echo $donnees[$i]['sexe']. '<br>';
        echo $donnees[$i]['service']. '<br>';
        echo $donnees[$i]['date_embauche']. '<br>';
        echo $donnees[$i]['salaire']. '<br>';
    echo '</div>';
}

//------------------------------------------------------------------------//
echo '<h2>While</h2>';

$i = 0;

while ($i < count($donnees)) {

   echo '<div style="border: 1px solid;">';
        echo $donnees[$i]['id_employes']. '<br>';
        echo $donnees[$i]['prenom']. '<br>';
        echo $donnees[$i]['nom']. '<br>';
        echo $donnees[$i]['sexe']. '<br>';
        echo $donnees[$i]['service']. '<br>';
        echo $donnees[$i]['date_embauche']. '<br>';
        echo $donnees[$i]['salaire']. '<br>';
    echo '</div>';
    $i++;
}

//------------------------------------------------------------------------//
echo '<h1>SELECT + Query + fetchAll() + columnCount() + getColumnMeta() </h1>';

$r = $pdo->query('SELECT * FROM employes', PDO::FETCH_ASSOC);
// Ici, on demande d'indéxer numériquement quand c'est toujours au stade 'd'objet'.

echo '<table border="1"><tr>';

    for ($i=0; $i < $r->columnCount(); $i++) { 
       
        // columnCount() methode de PDOstatement, qui permet de compté le nombre de colonnes de ma table.

        $colonne = $r->getColumnMeta($i);

        // getColumnMeta() methode de PDOstatement, qui permet de récupérer les infos sur le champs de la table.

        echo "<th>".$colonne['name']."</th>";
    }
    echo '</tr>';

    foreach ($r as $key => $value) {
        
        echo '<tr align="center">';
            foreach ($value as $indice => $contenu) {
                echo "<td>$contenu</td>";
            }
        echo'</tr>';
    }


echo'</table>';

//------------------------------------------------------------------------//
echo '<h1>Prepare() + execute() + fetch() </h1>';

$r = $pdo->prepare('SELECT * FROM employes WHERE nom = ?' );
// Le '?' est un marqueur

$r->execute( array("Durand") );
// "Durand" va remplacer le marqueur

print '<pre>';
    print_r( $r->errorInfo());
    // Si je fais une erreur sur prepare() ou execute(), on demande l'erreur via l'objet PDOstatement
print '</pre>';

$donnees = $r->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

echo '<br>';
//------------------------------------------------------------------------//
$r = $pdo->prepare('SELECT * FROM employes WHERE nom = nom' );
// Le ':nom' est un marqueur

$r->execute( array("nom" => 'Chevel') );

$donnees = $r->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//------------------------------------------------------------------------//
echo '<h1>BindParam() + Prepare() + execute() + fetch() </h1>';

$nom = 'Sennard';

$r = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom' );

$r->bindParam(':nom', $nom, PDO::PARAM_STR);
// On précise que bindParam() doit recevoir EXCLUSIVEMENT une variable

$r->execute();

$donnees = $r->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//------------------------------------------------------------------------//
echo '<h1>BindValue() + Prepare() + execute() + fetch() </h1>';

$nom = 'Thoyer';

$r = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom' );

$r->bindValue(':nom', 'Thoyer', PDO::PARAM_STR);
// On précise que bindValue() doit recevoir une variable soit une chaine de caractères

$r->execute();

$donnees = $r->fetch(PDO::FETCH_ASSOC);
var_dump($donnees);

//------------------------------------------------------------------------//
echo '<h1>BindValue() + Prepare() + execute() + fetch() + PDO::FETCH_OBJ </h1>';

$nom = 'Perrin';

$r = $pdo->prepare('SELECT * FROM employes WHERE nom = :nom' );

$r->bindValue(':nom', $nom);
// On précise que bindValue() doit recevoir une variable soit une chaine de caractères

$r->execute();


$donnees = $r->fetch(PDO::FETCH_OBJ);
// PDO::FETCH_OBJ : retourne des objets

print '<pre>';
     print_r($donnees);
print '</pre>';

echo $donnees->prenom;

//------------------------------------------------------------------------//
echo '<h1>Transaction + requete et annulation </h1>';

$r = $pdo->beginTransaction(); // Démmare une transaction

$r = $pdo->query('SELECT * FROM employes', PDO::FETCH_NUM );

echo '<table border="1"><tr>';

    for ($i=0; $i < $r->columnCount(); $i++) { 
       
        // columnCount() methode de PDOstatement, qui permet de compté le nombre de colonnes de ma table.

        $colonne = $r->getColumnMeta($i);

        // getColumnMeta() methode de PDOstatement, qui permet de récupérer les infos sur le champs de la table.

        echo "<th>".$colonne['name']."</th>";
    }
    echo '</tr>';

    foreach ($r as $key => $value) {
        
        echo '<tr align="center">';
            foreach ($value as $indice => $contenu) {

                echo "<td>$contenu</td>";
            }
        echo'</tr>';
    }


echo'</table>';

var_dump($pdo->inTransaction() ); // renvoie true si nous sommes dans une transaction à cet endroit précis, sinon false

// Si on s'aperçoit que l'on a fait une erreur et que l'on veut annuler une modification :

    $pdo->rollBack(); // Retour en arrière (annuler la transaction).

//------------------------------------------------------------------------//
echo '<h1> fetch_class() </h1>';

class Employes{

    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}

$r = $pdo->query('SELECT * FROM employes');

$objet = $r->fetchAll(PDO::FETCH_CLASS, 'Employes');

print '<pre>';
    print_r($objet);
print '</pre>';


foreach ($objet as $employe) {
    
    echo $employe->prenom . '<br>';
}
