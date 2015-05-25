<?php

get_header();

if (have_posts()) {

   // Zeige die letzten Newsbeiträge an
   echo '<div class="module">';
   echo '<div class="row">';

   while (have_posts()) {
      the_post();
      ?>

      <div class="column small-12 medium-6 large-4">

         <div class="inner-content">

            <h3><?php the_title(); ?></h3>
            <span class="post-date"><?php the_date(); ?></span>
            <?php the_content(''); ?>
            <a href="<?php echo get_permalink(CURRENT_PAGE_ID); ?>" class="button">Zum Artikel</a>

         </div>

      </div>

   <?php
   }

   echo '</div>';
   echo '</div>';

   // Zeige den Inhalt der Seite "Über mich an"
   $post = get_post(2);

   if( !empty($post) ) {
      setup_postdata($post);
      ?>

      <div class="row">
         <div class="column">
            <div class="inner-content">

               <div class="row">

                  <div class="column medium-8">

                     <h2><?php the_title(); ?></h2>
                     <?php the_content(); ?>

                  </div>

                  <div class="column medium-4">

                     <div class="image-round">
                        <?php echo get_the_post_thumbnail($about_post->ID, 'large'); ?>
                     </div>

                  </div>

               </div>

            </div>
         </div>
      </div>


   <?php
   wp_reset_postdata();
   }

}

get_footer();