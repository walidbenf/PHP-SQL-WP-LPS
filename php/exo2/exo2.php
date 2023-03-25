<?php
//Création d'une base de données 'wf3' avec une table 'apprenant' comprenant 5 champs(id_apprenant, prenom, nom, age et avatar)
// CREATE DATABASE wf3;

// USE wf3;

// CREATE TABLE apprenant(
// 	id_apprenant int(3) NOT NULL auto_increment,
// 	PRIMARY KEY (id_apprenant),
// 	prenom varchar(30) NOT NULL,
// 	nom varchar(30) NOT NULL,
// 	age int(3) NOT NULL,
// 	avatar varchar(255) NOT NULL
// ) ENGINE=InnoDB;

//--------------------------------------------------------------------------
//Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=wf3', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8') );

//var_dump( $pdo );

//--------------------------------------------------------------------------
//Formulaire d'inscription avec les inputs pouvant renseigner les champs de notre table
?>
<form method="post" enctype="multipart/form-data">
    <!-- INDISPENSABLE !!!!!!!
        method="post" pour récupérer les données (grâce au 'name' des inputs)
        enctype="multipart/form-data" pour uploader des fichiers
     -->

    <label for="prenom">Prenom</label><br>
    <input type="text" name="prenom" id="prenom"><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" name="nom" id="nom"><br><br>

    <label for="age">Age</label><br>
    <input type="number" name="age" id="age"><br><br>

    <label for="avatar">Avatar</label><br>
    <input type="file" name="avatar" id="avatar"><br><br>

    <input type="submit" name="">

</form>

<?php
//--------------------------------------------------------------------------
//Insertion en base lors de la validation du formulaire
// =>gestion des erreurs : verification du nombre de caractère, l'age doit etre un INTEGER...

if( $_POST ){ //Si il a un post
    // print '<pre>';
    // 	print_r($_FILES);
    // print '</pre>';

    //---------
    //GESTION DES ERREURS !!!!!  strlen(), substr() et preg_match(arg1, arg2) arg1 = #[^0-9]#
    //---------

    //Si les champs ne sont pas vides on fait une insertion
    if( !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['age'])  ){

        //Requête d'insertion
        $r = $pdo->query("INSERT INTO apprenant(prenom, nom, age, avatar) VALUES('$_POST[prenom]', '$_POST[nom]', '$_POST[age]', 'NULL')");

        if( isset($r) ){

            $id = $pdo->lastInsertId();

            if( !empty($_FILES['avatar']['name'])){ //Si vous avez uploader un fichier

                $name_avatar = explode('.' , $_FILES['avatar']['name']);
                $text = end($name_avatar); //l'extension

                //renommage de la photo
                $nom_avatar = 'apprenant_'. $id . '.' . $text;

                //chemin pour accéder à la photo en bdd
                $avatar_bdd = "http://localhost/formationPierrefitte/PHP/entrainement/$nom_avatar";

                //Où est ce que l'on stocke la photo
                $avatar_dossier = $_SERVER['DOCUMENT_ROOT'] . "/formationPierrefitte/PHP/entrainement/$nom_avatar";

                copy( $_FILES['avatar']['tmp_name'], $avatar_dossier );

                $r = $pdo->query("UPDATE apprenant SET avatar='$avatar_bdd' WHERE id_apprenant = $id");

            }
        }
    }
    else{

        echo '<p style="color:red;">Veuillez remplir tous les champs</p>';
    }
}


//--------------------------------------------------------------------------
//Affichage des informations de la bdd sous forme de tableau
$r = $pdo->query("SELECT * FROM apprenant"); //Requête SELECT pour récupérer les infos issues de la bdd
?>

<table border="1">
    <tr>
        <?php
        for ($i=0; $i < $r->columnCount() ; $i++) {

            $colonne = $r->getColumnMeta($i);

            echo "<th>$colonne[name]</th>";
        }
        ?>
    </tr>
    <?php
    while ( $apprenant = $r->fetch(PDO::FETCH_ASSOC) ) {
        //Ici, la méthode fetch() permet d'exploiter les données !!
        ?>
        <tr>
            <?php
            foreach ($apprenant as $key => $value) {

                if( $key == 'avatar'){

                    echo '<td><img src="'. $value.'" width="80"></td>';
                }
                else{

                    echo "<td>$value</td>";
                }
            }
            ?>
        </tr>
        <?php
    }
    ?>
</table>



