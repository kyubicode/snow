<?php
namespace Snow\Core;

use Snow\Interfaces\PluginInterface;
use Snow\Traits\AssetLoader;

class SnowBase implements PluginInterface {
    use AssetLoader;

    public function init() {
        add_action('wp_footer', [$this, 'load_assets']);
        add_shortcode('snow_popup', [$this, 'render_popup']);
    }

    public function render_popup() {
        ob_start();
        $this->load_assets();
        return ob_get_clean();
    }

}
