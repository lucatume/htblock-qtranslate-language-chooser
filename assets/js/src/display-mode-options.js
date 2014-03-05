/*global jQuery:false, document:false, console:false*/
jQuery(document).ready(function($) {
    'use strict';
    // the select that will trigger the showing or hiding of settings
    jQuery('.panel-block-type-qtblock #input-display-mode select').each(
        function(index, Element) {
            $(this).change(function() {
                var current = $(this);
                var selected = current.find('option:selected').text();
                if (selected === '') {
                    // if no option selected then do nothing
                    return;
                }
                var parent = $('#sub-tab-settings-content').has(current);
                // if the selected option is dropdown then
                // hide non relevant options
                var layoutModeSelector = parent.find('#input-layout-mode');
                var horizontalSpacingSelector = parent.find('#input-horizontal-spacing');
                var verticalSpacingSelector = parent.find('#input-vertical-spacing');
                if (selected === 'Dropdown') {
                    // hide all the other selectors
                    layoutModeSelector.hide();
                    horizontalSpacingSelector.hide();
                    verticalSpacingSelector.hide();
                } else {
                    // show the other selectors
                    layoutModeSelector.show();
                    horizontalSpacingSelector.show();
                    verticalSpacingSelector.show();
                }
            });
        });
});