<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie8 no-js" lang="de"> <![endif]-->
<!--[if IE 9]>
<html class="ie9 no-js" lang="de"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="de"> <!--<![endif]-->

<head>

   <meta charset="utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   <title><?php wp_title('-', true, 'right'); ?></title>

   <!--<link rel="stylesheet/less" href="<?php /*echo get_template_directory_uri(); */?>/css/custom.less" media="all"/>-->

   <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="module-header">
   <div class="inner-content">
      <div class="row">
            <div class="column small-12 medium-6 logo">
               <img src="<?php echo get_template_directory_uri().'/assets/logo.svg';?>" width="300" alt="Wordpress Logo"/>
            </div>

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
         </div>
   </div>
</div>