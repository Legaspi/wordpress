(function($) {
    'use strict';

    wp.customize.bind('ready', function() {

        //initialize
        button_header_check();
        site_branding_check();

        function button_header_check() {
            // array controls ids
            var $control_ids = [
                'noa_header_button_text_control',
                'noa_header_button_link_control',
                'noa_header_button_color_control',
                'noa_header_button_color_hover_control',
                'noa_header_button_textcolor_control'
            ];

            if (wp.customize.instance('noa_header_button').get()) {
                $.each($control_ids, function(id, value) {
                    $('#customize-control-' + value).fadeIn();
                })
            } else {
                $.each($control_ids, function(id, value) {
                    $('#customize-control-' + value).fadeOut();
                })
            }
        }

        function site_branding_check() {
            // array controls ids
            var $control_ids = ['noa_branding_css_animations'];

            if (wp.customize.instance('header_textcolor').get() === 'blank') {
                $.each($control_ids, function(id, value) {
                    $('#customize-control-' + value).fadeOut();
                })
            } else {
                $.each($control_ids, function(id, value) {
                    $('#customize-control-' + value).fadeIn();
                })
            }
        }

        // on change values....
        wp.customize.control('noa_header_button_control', function(control) {
            control.setting.bind(function(value) {
                // check state
                button_header_check();
            });

        });

        wp.customize.control('display_header_text', function(control) {
            control.setting.bind(function(value) {
                // check state
                site_branding_check();
            });

        });

    });


})(jQuery);