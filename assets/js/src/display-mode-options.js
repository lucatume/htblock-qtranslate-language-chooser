/*global jQuery:false, document:false, console:false*/
jQuery(document).ready(function($) {
    'use strict';

    function maybeHideOptions(current) {
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
            layoutModeSelector.fadeOut(400);
            horizontalSpacingSelector.fadeOut(400);
            verticalSpacingSelector.fadeOut(400);
        } else {
            // show the other selectors
            layoutModeSelector.fadeIn(400);
            horizontalSpacingSelector.fadeIn(400);
            verticalSpacingSelector.fadeIn(400);
        }
    }
    // run the script on each select
    jQuery('.panel-block-type-qtblock #input-display-mode select').each(
        function() {
            maybeHideOptions($(this));
            // when selected option change make a check and
            // and hide or show options
            $(this).change(function() {
                maybeHideOptions($(this));
            });
        });
});