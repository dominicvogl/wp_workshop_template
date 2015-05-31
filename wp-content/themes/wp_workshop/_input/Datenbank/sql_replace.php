<?php

// Content, Charset
header('Content-Type: text/html; charset=utf-8');

// PHP auch explizit auf UTF-8 setzen
mb_internal_encoding('UTF-8');

die('Hier ist das Ende!');

$db = array();

$db['host']          = "localhost";
$db['uname']   		= "username";
$db['password']   	= "pw";
$db['database']    	= "databse";

// Comment if all Tables sould be checked
// $table = "table";


$dbconnect = mysql_connect($db['host'], $db['uname'], $db['password']) or die ("Konnte keine Verbindung zur Datenbank aufnehmen!");
mysql_select_db($db['database'],$dbconnect) or die ("Fehler beim AuswÃ¤hlen der Datenbank!");

mysql_set_charset('utf8');


echo '<pre>';

// Uncomment if all Tables sould be checked
function getTables($db){

   $result = mysql_query("SHOW TABLES FROM " . $db['database']);

   while($row = mysql_fetch_row($result)){
      $res[] = $row[0];
   }

   return $res;

}

function getColumns($table){

   $table = mysql_real_escape_string($table);

   $mysqlres = mysql_query("SHOW COLUMNS FROM " . $table);
   while($row = mysql_fetch_row($mysqlres)){
      $res[] = $row[0];
   }

   return $res;
}

// Alle Tabellen ermitteln
// Uncomment if all Tables sould be checked
$tablesArray = getTables($db);

// Alle Spalten pro Tabelle ermitteln und durcharbeiten
// Uncomment if all Tables sould be checked
foreach($tablesArray AS $table){

   $affectedRows = 0;
   $spalten = getColumns($table);

   echo "Tabelle: " . $table . "<br />";


   foreach($spalten AS $spalte){

      echo "...Spalte: " . $spalte . "<br />";

      $query = 'UPDATE `' . $table . '` SET `' . $spalte . '` = REPLACE(`' . $spalte . '`, "WWW.ALTEDOMAIN.TLD", "WWW.NEUEDOMAIN.TLD")';

      mysql_query($query) OR die(mysql_error() . $query);
      $affectedRows += mysql_affected_rows();

   }


   echo "Tabelle " . $table . " aktualisiert, DatensÃ¤tze: " . $affectedRows . "<br /><br />";

   // Uncomment if all Tables sould be checked
}

echo '</pre>';