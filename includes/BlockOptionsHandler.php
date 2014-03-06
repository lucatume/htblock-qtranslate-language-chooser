<?php
namespace qtblock;

class BlockOptionsHandler
{
    public function __construct($blockId)
    {
        add_action('headway_block_options_' . $blockId, array($this,'printVisualEditorScripts'));
    }
    public function printVisualEditorScripts()
    {
        // load minified script version by default
        $postfix = '.min';
        if (defined('SCRIPT_DEBUG')) {
            // load non minified scrip
            // t version if script debug is active
            $postfix = '';
        }
        $src = QTBLOCK_BLOCK_URL . "assets/js/qtblock_visual_editor$postfix.js";
        $this->appendScript($src);
    }
    protected function appendScript($src)
    {
        $out = '';
        $out .= '<script type="text/javascript">';
        $out .= 'var script   = document.createElement("script");
        script.type  = "text/javascript";
        script.src  = "' . $src . '"
        document.body.appendChild(script)';
        $out .= '</script>';
        echo $out;
    }
}
