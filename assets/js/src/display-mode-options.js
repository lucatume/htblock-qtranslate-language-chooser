/*global jQuery:false, document:false*/
jQuery(document).ready(function($) {
   'use strict';
    // the select that will trigger the showing or hiding of settings
    var select = jQuery('.panel-block-type-qtblock #input-display-mode select');
    select.change(function(select){
        select.css('background-color', 'yellow');
    });
});