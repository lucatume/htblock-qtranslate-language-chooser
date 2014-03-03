<?php
namespace qtblock;

class BlockOptions extends \HeadwayBlockOptionsAPI
{

    public $tabs = array(
        'settings' => 'Settings'
        );

    public $inputs = array(

        'settings' => array(
            'display-mode' => array(
                'type' => 'select',
                'name' => 'display-mode',
                'label' => 'Display mode',
                'default' => 'dropdown',
                'options' => array(
                    'image' => 'Images',
                    'text' => 'Text',
                    'both' => 'Images and text',
                    'dropdown' => 'Dropdown'
                    )
                ),
            'layout-mode' => array(
                'type' => 'select',
                'name' => 'layout-mode',
                'label' => 'Layout mode',
                'default' => 'dropdown',
                'options' => array(
                    'vertical' => 'Vertical',
                    'horizontal' => 'Horizontal'
                    )
                )
            )
        );
}
