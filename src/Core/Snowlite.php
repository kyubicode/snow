<?php
namespace Snowlite\Core;

use Snowlite\Interfaces\PluginInterface;
use Snowlite\Traits\AssetLoader;

class Snowlite implements PluginInterface {
    use AssetLoader;

    public function init() {
        add_action('wp_footer', [$this, 'load_assets']);
        add_shortcode('snowlite_popup', [$this, 'render_popup']);
    }

    public function render_popup() {
        ob_start();
        $this->load_assets();
        return ob_get_clean();
    }
}
