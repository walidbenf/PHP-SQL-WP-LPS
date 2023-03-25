<?php get_header();// appel le header.php ?>

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

    <!--
    have_posts() : permet de savoi si il y a des articles
    the_post(): récupération des articles
    -->
    <h2>
        <a href="<?php the_permalink();//le lien du contenu ?>">
            <?php the_title();//affiche le titre ?>
        </a>
    </h2>
<div class="contenu">
    <?php the_content();?>
    <?php $telephone= getField('telephone');//permet de récupérer les infos du champ ?>
    <?php $adresse= getField('adresse');//permet de récupérer les infos du champ ?>
    <?php $horaires= getField('horaires');//permet de récupérer les infos du champ ?>
    <?php $type_de_cuisine= getField('type_de_cuisine');//permet de récupérer les infos du champ ?>
    <?php $brunch= getField('brunch');//permet de récupérer les infos du champ ?>
    <?php $photo= getField('photo');//permet de récupérer les infos du champ ?>

    <div class="photo"><?php echo $photo->label; ?> : <img src="<?php echo $photo->value; ?>" alt=""></div>

    <div class="adresse"><?php echo $adresse->label; ?> : <img src="<?php echo $adresse->value; ?>" alt=""></div>

    <div class="telephone"><?php echo $telephone->label; ?> : <img src="<?php echo $telephone->value; ?>" alt=""></div>

    <div class="horaires"><?php echo $horaires->label; ?> : <img src="<?php echo $horaires->value; ?>" alt=""></div>

    <div class="type_de_cuisine"><?php echo $type_de_cuisine->label; ?> : <img src="<?php echo $type_de_cuisine->value; ?>" alt=""></div>

    <div class="brunch"><?php echo $brunch->label; ?> : <img src="<?php echo $brunch->value; ?>" alt=""></div>

    <?php endwhile; else: ?>
        <p>Contenu non trouvé.</p>

    <?php endif; ?>

</div>
<?php get_footer();//appel le footer.php ?>

