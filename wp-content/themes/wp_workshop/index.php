<?php

get_header();

if (have_posts()) {

   // Zeige die letzten Newsbeiträge an
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

}

get_footer();