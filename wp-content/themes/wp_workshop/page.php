<?php

get_header();

if(have_posts()) {
   while(have_posts()) {
      the_post();
      ?>

      <div class="row">

         <div class="column small-12">

            <div class="inner-content">

               <h1><?php the_title(); ?></h1>
               <?php the_content();?>
               <?php the_post_thumbnail('medium'); ?>

            </div>

         </div>

      </div>

      <?php
   }
}

get_footer();