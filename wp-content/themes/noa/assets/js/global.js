jQuery(document).ready(function($) {

    var $header = $('header'),
        $adminbar = $('#wpadminbar'),
        $nav = $header.find('#site-navigation'),
        $serachButton = $header.find('.search-button'),
        $menuToggle = $header.find('.menu-toggle'),
        $buttonUp = $('.button-up'),
        $headerOffSet = $header.outerHeight(true) - $nav.innerHeight();

    var $grid = $('.posts-container').masonry({
        itemSelector: '.post-wrapp',
    });

    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
        $(".post").fadeIn();
    });

    $(window).resize(function() {
        $grid.masonry('layout');
    });

    $(document).ready(function() { setTimeout(function() { $grid.masonry('layout'); }, 500); });

    $(window).on('scroll', function() {

        var $top = $(this).scrollTop();
        if ($top >= $headerOffSet) {
            $nav.addClass("fixed");
            if ($adminbar) { $nav.css({ 'top': $adminbar.innerHeight() + 'px' }); };
        } else {
            $nav.removeClass("fixed");
        }
        if ($top >= $header.outerHeight(true)) {
            $buttonUp.css({ 'right': '0' });
        } else {
            $buttonUp.css({ 'right': '-80px' });
        }

    });

    $serachButton.on('click', function(e) {
        e.preventDefault();
        $('.searchform').slideToggle();
        $('.searchform .s')[0].focus();
    });

    $menuToggle.on('click', function(e) {
        e.preventDefault();
        $('#primary-menu').slideToggle();

    });

    $buttonUp.on('click', function() {
        $('html,body').animate({ scrollTop: 0 }, 500);
    });

    $('.gallery a').each(function() {
        $(this).attr({ 'data-lightbox': $(this).parent().parent().parent().attr('id') });
    });

    $('.wp-block-gallery a').each(function(index) {
        $(this).attr({ 'data-lightbox': 'image-' + index });
    });

    AOS.init();


});