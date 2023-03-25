<?php
// PDO : PHP DATA OBJECT

/**
 *      => EXEC() :
 *          
 *              INSERT, UPDATE, DELETE :
 *                      exec() est utilisé pour la formulation de requêtes ne retournant pas de résultat !!
 *                      exec() renvoie le nombre de lignes affectées par la requête
 * 
 *              Valeur de retour :
 *                      Echec : false
 *                      Succès : 1 (ce nombre varie selon le nombre d'enregistrement affecté par la requête)
 */

 //-------------------------------------------------------//
 
 //Query() :
 //SELECT : Au contraire d'exec(), query, est utilisé  pour la formulation de requêtes retournant un ou plusieurs résultats.

 // Valaeur de retour : Echec : false, Succès : pdostatement (object)

 //-------------------------------------------------------//

 // => PREPARE() puis EXECUTE() :

 // SELECT, INSERT, UPDATE, DELETE :

 // prepare() : permet de préparer la requête SANS l'exécuter
 // execute() : permet d'exécuter la requête préparée
 
 // Valeur de retour :

 // prepare() : renvoie toujours un PDOStatement (object)
 // execute() : Echec : false
//              Succès : PDOStatement (object)

// => les requêtes préparées sont à préconiser si vous exécuter plusieurs fois la même requêtes et ainsi éviter de répéter le cycle (analyse / interprétation, exécution)

// => Les requêtes préparées sont souvent utilisées pour assainir les données ( exemples : prepare() / bindValue() / execute() )

 //-------------------------------------------------------//

echo '<h1>PDO : Connexion à la BDD</h1>';



$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));

// argument de PDO :
    //1er arg : serveur + bdd
    //2è arg : identifiant
    //3è arg : mot de passe
    //4è arg : option (ici, gestion des erreurs et encodage utf8)

var_dump( $pdo );

print '<pre>'; 
    print_r(get_class_methods($pdo)); // affiche les methodes de l'objet PDO
print '</pre>';

  //-------------------------------------------------------//
echo '<h1>PDO : exec(), insert, update, delete</h1>';


//$resultat = $pdo->exec('INSERT INTO employes(prenom, nom, sexe, service, date_embauche, salaire) VALUES("test", "test","f","informatique","2019-01-01", 1000)');

//echo "Nombre d'enregistrement affecté par la requête INSERT : $resultat <br>";

echo "Dernier id généré : ". $pdo->lastInsertId() . '<br>';

$resultat = $pdo->exec('UPDATE employes SET salaire =4444 WHERE id_employes = 992');

$resultat = $pdo->exec('DELETE FROM employes WHERE id_employes = 991');

// LES REQUETES DELETE SONT IRREVERSIBLES

  //-------------------------------------------------------//
  echo '<h1>PDO : query(), select, fetch()</h1>';

  $pdostatement = $pdo->query('SELECT* FROM employes WHERE prenom="julien"');

  var_dump($pdostatement);

print '<pre>';
    print_r(get_class_methods($pdostatement)); // affiche les methodes de l'objet PDOStatement
print '</pre>';

$employe = $pdostatement->fetch(PDO::FETCH_ASSOC); // fetch() permet de récupérer les résultats

print '<pre>';
    print_r($employe);
print '</pre>';

echo "<br>Bonjour, je suis $employe[prenom] $employe[nom] du service$employe[service]. <br>";

echo '<br>Bonjour, je suis'. ' ' . $employe['prenom']. ' ' . $employe['nom'].' ' . 'du service' .$employe['service'].'<br>';

 //-------------------------------------------------------//
  echo '<h1>PDO : query(), while(), select, fetch()</h1>';

  $pdostatement = $pdo->query('SELECT * FROM employes');

  var_dump( $pdostatement );

  echo "Nombre d'employés :" . $pdostatement->rowCount() . '<br>';
  // rowCount() permet de compter le nombre de lignes retournées

  while($contenu = $pdostatement->fetch(PDO::FETCH_ASSOC)){

    print '<pre>';
        print_r($contenu);
    print '</pre>';

    echo '<div style = "padding:10px; background: #eee; margin:20px;">';
                echo $contenu['id_employes'] . '<br>';
                echo $contenu['prenom'] . '<br>';
                echo $contenu['nom'] . '<br>';
                echo $contenu['sexe'] . '<br>';
                echo $contenu['date_embauche'] . '<br>';
                echo $contenu['salaire'] . '<br>';
    echo '</div>';

  }

  // Attention : il n'y a pas qu'un tableau array avec tous les enregistrements MAIS bien un tableau PAr enregitrement (donc par employé)

  // Requete qui sort plusieur résultats => boucle !
  // Requete qui sort 1 seul résultat => pas de boucle !
  // Requete qui sort 1 seule résultat mais qui peut potentiellement sortir plusieurs => boucle !

  //-------------------------------------------------------//
  echo '<h1>PDO : query(), while(), select, fetchAll()</h1>';

  $pdostatement = $pdo->query('SELECT * FROM employes');

  $donnees = $pdostatement->fetchAll(PDO::FETCH_ASSOC); // fetchAll() permet de retoruner toutes les lignes de résultat d'un tableau multidimentionnel

//    print '<pre>';
//         print_r($donnees);
//     print '</pre>';

    foreach ($donnees as $contenu) {
        echo '<div style = "padding:10px; background: #eee; margin:20px;">';

                foreach ($contenu as $key => $value) {
                    
                    echo $key . ':' . $value . '<br>';

                }

        echo '</div>';
    }


//-------------------------------------------------------------------------//
  echo '<h1>PDO : query(), arrays</h1>';

  $pdostatement = $pdo->query('SELECT * FROM employes');

  echo '<table border="1">';

            echo '<tr>';
                // $ok = $pdostatement->columnCount();
                // var_dump($ok);
                for ($i=0;$i < $pdostatement->columnCount(); $i++){

                    $colonne = $pdostatement->getColumnMeta($i);

                    // print '<pre>';
                    //     print_r($colonne);
                    // print '</pre>';

                    echo '<th>'.$colonne['name'].'</th>';

                }
            echo '</tr>';


            while($ligne = $pdostatement->fetch(PDO::FETCH_ASSOC)){

                // print '<pre>';
                //      print_r($ligne);
                // print '</pre>';

                echo '<tr>';
                foreach ($ligne as $value) {
                    echo "<td>$value</td>";
                }
                echo '</tr>';

            }

  echo '</table>';

  //-------------------------------------------------------------------------//
  echo '<h1>PDO : prepare() => bindPAram() => execute()</h1>';

  $nom = 'Winter';

$pdostatement = $pdo->prepare('SELECT *FROM employes WHERE nom = :nom');
// :nom est un marqueur nominatif

$pdostatement->bindParam(':nom', $nom, PDO::PARAM_STR);
//BindPARAM() reçoit exclusivement une varaiable !!

$pdostatement->execute();

$info = $pdostatement->fetch(PDO::FETCH_ASSOC);

echo '<br>' . implode($info, ' / ');


  //-------------------------------------------------------------------------//
  echo '<h1>PDO : prepare() => bindValue() => execute()</h1>';


  $pdostatement = $pdo->prepare('SELECT *FROM employes WHERE nom = :nom');
// :nom est un marqueur nominatif

$pdostatement->bindValue(':nom', 'Dubar', PDO::PARAM_STR);
//BindValue() reçoit soit une variable soit une chaine

$pdostatement->execute();

$dubar = $pdostatement->fetch(PDO::FETCH_ASSOC);

echo '<br>' . implode($dubar, ' / ');

?>
