<?php
/**
 * Plugin Name:     Snow
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     a simple framework for WordPress plugin development. Happy Coding :)
 * Author:          sigit santoso
 * Author URI:      @hello_sigit
 * Text Domain:     snow
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Snowlite
 */
// Mencegah akses langsung ke file
if (!defined('ABSPATH')) {
    exit;
}
// Tambahkan CORS untuk development
add_action('init', function () {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        header("Access-Control-Allow-Origin: *");
    }
});

require_once __DIR__ . '/vendor/autoload.php';

use Snow\Core\SnowBase as Snow;

function snowlite_init() {
    $plugin = new Snow();
    $plugin->init();
}

add_action('plugins_loaded', 'snowlite_init');