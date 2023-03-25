<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name');?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory');//chemin vers le dossier du thème?>/style.css">
    <?php wp_head(); //Intégre les éléments de WP (css,js,barre d'administration coté front) ?>
</head>
<body <?php body_class(); //correspond au nom de la ressource en class css ?>>
<header>
    <div id="idinformations">
        <a href="<?php echo get_site_url(); //url du site dans le backoffice ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav>
        <?php wp_nav_menu(array ('theme_location' => 'primary'));// Menu principal, wp_nav_menu() permet de récupérer le menu que l'on a déclaré dans le fichier functions.php
        ?>
    </nav>
    <div id="description">
        <p class="texte-description">
            <?php bloginfo('description'); //description du site dans le backoffice?>
        </p>
    </div>

</header>

<?php get_sidebar(entete);// Appel du fichier sidebar-entete.php ?>
<section>
    <div class="container">


