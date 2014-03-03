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
                    ),
                'tooltip' => 'How to show the language selection possibilities.'
                ),
            'layout-mode' => array(
                'type' => 'select',
                'name' => 'layout-mode',
                'label' => 'Layout mode',
                'default' => 'dropdown',
                'options' => array(
                    'vertical' => 'Vertical',
                    'horizontal' => 'Horizontal'
                    ),
                'tooltip' => 'Show the language images and/or text in a vertical list or on an horizontal line.'
                ),
            'horizontal-spacing' => array(
                'type' => 'text',
                'name' => 'horizontal-spacing',
                'label' => 'Horizontal Spacing',
                'tooltip' => 'Set the px horizontal spacing between the icons.'
                ),

            'vertical-spacing' => array(
                'type' => 'text',
                'name' => 'vertical-spacing',
                'label' => 'Vertical Spacing',
                'tooltip' => 'Set the px vertical spacing between the icons.'
                )
            )
    );
}
