<?php
/**
 * Plugin Name:     Snowlite
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     snowlite
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Snowlite
 */

// Your code starts here.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}
// Inisialisasi plugin
use Snowlite\Core\Snowlite;

function snowlite_init() {
    $plugin = new Snowlite();
    $plugin->init();
}
add_action('plugins_loaded', 'snowlite_init');