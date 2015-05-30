<?php

if (!is_admin()) {
   add_filter('style_loader_tag', 'enqueue_less_styles', 5, 2);
}

function enqueue_less_styles($tag, $handle)
{
   global $wp_styles;
   $match_pattern = '/\.less$/U';
   if (preg_match($match_pattern, $wp_styles->registered[$handle]->src)) {
      $handle = $wp_styles->registered[$handle]->handle;
      $media = $wp_styles->registered[$handle]->args;
      $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
      $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
      $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr($wp_styles->registered[$handle]->extra['title']) . "'" : '';

      $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
   }
   echo $tag;
}