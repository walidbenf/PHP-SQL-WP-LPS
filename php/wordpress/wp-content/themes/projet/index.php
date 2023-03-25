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

    <?php endwhile; else: ?>
    <p>Contenu non trouvé.</p>

    <?php endif; ?>

</div>
<?php get_footer();//appel le footer.php ?>
