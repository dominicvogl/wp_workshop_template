<!DOCTYPE html>
<html lang="de">

<head>

   <meta charset="utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <title><?php wp_title('-', true, 'right'); ?></title>

   <!-- Lade das Favicon -->
   <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo TEMPLATE_URI; ?>/assets/favicon.ico"/>

   <!-- Lade die Stylesheets -->
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:400,700"/>
   <link rel="stylesheet/less" href="<?php echo TEMPLATE_URI; ?>/less/_all.less"/>

   <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<header class="module-header">

   <div class="inner-content">

      <div class="row">

         <div class="column small-12 medium-6 logo">
            <a href="<?php echo home_url(); ?>" title="Gehe zur Startseite">
               <img src="<?php echo TEMPLATE_URI . '/assets/logo.svg'; ?>" width="300"
                    alt="Wordpress Logo"/>
            </a>
         </div>
         <!-- /.column -->

         <div class="column small-12 medium-6">
            <?php
            wp_nav_menu(
               array(
                  'container' => '',
                  'menu_class' => 'header-menu',
                  'link_before' => '<span class="button">',
                  'link_after' => '</span>'
               )
            );
            ?>
         </div>
         <!-- /.column -->

      </div>
      <!-- /.row -->

   </div>
   <!-- /.inner-content -->

</header>
<!-- /.module-header -->