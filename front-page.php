<?php

get_header();

// Wähle die nötigen Argumente um nur den aktuellsten Beitrag zurück zu bekommen
$args = array(
   'post_type' => 'post',        // Zeige Beiträge (keine Seiten)
   'orderby' => 'DESC',          // Zeige den aktuellsten zuerst
   'posts_per_page' => 4,        // Zeige 4 Beiträge an
   'category__in' => array(3)    // Zeige nur Beiträge mit der Kategorie ID 3 an
);

// Lade die anhand der übergebenen Parametern die passenden Beiträge aus der Datenbank
$posts = get_posts($args);

// Definieren einen leeren Array um später etwas hineinzuspeichern
$exclude_posts = array();

// Prüfe ob ein Array zurückgeliefert wird
if (is_array($posts)) {

   echo '<div class="slick-slider">';

   // Löse den Array auf und rendere jeden Post
   foreach ($posts as $post) {
      setup_postdata($post);

      // Speichere die ID's der Beiträge
      $exclude_posts[] = $post->ID;
      ?>

      <div class="slick-slider-slide module-header-image">
         <div class="header-image ">
            <?php echo get_the_post_thumbnail($post->ID, 'header-image'); ?>
         </div>

         <div class="header-post">
            <a href="<?php echo get_permalink($post->ID); ?>">
               <div class="inner-content">
                  <h2><?php the_title(); ?></h2>
                  <span class="post-date"><?php echo get_the_date('d.m.Y', $post->ID); ?></span>
               </div>
            </a>
         </div>

      </div>
      <!-- /.slick-slider-slide -->

   <?php
   }

   echo '</div>';
   // .slick-slider

   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}


// Wähle die nötigen Argumente um weitere drei Newsbeiträge zu laden, die Hightlights aus dem Header werden ausgeschlossen
$args = array(
   'post_type' => 'post',              // Zeige Beiträge an, keine Seiten
   'orderby' => 'DESC',                // Zeige den aktuellsten Beitrag zuerst
   'posts_per_page' => 3,              // Zeige 3 Beiträge
   'post__not_in' => $exclude_posts    // Schließe bereits vorhandene Beiträge aus
);

// Lade die anhand der übergebenen Parametern die passenden Beiträge aus der Datenbank
$posts = get_posts($args);


// Prüfe ob ein Array zurückgeliefert wird
if (is_array($posts)) {
   ?>

   <div class="module">

      <div class="row">
         <div class="column small-12">
            <h2>Willkommen auf meinem Blog</h2>
         </div>
      </div>
      <!-- /.row -->

      <div class="row">

         <?php
         // Löse den Array auf und rendere jeden Post
         foreach ($posts as $post) {
            setup_postdata($post);
            ?>

            <div class="column small-12 medium-6 large-4 post-<?php echo $post->ID; ?>">

               <div class="inner-image">
                  <a href="<?php echo get_permalink(CURRENT_PAGE_ID); ?>">
                     <?php the_post_thumbnail('medium'); ?>
                  </a>
               </div>

               <div class="inner-content">

                  <?php echo get_category_list($post->ID) ?>
                  <h3><?php the_title(); ?></h3>
                  <span class="post-date"><?php the_date(); ?></span>
                  <?php the_content(''); ?>
                  <a href="<?php echo get_permalink(CURRENT_PAGE_ID); ?>" class="button">Zum Artikel</a>

               </div>

            </div>
            <!-- /.column -->

         <?php
         }
         ?>

      </div>
      <!-- /.row -->

   </div>
   <!-- /.module -->

   <?php
   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}


// Laden den Inhalt der Seite "Über mich" (Dieser hat die ID "2") aus der Datenbank
$post = get_post(2);

// Prüfe ob die Variable NICHT leer ist
if (!empty($post)) {
   setup_postdata($post);
   ?>

   <div class="row">

      <div class="column post-<?php echo $post->ID; ?>">

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
            <!-- /.row -->

         </div>
         <!-- /.inner-content -->

      </div>
      <!-- /.column -->

   </div>
   <!-- /.row -->

   <?php

   // Setze den Wordpress Query / Loop zurück
   wp_reset_postdata();
}

get_footer();