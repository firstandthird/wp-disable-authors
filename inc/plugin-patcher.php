<?php

$disableauthorsAuthorName = get_option('disableauthors_default_name', 'Anonymous');

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

// AMP
// The amp plugin directly grabs user data and avoids all of the built in user filters
$disableauthorsAmp = get_option('disableauthors_amp', 'on');
if ($disableauthorsAmp) {
  add_filter('amp_post_template_data', 'disableauthorsAmpTemplateData');

  function disableauthorsAmpTemplateData($template_data) {
    global $disableauthorsAuthorName;

    if (isset($template_data['post_author'])) {
      $template_data['post_author']->user_login = sanitize_user($disableauthorsAuthorName);
      $template_data['post_author']->user_nicename = sanitize_user($disableauthorsAuthorName);
      $template_data['post_author']->display_name = $disableauthorsAuthorName;
      $template_data['post_author']->user_email = '';
    }

    return $template_data;
  }
}
