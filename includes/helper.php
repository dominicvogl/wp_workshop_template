<?php
/*
 * helper.php
 * Hier sind kleine Hilfsfunktionen enthalten
 * Autor: Dominic Vogl
 */

/**
 * Diese Klasse verbessert die Ansicht der Ausgaben von Variablen
 * @param $value
 */

function varD($value)
{
   echo '<pre>';
   var_dump($value);
   echo '</pre>';
}