<?php

$disableauthorsAuthorName = get_option('disableauthors_default_name', 'Anonymous');

function disableauthors_filter_author($name) {
  global $disableauthorsAuthorName;
  return $disableauthorsAuthorName;
}

add_filter('the_author', 'disableauthors_filter_author', 1);
add_filter('get_the_author_display_name', 'disableauthors_filter_author', 1);
add_filter('get_the_author_first_name', 'disableauthors_filter_author', 1);
add_filter('get_the_author_last_name', 'disableauthors_filter_author', 1);
add_filter('get_the_author_nickname', 'disableauthors_filter_author', 1);
add_filter('get_the_author_user_login', 'disableauthors_filter_author', 1);
