<?php

//
// Definiere globale Konstanten um mehrfach benötigte Inhalte zu speichern
//

define('CURRENT_PAGE_ID', get_the_ID()); // Die aktuelle ID eines Beitrags oder einer Seite, je nachdem was gerade aktiv ist
define('TEMPLATE_VERSION', 1.0); // Version des Templates (wird für den Dateiimport benötigt)
define('TEMPLATE_URI', get_template_directory_uri()); // Speichere den Pfad zum aktuellen Template


// Liste mit den Namen der einzubindenen Dateien
$files = array(
   'helper',
   'categories',
   'template',
   'loops'
);

// Prüfen ob die Variable ein Array ist
if (is_array($files)) {

   // Binde die Dateien aus dem Array ein und lade deren inhalt
   foreach ($files as $filename) {
      include(TEMPLATEPATH . '/includes/' . $filename . '.php');
   }
}