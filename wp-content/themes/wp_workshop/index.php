<?php

$post_ID = get_the_ID();

get_header();

if (have_posts()) {

   // Zeige die letzten Newsbeiträge an
   echo '<div class="row">';

   if (is_archive()) {
      $cat_id = get_query_var('cat');
      $cat_obj = get_category($cat_id);
      echo '<div class="column small-12"><h1>Archiv: ' . $cat_obj->cat_name . '</h1></div>';
   }

   while (have_posts()) {
      the_post();
      ?>

      <div class="column small-12 medium-6 large-4 post-single post-<?php echo $post->ID; ?>">

         <div class="inner-content">

            <h3><?php the_title(); ?></h3>
            <span class="post-date"><?php the_date(); ?></span>
            <?php echo get_category_list($post_ID) ?>
            <?php the_content(''); ?>
            <a href="<?php echo get_permalink($post_ID); ?>" class="button">Zum Artikel</a>

         </div>

      </div>

   <?php
   }

   echo '</div>';

}

get_footer();