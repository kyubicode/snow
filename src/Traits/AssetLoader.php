<?php
namespace Snow\Traits;

trait AssetLoader {

    public function load_assets() {

        // DETEKSI MODE DEV
        $is_dev = defined('WP_DEBUG') && WP_DEBUG;

        if ($is_dev) {
            // saat development, pakai dev server
            wp_enqueue_script('snow-scripts', 'http://localhost:3000/bundle.js', [], null, true);
            wp_enqueue_style('snow-styles', 'http://localhost:3000/styles.css', [], null);

        } else {
            // production, pakai file hasil build
            $plugin_url  = plugin_dir_url(dirname(__DIR__, 2) . '/snow.php');
            $plugin_path = plugin_dir_path(dirname(__DIR__, 2) . '/snow.php');
            $css_path = $plugin_path . 'dist/styles.css';
            $js_path  = $plugin_path . 'dist/bundle.js';
            
            if (file_exists($css_path)) {
                wp_enqueue_style('snow-styles', $plugin_url . 'dist/styles.css', [], filemtime($css_path));
            }
            
            if (file_exists($js_path)) {
                wp_enqueue_script('snow-scripts', $plugin_url . 'dist/bundle.js', ['wp-element'], filemtime($js_path), true);
            }
            
        }

        // Render div root buat React, hanya di frontend
        if (!is_admin()) {
            echo '<div id="root"></div>';
        }

    }
}



/*
trait AssetLoader {
    public function load_assets() {
        $plugin_dir = plugin_dir_url(__DIR__ . '/../../Snow.php');

        // Enqueue styles while finished build asset
        wp_enqueue_style('snowlite-styles', $plugin_dir . 'dist/styles.css', [], '1.0.0');
        // Enqueue styles while finished build asset
        wp_enqueue_script('snowlite-scripts', $plugin_dir . 'dist/bundle.js', ['wp-element'], '1.0.0', true);

        // Render div root buat React
        echo '<div id="root"></div>';
    }
}*/
