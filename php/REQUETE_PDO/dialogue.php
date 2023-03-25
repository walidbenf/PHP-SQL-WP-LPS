<?php

    // 1 - Création d'une bdd : 'dialogue'

	// 2 - Création d'une table : 'commentaire' ( pseudo, message, date_enregistrement)

	// 3 - Connexion à la bdd

        $pdo = new PDO('mysql:host=localhost;dbname=dialogue', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));

        var_dump( $pdo );

    // 4 - Création d'un formulaire (avec les champs correspondants)

	// 5 - Insertion en base des messages postés
    
    

	// 6 - Affichage des messages

    // 7 - Affichage du nombre de message


?>


<form action="" method="post">
    <div>
        <label for="pseudo">Pseudo :</label>
        <input type="text" id="pseudo" name="pseudo">
    </div>
    <div>
        <label for="msg">Message :</label>
        <textarea id="msg" name="msg"></textarea>
    </div>
    <div>
        <label for="date">Date :</label>
        <input type="date" id="date" name="date">
    </div>
</form>