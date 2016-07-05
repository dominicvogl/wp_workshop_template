<?php

/*
 * categories.php
 * Hier werden Funktionen zur Verfügung gestellt, welche die Ausgabe von Kategorieauflistungen ermöglichen
 * Autor: Dominic Vogl
 */

/**
 * @param $postID
 * @return string
 */

function get_category_list($postID)
{

   $post_cats = wp_get_post_categories($postID);

   $html = '<ul class="category-list">';

   foreach ($post_cats as $post_cat) {

      $html .= '<li class="category-' . $post_cat . ' category-' . get_category_slug($post_cat) . '"><a href="' . get_category_link($post_cat) . '">' . get_the_category_by_ID($post_cat) . '</a></li>';

   }

   $html .= '</ul>';

   return $html;

}

/**
 * @param $category_ID
 * @return string|void
 */

function get_category_slug($category_ID)
{

   $category = get_the_category_by_ID($category_ID);

   if (empty($category))
      return;

   $slug = strtolower($category);
   trim($slug);

   return $slug;

}