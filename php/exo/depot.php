<?php
$extensions=array('pdf', 'doc', 'txt', 'rtf','docx');
$extensions_upload = strtolower(  substr(  strrchr($_FILES['fileToUpload']['name'], '.')  ,1)  );
if (in_array($extensions_upload,$extensions)) {
   echo "Extension correcte";
}
//if( !empty($_FILES['fileToUpload']['nom']) ){

    //Ici, on renommme la photo :
    $nom_fichier = $_POST['nom'];

    //chemin pour accéder à la photo en BDD :
    //$photo_bdd = URL . "photo/$nom_photo";
    $namee =basename($_FILES['fileToUpload']['name']);
    //Ou est ce qu'on veut stocker notre photo:
    $dossier = $_SERVER['DOCUMENT_ROOT'] . "/formationPierrefitte/php/exo/lesCV/$nom_fichier";
    copy( $_FILES["$namee"]['tmp_name'], $dossier );
    //copy( arg1, arg2 ) fonction prédéfinies de php où l'arg1 = chemin du fichier sourceet l'arg2 = chemin de destination
//}

/*
$type = strtolower(pathinfo($fichier,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
$verif=;
  if($check !== false) {
      echo "Le fichier est une image" . $check["mime"] . ".";
      $uploadOk = 1;
  } else {
      echo "Le fichier n'est pas une image";
      $uploadOk = 0;
  }
}
*/
  ?>
