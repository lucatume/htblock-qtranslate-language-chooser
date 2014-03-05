<?php
namespace qtblock;

class Block extends \HeadwayBlockAPI
{

    public $id = 'qtblock';
    public $name = 'qTranslate language chooser';
    public $options_class = '\qtblock\BlockOptions';
    public $description = 'An Headway block to display qTranslate plugin language chooser on the page.';
    public function init()
    {
        add_action('headway_block_options_' . $this->id, array($this,'printVisualEditorScripts'));
    }
    public function printVisualEditorScripts()
    {
        // load minified script version by default
        $postfix = '.min';
        if (defined('SCRIPT_DEBUG')) {
            // load non minified scritp version if script debug is active
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
    public function content($block)
    {
        if (function_exists('qtrans_generateLanguageSelectCode')) {
            $displayMode = \HeadwayBlocksData::get_block_setting($block, 'display-mode', 'dropdown');
            $out = qtrans_generateLanguageSelectCode($displayMode);
            echo $out;
        }
    }
    public function dynamic_css($block_id, $block, $original_block = null)
    {
        $displayMode = \HeadwayBlocksData::get_block_setting($block, 'display-mode', 'dropdown');
        if ($displayMode == 'dropdown') {
            return;
        }
        $selector = '#block-' . $block_id;
        if (is_array($original_block)) {
            $block_id = $original_block['id'];
            $block = $original_block;
            $selector .= '.block-original-' . $block_id;
        }
        $layoutMode = \HeadwayBlocksData::get_block_setting($block, 'layout-mode', 'horizontal');
        $marginRight = \HeadwayBlocksData::get_block_setting($block, 'horizontal-spacing', '0.5rem');
        $marginBottom = \HeadwayBlocksData::get_block_setting($block, 'vertical-spacing', '0.5rem');
        $titleSpacing = \HeadwayBlocksData::get_block_setting($block, 'title-spacing', '0.5rem');
        $out = '';
        if ($layoutMode == 'horizontal') {
            $out .= $selector . ' ul.qtrans_language_chooser > li {display:inline-block;';
            $out .= 'margin-right:' . $marginRight . ';';
            $out .= 'margin-bottom:' . $marginBottom . ';';
            $out .= '}';
        }
        $selectorAndContent = $selector . '> .block-content';
        $out .= $selectorAndContent . ' > .block-title';
        $out .= ',' . $selectorAndContent . ' > .block-subtitle';
        $out .= ',' . $selectorAndContent . ' > hgroup';
        $out .= '{margin-bottom: ' . $titleSpacing . ';';
        $out .= '}';
        return $out;
    }
}
