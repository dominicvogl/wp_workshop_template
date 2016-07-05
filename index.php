<?php

get_header();

if (have_posts()) {

   // Prüfe ob gerade eine Archivseite vorliegt
   if (is_archive()) {
      $cat_obj = get_category(get_query_var('cat'));
      $cat_obj = $cat_obj->cat_name;
      echo '<div class="row"><div class="column small-12"><h1>Archiv: ' . $cat_obj . '</h1></div></div>';
   }

   echo '<div class="row">';

   // Zeige die letzten Newsbeiträge an
   while (have_posts()) {
      the_post();
      ?>

      <div class="column small-12 medium-6 large-4 post-<?php echo $post->ID; ?>">

         <div class="inner-content">

            <h3><?php the_title(); ?></h3>
            <span class="post-date"><?php the_date(); ?></span>
            <?php echo get_category_list($post->ID) ?>
            <?php the_content(''); ?>
            <a href="<?php echo get_permalink($post->ID); ?>" class="button">Zum Artikel</a>

         </div>
         <!-- /.inner-content -->

      </div>
      <!-- /.column -->

   <?php
   }

   echo '</div> <!-- /.row -->';

}

get_footer();