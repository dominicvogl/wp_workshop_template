<?php

get_header();

if(have_posts()) {
   while(have_posts()) {
      the_post();
      ?>

      <div class="row">

         <div class="column small-12">

            <div class="inner-content">

               <h3><?php the_title(); ?></h3>
               <?php the_content('');?>

            </div>

         </div>

      </div>

      <?php
   }
}

get_footer();