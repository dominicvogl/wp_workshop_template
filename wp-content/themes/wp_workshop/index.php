<?php

get_header();

if (have_posts()) { ?>

   <div class="row">
      <div class="column">
         <h2>Willkommen auf meinem Blog</h2>
      </div>

      <?php

      // Zeige die letzten Newsbeiträge an
      while (have_posts()) {
         the_post();
         ?>

         <div class="column">

            <div class="inner-content">

               <h3><?php the_title(); ?></h3>
               <span class="post-date"><?php the_date(); ?></span>
               <?php echo get_category_list($post->ID) ?>
               <?php the_post_thumbnail('medium'); ?>
               <?php the_content(''); ?>

               <a href="<?php echo get_permalink($post->ID); ?>" class="button">Zum Artikel</a>

            </div>
            <!-- /.inner-content -->

         </div>
         <!-- /.column -->

      <?php
      }
      ?>

   </div>
   <!-- /.row -->

<?php
}

get_footer();