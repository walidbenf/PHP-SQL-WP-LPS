<?php require "inc/header.inc.php"; //incude du header pour toutes les pages et éviter des tonnes de lignes de codes ?>

<body>
  <style media="screen">
  body{
    background: #fff;
  }
  </style>
<body>
  <center>
    <form action="" method="post">

        <label for="Entreprise"> Entreprise:</label>
        <input type="text" name="entreprise" id="entreprise"><br><br>

        <label for="date">Poste :</label>
        <input type="text" name="poste" id="poste"><br><br>

        <label for="date">Date :</label>
        <input type="text" name="date" id="date"><br><br>


        <label for="tache">Tâches :</label>
        <input type="text" name="tache" id="tache"><br><br>

        <input type="submit" value="Ajouter">

    </form>
  </center>
</body>

<?php require "inc/footer.inc.php"; //incude du footer pour toutes les pages et éviter des tonnes de lignes de codes ?>
