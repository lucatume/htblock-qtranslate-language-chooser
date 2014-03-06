<?php
namespace qtblock;

class Main
{
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'blockRegister'));
        add_action('init', array($this, 'extend_updater'));
    }

    public function blockRegister()
    {
        if ( !class_exists('Headway') )
            return;

        require_once dirname(__FILE__) . '/Block.php';
        require_once dirname(__FILE__) . '/BlockOptions.php';
        require_once dirname(__FILE__) . '/BlockOptionsHandler.php';

        return headway_register_block('\qtblock\Block', plugins_url(false, __FILE__));
    }


    public function extend_updater() {
        if ( !class_exists('HeadwayUpdaterAPI') )
            return;
        $updater = new \HeadwayUpdaterAPI(array(
            'slug' => 'qtblock',
            'path' => plugin_basename(__FILE__),
            'name' => 'qTranslate language chooser',
            'type' => 'block',
            'current_version' => QTBLOCK_BLOCK_VERSION
            ));
    }
}
