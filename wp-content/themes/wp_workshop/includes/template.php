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

add_action('wp_head', 'bwrk_add_favicons');



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
            'deps'	=> array(),
         )

      );

      foreach( $files as $file ) {

         wp_register_script( $file['handle'], $file['src'], $file['deps'], TEMPLATE_VERSION );
         wp_enqueue_script( $file['handle'] );

      }

   }

}

add_action('wp_footer', 'bwrk_load_javascript');