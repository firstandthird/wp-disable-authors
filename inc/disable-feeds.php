<?php

$disableauthorsDisableFeeds = get_option('disableauthors_disable_feed', 'on');

function disableauthors_disable_feed() {
  global $disableauthorsDisableFeeds;
  if ($disableauthorsDisableFeeds === 'on') {
    wp_die( __('no feed', 'disableauthors') );
  }
}

add_action('do_feed', 'disableauthors_disable_feed', 1);
add_action('do_feed_rdf', 'disableauthors_disable_feed', 1);
add_action('do_feed_rss', 'disableauthors_disable_feed', 1);
add_action('do_feed_rss2', 'disableauthors_disable_feed', 1);
add_action('do_feed_atom', 'disableauthors_disable_feed', 1);
add_action('do_feed_rss2_comments', 'disableauthors_disable_feed', 1);
add_action('do_feed_atom_comments', 'disableauthors_disable_feed', 1);

if ($disableauthorsDisableFeeds === 'on') {
  remove_action('wp_head', 'feed_links_extra', 3);
  remove_action('wp_head', 'feed_links', 2);
}
