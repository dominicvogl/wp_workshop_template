<?php

//
// Load favicons
// ----------------------------------------------------------------------------------------

function bwrk_add_favicons()
{
   $url = get_bloginfo('template_url');
   echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.$url.'/img/favicon.ico" />';
   echo '<link rel="Shortcut Icon" type="image/png" href="'.$url.'/img/favicon.png" />';
}

// add_action('wp_head', 'bwrk_add_favicons');



//
// Mache Vorschaubilder bei Beiträgen und Seiten verfügbar
// ----------------------------------------------------------------------------------------


add_theme_support( 'post-thumbnails' );


//
// Füge eine neue Bildschirmgröße hinzu
// ----------------------------------------------------------------------------------------

add_image_size( 'header-image', 1500, 800, true );

//
// Registriere ein Menü
// ----------------------------------------------------------------------------------------

add_action( 'after_setup_theme', 'register_my_menu' );

function register_my_menu() {
   register_nav_menu( 'primary', __( 'Primary Menu', 'theme-slug' ) );
}


//
// Load CSS files
// ----------------------------------------------------------------------------------------

function bwrk_load_css()
{

   if(!is_admin()) {

      $files = array(

         array(
            'handle'	=> 'normalize',
            'src'		=> 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:400,700',
            'deps'	=> array(),
         ),

         array(
            'handle'	=> 'all',
            'src'		=> get_template_directory_uri() . '/less/_all.less',
            'deps'	=> array(),
         )

      );

      foreach( $files as $file ) {

         wp_register_style( $file['handle'], $file['src'], $file['deps'], TEMPLATE_VERSION );
         wp_enqueue_style( $file['handle'] );

      }

   }

}

add_action('wp_enqueue_scripts', 'bwrk_load_css');



//
// Lade Javascript
// ----------------------------------------------------------------------------------------

function bwrk_load_javascript()
{

   if(!is_admin()) {

      wp_deregister_script('jquery');

      $files = array(

         array(
            'handle'	=> 'less',
            'src'		=> get_template_directory_uri() .'/js/lib/less.min.js',
            'deps'	=> array(),
         ),

         array(
            'handle'	=> 'jquery',
            'src'		=> get_template_directory_uri() .'/js/lib/jquery.js',
            'deps'	=> array('less'),
         ),

         array(
            'handle'	=> 'slick',
            'src'		=> get_template_directory_uri() .'/js/lib/slick.js',
            'deps'	=> array('jquery'),
         ),

         array(
            'handle'	=> 'custom',
            'src'		=> get_template_directory_uri() .'/js/custom.js',
            'deps'	=> array('jquery'),
         )

      );

      foreach( $files as $file ) {

         wp_register_script( $file['handle'], $file['src'], $file['deps'], TEMPLATE_VERSION );
         wp_enqueue_script( $file['handle'] );

      }

   }

}

add_action('wp_footer', 'bwrk_load_javascript');