<?php

/**
 * Dein erster wirklich sehr einfacher Loop, dieser gibt dir einfach die Titel alle verfügbaren Beiträge zurück und rendert diese.
 * @param array $args
 * @return string
 */

function first_loop($args = array())
{

   // Welche Posts sollen aus der Datenbank geladen werden?
   $default = array(
      'post_type' => 'post', // Wähle den Post Typ
      'posts_per_page' => -1 // -1 bedeutet es werden alle vorhandenen Posts geladen
   );

   // Erstelle eine leere Variable für die HTML Ausgabe, durch '' wird diese als String definiert
   $html = '';

   // Vergleiche und füge Standard und übergebene Parameter in einen Array
   $args = wp_parse_args($args, $default);

   // Hole anhand der Parameter die Posts aus der Datenbank
   $posts = get_posts($args);

   // Prüfe ob der gelieferte Array auch nicht leer ist andernfalls steige aus der Funktion aus und gib eine Nachricht zurück
   if (!empty($posts) == false)
      return '<p>Keine Posts vorhanden</p>';

   // Gehe den Array mit den Posts durch...
   foreach ($posts as $post) {
      setup_postdata($post);

      // ... und speichere den HTML String in die Variable
      $html .= '<h3>' . get_the_title($post->ID) . '</h3>';

   }

   // Gebe das Ergebnis zurück
   return $html;

}