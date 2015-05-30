<?php

/**
 * Dein erster wirklich sehr einfacher Loop, dieser gibt dir einfach alle Beiträge die es gibt zurück
 * @param array $args
 * @return string
 */

function first_loop($args = array())
{

    $default = array(
        'post_type' => 'post',
        'posts_per_page' => -1
    );

    $html = '';
    $args = wp_parse_args($args, $default);

    $posts = get_posts($args);

    foreach($posts as $post) {
        setup_postdata($post);

        $html = get_the_title();

    }

    return $html;
}