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

add_image_size('header-image', 1500, 550, true);


/**
 * Füge das Favicon in den <head> ein
 */

function bwrk_add_favicons()
{
   echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_bloginfo('template_url') . '/assets/favicon.ico" />';
   // echo '<link rel="Shortcut Icon" type="image/png" href="'.$url.'/img/favicon.png" />';
}

add_action('wp_head', 'bwrk_add_favicons');


/**
 * Registiere das Hauptmenü bei Wordpress
 */

function register_my_menu()
{
   register_nav_menu('primary', __('Primary Menu', 'theme-slug'));
}

add_action('after_setup_theme', 'register_my_menu');


/**
 * Lade die Stylesheets in den <head>
 */

function bwrk_load_css()
{

   // Prüfe ob du im Backend bist, wenn ja geh aus der Funktion heraus
   if (is_admin())
      return;

   // Lege einen Array mit den zu ladenden Stylesheet Dateien an
   $files = array(

      array(
         'handle' => 'google-fonts',
         'src' => 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:400,700',
         'deps' => array(),
      ),

      array(
         'handle' => 'all',
         'src' => get_template_directory_uri() . '/less/_all.less',
         'deps' => array()
      )

   );

   // Registriere jedes Stylesheet aus der Liste bei Wordpress und füge es dem <head> hinzu
   foreach ($files as $file) {

      wp_register_style($file['handle'], $file['src'], $file['deps'], TEMPLATE_VERSION);
      wp_enqueue_style($file['handle']);

   }

}

add_action('wp_enqueue_scripts', 'bwrk_load_css');


/**
 * Lade die Javascript Dateien im Footer
 */

function bwrk_load_javascript()
{

   // Prüfe ob du im Backend bist, wenn ja geh aus der Funktion heraus
   if (is_admin())
      return;

   // Deregistiere das Standard JQuery von Wordpress
   wp_deregister_script('jquery');

   // Lege einen Array mit den zu ladenden Javascript Dateien an
   $files = array(

      array(
         'handle' => 'less',
         'src' => get_template_directory_uri() . '/js/lib/less.min.js',
         'deps' => array(),
      ),

      array(
         'handle' => 'jquery',
         'src' => get_template_directory_uri() . '/js/lib/jquery.js',
         'deps' => array('less'),
      ),

      array(
         'handle' => 'slick',
         'src' => get_template_directory_uri() . '/js/lib/slick.js',
         'deps' => array('jquery'),
      ),

      array(
         'handle' => 'custom',
         'src' => get_template_directory_uri() . '/js/custom/custom.js',
         'deps' => array('jquery'),
      )

   );

   // Registriere jede Javascript Datei aus der Liste bei Wordpress und füge es dem <footer> hinzu
   foreach ($files as $file) {

      wp_register_script($file['handle'], $file['src'], $file['deps'], TEMPLATE_VERSION);
      wp_enqueue_script($file['handle']);

   }

}

add_action('wp_footer', 'bwrk_load_javascript');