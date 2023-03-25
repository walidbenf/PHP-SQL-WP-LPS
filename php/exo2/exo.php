<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 25/03/2019
 * Time: 13:46
 */

$bdd = new PDO('mysql:host=localhost;dbname=cams;charset=utf8', 'root', '');
//Connexion à la base de données
var_dump($bdd);
$reponse = $bdd->query('SELECT * FROM w3f');
//La requête pour vérifié si la table w3f est créé

$sql="CREATE TABLE w3f(
id_apprenant INT PRIMARY_KEY AUTO_INCREMENT,
prenom varchar(50),
nom varchar(50),
age INT,
avatar varchar(50)
)";
//Création de la table w3f avec les 4 champs suivants id_apprenant,prenom,nom,age,avatar.


$bdd->exec($sql);
//$donnees = $reponse->fetch();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire</title>
</head>
<body>
<h1>Formulaire</h1>
<form method="post" action="">
    <!-- method:comment vont circuler les données (get ou post)
    action:url de destination-->
    <label for="prenom">Prenom</label> <br>
    <input type="text" id="prenom" name="prenom"> <br> <br>

    <label for="nom">nom</label> <br>
    <input type="text" id="nom" name="nom"> <br> <br>

    <!-- NE SURTOUT PAS OUBLIER L'ATTRIBUT 'name' DANS LES INPUTS D'UN FORMULAIRE !!!
    => c'est ce qui permet de récupérer les valeurs via la superglobale : $_POST -->

    <label for="age">age</label> <br>
    <input type="number" id="age" name="age"> <br> <br>

    <label for="avatar">avatar</label> <br>
    <input type="text" id="avatar" name="avatar"> <br> <br>


    <input type="submit">
</form>
</body>
</html>
<?php
    //if((is_int($_POST['age'])) && (strlen($_POST['prenom']) <= 50) && (strlen($_POST['nom']) <= 50)) {
    $inscription = ("INSERT INTO w3f( prenom, nom, age, avatar) VALUES ( '$_POST[prenom]', '$_POST[nom]', '$_POST[age]', '$_POST[avatar]') ");
    $bdd->exec($inscription);
    //}

    //else {
    echo "ERREUR";
    echo $_POST['nom'] . ' '. $_POST['prenom'] . $_POST['age'] . $_POST['avatar'];
    //}
?>
