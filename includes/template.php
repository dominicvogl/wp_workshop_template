<?php

/*
 * template.php
 * Hier werden grundlegende Einstellungen am Template festgelegt und wichtige Dateien eingebunden
 * Autor: Dominic Vogl
 */


/**
 * Aktiviere Vorschaubildern bei Posts
 */

add_theme_support('post-thumbnails');


/**
 * Füge eine neue Bildergröße hinzu, welche gerendert werden soll
 */

add_image_size('header-image', 800, 350, true);


/**
 * Registiere das Hauptmenü bei Wordpress
 */

function register_my_menu()
{
   register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}

add_action('after_setup_theme', 'register_my_menu');