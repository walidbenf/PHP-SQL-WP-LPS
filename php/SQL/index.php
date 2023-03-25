<?php
$bdd = new PDO('mysql:host=localhost; dbname=mabase', 'root', '');
$requete = 'SELECT * FROM jeux_video ORDER BY nom ASC';
$requete3 = 'SELECT * FROM jeux_video WHERE console = "NES"';
$requete3 = 'SELECT * FROM jeux_video WHERE console = "NES"';
$requete4 = 'SELECT * FROM jeux_video WHERE prix BETWEEN "30" and "50"';
$requete5 = 'SELECT * FROM jeux_video WHERE possesseur = "Michel"';
$resultat = $bdd->query($requete);
$resultat2= $bdd->query($requete2);
/*$nom = $_POST['nom'];
$possesseur = $_POST['possesseur'];
$console = $_POST['console'];
$prix = $_POST['prix'];
$nbre_joueurs_max = $_POST['nbre_joueurs_max'];
$commentaires = $_POST['commentaires'];


$insertion = 'INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES ("$nom", "$possesseur", "$console", "$prix", "$nbre_joueurs_max", "$commentaires")';
*/
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>

  <body>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Possesseur</th>
      <th scope="col">Console</th>
      <th scope="col">Prix</th>
      <th scope="col">NB Joueurs</th>
      <th scope="col">Commentaire</th>
    </tr>
  </thead>
  <tbody>
  <?php while ($donnees = $resultat2->fetch()) {
    ?>
   <tr>
      <th scope="row"><?php $donnees['ID']; ?></th>
      <td><?php echo $donnees['nom']; ?></td>
      <td><?php echo $donnees['possesseur']; ?></td>
      <td><?php echo $donnees['console']; ?></td>
      <td><?php echo $donnees['prix']; ?></td>
      <td><?php echo $donnees['nbre_joueurs_max']; ?></td>
      <td><?php echo $donnees['commentaires']; ?></td>
    </tr>
<?php
}
?>

  </tbody>
</table>
<form>
  <div class="form-group">
    <label for="nom">nom</label>
    <input type="text" class="form-control" id="nom" placeholder="nom">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="possesseur">possesseur</label>
    <input type="text" class="form-control" id="possesseur" placeholder="possesseur">
  </div>
   <div class="form-group">
    <label for="console">console</label>
    <input type="text" class="form-control" id="console">
  </div>
  <div class="form-group">
    <label for="prix">prix</label>
    <input type="number" class="form-control" id="prix">
  </div>
  <div class="form-group">
    <label for="nbre_joueurs_max">nbre_joueurs_max</label>
    <input type="number" class="form-control" id="nbre_joueurs_max">
  </div>
  <div class="form-group">
    <label for="commentaire">commentaires</label>
    <textarea name="commentaires"
   rows="4" cols="40"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
  </body>
</html>
