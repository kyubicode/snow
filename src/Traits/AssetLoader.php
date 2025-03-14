<?php
namespace Snowlite\Traits;

trait AssetLoader {
    public function load_assets() {
        $plugin_dir = plugin_dir_url(__DIR__ . '/../../snowlite.php');

        // Enqueue styles
        wp_enqueue_style('snowlite-styles', $plugin_dir . 'dist/styles.css', [], '1.0.0');

        // Enqueue scripts
        wp_enqueue_script('snowlite-scripts', $plugin_dir . 'dist/bundle.js', ['wp-element'], '1.0.0', true);

        // Render div root buat React
        echo '<div id="root"></div>';
    }
}
