<?php

$disableauthorsDisableAuthorPages = get_option('disableauthors_disable_author_pages', 'on');
$disableauthorsAuthorName = get_option('disableauthors_default_name', 'Anonymous');

function disableauthors_disable_author_page() {
  global $wp_query;
  global $disableauthorsDisableAuthorPages;

  if (is_author() && 'on' === $disableauthorsDisableAuthorPages) {
    $wp_query->set_404();

    status_header(404);

    require get_404_template();

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

// Handle rest
// Adapted from https://github.com/szepeviktor/waf4wordpress
function disableauthors_disable_rest($response, $server, $request) {
  if ($response instanceof \WP_HTTP_Response) {
      $method = $request->get_method();
      $route = $request->get_route();
      $is_user_listing = ($server::READABLE === $method && '/wp/v2/users' === substr($route, 0, 12));
      if (!current_user_can('list_users') && $is_user_listing) {
        exit;
      }
  }
  return $response;
}
add_filter('rest_post_dispatch', 'disableauthors_disable_rest', 0, 3);
