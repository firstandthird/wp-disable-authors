<?php

$disableauthorsDisableAuthorPages = get_option('disableauthors_disable_author_pages', 'on');

function disableauthors_disable_author_page() {
  global $wp_query;
  global $disableauthorsDisableAuthorPages;

  if (is_author() && 'on' === $disableauthorsDisableAuthorPages) {
    wp_redirect(get_option('home'), 301);
    exit;
  }
}

function disableauthors_filter_author_url($link) {
  global $disableauthorsDisableAuthorPages;

  if ('on' === $disableauthorsDisableAuthorPages) {
    return get_option('home');
  }

  return $link;
}

add_action('template_redirect', 'disableauthors_disable_author_page');
add_filter('author_link', 'disableauthors_filter_author_url', 1);
