/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($) {

    // Site title and description.
    wp.customize('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title a').text(to);
        });
    });

    wp.customize('blogdescription', function(value) {
        value.bind(function(to) {
            $('.site-description').text(to);
        });
    });

    wp.customize('noa_header_button_text', function(value) {
        value.bind(function(to) {
            $('.header-button').text(to);
        });
    });

    // Header text color.
    wp.customize('header_textcolor', function(value) {
        value.bind(function(to) {
            if ('blank' === to) {
                $('.site-title, .site-description').css({
                    'display': 'none'
                });
                $('.site-titles').css({
                    'padding': '0'
                });
            } else {
                $('.site-title, .site-description').css({
                    'display': 'block'
                });

                $('.site-title a, .site-description').css({
                    'color': to
                });
            }
        });
    });

})(jQuery);