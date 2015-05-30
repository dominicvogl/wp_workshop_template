<?php

$post_ID = get_the_ID();

get_header();

if (have_posts()) {

   // Zeige die letzten Newsbeiträge an

   if (is_archive()) {
      $cat_obj = get_category(get_query_var('cat'));
      echo '<div class="row"><div class="column small-12"><h1>Archiv: ' . $cat_obj->cat_name . '</h1></div></div>';
   }


   echo '<div class="row">';

   while (have_posts()) {
      the_post();
      ?>

      <div class="column small-12 medium-6 large-4 post-<?php echo $post->ID; ?>">

         <div class="inner-content">

            <h3><?php the_title(); ?></h3>
            <span class="post-date"><?php the_date(); ?></span>
            <?php echo get_category_list($post->ID) ?>
            <?php the_content(''); ?>
            <a href="<?php echo get_permalink($post_ID); ?>" class="button">Zum Artikel</a>

         </div>

      </div>

   <?php
   }

   echo '</div>';

}

get_footer();