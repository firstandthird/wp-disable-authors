<?php
/**
 * Plugin Name: Disable Authors
 * Plugin URI: https://github.com/firstandthird/wp-disable-authors
 * Description: Disables the output of author names or replaces them with a configured name
 * Version: 1.0.0
 * Author: First and Third
 *
 * @package disableauthors
 */

require_once(__DIR__ . '/inc/settings-page.php');
require_once(__DIR__ . '/inc/disable-feeds.php');
require_once(__DIR__ . '/inc/rename-author.php');
require_once(__DIR__ . '/inc/disable-author.php');
require_once(__DIR__ . '/inc/plugin-patcher.php');
