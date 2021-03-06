<?php
namespace qtblock;

class Block extends \HeadwayBlockAPI
{
    public $id = 'qtblock';
    public $name = 'qTranslate language chooser';
    public $options_class = '\qtblock\BlockOptions';
    public $description = 'An Headway block to display qTranslate plugin language chooser on the page.';
    protected $options_handler = null;
    protected $content = true;
    public function init()
    {
        $this->options_handler = new \qtblock\BlockOptionsHandler($this->id);
        add_action('headway_before_block', array($this, 'bufferOutput'));
        add_action('headway_after_block', array($this, 'maybePrintBlock'));
    }
    public function bufferOutput($block)
    {
        if ($block['type'] != $this->id) {
            return;
        }
        ob_start();
    }
    public function maybePrintBlock($block)
    {
        if ($block['type'] != $this->id) {
            return;
        }
        $out = ob_get_contents();
        ob_end_clean();
        if (!$this->content) {
            return;
        }
        echo $out;
    }
    public function content($block)
    {
        if (function_exists('qtrans_generateLanguageSelectCode')) {
            $displayMode = \HeadwayBlocksData::get_block_setting($block, 'display-mode', 'dropdown');
            $out = qtrans_generateLanguageSelectCode($displayMode);
            echo $out;
            return;
        }
        $this->content = false;
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
