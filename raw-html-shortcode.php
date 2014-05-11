<?php
/**
 * Plugin Name: Raw HTML shortcode Plugin
 * Plugin URI: https://github.com/rollbrettler/Raw-HTML-shortcode-Plugin
 * Description: A simple Plugin to manage raw HTML content and include it with a shortcode 
 * Version: 0.1.2
 * Author: Tim Petter
 * Author URI: https://timpetter.de/
 * License: MIT
 */
 
define("RAW_HTML_URL", plugin_dir_url( __FILE__ ));
define("RAW_HTML_PATH", plugin_dir_path( __FILE__ ));

include_once "raw-html-shortcode.function.php";

// Updater class
if (!class_exists('BFIGitHubPluginUpdater')) {
    require_once( 'BFIGitHubPluginUploader.php' );
}
if ( is_admin() ) {
    new BFIGitHubPluginUpdater( __FILE__, 'rollbrettler', "Raw-HTML-shortcode-Plugin" );
}