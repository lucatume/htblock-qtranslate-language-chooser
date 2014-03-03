<?php
namespace qtblock;

class Block extends \HeadwayBlockAPI
{

    public $id = 'qtblock';
    public $name = 'qTranslate language chooser';
    public $options_class = '\qtblock\BlockOptions';
    public $description = 'An Headway block to display qTranslate plugin language chooser on the page.';

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
        $marginRight = '0.5rem';
        $marginBottom = '0.5rem';
        $out = '';
        if ($layoutMode == 'horizontal') {
            $out .= $selector . ' ul.qtrans_language_chooser > li {display:inline-block;';
            $out .= 'margin-right:' . $marginRight . ';';
            $out .= 'margin-bottom:' . $marginBottom . ';';
            $out .= '}';
        }
        return $out;
    }
}
