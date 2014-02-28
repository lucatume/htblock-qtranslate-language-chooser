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
            $out = '';
            $out .= '<div class="qtblock-language-selection">';
            $out .= qtrans_generateLanguageSelectCode($displayMode);
            $out .= '</div>';
            echo $out;
        }
    }
}
