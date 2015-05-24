<?php


// Definiere globale Konstanten um benötigte Inhalte zu speichern
define('CURRENT_PAGE_ID', get_the_ID());
define('TEMPLATE_VERSION', 1.0);


// List all file to import
$files = array(
   'template',
   'loops'
);

if (is_array($files)) {
   foreach ($files as $filename) {
      include(TEMPLATEPATH . '/includes/' . $filename . '.php');
   }
}