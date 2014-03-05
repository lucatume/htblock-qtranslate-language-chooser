/*! qTranslate language chooser - v0.1.0
 * http://theAverageDev.com
 * Copyright (c) 2014; * Licensed GPLv2+ */
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
            layoutModeSelector.hide();
            horizontalSpacingSelector.hide();
            verticalSpacingSelector.hide();
        } else {
            // show the other selectors
            layoutModeSelector.show();
            horizontalSpacingSelector.show();
            verticalSpacingSelector.show();
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