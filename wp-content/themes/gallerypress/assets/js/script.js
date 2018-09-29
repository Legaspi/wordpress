jQuery.fn.exists = function(callback) {
	var args = [].slice.call(arguments, 1);
	if (this.length) {
		callback.call(this, args);
	}
	return this;
};

(function($) {

	var base = {
		initAll: function() {

			this.toggleMenu();
			if ( $('.tc-infinite-scroll').length > 0 ) {
				console.log('Free');
				this.infiniteScroll();
			};

			this.addClassScrollToHeaderMenu();

		},
		toggleMenu: function() {
			

			$('.dropdown-menu-toggle').on('click', function(e) {
				e.preventDefault();

				$('.main-navigation li').unbind('mouseenter mouseleave');

				var hasActive = $(this).hasClass('active');

				if ( !hasActive ) {
					$(this).addClass('active');
					$('body').addClass('menu-show');
				} else {
					$(this).removeClass('active');
					$('body').removeClass('menu-show');
				}

			});
		},
		
		infiniteScroll: function() {
			var pageNumber = 2;
			var isLoading = false;
			jQuery(window).scroll(function(){

				if($(window).scrollTop() + $(window).height() > $('#main').height()) {

					if (pageNumber <= totalPages && isLoading === false) {

						var data = {
							action: 'infinite_scroll',
							nonce: GalleryPress.nonce,
							page: pageNumber,
							query: GalleryPress.query,
							layout: GalleryPress.layout
						};
						
						jQuery.ajax({
							url: GalleryPress.url,
							type: 'POST',
							data: data,
							beforeSend: function () {
								isLoading = true;
								$('.tc-infinite-scroll').css( "display", "table" );
							},
							success: function (html) {
								jQuery('.tc-infinite-scroll').before(html);
								isLoading = false;
								pageNumber++;
								$('.tc-infinite-scroll').removeAttr('style');
							}

						});

					}
				}
			}); 
		},

		addClassScrollToHeaderMenu: function() {

			var distance = $('div').offset().top;
			var $window = $(window);

			$window.scroll(function() {
				if ( $window.scrollTop() <= distance ) {
					$( 'body' ).removeClass( 'scroll' );
				} else {
					$( 'body' ).addClass( 'scroll' );
				}
			});

		}

	}


	$(document).ready(function() {
		base.initAll();
	});

})(jQuery);

