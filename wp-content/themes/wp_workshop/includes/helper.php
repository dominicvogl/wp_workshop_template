<?php

/**
 * Rendere den Var Dump übersichtlicher
 * @param $value
 */

function varD($value)
{
   echo '<pre>';
   var_dump($value);
   echo '</pre>';
}