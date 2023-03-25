<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 27/03/2019
 * Time: 13:52
 */
add_action('widgets_init', 'theme_init_sidebar'); // J'éxecute la fonctionne nommée : theme_init_sidebar
function theme_init_sidebar() {//fonction qui contient déclaration de mes régions
    if(function_exists('register_sidebar')) {
        //SI la fonction 'register_sidebar' existe(fonction interne de WP), je déclare les régions.
        register_sidebar (array('name' => __('region-header', 'theme'), 'id'=> 'region-header', 'description' =>__('Add widgets here to appear in your header region', 'theme')));

        register_sidebar (array('name' => __('region-footer', 'theme'), 'id'=> 'region-footer', 'description' =>__('Add widgets here to appear in your footer region', 'theme')));


        register_sidebar (array('name' => __('colonne de droite', 'theme'), 'id'=> 'colonne de droite', 'description' =>__('Add widgets here to appear in your right region', 'theme')));
    }
}

add_action('init','theme_init_menu');// J'éxecute la fonction nommée : theme_init_menu

function theme_init_menu() {
    if(function_exists('register_nan_menu')){

        register_nav_menu('primary', __('Primary Menu', 'theme') );
    }
}

function getField ($field) {//cette fp,ctop, va cp,striore un objet avec les informations à l'intérieur
    $info = get_field_object($field); //permet de récupérer les informations sur un champ
    $obj= new StdClass();
    $obj->label= $info['label'];
    $obj->label= $info['value'];
    return $obj;


}
