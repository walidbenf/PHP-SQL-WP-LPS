<?php require_once('init.inc.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mon site boutique</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<!-- CDN CSS BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- CSS PERSO -->
	<link rel="stylesheet" type="text/css" href="">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= URL ?>index.php">logo</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>index.php">Accueil</a>
      </li>

<?php if( adminConnect() ) : ?>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          BackOffice
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= URL ?>admin/gestion_boutique.php">Gestion boutique</a>
          <a class="dropdown-item" href="<?= URL ?>admin/gestion_membre.php">Gestion membre</a>
            <a class="dropdown-item" href="<?= URL ?>admin/gestion_commande.php">Gestion commande</a>
        </div>
      </li>

<?php endif; ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>panier.php">Panier</a>
      </li>

<?php if( userConnect() ) : ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>profil.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>connexion.php?action=deconnexion">Deconnexion</a>
      </li>

<?php else : ?>

      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>inscription.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= URL ?>connexion.php">Connexion</a>
      </li>

<?php endif; ?>

    </ul>
  </div>
</nav>

	<div class="container">
