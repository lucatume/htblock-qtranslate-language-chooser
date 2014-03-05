/*global jQuery:false, document:false, console:false*/
jQuery(document).ready(function($) {
    'use strict';
    // run the script on each select
    jQuery('.panel-block-type-qtblock #input-display-mode select').each(
        function() {
            // when selected option change make a check and
            // and hide or show options
            $(this).change(function() {
                var current = $(this);
                var selected = current.find('option:selected').text();
                if (selected === '') {
                    // if no option selected then do nothing
                    return;
                }
                // get all actors and targets
                var parent = $('#sub-tab-settings-content').has(current);
                var layoutModeSelector = parent.find('#input-layout-mode');
                var horizontalSpacingSelector = parent.find('#input-horizontal-spacing');
                var verticalSpacingSelector = parent.find('#input-vertical-spacing');
                // if the selected option is dropdown then
                // hide non relevant options
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