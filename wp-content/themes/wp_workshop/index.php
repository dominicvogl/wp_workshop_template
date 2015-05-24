<?php

get_header();

if(have_posts()) {
   while(have_posts()) {
      the_post();
      ?>

      <div class="row">

         <div class="columns small-12 medium-8">

            <h3><?php the_title(); ?></h3>
            <?php the_content();?>
            <a href="<?php echo get_permalink(CURRENT_PAGE_ID); ?>" class="button">Zum Artikel</a>

         </div>

      </div>

      <?php
   }
}

get_footer();