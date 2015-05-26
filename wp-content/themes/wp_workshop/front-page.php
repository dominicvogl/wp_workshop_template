<?php

get_header();

// Wähle die nötigen Argumente um nur den aktuellsten Beitrag zurück zu bekommen
$args = array(
   'post_type' => 'post',
   'orderby' => 'DESC',
   'posts_per_page' => 4,
   'category__in' => array(3)
);

// Die Argument an die Funktion übergeben und aus der Datenbank holen
$posts = get_posts($args);
$exclude_posts = array();

if( !empty($posts) ) {
   foreach($posts as $post) {

      $exclude_posts[] = $post->ID;
   ?>

      <div class="module-header-image">
         <?php echo get_the_post_thumbnail($post->ID); ?>

         <div class="header-post">
            <div class="inner-content">
               <h2><?php the_title(); ?></h2>
               <span class="post-date"><?php echo get_the_date('d.m.Y', $post->ID); ?></span>
            </div>
         </div>

      </div>

   <?php
   }
   wp_reset_postdata();
}

// Wähle die nötigen Argumente um weitere drei Newsbeiträge zu laden, der erste aus dem Header wird aber ausgelassen
$args = array(
   'post_type' => 'post',
   'orderby' => 'DESC',
   'posts_per_page' => 3,
   'post__not_in' => $exclude_posts
);

$posts = get_posts($args);

if( is_array($posts) ) {

   // Zeige die letzten Newsbeiträge an
   echo '<div class="module">';
   echo '<div class="row">';

   foreach($posts as $post) {
      setup_postdata($post);
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

   } // foreach Ende

   echo '</div>';
   echo '</div>';

   wp_reset_postdata();
}


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
                     <?php echo get_the_post_thumbnail($post->ID, 'large'); ?>
                  </div>

               </div>

            </div>

         </div>
      </div>
   </div>

   <?php
   wp_reset_postdata();
}


get_footer();