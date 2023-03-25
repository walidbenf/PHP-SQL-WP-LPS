<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 27/03/2019
 * Time: 11:04
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}
