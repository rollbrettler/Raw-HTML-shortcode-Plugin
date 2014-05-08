<?php
/**
 * Plugin Name: Raw HTML shortcode Plugin
 * Plugin URI: https://timpetter.de/
 * Description: A simple Plugin to manage raw HTML content and include it with a shortcode 
 * Version: 0.1
 * Author: Tim Petter
 * Author URI: https://timpetter.de/
 * License: MIT
 */
 
define("RAW_HTML_URL", plugin_dir_url( __FILE__ ));
define("RAW_HTML_PATH", plugin_dir_path( __FILE__ ));

include_once "raw-html-shortcode.function.php";