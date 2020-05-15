<?php

 // Yoast (wordpress-seo)
$disableauthorsYoast = get_option('disableauthors_yoast', 'on');
if ($disableauthorsYoast) {
  add_filter('wpseo_schema_needs_author', '__return_false');
  add_filter('wpseo_schema_needs_person', '__return_false');
  add_filter('wpseo_schema_article', 'disableauthorsYoastSchema');
  add_filter('wpseo_schema_webpage', 'disableauthorsYoastSchema');

  function disableauthorsYoastSchema($schema) {
    $schema['author'] = get_bloginfo('name');
    return $schema;
  }
}
