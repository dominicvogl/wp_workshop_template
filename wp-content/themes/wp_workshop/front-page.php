<?php

get_header();

// Wähle die nötigen Argumente um nur den aktuellsten Beitrag zurück zu bekommen
$args = array(
   'post_type' => 'post',
   'orderby' => 'DESC',
   'posts_per_page' => 4,
   'category__in' => array(3)
);

// Lade die anhand der übergebenen Parametern die passenden Beiträge aus der Datenbank
$posts = get_posts($args);

// Definieren einen leeren Array um später etwas hineinzuspeichern
$exclude_posts = array();

// Prüfe ob ein Array zurückgeliefert wird
if( is_array($posts) ) {

   echo '<div class="slick-slider">';

   // Löse den Array auf und rendere jeden Post
   foreach($posts as $post) {
      setup_postdata($post);

      // Speichere die ID's der Beiträge
      $exclude_posts[] = $post->ID;
      ?>

      <div class="slick-slider-slide module-header-image">
         <?php the_post_thumbnail('header-image'); ?>

         <div class="header-post">
            <a href="<?php echo get_permalink($post->ID); ?>">
               <div class="inner-content">
                  <h2><?php the_title(); ?></h2>
                  <span class="post-date"><?php echo get_the_date('d.m.Y', $post->ID); ?></span>
               </div>
            </a>
         </div>

      </div>

   <?php
   }

   echo '</div>';

   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}



// Wähle die nötigen Argumente um weitere drei Newsbeiträge zu laden, die Hightlights aus dem Header werden ausgeschlossen
$args = array(
   'post_type' => 'post',
   'orderby' => 'DESC',
   'posts_per_page' => 3,
   'post__not_in' => $exclude_posts
);

// Lade die anhand der übergebenen Parametern die passenden Beiträge aus der Datenbank
$posts = get_posts($args);


// Prüfe ob ein Array zurückgeliefert wird
if( is_array($posts) ) {

   // Rendere HTML für die News Beiträge
   echo '<div class="module">';
   echo '<div class="row"><div class="column small-12"><h2>Willkommen auf meinem Blog</h2></div></div>';
   echo '<div class="row">';

   // Löse den Array auf und rendere jeden Post
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

   }

   echo '</div>';
   echo '</div>';

   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}


// Laden den Inhalt der Seite "Über mich" (Dieser hat die ID "2") aus der Datenbank
$post = get_post(2);

// Prüfe ob die Variable NICHT leer ist
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

   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}

get_footer();