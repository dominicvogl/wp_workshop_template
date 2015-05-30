<?php

get_header();

if(have_posts()) {
   while(have_posts()) {
      the_post();
      ?>

      <div class="row">

         <div class="column">

            <div class="inner-content">

               <div class="row">

                  <div class="column small-12 medium-8">

                     <h1><?php the_title(); ?></h1>
                     <span class="post-date"><?php the_date(); ?></span>
                     <?php the_content('');?>

                     <div>
                        <a href="<?php echo home_url(); ?>" class="button block">Zurück zur Startseite</a>
                     </div>

                  </div>

                  <div class="column small-12 medium-4">
                     <?php the_post_thumbnail('large'); ?>
                     <?php echo get_category_list( get_the_ID() ); ?>
                  </div>

               </div> <!-- row -->

            </div> <!-- inner-content -->

         </div> <!-- column -->

      </div> <!-- row -->

      <?php
   }
}

get_footer();